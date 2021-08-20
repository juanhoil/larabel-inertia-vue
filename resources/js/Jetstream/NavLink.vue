<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'd-flex justify-content-center inline-flex items-center border-indigo-400'
                    : 'd-flex justify-content-center inline-flex items-center'
            }
        }
    }
</script>
