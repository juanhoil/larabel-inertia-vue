<template>
    <div>
        <Head :title="title" />

        <div class="side-navbar d-flex flex-column " :class="show ? 'active-nav' : 'n' " id="sidebar">
            <div class="px-8">
                <slot name="logo" />
        
                <div class="text-light p37">
                    <span class="h5">HOLA</span> <br>
                    <span class="h2"> <strong>{{ $page.props.user.name }}</strong> </span>
                </div>
            </div>
            
            <div class="mt-3">
                <jet-nav-link class="text-style" :href="route('users.reports')" :active="route().current('users.reports')">
                    <div class="row">
                        <div class="col-4">
                            <svg width="24" height="27" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.3333 2.7H15.76C15.2 1.134 13.7333 0 12 0C10.2667 0 8.8 1.134 8.24 2.7H2.66667C1.2 2.7 0 3.915 0 5.4V24.3C0 25.785 1.2 27 2.66667 27H21.3333C22.8 27 24 25.785 24 24.3V5.4C24 3.915 22.8 2.7 21.3333 2.7ZM12 2.7C12.7333 2.7 13.3333 3.3075 13.3333 4.05C13.3333 4.7925 12.7333 5.4 12 5.4C11.2667 5.4 10.6667 4.7925 10.6667 4.05C10.6667 3.3075 11.2667 2.7 12 2.7ZM9.33333 21.6L4 16.2L5.88 14.2965L9.33333 17.7795L18.12 8.883L20 10.8L9.33333 21.6Z"/>
                            </svg>
                        </div>
                        <div class="col-8 pr-63">
                            Reportes
                        </div>
                    </div>
                </jet-nav-link>
            </div>
             <div class="mt-3" v-if="$page.props.user.rol_id == 1">
                <jet-nav-link class="text-style" :href="route('users.listusers')" :active="route().current('users.listusers')">
                    <div class="row">
                        <div class="col-4">
                            <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 12C13.8141 12 16.5 9.31406 16.5 6C16.5 2.68594 13.8141 0 10.5 0C7.18593 0 4.5 2.68594 4.5 6C4.5 9.31406 7.18593 12 10.5 12ZM14.7 13.5H13.9172C12.8766 13.9781 11.7187 14.25 10.5 14.25C9.28125 14.25 8.12812 13.9781 7.08281 13.5H6.3C2.82187 13.5 0 16.3219 0 19.8V21.75C0 22.9922 1.00781 24 2.25 24H18.75C19.9922 24 21 22.9922 21 21.75V19.8C21 16.3219 18.1781 13.5 14.7 13.5ZM29.8406 7.48125L28.5375 6.16406C28.3219 5.94375 27.9703 5.94375 27.75 6.15937L22.8375 11.0344L20.7047 8.8875C20.4891 8.66719 20.1375 8.66719 19.9172 8.88281L18.6 10.1906C18.3797 10.4062 18.3797 10.7578 18.5953 10.9781L22.425 14.8359C22.6406 15.0562 22.9922 15.0563 23.2125 14.8406L29.8359 8.26875C30.0515 8.04844 30.0562 7.69688 29.8406 7.48125Z"/>
                            </svg>
                        </div>
                        <div class="col-8 pr-63">
                            Usuarios
                        </div>
                    </div>                    
                </jet-nav-link>
            </div>
             <div class="mt-3">
                <jet-nav-link class="text-style" :href="route('users.configuration')" :active="route().current('users.configuration')">
                     <div class="row">
                        <div class="col-4">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.9452 14.2675C22.9954 13.8612 23.0288 13.4388 23.0288 13C23.0288 12.5612 22.9954 12.1388 22.9285 11.7325L25.7533 9.5875C26.004 9.3925 26.0709 9.035 25.9204 8.75875L23.2461 4.2575C23.079 3.965 22.7279 3.8675 22.4271 3.965L19.1009 5.265C18.3988 4.745 17.6634 4.3225 16.8444 3.9975L16.3429 0.5525C16.2928 0.2275 16.0086 0 15.6744 0H10.3257C9.99136 0 9.72392 0.2275 9.67378 0.5525L9.17234 3.9975C8.35332 4.3225 7.60116 4.76125 6.91586 5.265L3.58964 3.965C3.28877 3.85125 2.93776 3.965 2.77062 4.2575L0.0962688 8.75875C-0.070878 9.05125 -0.00401906 9.3925 0.263416 9.5875L3.0882 11.7325C3.02134 12.1388 2.97119 12.5775 2.97119 13C2.97119 13.4225 3.00462 13.8612 3.07148 14.2675L0.246701 16.4125C-0.00401946 16.6075 -0.070878 16.965 0.0795541 17.2412L2.7539 21.7425C2.92105 22.035 3.27206 22.1325 3.57292 22.035L6.89914 20.735C7.60116 21.255 8.33661 21.6775 9.15562 22.0025L9.65707 25.4475C9.72392 25.7725 9.99136 26 10.3257 26H15.6744C16.0086 26 16.2928 25.7725 16.3262 25.4475L16.8277 22.0025C17.6467 21.6775 18.3988 21.2388 19.0841 20.735L22.4104 22.035C22.7112 22.1488 23.0622 22.035 23.2294 21.7425L25.9037 17.2412C26.0709 16.9487 26.004 16.6075 25.7366 16.4125L22.9452 14.2675ZM13 17.875C10.2421 17.875 7.9856 15.6812 7.9856 13C7.9856 10.3188 10.2421 8.125 13 8.125C15.7579 8.125 18.0144 10.3188 18.0144 13C18.0144 15.6812 15.7579 17.875 13 17.875Z" />
                            </svg>
                        </div>
                        <div class="col-8">
                            Configuración
                        </div>
                    </div>
                </jet-nav-link>
            </div>
            <div class="p-">
                <form @submit.prevent="logout">
                    <jet-dropdown-link as="button">
                        Log Out
                    </jet-dropdown-link>
                </form>
            </div>
        </div>
        

        <div class="p-2 my-container" :class="show ? 'active-cont' : ''">
            <!-- Top Nav -->
            <nav class="row mx-1" >
                <div class="col-1">
                    <a class="btn border-0" id="menu-btn" @click="isOpend(show)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </div>
                <div class="col-11">
                    <div class="text-center">
                        <slot name="header"></slot>
                    </div>
                </div>
            </nav>
            <!--End Top Nav -->
        
            <main>
                <slot></slot>
            </main>
        </div>

    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
                show: true,
            
            }
        },

        methods: {

            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },
            isOpend(show){
                if(show){
                    this.show = false;
                }else{
                    this.show = true;
                }
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
<style scoped>
.side-navbar {
  width: 300px;   
  height: 1288px;
  position: fixed;
  margin-left: -300px;
  background-color: #263238;
  transition: 0.5s;
}
.px-8{
    padding: 4.5rem !important;
    padding-bottom: 2.5rem !important;
}
.pr-63{
    padding-right: 63px;
}
.border-indigo-400 svg path{
    fill: #263238 !important;
}
.p37{
    padding-top: 37px;
}

.border-indigo-400{

    width: 355px;
    height: 75px;
    left: 0px;
    top: 273px;
    color:#131935 !important;
    background: #F9FEFF;
    border-radius: 14px;
    padding-top: 0px !important;
    padding-bottom: 0px !important;
}
.border-b-2{
    border-bottom-width : 0px;
}
a {
    color: #0d6efd;
    text-decoration: none;
}
.text-style{
    font-style: normal;
    font-size: 24px;
    line-height: 29px;
    font-weight: bold;
    color: #F9FEFF;
    padding-top: 30px;
    padding-bottom: 30px;
    
}
.text-style svg path{
    fill: #F9FEFF;
    height: 75px;
}
.nav-link:active,
.nav-link:focus,
.nav-link:hover {
  background-color: #ffffff26;
}

.my-container {
  transition: 0.4s;
  background: #F9FEFF !important;
  height: 1000px;
}

.active-nav {
  margin-left: 0;
  width: 354px;
}

/* for main section */
.active-cont {
  margin-left: 334px;
}

#menu-btn {
  background-color: #100901;
  color: #fff;
  
}
</style>

