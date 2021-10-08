<template>
<div class="overflow-x-auto w-full">
    <div class="border-b border-gray-200 shadow">
            <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg  divide-y divide-gray-300 overflow-hidden">
                <thead class="">
                    <tr class="text-gray-800 text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4 w-1/2 text-center">Name</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 w-1/6 text-center">QTY</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4  w-1/6 text-center">Service Charges</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 w-1/6 text-center">Unit Price</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 w-1/6 text-center">
                            <button @click="addInvoiceItem" class=" py-2 px-3 border-2 font-bold border-gray-400 rounded-md">+</button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                        <tr v-for="(item, index) in items" :key="index">
                                <td class="px-6 py-4">
                                    <jet-input id="title" type="text"  v-model="item.name" class="mt-1 block w-full"  autofocus />
                                </td>
                                <td class="px-6 py-4">
                                    <jet-input id="title" type="text" v-model="item.qty" class="mt-1 block w-full"  autofocus />
                                </td>
                                <td class="px-6 py-4">
                                    <jet-input id="title" type="text"  v-model="item.service_charge" class="mt-1 block w-full"  autofocus />
                                </td>
                                <td class="px-6 py-4">
                                    <jet-input id="title" type="text"  v-model="item.unit_price" class="mt-1 block w-full"  autofocus />
                                </td>
                                <td class="px-6 py-4">
                                    <button @click="deleteItem(index)" class=" py-2 px-3 border-2 font-bold border-gray-400 rounded-md">+</button>
                                </td>
                            </tr>
                </tbody>
            </table>



            <div class="w-full py-4 mb-2 flex justify-center items-center">
                <button @click="save" class="py-1 px-3 bg-gray-700 text-white hover:bg-gray-600 uppercase rounded-md"  >Save</button>
            </div>
    </div>
</div>
</template>

<script>
    import JetInput from '@/Jetstream/Input.vue'

    export default {
        props: ['flatId'],
        components: {
            JetInput,

        },

        data () {
            return {
                items: [{
                    flat_id: this.flatId,
                    name: '',
                    qty: '1',
                    service_charge: '500',
                    unit_price: '10000.00'
                },

                ],

            }
        },

        methods: {
            submitRequest () {
                this.documentRequest.post(route('document.store'), {
                    preserveScroll: true,
                    onSuccess: () => {

                        this.documentRequest.reset()
                    }
                })
            },

            addInvoiceItem () {
                this.items.push({
                    flat_id: this.flatId,
                    name: '',
                    qty: '1',
                    service_charge: '500',
                    unit_price: '10000.00'
                })
            },

            deleteItem (id) {
                this.items.splice(id, 1);
            },

            save () {
                this.$inertia.post(`/invoice/store`, this.items);
            }
        }
    }
</script>

<style>

</style>
