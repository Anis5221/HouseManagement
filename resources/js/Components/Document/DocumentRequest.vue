<template>
<jet-form-section @submitted="submitRequest">
            <template #title>
                Request for Document
            </template>

            <template #description>

            </template>

            <template #form>
                <!-- Token Name -->
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="title" value="Title" />
                    <jet-input id="title" type="text" class="mt-1 block w-full" v-model="documentRequest.title" autofocus />
                    <jet-input-error :message="documentRequest.errors.title" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="description" value="Description" />
                    <textarea id="description" class="mt-1 block w-full resize border rounded-md" v-model="documentRequest.description" autofocus ></textarea>
                    <jet-input-error :message="documentRequest.errors.description" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="status" value="Status" />
                        <select v-model="documentRequest.status" class="mt-1 block w-full" id="">
                            <option selected="selected" >Select A Status</option>
                            <option value="0">Cancel</option>
                            <option value="1">Active</option>
                        </select>
                    <jet-input-error :message="documentRequest.errors.status" class="mt-2" />
                </div>


            </template>

            <template #actions>
                <jet-action-message :on="documentRequest.recentlySuccessful" class="mr-3">
                    Created.
                </jet-action-message>

                <jet-button type="submit" :class="{ 'opacity-25': documentRequest.processing }" :disabled="documentRequest.processing">
                    Create
                </jet-button>
            </template>
        </jet-form-section>

</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    export default {
        components: {
            JetActionMessage,
            JetActionSection,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        data () {
            return {
                documentRequest: this.$inertia.form({
                        title: '',
                        description: '',
                        status: 'Select A Status',
                    }),
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
            }
        }
    }
</script>

<style>

</style>
