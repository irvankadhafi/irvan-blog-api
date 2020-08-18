<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Login</div>

            <div class="card-body">
                <form autocomplete="off" @submit.prevent="submit" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="form.password">
                    </div>
                    <button type="submit" class="btn btn-default btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex'
export default {
    name: 'signin',
    components :{},
    data(){
        return{
            form :{
                email: '',
                password: ''
            }
        }
    },
    methods : {
        ...mapActions({
           signIn : 'auth/signIn'
        }),
        submit() {
            this.signIn(this.form).then(()=>{
                this.$toasted.show('Sukses Login',{
                    type: 'success',
                    duration: 3000,
                })
                this.$router.replace({
                    name : 'posts.create'
                })
            }).catch(()=>{
                console.log('failed')
            })
        }
    }
}
</script>
