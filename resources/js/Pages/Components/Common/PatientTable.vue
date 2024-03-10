<script setup>
import InputText from "primevue/inputtext";
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import Button from "@/Components/Button.vue";
import Modal from "@/Components/Modal.vue";
import AddPatientModal from "@/Pages/Components/Common/PatientModal.vue";
import ViewPatientProfile from "@/Pages/Components/Common/PatientProfile.vue";

import {
    ViewIcon,
    ProfileIcon,
    ConsultationIcon,
    DentalIcon,
} from "@/Components/Icons/outline";
</script>
<template>
    <div class="container mx-auto py-3 px-8">
        <div class="flex flex-col">
            <div class="mb-4 flex justify-between">
                <div class="card flex flex-wrap justify-content-center gap-3">
                    <IconField iconPosition="left">
                        <InputIcon class="pi pi-search"> </InputIcon>
                        <InputText
                            v-model="searchTerm"
                            placeholder="Search"
                            @input="search"
                        />
                    </IconField>
                </div>

                <Modal
                    :show="showModal"
                    @close="showModal = false"
                    :maxWidth="modalMaxWidth"
                    :closeable="true"
                >
                    <AddPatientModal />
                </Modal>

                <Button @click="showModal = true" variant="success" size="sm">
                    Add {{ capitalizeFirstLetter(patient_type) }}</Button
                >
            </div>
            <table
                class="w-full bg-white border border-gray-200 rounded-lg shadow-md"
            >
                <thead>
                    <tr class="bg-[#1B651B] text-white text-left">
                        <th class="py-3 px-8 border-b border-gray-200">
                            Student ID
                        </th>
                        <th
                            class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                        >
                            Name
                        </th>
                        <th
                            class="py-3 px-8 border-b border-gray-200 w-[16rem]"
                        >
                            Course
                        </th>
                        <th class="py-3 px-8 border-b border-gray-200">Sex</th>
                        <th
                            class="py-3 px-8 border-b border-gray-200 text-center"
                        >
                            Blood Type
                        </th>
                        <th
                            class="py-3 px-8 border-b border-gray-200 text-center"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-if="
                            patientList &&
                            patientList.data &&
                            patientList.data.length !== 0
                        "
                        v-for="(patient, index) in patientList.data"
                        :key="index"
                        class="hover:bg-gray-100"
                    >
                        <td
                            class="py-2 px-8 border-b border-gray-200"
                            v-if="patient.student_id"
                        >
                            {{ patient.student_id }}
                        </td>
                        <td
                            class="py-2 px-8 border-b border-gray-200"
                            v-if="patient.employee_id"
                        >
                            {{ patient.employee_id }}
                        </td>
                        <td
                            class="py-2 px-8 border-b border-gray-200"
                            v-if="patient.outpatient_id"
                        >
                            {{ patient.outpatient_id }}
                        </td>
                        <td class="py-2 px-8 border-b border-gray-200">
                            {{ patient.first_name }} {{ patient.last_name }}
                        </td>
                        <td class="py-2 px-8 border-b border-gray-200">
                            {{ patient.course }}
                        </td>
                        <td class="py-2 px-8 border-b border-gray-200">
                            {{ capitalizeFirstLetter(patient.sex) }}
                        </td>
                        <td
                            class="py-2 px-8 border-b border-gray-200 text-center"
                        >
                            {{
                                patient.bloodtype
                                    ? convertBloodType(patient.bloodtype)
                                    : "unknown"
                            }}
                        </td>
                        <td
                            class="py-2 px-8 border-b border-gray-200 text-center"
                        >
                            <div class="flex gap-3 justify-center">
                                <div>
                        
                                    <Button
                                        variant="info"
                                        size="sm"
                                        @click="showProfile = true"
                                    >
                                        <ProfileIcon /> View Profile
                                    </Button>
                                </div>

                                <div>
                                    <Button variant="warning" size="sm">
                                        <ViewIcon /> View Record
                                    </Button>
                                </div>

                                <div
                                    v-if="$page.props.auth.user.type_id === '2'"
                                >
                               
                                <Button @click="redirectToConsultation(patient.student_id)" v-if="patient.student_id"><ConsultationIcon /> Consult</Button>
                                <Button @click="redirectToConsultation(patient.employee_id)" v-if="patient.employee_id"><ConsultationIcon /> Consult</Button>
                                <Button @click="redirectToConsultation(patient.outpatient_id)" v-if="patient.outpatient_id"><ConsultationIcon /> Consult</Button>

                                </div>

                                <div
                                    v-if="$page.props.auth.user.type_id === '4'"
                                >
                                    <Button variant="success" size="sm">
                                        <DentalIcon /> New Dental Examination
                                    </Button>
                                </div>

                                <div></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for View Profile Button -->
    <Modal
        :show="showProfile"
        @close="showProfile = false"
        :maxWidth="modalMaxWidth"
        :closeable="true"
    >
        <ViewPatientProfile />
    </Modal>


    <div class="flex justify-end mt-5">
        <TailwindPagination
            :data="patientList"
            @pagination-change-page="fetchPatient"
        />
    </div>
</template>

<script>
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
import Swal from "sweetalert2";
export default {
    props: {
        patient_type: {
            type: String,
            required: true,
        },
    },
    components: {
        TailwindPagination,
    },
    data() {
        return {
            showProfile: false,
            showModal: false,
            modalMaxWidth: "2xl",
            searchTerm: "",
            patientList: {},
            showToast: false,
            toastMessage: "",
            success: false,
            patient_id: '',
        };
    },
    mounted() {
        this.fetchPatient();
    },
    methods: {
        fetchPatient(page = 1) {
            axios
                .get(
                    `/api/patient/${this.patient_type}?page=${page}&search=${this.searchTerm}`
                )
                .then((response) => {
                    this.patientList = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching patient list:", error);
                });
        },
        search() {
            this.fetchPatient();
        },
        capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        },
        convertBloodType(bloodtype) {
            const typeMap = {
                o_positive: "O+",
                o_negative: "O-",
                a_positive: "A+",
                a_negative: "A-",
                b_positive: "B+",
                b_negative: "B-",
                ab_positive: "AB+",
                ab_negative: "AB-",
            };
            return typeMap[bloodtype.toLowerCase()] || bloodtype;
        },
        redirectToConsultation(patient_id) {
            const profileUrl = `/patient/${this.patient_type}/consultation/${patient_id}`;
            window.location.href = profileUrl;
        }

    },
};
</script>
