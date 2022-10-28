<script setup>
import moment from "moment";

defineEmits(["close"]);
defineProps({
    salesRepresentative: {type: Object, required: true}
})
</script>
<template>
    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
         class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 w-full md:inset-0 h-modal md:h-full bg-gray-600 bg-opacity-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ salesRepresentative.full_name }}
                    </h3>
                    <button type="button"
                            @click="$emit('close')"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-2">
                    <div class="grid grid-cols-2 ">
                        <div class="border-b-2 ">ID :</div>
                        <div class="border-l-2 border-b-2 pl-4">{{ salesRepresentative.id }}</div>
                    </div>
                    <div class="grid grid-cols-2  ">
                        <div class="border-b-2 ">FUll Name :</div>
                        <div class="border-l-2 border-b-2 pl-4">{{ salesRepresentative.full_name }}</div>
                    </div>
                    <div class="grid grid-cols-2  ">
                        <div class="border-b-2 ">Email Address :</div>
                        <div class="border-l-2  border-b-2 pl-4">{{ salesRepresentative.email }}</div>
                    </div>
                    <div class="grid grid-cols-2  ">
                        <div class="border-b-2 ">Telephone :</div>
                        <div class="border-l-2 border-b-2 pl-4">{{ salesRepresentative.telephone }}</div>
                    </div>
                    <div class="grid grid-cols-2  ">
                        <div class="border-b-2 ">Joined Date :</div>
                        <div class="border-l-2 border-b-2 pl-4">
                            {{ moment(salesRepresentative.joined_date).format('DD MMM YYYY') }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2  ">
                        <div class="border-b-2 ">Current Routes :</div>
                        <div class="border-l-2 border-b-2 pl-4">{{ salesRepresentative.current_working_route.name }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2  ">
                        <div>Comment :</div>
                        <div class="border-l-2 pl-4">{{ salesRepresentative.comment ?? 'N/A' }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

