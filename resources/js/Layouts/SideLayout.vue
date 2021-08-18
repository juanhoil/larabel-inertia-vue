<template>
    <div>
        <Head :title="title" />

        <div class="side-navbar d-flex flex-column " :class="show ? 'active-nav' : 'n' " id="sidebar">
            <div class="p-4">
                <slot name="logo" />
        
                <div class="mt-4 text-light">
                    <span class="h5">Hello</span> <br>
                    <span class="h2"> <strong>{{ $page.props.user.name }}</strong> </span>
                </div>
            </div>
            <div class="p-4" v-if="$page.props.user.rol_id == 1">
                <jet-nav-link class="text-style" :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </jet-nav-link>
            </div>
            <div class="p-4">
                <jet-nav-link class="text-style" :href="route('users.reports')" :active="route().current('users.reports')">
                    reports
                </jet-nav-link>
            </div>
             <div class="p-4" v-if="$page.props.user.rol_id == 1">
                <jet-nav-link class="text-style" :href="route('users.listusers')" :active="route().current('users.listusers')">
                    Users
                </jet-nav-link>
            </div>
             <div class="p-4">
                <jet-nav-link class="text-style" :href="route('users.configuration')" :active="route().current('users.configuration')">
                    configuration
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
  width: 270px;
  height: 100%;
  position: fixed;
  margin-left: -300px;
  background-color: #100901;
  transition: 0.5s;
}

.border-indigo-400{
    width: 100%;
    background: #F9FEFF;
    border-radius: 14px;
    color: #000 !important;
    height: 60px;
    left: 0px;
    top: 446px;
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
font-weight: 500;
font-size: 24px;
line-height: 29px;

color: #F9FEFF;
}

.nav-link:active,
.nav-link:focus,
.nav-link:hover {
  background-color: #ffffff26;
}

.my-container {
  transition: 0.4s;
}

.active-nav {
  margin-left: 0;
}

/* for main section */
.active-cont {
  margin-left: 250px;
}

#menu-btn {
  background-color: #100901;
  color: #fff;
  
}
</style>

