<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import PatientTable from "@/Pages/Components/Common/PatientTable.vue";

</script>

<template>
    <AuthenticatedLayout title="Dashboard">

        <div  class="p-8">
    <div class="flex justify-center items-center pl-14">
        <div class="flex flex-col justify-center pt-4 w-5/6">
            <div class="w-2/3 mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                <button
                    @click="switchTab(1)"
                    :class="{ 'bg-green-800 text-white': openTab === 1 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300"
                >
                    Student Applicant
                </button>
                <button
                    @click="switchTab(2)"
                    :class="{ 'bg-green-800 text-white': openTab === 2 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300"
                >
                Enrolled Student
                </button>
                <button
                    @click="switchTab(3)"
                    :class="{ 'bg-green-800 text-white': openTab === 3 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300"
                >
                Employee
                </button>

            </div>

            <div v-if="openTab === 1"  class="transition-all duration-300">              
                <PatientTable patient_type="student"/>
            </div>

            <div v-if="openTab === 2"  class="transition-all duration-300">   
                <PatientTable patient_type="employee"/>
            </div>  

            <div v-if="openTab === 3"  class="transition-all duration-300">   
                <PatientTable patient_type="outpatient"/>
            </div>  


        </div>
    </div>
</div>

    </AuthenticatedLayout>
</template>

<script>
import PatientTableImport from "@/Pages/Components/Common/PatientTable.vue";


export default {

    components: {
        PatientTableImport,
    },
    data() {
        return {
            openTab: 0,
        };
    },
    mounted() {
        const currentPath = window.location.pathname;

        if (currentPath.includes('student')) {
            this.openTab = 1;
        } else if (currentPath.includes('employee')) {
            this.openTab = 2;
        } else if (currentPath.includes('outpatient')) {
            this.openTab = 3;
        }
    },
    methods: {
        switchTab(tabNumber) {
            this.openTab = tabNumber;
            // Update URL based on tab
            let newPath = '/patient/';
            if (tabNumber === 1) {
                newPath += 'student';
            } else if (tabNumber === 2) {
                newPath += 'employee';
            } else if (tabNumber === 3) {
                newPath += 'outpatient';
            }
            history.pushState(null, null, newPath);
        },
    },
};
</script>