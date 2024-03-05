<script setup>
  import TotalReportImport from "@/Pages/Components/Admin/Report/TotalReport.vue";
  import MonthlyReportImport from "@/Pages/Components/Admin/Report/MonthlyReport.vue";
  import Dropdown from 'primevue/dropdown';
  import Button from '@/Components/Button.vue'
  import { PrintIcon } from '@/Components/Icons/outline'

  import { ref } from "vue";

  const currentYear = new Date().getFullYear();
    const years = ref([]);

    for (let i = currentYear; i >= currentYear - 5; i--) {
      years.value.push({ name: i.toString(), code: i.toString() });
    }

    const selectedYear = ref(null);
    
    const months = [
    { name: 'January', code: '01' },
    { name: 'February', code: '02' },
    { name: 'March', code: '03' },
    { name: 'April', code: '04' },
    { name: 'May', code: '05' },
    { name: 'June', code: '06' },
    { name: 'July', code: '07' },
    { name: 'August', code: '08' },
    { name: 'September', code: '09' },
    { name: 'October', code: '10' },
    { name: 'November', code: '11' },
    { name: 'December', code: '12' }
    ];
const selectedMonth = ref();

const monthChoices = ref(months);


</script>

<template>
  <div class="flex flex-col justify-center items-center p-14 w-full">
    <div class="text-center text-xl text-white w-5/6 py-2 p-3 bg-[#186434] ">
      <p class="uppercase font-bold">Chief Complaint Report</p>
    </div>
    <br>

    <div class="w-2/4 card flex justify-content-center gap-10">
        <Dropdown v-model="selectedYear" editable :options="years" optionLabel="name" placeholder="Select a Year" class="w-full md:w-14rem" />
        <Dropdown v-model="selectedMonth" editable :options="monthChoices" optionLabel="name" placeholder="Select a Month" class="w-full md:w-14rem" />
        <Button variant="success" size="sm" class="p2 w-full flex items-center justify-center gap-3">
            <span>Retrieve Record</span>
        </Button>

    </div>

    <div class="w-full mt-5">
      <div class="p-3">
        <div class="flex justify-center items-center">
          <div class="flex flex-col justify-center w-5/6">
            <div class="w-2/3 mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
              <button @click="openTab = 1" :class="{ 'bg-green-800 text-white': openTab === 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                Total Report
              </button>
              <button @click="openTab = 2" :class="{ 'bg-green-800 text-white': openTab === 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                Monthly Report
              </button>
            </div>

            <div v-if="openTab === 1">
              <div class="transition-all duration-300">
                <div class="float-right">
                  <button type="submit" wire:click="printPDF" class="flex 3/4 items-center justify-center bg-green-700 hover:bg-green-800 text-white font-medium cursor-pointer rounded-md px-4 py-2 mt-1">     
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                    </svg>
                    &nbsp;&nbsp;
                    <label>PDF Total Consultation PDF</label>
                  </button>
                </div>
                <div class="w-full flex justify-center items-center">
                  <div class="flex flex-col justify-center w-full">
                    <TotalReportImport/>
                  </div>
                </div>
              </div>
            </div>

            <div v-if="openTab === 2">
              <div class="transition-all duration-300">
                <div class="float-right">
                  <button type="submit" wire:click="printPDF" class="flex 3/4 items-center justify-center bg-green-700 hover:bg-green-800 text-white font-medium cursor-pointer rounded-md px-4 py-2 mt-1">     
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                    </svg>
                    &nbsp;&nbsp;
                    <label>PDF Total Consultation PDF</label>
                  </button>
                </div>
                <div class="w-full flex justify-center items-center">
                  <div class="flex flex-col justify-center w-full">
                    <MonthlyReportImport/>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      openTab: 1,
    };
  },
};
</script>
