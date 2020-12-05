<template>
    <div>
        <div class="card-body">
            <form autocomplete="off" @submit.prevent="register" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Masukkan nama" v-model="form.name">
                </div>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" id="username" class="form-control" placeholder="Masukkan username" v-model="form.username">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="form.email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="form.password">
                </div>
                <div class="form-group">
                    <label for="password">Password Confirmation</label>
                    <input class="form-control" placeholder="Confirm Password" type="password" v-model="form.password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-default btn-success">Register</button>
            </form>
        </div>
    </div>
</template>
<script>
import {mapActions} from 'vuex'
export default {
    name: 'register',
    components :{},
    data(){
        return{
            form :{
                name:'',
                username:'',
                email: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods : {
        ...mapActions({
            signUp : 'auth/signUp'
        }),
        register() {
            this.signUp(this.form).then(()=>{
                this.$toasted.show('Sukses Register',{
                    type: 'success',
                    duration: 3000,
                })
                this.$router.replace({
                    name : 'signin'
                })
            }).catch(()=>{
                console.log('failed')
            })
        }
    }
}
</script>
