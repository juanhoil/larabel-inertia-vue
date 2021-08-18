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
                    
                    <div class="accordion" id="accordionExample" v-for="item in report" :key="item">
                    
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{item.name}}
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-horizontal" v-for="studens in item.studens" :key="studens">
                                    <li class="list-group-item"> {{studens.full_name}} </li>
                                    <li class="list-group-item"> {{studens.created_at}} </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </side-layout>
</template>

<script>
    import SideLayout from '@/Layouts/SideLayout.vue'
    import LogoLight from '@/Jetstream/LogoLight.vue'
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
</style>
