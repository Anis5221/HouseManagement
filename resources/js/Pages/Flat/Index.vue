<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{flat.name}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        <div class="flex justify-between">
                            <Link :href="route('invoice.index', flat.id)" class=" text-white px-4 bg-blue-700 py-1 rounded-full">Invoice</Link>
                            <Link :href="route('document.index', flat.id)" class="px-4 bg-gray-700 py-1 rounded-full text-white">Document</Link>
                        </div>

                </div>
            </div>
        </div>


    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3';
    export default ({
        props: ['flat'],
        components: {
            AppLayout,
            Link
        },

        data () {
            return {

            }
        },



        methods:{

        }
    })
</script>
