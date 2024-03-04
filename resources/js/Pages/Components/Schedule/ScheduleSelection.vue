<script setup>
import Calendar from "primevue/calendar";
import MultiSelect from "primevue/multiselect";
import Slider from "primevue/slider";
import InputText from "primevue/inputtext";
import Button from '@/Components/Button.vue';

import { ref } from "vue";

const dates = ref();
const selectedCities = ref();
const times = ref([
    { name: "7:00 am", code: "7 am" },
    { name: "8:00 am", code: "8 am" },
    { name: "9:00 am", code: "9 am" },
    { name: "10:00 am", code: "10 am" },
    { name: "11:00 am", code: "11 am" },
    { name: "12:00 pm", code: "12 pm" },
    { name: "1:00 pm", code: "1 pm" },
    { name: "2:00 pm", code: "2 pm" },
    { name: "3:00 pm", code: "3 pm" },
    { name: "4:00 pm", code: "4 pm" },
    { name: "5:00 pm", code: "5 pm" },
]);



const value = ref(25);
</script>

<template>
    <div class="flex justify-center">
        <div class="flex gap-12 bg-white w-full justify-center items-center">
            <div
                class="w-1/8 text-base text-left flex-col mt-2 flex items-center"
            >
                <label
                    for=""
                    class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2"
                >
                    Select Date:
                </label>

                <!-- <template> -->
                <div class="card flex justify-center">
                    <Calendar
                        v-model="selectedDates"
                        selectionMode="multiple"
                        :manualInput="false"
                        placeholder="Select Date"
                        class="rounded-md"
                    />
                </div>
                <!-- </template> -->
            </div>

            <div class="w-1/8 text-base text-left flex-col mb-0 mt-2">
                <label
                    for=""
                    class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2"
                >
                    Slot Limitation per Interval:
                </label>
                <div class="card flex justify-center">
                    <div class="w-14rem">
                        <InputText v-model.number="slotLimit" class="w-full" />
                        <Slider v-model="slotLimit" class="w-full" :max="30" />
                    </div>
                </div>
            </div>

            <div class="w-fill text-base text-left flex-col mb-5 mt-5">
                <label
                    for=""
                    class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2"
                >
                    Select time:
                </label>

                <div class="card flex justify-center">
                    <MultiSelect
                        v-model="selectedTimes"
                        display="chip"
                        :options="times"
                        optionLabel="name"
                        placeholder="Select Time"
                        :maxSelectedLabels="5"
                        class="w-full md:w-[20rem]"
                    />
                </div>
            </div>

            <div class="w-fill text-base text-left flex-col mb-4 mt-8">
                <Button
                    class="flex items-center border border-stone-50 bg-green-800 hover:bg-green-900 text-white font-medium py-2 px-12 rounded-md"
                    type="submit"
                    @click="addSchedule"
                >
                    <span class="font-semibold text-lg">Add Schedule</span>
                </Button>


                <div class="relative mt-2">
                    <div
                        id="flash-message"
                        class="absolute whitespace-nowrap top-0"
                    ></div>
                </div>
            </div>
        </div>
        <!-- end appointment creation -->
    </div>

    <ToastNotification :message="toastMessage" :show="showToast" :success="success" />

</template>


<script>
import axios from 'axios';
import ToastNotification from '@/Components/ToastNotification.vue';

const loading = ref(false);

export default {
    components: {
        ToastNotification
    },
  props: {
    appoint_type: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      selectedDates: [],
      slotLimit: null,
      selectedTimes: [],
      showToast: false,
      toastMessage: '',
      success:false,

    };
  },
  methods: {
    addSchedule() {
            const formattedDates = this.selectedDates.map(date => this.formatDate(date));
            const selectedTimeCodes = this.selectedTimes.map(time => time.code); 

            const requestData = {
                selectedDates: formattedDates,
                slotLimit: this.slotLimit,
                selectedTimes: selectedTimeCodes // Sending an array of time codes
            };


            axios.post(`/api/schedule/${this.appoint_type}`, requestData)
                .then(response => {
                    this.toastMessage = response.data.message;
                    this.showToast = true;
                    this.success = true;

                    setTimeout(() => {
                        this.showToast = false;
                    }, 5000)


                })
                .catch(error => {

                    console.log(error);
                    this.toastMessage = 'No date, time, or slot has been selected.';
                    this.showToast = true;
                    this.success = false;
                    setTimeout(() => {
                        this.showToast = false;
                    }, 5000)
                });
        },
        formatDate(dateString) {
            const dateObject = new Date(dateString);
            const year = dateObject.getFullYear();
            const month = String(dateObject.getMonth() + 1).padStart(2, '0');
            const day = String(dateObject.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            return formattedDate;
        }

    }

};
</script>