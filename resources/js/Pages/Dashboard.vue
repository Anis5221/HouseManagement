<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Houses
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid grid-cols-6 gap-3">

                            <Link v-for="(flute, index) in flutes" :key="index" :href="route('flute.show', flute.id)" @click="showFlute(flute.id)" class=" cursor-pointer items-center text-white bg-gray-600 h-32 rounded shadow-lg">
                                    <h1>Name: {{flute.name}}</h1>
                                    <h1>Price: {{flute.price}}</h1>
                            </Link>

                    </div>
                </div>
            </div>
        </div>
            <div class="w-full flex justify-center items-center">
                        <button @click="isModal = true" class="px-4 text-white uppercase bg-gray-600 hover:bg-gray-700 rounded-full">
                            Add Flute
                        </button>
            </div>

            <!-- API Token Permissions Modal -->
        <jet-dialog-modal :show="isModal" @close="isModal = null">
            <template #title>
                Add new Flute
            </template>

            <template #content>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="name" value="Name" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="fluteForm.name" autofocus />
                    <jet-input-error :message="fluteForm.errors.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="room" value="Room" />
                    <jet-input id="room" type="number" class="mt-1 block w-full" v-model="fluteForm.room" autofocus />
                    <jet-input-error :message="fluteForm.errors.room" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="tenent" value="Tenent" />
                    <jet-input id="tenent" type="number" class="mt-1 block w-full" v-model="fluteForm.tenent" autofocus />
                    <jet-input-error :message="fluteForm.errors.tenent" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="price" value="Price" />
                    <jet-input id="price" type="number" class="mt-1 block w-full" v-model="fluteForm.price" autofocus />
                    <jet-input-error :message="fluteForm.errors.price" class="mt-2" />
                </div>

            </template>

            <template #footer>
                <jet-secondary-button class="cursor-pointer" @click="isModal = null">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2 cursor-pointer rounded px-3 bg-gray-700" @click="saveFlute" >
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import { Link } from '@inertiajs/inertia-vue3';
    export default defineComponent({
        props: ['flutes'],
        components: {
            AppLayout,
            JetDialogModal,
            JetFormSection,
            JetInput,
            JetLabel,
            JetInputError,
            Link,
            JetButton,
            JetSecondaryButton
        },

        data () {
            return {
                isModal: null,
                fluteForm: this.$inertia.form({
                        name: '',
                        room: '',
                        tenent: '',
                        price: ''
                    }),
            }
        },

        created () {

        },

        methods:{
            saveFlute () {
                this.fluteForm.post(route('flute-create'), {
                    preserveScroll: true,
                    onSuccess: (res) => {
                        console.log(res);
                        this.fluteForm.reset()
                    }
                })
                this.isModal = null;
            },

            showFlute (id) {
                console.log(id);
            }

        }
    })
</script>
