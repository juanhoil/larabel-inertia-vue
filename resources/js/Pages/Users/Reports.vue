<template>
    <side-layout title="Dashboard">
        
        <template #logo>
            <logo-light />
        </template>   

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-header">
                Reports
            </h2>
        </template>





        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">  
                    <div class="row MB-3">
                        <div class="col-4">
                            <small> PROGRAM </small>
                        </div>
                        <div class="col-4">
                            <small> TOTAL ENROLLED </small>
                        </div>
                            <div class="col-4 text-center">
                            <small> DETAIL </small>
                        </div>
                    </div>
                    <vue-collapsible-panel-group class="px-2" v-for="item in report" :key="item">
                        <vue-collapsible-panel class="row">
                            <template #title class="border border-info border-top-0 border-end-0 border-start-0 bg-light">
                                <div class="col-4">
                                        <strong> <h4> {{item.name}} </h4></strong>
                                    </div>
                                    <div class="col-4">
                                        <strong> <h4> {{item.studens.length + 1}} </h4></strong>
                                    </div>
                            </template>
                            <template #content>
                                <div class="container row">
                                        <div class="col-6">
                                            Studen
                                        </div>
                                        <div class="col-6 text-end">
                                            enrollment date
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
                report : this.studentsInPrograms,
            }
        },
        methods:{
            
        }
    }
</script>
<style scoped>

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
