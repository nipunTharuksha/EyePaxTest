<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import {ErrorMessage, Field, Form} from "vee-validate";
import moment from "moment";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

const dateError = ref(null);


const today = moment().format('YYYY-MM-DD');
const props = defineProps({
    currentRoutes: {type: Array, default: () => []},
    salesRepresentativeToBeEdited: {
        type: Object, default: () => {
        }
    }
})
const joinedDate = ref(props.salesRepresentativeToBeEdited.joined_date);
const submit = (values) => {
    //Validate date
    if (moment().isSameOrBefore(joinedDate.value)) {
        dateError.value = "Please select a correct date"
        return
    }
    values = {...values, joined_date: joinedDate.value}

    Inertia.put(route('sales-representatives.update', props.salesRepresentativeToBeEdited.id), values)
}
</script>

<template>
    <Head title="Edit Sales Representative"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit a sales representative
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-[90vw] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="overflow-x-auto relative  sm:rounded-lg">


                            <Form class="p-4" @submit="submit" :initialValues="salesRepresentativeToBeEdited">
                                <div class=" mb-2">
                                    <label for="id"
                                           class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        ID</label>
                                    <Field name="id" id="id" disabled
                                           class="border  text-gray-900 text-sm rounded-lg  !outline-none  block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder=" " required=""/>


                                </div>
                                <div class=" mb-2">
                                    <label for="full_name"
                                           class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Full Name</label>
                                    <Field name="full_name" id="full_name"
                                           :rules="{ required: true }"
                                           label="full name"
                                           class="border  text-gray-900 text-sm rounded-lg  !outline-none  block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Enter sales representative full name here "/>

                                    <ErrorMessage class="text-red-500" name="full_name"/>
                                </div>
                                <div class="relative z-0 mb-2 w-full group">
                                    <label for="email"
                                           class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Email</label>
                                    <Field name="email" id="email"
                                           :rules="{ required: true,email:true }"
                                           placeholder="Enter sales representative email here "
                                           class="border  text-gray-900 text-sm rounded-lg  !outline-none  block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                           />

                                    <ErrorMessage class="text-red-500" name="email"/>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class=" mb-2 ">
                                        <label for="telephone"
                                               class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Telephone</label>
                                        <Field pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="telephone"
                                               id="telephone"
                                               :rules="{ required: true }"
                                               class="border  text-gray-900 text-sm rounded-lg  !outline-none  block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="Enter sales representative telephone here "/>

                                        <ErrorMessage class="text-red-500" name="telephone"/>
                                    </div>
                                    <div class="mb-2">
                                        <label for="joined_date"
                                               class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Joined Date</label>
                                        <input @focus="dateError = null" v-model="joinedDate" :max="today" type="date"
                                               name="joined_date"
                                               id="joined_date"
                                               class="border-gray-200  text-gray-900 text-sm rounded-lg  !outline-none  block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500"
                                               placeholder="Enter sales representative telephone here "/>
                                        <span class="text-red-500" v-if="dateError">{{ dateError }}</span>

                                    </div>
                                </div>
                                <div class="relative z-0 mb-2 w-full group">
                                    <label for="current_working_route_id"
                                           class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Current Working Route</label>
                                    <Field
                                        id="current_working_route_id"
                                        :rules="{ required: true }"
                                        placeholder="Select a route"
                                        label="current working route"
                                        as="select"
                                        name="current_working_route_id"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                                        <option value="" disabled selected>
                                            Choose a route
                                        </option>

                                        <option
                                            class="capitalize"
                                            v-for="(route, index) in currentRoutes"
                                            :key="index"
                                            :value="route.id"
                                        >
                                            {{ route.name }}
                                        </option>
                                    </Field>

                                    <ErrorMessage class="text-red-500" name="current_working_route_id"/>
                                </div>

                                <div class="relative z-0 mb-2 w-full group">
                                    <label
                                        for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Comments
                                    </label
                                    >
                                    <Field
                                        rows="8"
                                        as="textarea"
                                        name="comment"
                                        placeholder="Enter comment here"
                                        class="form-control block w-full px-3 py-1.5 mb-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    />
                                    <ErrorMessage class="text-red-500" name="comment"/>
                                </div>
                                <div class="flex pt-3 justify-between">

                                    <InertiaLink :href="route('sales-representatives.index')"
                                                 class="text-blue-700 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        Back to list
                                    </InertiaLink>
                                    <button type="submit"
                                            class="text-teal-900 hover:text-white border border-teal-50 bg-teal-200  hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-teal-500 dark:text-teal-500 dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-teal-800">
                                        Submit
                                    </button>
                                </div>

                            </Form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
