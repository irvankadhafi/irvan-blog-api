<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">Create new Post</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select v-model="form.category" id="category" class="form-control">
                                    <option disabled selected>Choose One!</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                                <div v-if="theErrors.category" class="mt-2 text-danger">{{ theErrors.category[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea v-model="form.body" id="body" rows="6" class="form-control"></textarea>
                                <div v-if="theErrors.body" class="mt-2 text-danger">{{ theErrors.body[0] }}</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: {
                    title : '',
                    body :'',
                    category:'',
                },
                categories: [],
                theErrors:[]
            };
        },
        mounted() {
            this.getCategories();
        },
        methods: {
            async getCategories(){
                let response = await axios.get('/api/categories')
                // console.log(response.data);
                if (response.status === 200){
                    this.categories = response.data
                }
            },
            async store(){
                try{
                    let response = await axios.post('/api/posts/create',this.form)
                    if(response.status === 200){
                        // console.log(response.data);
                        this.form.title=""
                        this.form.category=""
                        this.form.body=""
                        this.theErrors = []
                        this.$toasted.show(response.data.message,{
                            type: 'success',
                            duration: 3000,
                        })
                    }
                }catch (e) {
                    this.$toasted.show("Something went wrong!",{
                        type: 'error',
                        duration: 3000,
                    })
                    this.theErrors = e.response.data.errors;
                }

            }
        }
    }
</script>

<style scoped>

</style>
