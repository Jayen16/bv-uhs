<script setup>
import Checkbox from "primevue/checkbox";
import InputText from "primevue/inputtext";
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import Button from "@/Components/Button.vue";
import { ref } from "vue";

</script>
<template>
    <div class="flex justify-center items-center">
        <div class="flex flex-col justify-center pt-24 w-5/6 px-16">
            <div
                class="text-center text-xl text-white mb-4 py-2 p-3 bg-[#186434] rounded-md"
            >
                <p class="uppercase font-bold" id="visitorMessage">
                    List of Medical Result Ready
                </p>
            </div>
            <!-- Start Nurse Consultation List -->
            <IconField iconPosition="left">
                <InputIcon class="pi pi-search"> </InputIcon>
                <InputText
                    v-model="searchTerm"
                    placeholder="Search"
                    @input="search"
                />
            </IconField>
            

            <!-- Student Consultations -->
            <div class="w-full items-center items-center justify-center pt-4">
                <table
                    class="w-full bg-white border border-gray-200 rounded-lg shadow-md"
                >
                    <thead>
                        <tr class="bg-[#1B651B] text-white text-left" >
                            <th class="py-3 px-8 border-b border-gray-200">
                                <Checkbox v-model="selectAll" @change="selectAllRows" :binary="true" variant="filled"/>
                            </th>
                            <th class="py-3 px-8 border-b border-gray-200">
                                Record Number
                            </th>
                            <th class="py-3 px-8 border-b border-gray-200">
                                Patient Name
                            </th>
                            <th class="py-3 px-8 border-b border-gray-200">
                                Attending Physician
                            </th>
                            <th class="py-3 px-8 border-b border-gray-200">
                                Done at
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(release, index) in releaseList.data":key="index">

                            <td class="py-4 px-8 border-b border-gray-200">
                                <Checkbox 
                                v-model="selectedRows" 
                                :value="release.record_number" 
                                @change="selectThisRow(release.record_number, $event.target.checked)"
                                :inputId="'checkbox-' + index" 
                                name="selected-rows"
                                variant="filled"
                            />
                            </td>

                            <td class="py-4 px-8 border-b border-gray-200">
                                {{ release.record_number }}
                            </td>
                            <td class="py-4 px-8 border-b border-gray-200">
                                {{ getPropertyValueForPatient(release, 'first_name') }} {{ getPropertyValueForPatient(release, 'last_name') }}
                            </td>
                            <td class="py-4 px-8 border-b border-gray-200">
                                {{ getPropertyValueForStaff(release, 'first_name') }} {{ getPropertyValueForStaff(release, 'last_name') }}
                            </td>
                            <td class="py-4 px-8 border-b border-gray-200">
                                <!-- {{ getPropertyValueForRelease(release, 'updated_at') }}  -->
                                {{ formatDate(release.updated_at) }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex m-4">
                    <button
                        @click="release"
                        class="my-5 border border-stone-50 p-1 w-full bg-[#186434] hover:bg-green-900 text-white font-bold py-3 px-12 rounded-md"
                    >
                        Release
                    </button>
                </div>
            </div>
        </div>
        <!-- End Nurse Consultation List -->
    </div>
    <TailwindPagination
            :data="releaseList"
            @pagination-change-page="fetchResults"
        />

</template>
<script>
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
import Swal from "sweetalert2";
export default {
    components: {
        TailwindPagination,
    },
    data() {
        return {
            searchTerm: "",
            showToast: false,
            toastMessage: "",
            success: false,
            releaseList: {},
            formattedDate: "",
            selectAll: false,
            selectedRows: [],
            selected: false,
        };
    },
    mounted() {
        this.fetchResults();

    },
    methods: {
        fetchResults(page = 1) {
            const params = {
                page: page,
                search: this.searchTerm,
                status: this.selectedStatus ? this.selectedStatus.code : null,
            };

            axios
                .get("/api/releasement/result", { params })
                .then((response) => {
                    this.releaseList = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching appointment data:", error);
                });
        },
        search() {
            this.fetchResults();
        },
        formatDate(date) {
            const today = new Date().toLocaleDateString('en-US', { timeZone: 'Asia/Manila' });
            if (date === today) {
                return "Today";
            } else {
                const dateObj = new Date(date);
                const options = { month: 'long', day: 'numeric' };
                return dateObj.toLocaleDateString('en-US', options);
            }
        },
        selectAllRows() {
            console.log('selectAll:', this.selectAll);
            
            if (this.selectAll) {
                this.selectedRows = this.releaseList.data.map(release => release.record_number);
            } else {
                this.selectedRows = [];
            }     

            console.log('selectedRows:', this.selectedRows);
        },
        selectThisRow(recordNumber, isChecked) {
            const index = this.selectedRows.indexOf(recordNumber);
            if (isChecked && index === -1) {
                this.selectedRows.push(recordNumber);
            } else if (!isChecked && index !== -1) {
                this.selectedRows.splice(index, 1);
            }
            console.log('Selected Rows:', this.selectedRows);
        },

        getPropertyValueForPatient(release, property) {
            if (release.student) {
                return release.student[property];
            } else if (release.employee) {
                return release.employee[property];
            } else if (release.outpatient) {
                return release.outpatient[property];
            } else if (release.firstyear) {
                return release.firstyear[property];
            }
            return '';
        },
        getPropertyValueForStaff(release, property) {
            if (release.staff) {
                return release.staff[property];
            } else if (release.staff) {
                return release.staff[property];
            } else if (release.staff) {
                return release.staff[property];
            } else if (release.staff) {
                return release.staff[property];
            }
            return '';
        }
    }
};
</script>