<template>
<!--    <div class="container">-->
<!--        <h1>{{post.title}}</h1>-->
<!--        <hr>-->
<!--        <div v-html="post.body"></div>-->
<!--    </div>-->
    <div class="mt-5">
        <div class="main-wrapper container mt-5">
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card p-3">
                                <!-- Title -->
                                <h1 class="mt-4">{{post.title}}</h1>

                                <!-- Author -->
                                <p class="lead">
                                    by
                                    <a href="#">{{post.author}}</a>
                                </p>
                                <!-- Date/Time -->
                                <p>Posted on {{post.published}}</p>

                                <hr>

                                <!-- Preview Image -->
                                <img class="img-fluid rounded" :src="'/uploads/posts/'+post.image" alt="">

                                <hr>

                                <!-- Post Content -->
                                <p class="lead" v-html="post.body"></p>
                                <a @click="$router.go(-1)">back</a>
                            </div>

                            <hr>

                            <!-- Comments Form -->
                            <div class="card my-4">
                                <h5 class="card-header">Leave a Comment:</h5>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Single Comment -->
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Commenter Name</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>

                            <!-- Comment with nested comments -->
                            <div class="media mb-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">Commenter Name</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                                    <div class="media mt-4">
                                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">Commenter Name</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </div>

                                    <div class="media mt-4">
                                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">Commenter Name</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <h4 class="m-auto text-dark">Search</h4>
                                </div>
                                <div class="card-body">

                                    <form action="http://nuthink.jtk.polban.ac.id/cari" method="get">
                                        <input class="input" name="cari" placeholder="Enter your search...">
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <h4 class="m-auto text-dark">Categories</h4>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/uncategorized" class="list-group-item list-group-item-action">Uncategorized</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/manajemen" class="list-group-item list-group-item-action">Manajemen</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/informasi-kp" class="list-group-item list-group-item-action">Informasi KP</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/pendidikan" class="list-group-item list-group-item-action">Pendidikan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/kesehatan" class="list-group-item list-group-item-action">Kesehatan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/donor-darah" class="list-group-item list-group-item-action">Donor Darah</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/hari-peringatan" class="list-group-item list-group-item-action">Hari Peringatan</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/psikologi" class="list-group-item list-group-item-action">Psikologi</a>
                                        <a href="http://nuthink.jtk.polban.ac.id/list-category/bisnis" class="list-group-item list-group-item-action">Bisnis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    data(){
        return{
            post:[]
        }
    },
    mounted() {
        // console.log(this.$route.params)
        this.getPost();
    },
    methods:{
        async getPost(){
            let response = await axios.get('/posts/'+this.$route.params.postSlug)
            this.post = response.data.data
            console.log(response.data.data)
        }
    }
}
</script>
