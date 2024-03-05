<script setup>
import ScheduleSelection from "@/Pages/Components/Admin/Schedule/ScheduleSelection.vue";
import ScheduleTable from "@/Pages/Components/Admin/Schedule/ScheduleTable.vue";
</script>

<template>
    <div class="p-8">
        <div class="flex justify-center items-center">
            <div class="flex flex-col justify-center pt-2 w-5/6">
                <div
                    class="w-1/3 mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md"
                >
                <button
                    @click="openTab = 1"
                    :class="{ 'bg-green-800 text-white': openTab === 1 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300"
                >
                    Student Applicant
                </button>

                    <button
                        @click="openTab = 2"
                        :class="{ 'bg-green-800 text-white': openTab === 2 }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300"
                    >
                        General Student
                    </button>
                </div>

                <div v-if="openTab === 1" class="transition-all duration-300">
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col justify-center w-full">
                            <div
                                class="text-center text-xl text-white mb-4 py-2 p-3 bg-[#186434] rounded-md"
                            >
                                <p class="uppercase font-bold">
                                    Student Applicant
                                </p>
                            </div>

                            <ScheduleSelection appoint_type="firstyear" />

                            <ScheduleTable appoint_type="firstyear"/>
                        </div>
                    </div>
                </div>

                <div v-if="openTab === 2" class="transition-all duration-300">
                    <div class="flex justify-center items-center">
                        <div class="flex flex-col justify-center w-full">
                            <div
                                class="text-center text-xl text-white mb-4 py-2 p-3 bg-[#186434] rounded-md"
                            >
                                <p class="uppercase font-bold">
                                    General Student
                                </p>
                            </div>

                            <ScheduleSelection appoint_type="generic" />

                            <ScheduleTable appoint_type="generic"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ScheduleSelectionImport from './ScheduleSelection.vue';
import ScheduleTableImport from "./ScheduleTable.vue";

export default {
    components: {
        ScheduleSelectionImport,
        ScheduleTableImport
    },
    data() {
        return {
            openTab: 1, // Default to the first tab
        };
    },
};
</script>
