<template>
    <side-layout title="Dashboard">
        
        <template #logo>
            <logo-light />
        </template>   

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-header">
                Usuarios
            </h2>
        </template>
       

        <div class="py-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="row flex items-center bb">
                        <div class="col-md-1 text-center blocker">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="18" fill="#28ABE7"/>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <h3 class="sub-tittle text-left">Lista de usuarios</h3>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="table-responsive">
                            <div class="bd-example">
                            <table class="table">
                                <thead>
                                <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                </tr>
                            </thead>
                            <tbody v-if="users">
                                <tr class="alert alert-primary trmb" v-for="details in users" :key="details">
                                    <td v-if="details.email != $page.props.user.email" scope="row"> {{details.name}} </td>
                                    <td v-if="details.email != $page.props.user.email" > {{details.name}} </td>
                                    <td v-if="details.email != $page.props.user.email" > {{details.email}} </td>
                                    <td v-if="details.email != $page.props.user.email" > {{details.rol_id==1? 'Admin':'User'}} </td>
                                    <td v-if="details.email != $page.props.user.email" >
                                        <button @click="destroy(details.id)" class="btn btn-transparent">
                                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" fill="black"/>
                                            </svg>    
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="row flex items-center bb">
                        <div class="col-md-1 text-center blocker">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="18" fill="#28ABE7"/>
                            </svg>
                        </div>
                        <div class="col-md-10 ">
                            <h3 class="sub-tittle text-left">Nuevo Usuario</h3>
                        </div>
                    </div>
      
                    <div class="row">
                        <form class="col-sm-12" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mt-3r controls">
                                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                        <jet-label for="name" value="Nombre" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3r controls">
                                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                                        <jet-label for="email" value="Correo" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3r controls">
                                        <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                        <jet-label for="password" value="Contraseña" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3r controls">
                                        <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                        <jet-label for="password_confirmation" value="Confirmar contraseña" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-3r controls">
                                        <select id="rol" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" v-model="form.rol" required autocomplete="new-rol">
                                            <option v-for="rol in rols" :key="rol" :value="rol.id">
                                                {{ rol.name_rol }}
                                            </option>
                                        </select>
                                        <jet-label for="rol" value="Rol en plataforma" class="control-label"/>
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
                                        <div class="">
                                            <jet-button class="btn btn-roderprimary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Crear
                                            </jet-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
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
.bb{
     border-bottom: 1px solid #92C8D8;
     padding-bottom: 15px;
}
.btn-roderprimary{
    background: #23B8E3;
    border-radius: 10px;
    color:#fff;
    width: 234px;
    height: 62px;
    float: right;
    font-size: 24px;
}
.mt-3r{
    margin-top: 3.5rem;
}
.trmb{
    border-bottom: 13px solid #f9feff !important;
    background: #E8F9FE;
    color: #000;
}
td {
  padding-top:20px;
  padding-bottom:20px;
  padding-right:20px;   
  font-weight: 500;
  font-size: 18px;
  line-height: 22px;
}
.sub-tittle{
    font-style: normal;
    font-weight: bold;
    font-size: 34px;
    line-height: 29px;

    color: #121835;
}
.btn-transparent{
   background: #fff0;
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
.control-label{
    position: absolute;
    margin-top: -70px;
}
input:focus + .control-label{
    color: #23B8E3 !important;
    font-weight: 700 !important;
}

select:focus + .control-label{
    color: #23B8E3 !important;
    font-weight: 700 !important;
}
input,select{
    background: #fff0;
    height: 50px;
}
input:focus{
border: 2px solid #23B8E3;
box-sizing: border-box;
border-radius: 10px;

}
select:focus{
border: 2px solid #23B8E3;
box-sizing: border-box;
border-radius: 10px;

}
</style>
