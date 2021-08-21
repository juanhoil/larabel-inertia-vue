<template>
    <side-layout title="Dashboard">
        
        <template #logo>
            <logo-light />
        </template>   

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-header">
                Configuración
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <form class="col-sm-7" @submit.prevent="submit">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-3r controls">
                                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                        <jet-label for="name" value="Nombre" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mt-3r controls">
                                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                                        <jet-label for="email" value="Correo" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mt-3r controls">
                                        <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                        <jet-label for="password" value="Contraseña" class="control-label"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mt-3r controls">
                                        <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                                        <jet-label for="password_confirmation" value="Confirmar contraseña" class="control-label"/>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="">
                                            <jet-button class="btn btn-rorder" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Cancelar
                                            </jet-button>
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
    import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
    import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetButton from '@/Jetstream/Button.vue'



    export default {
         props: ['sessions'],
        components: {
            SideLayout,
            LogoLight,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
            JetLabel,
            JetInput,
            JetButton,
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
                
            }
        },
        methods:{
            submit() {
                
                axios.get(route('update'), {
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
               
            }
        }
    }
</script>
<style scoped>
.btn-roderprimary{
    background: #23B8E3;
    border-radius: 10px;
    color:#fff;
    width: 234px;
    height: 62px;
    float: right;
    font-size: 24px;
}
.btn-rorder{
     width: 234px;
    height: 62px;
    color: #23B8E3;
    font-size: 24px;

}
.mt-3r{
    margin-top: 3.5rem;
}
.text-header{
    font-weight: bold;
    font-size: 48px;
    line-height: 59px;
    text-align: center;
    color: #121835;
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
    background: #fff;
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
