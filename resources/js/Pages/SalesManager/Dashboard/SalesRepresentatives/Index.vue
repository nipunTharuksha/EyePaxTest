<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
/*import Pagination from '@/Components/Pagination.vue'*/
import {Inertia} from "@inertiajs/inertia";
/*import ShowModal from './modal/ShowModal.vue'*/
import {ref} from "vue";

const props = defineProps({
    salesRepresentatives: Object,
});

const show = ref(false)
const salesRepresentativeToBePreview = ref({})

const deleteThisRepresentative = (reperesentativeId) => {
    var result = confirm("Do you really want to delete this sales representative ?");
    if (result) {
        Inertia.delete(route('sales-representatives.destroy', reperesentativeId))
    }
}
</script>

<template>
    <Head title="Dashboard"/>
<!--    <ShowModal v-if="show" @close="show=false" :salesRepresentative="salesRepresentativeToBePreview"/>-->
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-[90vw] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-end pb-2">
                            <InertiaLink :href="route('sales-representatives.create')"
                                         class="text-teal-700 hover:text-white border border-teal-500 hover:bg-teal-500
                                                focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg
                                                text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-teal-500
                                                dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600
                                                dark:focus:ring-teal-800"
                            >
                                Add New Sales Representative
                            </InertiaLink>
                        </div>

                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Telephone
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Joined date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Current route
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Comment
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" :key="index"
                                    v-for="(salesRepresentative,index) in salesRepresentatives.data">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ salesRepresentative.id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ salesRepresentative.full_name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ salesRepresentative.email }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ salesRepresentative.telephone }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ salesRepresentative.joined_date }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ salesRepresentative?.current_working_route?.name }}
                                    </td>
                                    <td class="py-4 px-6 overflow-hidden">
                                        {{ salesRepresentative.comment.substring(0, 100) ?? ' N/A' }}
                                    </td>

                                    <td class="py-4 px-6">
                                        <button
                                            @click="salesRepresentativeToBePreview = salesRepresentative,show=true"
                                            class="px-2 font-medium text-yellow-600 dark:text-blue-500 hover:underline">
                                            View
                                        </button>
                                        <InertiaLink :href="route('sales-representatives.edit',salesRepresentative.id)"
                                                     class="px-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit
                                        </InertiaLink>
                                        <button type="submit"
                                                @click="deleteThisRepresentative(salesRepresentative.id)"
                                                class="px-2 font-medium text-red-600 dark:text-blue-500 hover:underline">
                                            Delete
                                        </button>

                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
<!--                        <pagination class="mt-6" :links="salesRepresentatives.links"/>-->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
