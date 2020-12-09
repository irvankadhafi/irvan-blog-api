<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post\Category;
use App\Models\Post\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->paginate(6);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $posts = auth()->user()->posts()->create($this->postStore());
//        return $posts;
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required'
        ],
        [
            'title.required' => 'Masukkan Title Post!',
            'body.required' => 'Masukkan isi Post!',
            'image.required'=>'Input Image',
            'category'=>'Masukkan ID Category'
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Ada field yang kosong atau tidak terisi semua!',
                    'data' => $validator->errors()
                ],400);
        }else{
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/posts/'), $imageName);
            $post = auth()->user()->posts()->create($this->postStore($imageName));
            if ($post){
                return response([
                    'success' => true,
                    'message' => 'Berhasil ditambahkan',
                ],200);
            }else{
                return response([
                    'success' => false,
                    'message' => 'Gagal ditambahkan',
                ],400);
            }
        }
    }

    public function createPost()
    {
        $data = [
            'title' => 'Create Posts',
            'category'=>Category::all()
        ];
        return view('dashboard.posts.create',$data);
    }
    public function savePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs(public_path('uploads/posts/'), $image->hashName());
        $currentUser = JWTAuth::parseToken()->authenticate();
        return 'test'.($currentUser);
        $blog = Post::create([
            'title' => $request->title,
            'slug'=> Str::slug($request->title),
            'body'=> $request->body,
            'category_id'=> $request->category,
            'image' => $image->hashName(),
            'user_id'=> $user
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'body'   => 'required',
        ],
            [
                'title.required' => 'Masukkan Title Post !',
                'body.required' => 'Masukkan Content Post !',
            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        }else //Jika Berhasil
        {
            $folderPath = public_path('uploads/posts/');
            if ($request->has('image')) {
                //Delete foto dan foldernya yang lama
                $image_path = $folderPath.'/'.$post->image;
                if(file_exists($image_path)) // check if the image indeed exists
                    unlink($image_path);
                //Update foto Baru
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('uploads/posts/'), $imageName);

                $post->update($this->postStore($imageName));
            }else
            {
                $post->update([
                    'title' => request('title'),
                    'slug'=> Str::slug(request('title')),
                    'body'=>request('body'),
                    'category_id'=>request('category')
                ]);
            }
        }
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $image_path = public_path().'/uploads/posts/'.$post->image;
        if(file_exists($image_path)) // check if the image indeed exists
            unlink($image_path);
        $post->delete();
        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Dihapus!',
            ], 500);
        }
    }
    public function postStore($imageName)
    {
        return [
            'title' => request('title'),
            'slug'=> Str::slug(request('title')),
            'body'=>request('body'),
            'category_id'=>request('category'),
            'image' => $imageName
        ];
    }

    public function search(Request $request){
        {
            if ( $request->input('client') ) {
                return Post::select('id', 'title', 'category_id', 'user_id', 'slug')->get();
            }

            $columns = ['title', 'category_id', 'user_id', 'slug'];

            $length = $request->input('length');
            $column = $request->input('column'); //Index
            $dir = $request->input('dir');
            $searchValue = $request->input('search');

            $query = Post::select('id', 'title', 'category_id', 'user_id', 'slug')->orderBy($columns[$column], $dir);

            if ($searchValue) {
                $query->where(function($query) use ($searchValue) {
                    $query->where('title', 'like', '%' . $searchValue . '%')
                        ->orWhere('category_id', 'like', '%' . $searchValue . '%')
                        ->orWhere('user_id', 'like', '%' . $searchValue . '%');
                });
            }

            $posts = $query->paginate($length);
            return ['data' => $posts, 'draw' => $request->input('draw')];
        }
    }
}
