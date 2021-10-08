<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{flat.name}}
                </h2>

                <button @click="isTable = !isTable" class="bg-gray-700 rounded text-white py-1 px-4 hover:bg-gray-800 uppercase">
                    {{isTable ? "Document Request" : "Show Request"}}
                </button>
            </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <DocumentRequest v-show="!isTable" />
                    <DocumentsTeable :documentRequsets="documentRequsets" v-show="isTable" />

                </div>
            </div>
        </div>




    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DocumentRequest from '@/Components/Document/DocumentRequest.vue'
    import DocumentsTeable from '@/Components/Document/DocumentsTeable.vue'
    export default ({
        props: ['flat', 'documentRequsets'],
        components: {
            AppLayout,
            DocumentRequest,
            DocumentsTeable
        },

        data () {
            return {
                isTable: true,
            }
        },



        methods:{

        }
    })
</script>
