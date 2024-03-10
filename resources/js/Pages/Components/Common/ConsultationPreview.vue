<script setup>

</script>

<template>

<div>


  
<!-- NURSE AT DOCTOR MAY ACCESS -->
        <!-- Basic Information -->
        <div class="text-left rounded-md text-white w-auto mb-5  p-3 bg-[#186434] ">
            <p class="uppercase font-medium">Personal Data</p>
        </div>
  
        <!-- Patient type -->
        <div class="mx-0 md:flex mb-0">
            <div class="w-1/4 text-base text-left flex-col mb-6">
                <p class="font-medium">Patient Type: <span class="font-bold uppercase">{{ previewList.type }}</span></p>
            </div>    
        </div>

        <div class="-mx-3 md:flex mb-2">
            <!-- Full Name -->
            <div class="md:w-2/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-full-name">
                    Full Name
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name">
                    <p>{{ previewList?.patientInfo?.first_name }} {{ previewList?.patientInfo?.last_name }}</p>
                 </p>
            </div>
            <!-- Age -->
            <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-age">
                    Age
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="patient-age" >
                 {{ calculateAge(previewList?.patientInfo?.birthdate) }}
                </p>
            </div>
            <!-- Sex -->
            <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-sex">
                    Sex
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" >
                   <span v-if="previewList?.patientInfo?.sex ==='female'"> Female</span>
                   <span v-else-if="previewList?.patientInfo?.sex ==='male'"> Male</span>
                </p>
            </div>
            <!-- Civil Status -->
            <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-civil-status">
                    Civil Status
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="patient-civil-status">
                    {{ previewList?.patientInfo?.civil }}
                </p>
            </div>
        </div>

        <!-- Address -->
        <!-- new row -->
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-2/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-address">
                    Address
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="patient-address" >
                    {{ previewList?.patientInfo?.address }}
                </p>
            </div>
            <!-- Date of Birth -->
            <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-birthdate">
                    Date of Birth
                </label>
                <p class="cursor-not-allowed w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="patient-birthdate" >
                {{ formatDate(previewList?.patientInfo?.birthdate) }} </p>
            </div>
            <!-- Blood Type -->
            <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="patient-bloodtype">
                    Blood Type
                </label>
                <p class="cursor-not-allowed w-24 bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="patient-bloodtype" >
                    {{ convertBloodType(previewList?.patientInfo?.bloodtype) }}
                </p>
            </div>

            <div class="md:w-1/4 px-3 mb-6 md:mb-0"> 
            </div>
        </div>
        
        
        <!-- Previous Consultation Section -->
        <div class="text-left rounded-md text-white w-auto mb-5 p-3 bg-[#186434] ">
            <p class="uppercase font-medium">Previous Consultation</p>
        </div>

        <!--new row  -->
        <div v-if="previewList?.patientInfo?.consultation?.soap?.medications_given" class="-mx-3 md:flex mb-6">
            <!-- date --> 
            <div class="md:w-1/4 px-3 mb-6 md:mb-4">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="previous-date">
                    Date
                </label>       
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 light:text-white-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <p datepicker type="text" id="previous-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" >
                        {{ formatDate(previewList?.patientInfo?.consultation?.created_at) }}
                    </p>
                </div>
            </div>
            <!-- diagnosis -->
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="previous-diagnosis">
                Diagnosis
                </label>
                <p class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" 
                id="previous-diagnosis">
                {{ previewList?.patientInfo?.consultation?.soap?.diagnosis }}
            </p> 
               
            </div>
            <!-- Attending Physician -->
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="previous-attending-physician">
                Attending Physician
                </label>
                <div class="relative">
                    <p class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" 
                    id="previous-diagnosis">
                    {{ previewList?.patientInfo?.consultation?.staff?.first_name }} {{ previewList?.patientInfo?.consultation?.staff?.last_name }}
                    </p>      
                </div>
            </div>
        </div>
   
       
        <!--new row  -->
        <div v-if="previewList?.patientInfo?.consultation?.soap?.medications_given" class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <!-- Medications Given -->
                <label class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2" for="medication-given">
                    Medications Given
                    </label>
                <textarea class=" no-resize appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-30 resize-none" 
                id="medication-given" disabled> {{ previewList?.patientInfo?.consultation?.soap?.medications_given }} </textarea>
            </div>
        </div>

        <!-- PAG WALA SOAP -->
        <div v-else-if="$page.props.auth.user.type_id !=='4'" class=" md:w-full px-3 py-6">
            <label class="flex uppercase tracking-wide justify-center text-grey-darker text-xs font-bold mb-2" for="no-data">
                No Previous S.O.A.P data found
            </label>
        </div>



</div>


</template>

<script>
import axios from "axios";
// import { TailwindPagination } from "laravel-vue-pagination";
import Swal from "sweetalert2";


const currentURL = window.location.href;
const urlParts = currentURL.split('/');
const patient_id = urlParts[urlParts.length - 1];
const patient_type = urlParts[urlParts.length - 3];

// console.log('patient_id' , patient_id);
export default {
    components: {
        // ToastNotification,
        // TailwindPagination,
    },
    data() {
        return {
            searchTerm: "",
            showToast: false,
            toastMessage: "",
            success: false,
            previewList: {},
        };
    },
    mounted() {
        this.fetchPatientPreview();
    },
    methods: {
        fetchPatientPreview() {
            axios
                .get(
                    `/api/patient/${patient_type}/consultation/preview/${patient_id}`                  
                )
                .then((response) => {
                    this.previewList = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching appointment data:", error);
                });
        },
        formatDate(date) {
            const today = new Date().toLocaleDateString('en-US', { timeZone: 'Asia/Manila' });
            if (date === today) {
                return "Today";
            } else {
                const dateObj = new Date(date);
                const options = { month: 'long', day: 'numeric' ,year :'numeric'};
                return dateObj.toLocaleDateString('en-US', options);
            }
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
            return typeMap[bloodtype];
        },   
        calculateAge(birthdate) {
            if (!birthdate) return ''; 
            const today = new Date();
            const birthDate = new Date(birthdate);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDifference = today.getMonth() - birthDate.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--; 
            }
            return age;
     }, formatTime(timestamp) {
        if (!timestamp) return ''; // Check if the timestamp is undefined or null

        const date = new Date(timestamp);
        let hours = date.getHours();
        const minutes = date.getMinutes();
        const meridian = hours >= 12 ? 'pm' : 'am';

        // Convert hours to 12-hour format
        if (hours > 12) {
            hours -= 12;
        } else if (hours === 0) {
            hours = 12;
        }

        // Format minutes with leading zero if necessary
        const formattedMinutes = String(minutes).padStart(2, '0');

        return `${hours}:${formattedMinutes}${meridian}`;
        }

    },
};
</script>