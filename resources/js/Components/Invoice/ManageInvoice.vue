<template>
<div class="overflow-x-auto w-full">
    <div class="border-b border-gray-200 shadow">
            <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
                <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Name</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">QTY</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Service Charge</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Total Amount</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="(invoice, index) in invoies" :key="index" >
                    <td class="px-6 py-4 text-center">{{invoice.name}}</td>
                    <td class="px-6 py-4 text-center">{{invoice.qty}}</td>
                    <td class="px-6 py-4 text-center">{{invoice.service_charge}}</td>
                    <td class="px-6 py-4 text-center">{{invoice.total_price}}</td>
                    <td class="px-6 py-4 text-center">
                        <button @click="editInvoice(invoice)" class="bg-blue-800 mr-2 uppercase text-white px-1 rounded-md">
                            edit
                        </button>
                        <button @click="deleteInvoice(index, invoice.id)" class="bg-red-800 uppercase text-white px-1 rounded-md">
                            delete
                        </button>
                    </td>
                    </tr>

                </tbody>
            </table>
    </div>
</div>

       <!-- API Token Permissions Modal -->
        <jet-dialog-modal :show="isModal" @close="isModal = null">
            <template #title>
                Add new Flute
            </template>

            <template #content>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="name" value="Name" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="invoiesForm.name" autofocus />

                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="room" value="Quntity" />
                    <jet-input id="room" type="number" class="mt-1 block w-full" v-model="invoiesForm.qty" autofocus />

                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="tenent" value="Service Charge" />
                    <jet-input id="tenent" type="number" class="mt-1 block w-full" v-model="invoiesForm.service_charge" autofocus />

                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="price" value="Total Amount" />
                    <jet-input id="price" type="number" class="mt-1 block w-full" v-model="invoiesForm.total_price" autofocus />

                </div>

            </template>

            <template #footer>
                <jet-secondary-button class="cursor-pointer" @click="isModal = null">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2 cursor-pointer rounded px-3 bg-gray-700" @click="updateInvoice" >
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>
</template>

<script>
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
export default {

    props:['invoies'],

    components: {
            JetDialogModal,
            JetInput,
            JetLabel,
            JetButton,
            JetSecondaryButton
    },

    data () {
        return {
            isModal: null,
            invoiesForm: this.$inertia.form({
                id: '',
                name: '',
                qty: '',
                service_charge: '',
                total_price: ''
            })
        }
    },

    methods: {
        editInvoice (invoice) {
            this.invoiesForm.id = invoice.id;
            this.invoiesForm.name = invoice.name;
            this.invoiesForm.qty = invoice.qty;
            this.invoiesForm.service_charge = invoice.service_charge;
            this.invoiesForm.total_price = invoice.total_price;
            this.isModal = true;
        },
        deleteInvoice (index, invoiceId) {
            this.invoies.splice(index, 1);
            if (confirm('Are you sure you want to delete this contact?')) {
            this.$inertia.delete(`/invoice/delete/${invoiceId}`);
        }
        },

        updateInvoice () {
                this.invoiesForm.post(route('flute-create'), {
                    preserveScroll: true,
                    onSuccess: (res) => {
                        console.log(res);
                        this.fluteForm.reset()
                    }
                })
                this.isModal = null;
        }
    }
}
</script>

<style>

</style>
