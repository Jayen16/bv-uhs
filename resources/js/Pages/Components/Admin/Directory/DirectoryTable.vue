<script setup>
import Toolbar from 'primevue/toolbar';
import InputText from 'primevue/inputtext';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import Button from '@/Components/Button.vue'

import { ref } from 'vue';

const value1 = ref(null);
const value2 = ref(null);

</script>

<template>
    <div class="flex">
        <div class="flex flex-col items-center mt-10">
            <!-- Start 1st yr Student List -->
            <div class="w-full items-center items-center justify-center">
                <div
                    class="text-center text-xl text-white w-auto py-2 p-3 bg-[#186434] rounded-md"
                >
                    <p class="uppercase font-bold">
                        <span v-if="individual_type ==='student_applicant'" >Student Applicant <span class="normal-case font-normal italic" >(incoming student)</span></span> 
                        <span v-else-if="individual_type ==='general_student'" >General Student </span> 
                        <span v-else-if="individual_type ==='general_employee'" >General Employee </span> 

                        
                    </p>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="flex justify-between">
                        <div class="flex justify-start mt-2 ml-5 gap-3">
                            <button
                                type="button"
                                class="flex w-full items-center justify-center bg-yellow-500 hover:bg-yellow-400 text-white font-medium cursor-pointer rounded-md px-4 py-2 mt-1"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="25"
                                    fill="currentColor"
                                    class="bi bi-box-arrow-in-up-right"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0z"
                                    />
                                </svg>
                                &nbsp;Transfer Medical Record
                            </button>
                        </div>

                        <div class="flex justify-end mt-4 gap-3">
                            <div class="card flex flex-wrap justify-content-center gap-3">
                                <IconField iconPosition="left">
                                    <InputIcon class="pi pi-search"> </InputIcon>
                                    <InputText v-model="searchTerm" placeholder="Search" @input="search" />
                                </IconField>
                            </div>
                            <div class="flex justify-end">
                                <label
                                    class="flex w-full items-center justify-center hover:bg-amber-200 hover:text-black text-green-800 border border-black font-bold cursor-pointer rounded-md px-4 py-2 mt-1"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-5 h-5 mr-2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                                        />
                                    </svg>
                                    <span id="file-name-display"
                                        >Upload .csv</span
                                    >
                                    <input
                                        class="hidden"
                                        type="file"
                                        name="csv_file"
                                        accept=".csv"
                                        o
                                        required
                                    />
                                </label>
                            </div>

                            <div
                                x-data="{ showModal: false }"
                                class="flex justify-end"
                            >
                                <button
                                    type="button"
                                    x-on:click="showModal = true"
                                    class="flex w-full items-center justify-center bg-red-500 hover:bg-red-700 text-white font-medium cursor-pointer rounded-md px-4 py-2 mt-1"
                                >
                                    Discard
                                </button>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="flex w-full items-center justify-center bg-green-700 hover:bg-green-800 text-white font-medium cursor-pointer rounded-md px-4 py-2 mt-1"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-check mr-1"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor"
                                        fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                        ></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div
                    class="w-full rounded-lg shadow-md mt-3 overflow-y-auto max-h-[70vh]"
                >
                    <table
                        id="visitorTable"
                        class="w-full bg-white border border-gray-200 rounded-lg shadow-md mt-2"
                    >
                        <thead class="bg-green-800 text-white text-left">
                            <tr class="bg-green-800 text-white text-left">
                                <th v-if="individual_type ==='student_applicant'"
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                    Control Number
                                </th>
                                <th 
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                <span v-if="individual_type !=='general_employee'" >Student Number</span>
                                <span v-else>Employee Number</span>
                                     
                                </th>
                                <th
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                    Name
                                </th>
                                <th
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >

                                <span v-if="individual_type ==='student_applicant'" >Google Email </span>
                                <span v-else-if="individual_type ==='general_student'" >Cvsu Email </span>
                                <span v-else-if="individual_type ==='general_employee'" >Cvsu Email </span>

                                </th>
                                <th
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                    Sex
                                </th>
                                <th
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                <span v-if="individual_type !=='general_employee'" >Program</span>
                                <span v-else>Designation</span>

                                </th>
                                <th
                                    class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                                >
                                    Action
                                </th>
                            </tr>
                            
                        </thead>
                 
                        <tbody>

  
                            <tr v-if="directoryList && directoryList.data && directoryList.data.length !== 0" v-for="(individual, index) in directoryList.data" :key="index">
                                <td v-if="individual_type === 'student_applicant'" class="py-2 px-8 border-b border-gray-200">{{ individual.temp_id }}</td>
                                <td class="py-2 px-8 border-b border-gray-200 text-center">{{ individual.id_number }}</td>
                                <td class="py-2 px-8 border-b border-gray-200">{{ individual.first_name }} {{ individual.middle_name }} {{ individual.last_name }}</td>
                                <td class="py-2 px-8 border-b border-gray-200">{{ individual.google_email }}</td>
                                <td class="py-2 px-8 border-b border-gray-200">{{ individual.sex }}</td>
                                <td class="py-2 px-8 border-b border-gray-200">
                                    <span v-if="individual_type !== 'general_employee'">{{ individual.program }}</span>
                                    <span v-else>{{ individual.designation }}</span>
                                </td>
                                <td class="py-2 px-8 border-b border-gray-200"> 
                                    <Button size="sm" v-if="individual_type === 'student_applicant'"> Transfer Student </Button>
                                    <Button size="sm" v-if="individual_type === 'general_employee'"> Transfer to Patient </Button>
                                    <Button size="sm" v-if="individual_type === 'general_student'"> Transfer to Patient </Button>
                                </td>
                            </tr>
                            <tr v-else colspan="7"  class="py-4 px-8 border-b border-gray-200 flex justify-center items-center">
                               <td>No Available Records</td> 
                            </tr>


                    </tbody>

                    </table>
                </div>

                <div class="mt-4"></div>
            </div>
        </div>

      <!-- Applicant, No student number yet(text) , Ready to transfer as student(button), Added as patient(text) , -->
                                 <!-- Student, Ready to transfer as patient -->
                                 <!-- general_employee, Ready to transfer as patient -->
    </div>
    <div class="flex justify-end mt-5" >
            <TailwindPagination :data="directoryList" @pagination-change-page="fetchDirectory" />
     </div>

</template>

<script>
    import axios from 'axios';
    import { TailwindPagination } from 'laravel-vue-pagination';
    import Swal from 'sweetalert2';
    export default {
        props: {
            individual_type: {
                type: String,
                required: true
            }
        },
        components: {
            // ToastNotification,
            TailwindPagination
        },
        data() {
            return {
                searchTerm: '', 
                directoryList: {}, 
                showToast: false,
                toastMessage: '',
                success: false,
                directoryList: {}, 
            };
        },
        mounted() {
            this.fetchDirectory();
        },
        methods: {
            fetchDirectory(page = 1) {
                axios.get(`/api/directory/${this.individual_type}?page=${page}&search=${this.searchTerm}`)
                    .then(response => {
                        this.directoryList = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching appointment data:', error);
                    });
            },
            search() {
                this.fetchDirectory();
            },

        },
        
    }
</script>
