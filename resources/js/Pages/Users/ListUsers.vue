<template>
    <side-layout title="Dashboard">
        
        <template #logo>
            <logo-light />
        </template>   

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-header">
                Users
            </h2>
        </template>
        <div class="row">
            <div class="col-md-2 text-center blocker">
                <div class="circle bg-primary">
                    <h3>1</h3>
                </div>
            </div>
            <div class="col-md-10 flex items-center">
                <h3 class="sub-tittle">User list</h3>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="bd-example">
                                <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody v-if="users">
                                    <tr v-for="details in users" :key="details">
                                        <th v-if="details.email != $page.props.user.email" scope="row"> {{details.email}} </th>
                                        <td v-if="details.email != $page.props.user.email" > {{details.name}} </td>
                                        <td v-if="details.email != $page.props.user.email" > {{details.email}} </td>
                                        <td v-if="details.email != $page.props.user.email" > {{details.rol_id}} </td>
                                        <td v-if="details.email != $page.props.user.email" ><button @click="destroy(details.id)" class="btn btn-danger">delete</button></td>
                                    </tr>
                                </tbody>

                                </table>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
         
         <div class="row">
            <div class="col-md-2 text-center blocker">
                <div class="circle bg-primary">
                    <h3>2</h3>
                </div>
            </div>
            <div class="col-md-10 flex items-center">
                <h3 class="sub-tittle">New user</h3>
            </div>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                    
                    <form class="form-control col-sm-11 col-md-10" @submit.prevent="submit">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mt-4">
                                    <jet-label for="name" value="Name" />
                                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-4">
                                    <jet-label for="email" value="Email" />
                                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-4">
                                    <jet-label for="password" value="Password" />
                                    <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-4">
                                    <jet-label for="password_confirmation" value="Confirm Password" />
                                    <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mt-4">
                                    <select id="rol" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.rol" required autocomplete="new-rol">
                                        <option v-for="rol in rols" :key="rol" :value="rol.id">
                                            {{ rol.name_rol }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                                        <jet-label for="terms">
                                            <div class="flex items-center">
                                                
                                            </div>
                                        </jet-label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-grid gap-2">
                                    <jet-button class="btn btn-warning" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Register
                                        </jet-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </side-layout>
</template>

<script>
    import SideLayout from '@/Layouts/SideLayout.vue'
    import LogoLight from '@/Jetstream/LogoLight.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    export default {
        props: {
            all_user:{
                type:Array,
                //required:true,
                default: ""
            },
             rols:{
                type:Array,
                //required:true,
                default: ""
            }
        },
        components: {
            Head,
            SideLayout,
            LogoLight,
            JetLabel,
            JetInput,
            JetButton,
            JetCheckbox,
            JetValidationErrors,
            Link,
        },
        
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    rol: '',
                },
                users : this.all_user,
            }
        },

        methods: {
            submit() {
                
                axios.get(route('newUser'), {
                    params: this.form  
                }).then((respose) => {
                    console.log(respose)
                    this.users=respose.data.all_user;
                    this.form.name='';
                    this.form.email='';
                    this.form.password='';
                    this.form.password_confirmation='';
                }).catch(error => {
                    
                    //this.form.error = error.response.data.errors.password[0];
                });
               
            },
            destroy(idd){
                axios.delete(route('destroy'), {
                    params: {id:idd}  
                }).then((respose) => {
                    this.users=respose.data.all_user;              
                }).catch(error => {
                    //this.form.error = error.response.data.errors.password[0];
                });
               
            }
        }
    }
</script>
<style scoped>
.sub-tittle{
    width: 212px;
height: 29px;
left: 476px;
top: 202px;

font-family: Montserrat;
font-style: normal;
font-weight: bold;
font-size: 34px;
line-height: 29px;
text-align: center;

color: #121835;
}
.bloker{
    text-align: center;
    vertical-align: middle;
}
.text-header{
    font-weight: bold;
    font-size: 48px;
    line-height: 59px;
    text-align: center;
    color: #121835;
}
.circle {
    border-radius: 200px;
    color: white;
    height: 59px;
    font-weight: bold;
    width: 59px;
    display: table;
    margin: 20px auto;
}
.circle h3 {
    vertical-align: middle;
    display: table-cell;
}
</style>
