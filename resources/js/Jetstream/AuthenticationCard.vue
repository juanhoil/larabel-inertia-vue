<template>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">
                    <div class="pb-4">
                        <slot name="logo" />
                    </div>
                    <slot />
                </div>
            </div>
            <div class="col-md-6 bg-blue-login">
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                    <slot name="logoBro"/>                
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>-->
</template>
<style scoped>
    .bg-blue-login{
        background: #23B8E3;
    }
</style>