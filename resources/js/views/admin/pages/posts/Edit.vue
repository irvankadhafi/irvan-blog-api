<template>
    <div>
        <loading-component v-show="isLoading"/>
        <div v-show="!isLoading">
            <section class="section">
                <title-header title="Edit Post"/>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header">Edit Post</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <input id="title" ref="title" v-model="form.title" class="form-control"
                                                   placeholder="Enter title" required type="title">
                                        </div>

                                        <div class="form-group">
                                            <select @change="getCategory" id="category" ref="category"
                                                    class="form-control" name="category">
                                                <!--                                                <option disabled selected>Choose One!</option>-->
                                                <option :value="form.categoryId" v-text="form.category"></option>
                                                <template v-for="category in categories">

                                                    <option v-if="form.categoryId !== category.id" :key="category.id" :value="category.id">
                                                        {{ category.name }}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <vue-editor v-model="form.body"></vue-editor>
                                        </div>

                                        <div class="form-group">
                                            <div v-if="!image">
                                                <p>Select an image</p>
                                                <input type="file" @change="onFileChange">
                                            </div>
                                            <div v-else>
                                                <img :src="image" />
                                                <button @click="removeImage">Remove image</button>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary block" type="submit" @click.prevent="update">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import {VueEditor} from 'vue2-editor'
import TitleHeader from "../../components/Title/TitleHeader.vue";
import LoadingComponent from "../../components/Loading/LoadingComponent";
import FileInput from "../../../../components/FileInput";

export default {
    components: {
        VueEditor,
        TitleHeader,
        LoadingComponent,
        FileInput
    },
    data() {
        console.log(localStorage.getItem('token'))
        return {
            image: '',
            slug: this.$route.params.postSlug,
            form: [],
            categories: [],
            selectedCategory: '',
            selectedImage: '',
            theErrors: [],
            editorData: '<p>Content of the editor.</p>',
            customToolbar: [
                ['bold', 'italic', 'underline'],
                [{'list': 'ordered'}, {'list': 'bullet'}],
                ['image', 'code-block']
            ]
        };
    },
    mounted() {
        this.getCategories();
        this.getPosts();
        this.image=this.form.image;
    },
    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            this.selectedImage = e.target.files || e.dataTransfer.files;
        },
        createImage(file) {
            let image = new Image();
            let reader = new FileReader();
            let vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
            this.image = '';
        },
        async getCategories() {
            let response = await axios.get('/categories')
            console.log(response.data);
            if (response.status === 200) {
                this.categories = response.data.data
            }
        },
        async getPosts() {
            let response = await axios.get('/posts/' + this.slug);
            console.log("CUY"+ response.data.data.image);
            if (response.status === 200) {
                this.form = response.data.data
                this.image = "/uploads/posts/"+response.data.data.image
            }
        },
        getCategory(e)  {
            this.selectedCategory = Number(e.target.value)
        },
        async update() {
            // console.log("updated")
            this.form['categoryId'] = this.selectedCategory || this.form.categoryId
            this.form['image'] = this.selectedImage || this.form.image
            // console.log(this.form)

            // let response = await axios.patch("/update-post/"+this.form.post_id, this.form)
            await axios
                .patch(`/update-post/${this.$route.params.postSlug}`, this.form, {
                headers: {
                    'Authorization': 'Bearer' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$toasted.show(response.data.message, {
                        type: 'success',
                        duration: 3000,
                    })
                    // this.$router.push({name: 'posts'});
                    console.log(response.data)
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if ((error.response.status = 422)) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });
            // if(response.status === 200) {
            //     console.log(response.data)
            // }

            // let response = await axios.post(`/update-post/:id`)
            // const formData = new FormData();
            // formData.append("title", this.form.title.value);
            // formData.append("category", this.form.category.value);
            // formData.append("body", this.editorData);
            // formData.append("image", this.form.image.files[0]);
            // axios
            //     .post("/update-post/:id", formData, {
            //         headers: {
            //             'Authorization': 'Bearer' + localStorage.getItem('token')
            //         }
            //     })
            //     .then(response => {
            //         this.successful = true;
            //         this.error = false;
            //         this.errors = [];
            //         this.$toasted.show(response.data.message, {
            //             type: 'success',
            //             duration: 3000,
            //         })
            //         // this.$router.push({name: 'posts'});
            //     })
            //     .catch(error => {
            //         if (!_.isEmpty(error.response)) {
            //             if ((error.response.status = 422)) {
            //                 this.errors = error.response.data.errors;
            //                 this.successful = false;
            //                 this.error = true;
            //             }
            //         }
            //     });
            // this.$refs.title.value = "";
            // this.editorData = "";
        }
    }
}
</script>

<style scoped>
img {
    width: 30%;
    margin: auto;
    display: block;
    margin-bottom: 10px;
}
</style>
