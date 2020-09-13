<template>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h4 class="m-auto text-dark">Categories</h4>
        </div>
        <div class="card-body">
            <div class="list-group">
                <a href="http://nuthink.jtk.polban.ac.id/list-category/uncategorized" class="list-group-item list-group-item-action" v-for="category in categories.data" :key="category.slug">{{category.name}}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",
    data(){
        return{
            categories : {}
        }
    },
    mounted(){
        this.getCategories()
    },
    methods:{
        async getCategories(){
            let response = await axios.get('/categories')
            console.log(response.data)
            this.categories = response.data;
        }
    }

}
</script>

<style scoped>

</style>
