<template>
    <div>
        <loading-component v-show="isLoading" />
        <div v-show="!isLoading">
            <section class="section">
                <title-header title="Create Post" />
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header">Create new Post</div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required>
                                        </div>

                                        <div class="form-group">
                                            <select ref="category" name="category" id="category" class="form-control">
                                                <option disabled selected>Choose One!</option>
                                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                                    {{category.name}}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <vue-editor v-model="editorData" ></vue-editor>
                                        </div>

                                        <div class="custom-file mb-3">
                                            <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
                                            <label class="custom-file-label" >Choose file...</label>
                                        </div>

                                        <button type="submit" @click.prevent="create" class="btn btn-primary block">
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
import { VueEditor } from 'vue2-editor'
import TitleHeader from "../../components/Title/TitleHeader.vue";
import LoadingComponent from "../../components/Loading/LoadingComponent.vue";
export default {
    components: {
        VueEditor,
        TitleHeader,
        LoadingComponent,
        // ckeditor: CKEditor.component
    },
    data(){
        console.log(localStorage.getItem('token'))
        return{
            form: {
                title : '',
                body :'',
                category:'',
            },
            categories: [],
            theErrors:[],
            editorData: '<p>Content of the editor.</p>',
            customToolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['image', 'code-block']
            ]
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        async getCategories(){
            let response = await axios.get('/categories')
            console.log(response.data);
            if (response.status === 200){
                this.categories = response.data.data
            }
        },
        create() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("category", this.$refs.category.value);
            formData.append("body", this.editorData);
            formData.append("image", this.$refs.image.files[0]);
            axios
                .post("/new-post", formData, {
                    headers: {
                        'Authorization' : 'Bearer' + localStorage.getItem('token')
                    }
                })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$toasted.show(response.data.message,{
                        type: 'success',
                        duration: 3000,
                    })
                    // this.$router.push({name: 'posts'});
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
            this.$refs.title.value = "";
            this.editorData = "";
        }
    }
}
</script>
