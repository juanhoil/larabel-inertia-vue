<template>
    <side-layout title="Dashboard">
        
        <template #logo>
            <logo-light />
        </template>   

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-header">
                Reportes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">  
                    <div class="container px-0 row mb-3 text-sty text-center">
                        <div class="col-4">
                            <p> programa </p>
                        </div>
                        <div class="col-4">
                            <p> total de inscritos </p>
                        </div>
                            <div class="col-4 text-center">
                            <p> detalle </p>
                        </div>
                    </div>
                    <vue-collapsible-panel-group 
                     class="px-2" :style="style_collapsible" v-for="item in report" :key="item">
                        <vue-collapsible-panel class="px-2 bg-transparent " :expanded="item.id == 1 ? true:false">
                            <template #title>
                                <div class="col-4">
                                    <strong> <h4> {{item.name}} </h4></strong>
                                </div>
                                <div class="col-4 text-center">
                                    <strong> <h4> {{item.studens.length + 1}} </h4></strong>
                                </div>
                            </template>
                            <template #content class="bbc">
                                <div class="container row text-sty px-0">
                                        <div class="col-4 text-center pb-4">
                                            Alumno
                                        </div>
                                         <div class="col-4">
                                            
                                        </div>
                                        <div class="col-4 text-end">
                                            Fecha de inscripción
                                        </div>
                                    </div>
                                    <div class="alert alert-primary row" v-for="studens in item.studens" :key="studens" role="alert">
                                        <div class="col-6"> {{studens.full_name}} </div>
                                        <div class="col-6 text-end"> {{studens.created_at}} </div>
                                    </div>
                            </template>
                        </vue-collapsible-panel>
                    </vue-collapsible-panel-group>
                </div>
            </div>
        </div>
    </side-layout>
</template>

<script>
    import SideLayout from '@/Layouts/SideLayout.vue'
    import LogoLight from '@/Jetstream/LogoLight.vue'
    import {VueCollapsiblePanelGroup,VueCollapsiblePanel} from '@dafcoe/vue-collapsible-panel'

    export default {
        props: {
           studentsInPrograms:{
                type:Array,
                //required:true,
                default: ""
            },
        },
        components: {
            SideLayout,
            LogoLight,
            VueCollapsiblePanel,
            VueCollapsiblePanelGroup

        },
        data() {
            return {
                style_collapsible:{
                    '--base-color': '#fff0 !important',
                    '--border-color': '#fff0 !important',
                    '--bg-color-header': '#fff0 !important',
                    '--bg-color-header-hover': '#fff0 !important',
                    '--bg-color-header-active': '#fff0 !important',
                    '--bg-color-body': '#fff0 !important',
                },
                
                report : this.studentsInPrograms,
            }
        },
        methods:{
            
        }
    }
</script>
<style scoped>
.bg-transparent{
 background:  #ffffff00;
}
.alert{
    background: #E8F9FE !important;
    border-radius: 10px !important;
    color: #000000 !important;
}
.text-sty{
    font-family: Montserrat;
font-style: normal;
font-weight: 500;
font-size: 12px;
line-height: 15px;
/* identical to box height */

text-transform: uppercase;

color: #828282;
}
.text-header{
    font-weight: bold;
    font-size: 48px;
    line-height: 59px;
    text-align: center;
    color: #121835;
}
.accordion-button{
    color: #121835 !important;
    background: #e2e2e2;
}

</style>
