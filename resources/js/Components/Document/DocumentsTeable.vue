<template>
<div class="overflow-x-auto w-full">
    <div class="border-b border-gray-200 shadow">
            <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
                <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">Title</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Description</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="(doc, index) in documentRequsets" :key="index" >
                    <td class="px-6 py-4">{{doc.title}}</td>
                    <td class="px-6 py-4">{{doc.description}}</td>
                    <td class="px-6 py-4">{{doc.status === 1? "Active" : "Cancel"}}</td>
                    </tr>

                </tbody>
            </table>
    </div>
</div>
</template>

<script>
export default {

    props:['documentRequsets']
}
</script>

<style>

</style>
