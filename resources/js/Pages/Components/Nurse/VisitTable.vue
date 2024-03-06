<script setup>
import Dropdown from 'primevue/dropdown';
import Button from '@/Components/Button.vue'
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import {
    ConsultationIcon,
} from "@/Components/Icons/outline";

import { ref } from "vue";

const selectedStatus = ref();
const status = ref([
    { name: 'Incoming', code: 'Incoming' },
    { name: 'Consulted', code: 'Consulted' },
    // { name: 'Visited', code: 'Visited' },
    // { name: 'Missed', code: 'Missed' },

]);
</script>

<template>
    <div class="flex justify-center items-center">
    <div class="flex flex-col justify-center pt-24 w-5/6 px-16">
        <div class="text-center text-xl text-white mb-4 py-2 p-3 bg-[#186434] rounded-md">
            <p class="uppercase font-bold" id="visitorMessage">Incoming Visitor for TODAY <i>({{ formattedDate }})</i></p> 
        </div>
       
        
            <!-- Start Nurse Consultation List -->
            <IconField iconPosition="left">
                <InputIcon class="pi pi-search"> </InputIcon>
                <InputText v-model="searchTerm" placeholder="Search the name or control number of student applicant..." @input="search" class="w-full"/>
            </IconField>

            <div class="card flex justify-content-center mt-5">
                    <Dropdown v-model="selectedStatus" :options="status" optionLabel="name" placeholder="Select a Status" class="w-full md:w-14rem" @change="fetchVisitor" />
            </div>
            <div class="flex justify-center items-center mt-10">
                

                <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md text-center">
                    <thead>
                        <tr class="bg-[#1B651B] text-white text-center">
                            <th class="py-3 px-8 border-b border-gray-200">Control Number</th>
                            <th class="py-3 px-8 border-b border-gray-200">Visitor Name</th>
                            <th class="py-3 px-8 border-b border-gray-200">Time of Visit</th>
                            <th class="py-3 px-8 border-b border-gray-200">Purpose</th>
                            <th class="py-3 px-8 border-b border-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="visitorList && visitorList.length > 0">
                        <tr v-for="(visitor, index) in visitorList" :key="index" v-if="isToday(visitor.dateVisit)">
                            <td class="py-2 px-8 border-b border-gray-200"> {{ visitor.appointment_record }}</td>
                            <td class="py-2 px-8 border-b border-gray-200"> {{ visitor.nameVisitor }}</td>
                            <td class="py-2 px-8 border-b border-gray-200"> {{ visitor.timeVisit }}</td>
                            <td class="py-2 px-8 border-b border-gray-200"> {{ visitor.purposeVisit }}</td>
                            <td class="py-2 px-8 border-b border-gray-200">
                                Action 
                                <Button v-if="visitor.statusVisit === '0'" @click="redirectToConsultation(visitor.visitor_id)"><ConsultationIcon /> Consult </Button>
                                <span v-else-if="visitor.statusVisit === '2'">Consulted</span>
                                <span v-else-if="visitor.statusVisit === '1'">Done</span>
                                <span v-else-if="visitor.statusVisit === '3'">Missed</span>
                            </td>
                        </tr>
                    </tbody>

                    <tbody v-else>
                        <tr>
                            <td colspan="5" class="text-center text-lg p-5">No incoming visitors yet</td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <TailwindPagination
            :data="visitorList"
            @pagination-change-page="fetchVisitor"
        />
</template>




<script>
    import axios from 'axios';
    import { TailwindPagination } from 'laravel-vue-pagination';
    import Swal from 'sweetalert2';
    export default {
        props: {
            // individual_type: {
            //     type: String,
            //     required: true
            // }
        },
        components: {
            // ToastNotification,
            TailwindPagination
        },
        data() {
            return {
                searchTerm: '', 
                showToast: false,
                toastMessage: '',
                success: false,
                visitorList: {}, 
                formattedDate: ''
            };
        },
        mounted() {
            this.fetchVisitor();

            const currentDate = new Date();
            const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const month = monthNames[currentDate.getMonth()];
            const day = currentDate.getDate();
            this.formattedDate = `${month} ${day}`;

        },
        methods: {
            fetchVisitor(page = 1) {
                const params = {
                    page: page,
                    search: this.searchTerm,
                    status: this.selectedStatus ? this.selectedStatus.code : null
                };

                axios.get('/api/visitor/today', { params })
                    .then(response => {
                        this.visitorList = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching appointment data:', error);
                    });
            },
            search() {
                this.fetchVisitor();
            },
            isToday(date) {
                const today = new Date().toISOString().split('T')[0]; 
                return date === today; 
            },
            redirectToConsultation(patient_id) {
                const profileUrl = `/patient/consultation/${patient_id}`;
                window.location.href = profileUrl;
            }

        },
        
    }
</script>
                <!-- if statusVisit === '2' nagconsult na / visit-->
<!--  DONE NA REQUIREMENTS NG PATIENT  statusVisit === '1' -->
<!--  HINDI NAKASIPOT SA SCHEDULE  3 ata to-->