<template>
    <app-layout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{flat.name}}
                </h2>

                <button @click="isTable = !isTable" class="bg-gray-700 rounded text-white py-1 px-4 hover:bg-gray-800 uppercase">
                    {{isTable ? "Show Invoices" : "Invoice"}}
                </button>
            </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <AddInvoice :flatId="flat.id" v-show="isTable" />
                    <ManageInvoice :invoies="invoies" v-if="!isTable" />

                </div>
            </div>
        </div>




    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import AddInvoice from '@/Components/Invoice/AddInvoice.vue'
    import ManageInvoice from '@/Components/Invoice/ManageInvoice.vue'
    export default ({
        props: ['flat', 'invoies'],
        components: {
            AppLayout,
            AddInvoice,
            ManageInvoice
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
