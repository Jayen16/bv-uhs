<script setup>
    import ConsultationPreview from "@/Pages/Components/Common/ConsultationPreview.vue";
    import Button from "@/Components/Button.vue";
    
    import RadioButton from 'primevue/radiobutton';

    </script>
    
    <template>
        <div class="bg-white p-6">
            <div
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mt-10 mr-5 flex flex-col my-2 w-full"
            >
                <div
                    class="text-center rounded-md text-xl text-white w-auto mb-4 py-4 p-3 bg-[#186434]"
                >
                    <p class="uppercase font-bold">Consultation Form</p>
                </div>
    
                <div>
                    <ConsultationPreview />
                </div>
            </div>
    
            <div
                class="text-center rounded-md text-white w-auto mb-5 p-3 bg-[#186434]"
            >
                <p class="uppercase font-medium">Assessment Section</p>
            </div>
    
            <!--new row  -->
            <div class="mx-0 md:flex mb-6">
                <!-- date and case no. -->
                <div class="w-1/2 text-base text-left flex-col mb-0">
                    <p class="font-bold">
                        Case No. : <span class="font-medium">#######</span>
                    </p>
                </div>
                <div class="w-1/2 text-base text-right flex-col mb-0">
                    <p class="font-bold">
                        Date:
                        <span class="current-date font-medium">
                            {{ formattedDate }}
                        </span>
                    </p>
                </div>
            </div>
    
            <!-- new row -->
    
            <form @submit.prevent="submit">
                <div class="mx-0 md:flex mb-3 gap-6">
                    <div class="w-1/4 text-base text-left flex-col mb-0">
                        <label
                            class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="consultation-category"
                        >
                            Consultation Category
                            <span class="text-red-600 text-lg text-bold">*</span>
                        </label>
                        <select
                        v-model="form.selectedPurpose"
                        class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                        id="consultation-category"
                        
                    >
                        <option value="Medical Examination-1st yr only">Medical Examination</option>
                        <option selected value="">select purpose</option>
                        <option value="Daily check-up">Daily check-up</option>
                        <option value="Emergency check-up">Emergency check-up</option>
                        <option value="Follow-up check-up">Follow-up check-up</option>
                        <option value="Medical Certificate-Employee">Medical Certificate</option>
                        <option value="Medical Certificate-Student">Medical Certificate</option>
                        <option value="Scholarship">Scholarship</option>
                        <option value="Annual Medical Examination">Annual Medical Examination</option>
                    </select>
    
                    </div>
                        
                <!-- Chief Complaint -->
                <div class="w-1/4 text-base text-left flex-col mb-0">
                <label for="mainOption" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Chief complaint <span class="text-red-600 text-lg text-bold">*</span>
                </label>
                <select v-model="form.selectedCategory" @change="resetCategory" id="mainOption" class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                    <option selected value="">select complaint</option>
                    <option v-for="(subcategories, category) in categories" :key="category" :value="category">{{ category }}</option>
                </select>  
            </div>
         
            <!-- Sub category -->
            <div class="w-1/4 text-base text-left flex-col mb-0">
                <label for="dependentOption" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Sub-Category <span class="text-red-600 text-lg text-bold">*</span>
                </label>
                <select v-model="form.selectedSubcategory" id="dependentOption" @change="resetOtherSubcategory" class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                    <option value="">select subcategory</option>
                    <option v-for="subcategory in subcategories" :key="subcategory" :value="subcategory">{{ subcategory }}</option>
                </select>
            </div>
    
            <!-- Other subcategories input -->
            <div class="w-1/4 text-base text-left flex-col mb-0">
                <label for="complaintOthers" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Other subcategories
                </label>
                <input 
                    :disabled="form.selectedSubcategory !== 'Others'" 
                    v-model="form.otherSubCategory" 
                    id="complaintOthers" 
                    type="text" 
                    placeholder="others.." 
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                >

            </div>

            </div>
    
                <!-- line -->
                <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
    
                <!-- new row -->
                <div class="mx-0 md:flex mb-1 gap-3">
                    <!-- Mode of Arrival -->
                    <div class="w-1/2 text-base text-left flex-col mb-0">
                        <div
                            class="text-center rounded-md text-white w-auto mb-7 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Mode of Arrival</p>
                        </div>
                        <!-- MOA options -->
                        <div class="mx-0 md:flex flex-row gap-16 ml-2 mb-7">
    
                            <div class="flex flex-wrap gap-3">
                                <div class="flex align-items-center">
                                    <input v-model="form.mode_of_arrival"  type="radio" name="mode_of_arrival1" value="Ambulance" class="cursor-pointer form-radio w-6 h-6 items-center"/>
                                    <label for="mode_of_arrival1" class="ml-2">Ambulance</label>
                                </div>
                                <div class="flex align-items-center">
                                    <input v-model="form.mode_of_arrival"  type="radio"name="mode_of_arrival2" value="Assisted"  class="cursor-pointer form-radio w-6 h-6 items-center"/>
                                    <label for="mode_of_arrival2" class="ml-2">Assisted</label>
                                </div>
                                <div class="flex align-items-center">
                                    <input v-model="form.mode_of_arrival"  type="radio"name="mode_of_arrival3" value="Cuddled/Carried"  class="cursor-pointer form-radio w-6 h-6 items-center"/>
                                    <label for="mode_of_arrival3" class="ml-2">Cuddled/Carried</label>
                                </div>
                            </div>
    
                        </div>
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
    
                        <!-- Valuables -->
                        <div
                            class="text-center rounded-md text-white w-auto mb-5 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Valuables</p>
                        </div>
    
                        <!-- Valuables Option -->
                        <div class="text-base flex flex-row mb-0 my-1">
                        <!-- Option Yes -->
                        <div class="text-base flex flex-row mb-28 my-6">
                        <div class="w-1/2">
                        <label class="text-base font-normal inline-flex items-center ml-2">
                            <input
                            type="radio"
                            class="cursor-pointer form-radio w-6 h-6 items-center"
                            v-model="form.selectedValuable"
                            name="valuable_choice"
                            value="Yes"
                            @click="toggleValuableOptions(true)"
                            />
                            <span class="ml-2">Yes</span>
                        </label>
                        <!-- Options for yes -->
                        <div class="text-base flex flex-col mb-0 my-3 ml-2" :class="{ 'opacity-50': selectedValuableCategory === 'None' || !selectedValuableCategory }">
                            <label class="text-grey-200 text-sm font-medium mb-2" for="item-release">
                            <i>If Yes, items were released to:</i>
                            </label>
                            <div class="w-full" x-show="selectedValuableCategory === 'Yes'">
                            <ul>
                                <li v-for="option in valuableOptions" :key="option.value">
                                <label class="text-base font-normal inline-flex items-center">
                                    <input
                                    type="radio"
                                    class="form-radio w-4 h-4 items-center"
                                    name="valuable"
                                    :value="option.value"
                                    v-model="form.selectedValuable"
                                    :disabled="selectedValuableCategory === 'None' || !selectedValuableCategory"
                                    />
                                    <span class="ml-2">{{ option.label }}</span>
                                </label>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                        <div class="w-1/2">
                        <label class="text-base font-normal inline-flex items-center">
                            <input
                            type="radio"
                            class="cursor-pointer form-radio w-6 h-6 items-center"
                            v-model="form.selectedValuable"
                            name="valuable_choice"
                            value="None"
                            @click="toggleValuableOptions(false)"
                            />
                            <span class="ml-2">None</span>
                        </label>
                        </div>
                    </div>
    
                 </div>
    
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
                    </div>
    
                    <!-- new row -->
                    <div class="w-1/2 text-base flex-row mb-0">
                        <!-- Allergies -->
                        <div
                            class="text-center rounded-md text-white w-auto mb-6 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Allergies</p>
                        </div>
                        <!-- new row -->
                        <div class="w-full text-base text-left flex flex-row mb-6 gap-6 justify-center">
                        <div class="w-1/3 ml-2 items-center">
                            <label class="text-base font-normal inline-flex items-center">
                                <input
                                    v-model="form.selectedAllergies"
                                    type="checkbox"
                                    class="cursor-pointer form-checkbox w-6 h-6 items-center"
                                    name="allergies1"
                                    value="Food"
                                />
                                <span class="ml-2">Food</span>
                            </label>
                        </div>
                        <div class="w-1/3">
                            <label class="text-base font-normal inline-flex items-center">
                                <input
                                    v-model="form.selectedAllergies"
                                    type="checkbox"
                                    class="cursor-pointer form-checkbox w-6 h-6 items-center"
                                    name="allergies2"
                                    value="Drugs"
                                />
                                <span class="ml-2">Drugs</span>
                            </label>
                        </div>
                        <div class="w-full flex">
                            <label class="text-base font-normal inline-flex mr-2">
                                <input
                                    id="allergy-others-checkbox"
                                    type="checkbox"
                                    class="cursor-pointer form-checkbox w-6 h-6 items-center"
                                    v-model="form.selectedAllergies"
                                    value="Others"
                                />
                                <span class="ml-1">Others:</span>
                            </label>
                            <input
                                id="allergy-others-input"
                                type="text"
                                placeholder="others.."
                                value=""
                                class="cursor-pointer form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1"
                                name="otherAllergies"
                                v-model="form.otherAllergies"
                            />
                        </div>
                    </div>
                    
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200"></div>
    
                        <!-- Vital Signs -->
                        <div
                            class="text-center rounded-md text-white w-auto mb-6 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Vital Signs</p>
                        </div>
                        <div
                            class="w-full text-base text-left flex flex-row mb-2 gap-6"
                        >
                            <div class="w-1/4 text-base flex-col ml-2">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-blood-pressure"
                                >
                                    Blood Pressure
                                </label>
                                <input
                                    v-model="form.bloodpressure"
                                    name="bloodpressure"
                                    type="text"
                                    placeholder="eg. 120/70"
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                    pattern="\d+/\d+"
                                    title="Please enter blood pressure in the format: 120/90"
                                    oninput="this.value = this.value.replace(/[^0-9/]/g, '');"
                                />
                            </div>
                            <div class="w-1/4 text-base flex-col ml-2 relative">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-temperature"
                                >
                                    Temperature C°
                                </label>
                                <div class="relative">
                                    <input
                                        v-model="form.temperature"
                                        name="temperature"
                                        type="text"
                                        placeholder=""
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 pr-12 mb-3"
                                        oninput="this.value = this.value.replace(/[^0-9/]/g, '');"
                                    />
                                </div>
                            </div>
    
                            <div class="w-1/4 text-base flex-col ml-2">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-pulse-rate"
                                >
                                    Pulse Rate
                                </label>
                                <input
                                    v-model="form.pulse_rate"
                                    name="pulse_rate"
                                    type="text"
                                    placeholder=""
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                />
                            </div>
                            <div class="w-1/4 text-base flex-col ml-2">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-respiratory-rate"
                                >
                                    Respiratory Rate
                                </label>
                                <input
                                    v-model="form.respiratory_rate"
                                    name="respiratory_rate"
                                    type="text"
                                    placeholder=""
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                />
                            </div>
                        </div>
                        <!-- next row -->
                        <div
                            class="w-full text-base text-left flex flex-row mb-0 gap-6"
                        >
                            <div class="w-1/4 text-base flex-col ml-2">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-oxygen-sat"
                                >
                                    Oxygen Sat
                                </label>
                                <input
                                    v-model="form.oxygen_sat"
                                    name="oxygen_sat"
                                    type="text"
                                    placeholder=""
                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                />
                            </div>
    
                            <div class="w-1/3 text-base flex-col ml-2">
                                <label
                                    class="block tracking-wide text-grey-darker text-xs font-bold mb-2"
                                    for="consultation-lmp"
                                >
                                    LMP
                                </label>
    
                                <div class="relative max-w-sm">
                                    <input
                                        v-model="form.lmp"
                                        name="lmp"
                                        type="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500"
                                    />
                                </div>
                            </div>
                        </div>
                        <!-- next row -->
    
                        <div class="w-full text-base text-left flex flex-row mb-0 mt-3 gap-3 justify-center items-center bg-gray-100">
                        <!-- Height Input -->
                        <div class="w-1/4 text-base flex-col ml-2 relative">
                        <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-height">
                            Height (cm)
                        </label>
                        <div class="relative">
                            <input v-model="form.height" @input="calculateBMI" name="height" type="number" placeholder="eg. 172"
                            class="border-black appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            min="0" >
                        </div>
                        </div>
                    
                        <!-- Weight Input -->
                        <div class="w-1/4 text-base flex-col ml-2 relative">
                        <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-weight">
                            Weight (kg)
                        </label>
                        <div class="relative">
                            <input v-model="form.weight" @input="calculateBMI" name="weight" type="number" placeholder="eg. 55"
                            class="border-black appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            min="0" >
                        </div>
                        </div>
                    
                        <!-- BMI Score Display -->
                        <div class="w-1/4 text-base flex-col ml-2">
                        <label class="block tracking-wide text-center text-grey-darker text-xs font-bold mb-2" for="consultation-bmi-score">
                            BMI Score
                        </label>
                        <input v-model="form.bmi" id="consultation-bmi-score" type="text" placeholder=""
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border-t-0 border-l-0 border-r-0 py-3 px-4 mb-3 text-sm text-center font-bold"
                            disabled>
                        </div>
                    
                        <!-- BMI Category Display -->
                        <div class="w-1/3 text-base flex-col ml-2 mr-2">
                        <label class="block tracking-wide text-center text-grey-darker text-xs font-bold mb-2" for="consultation-bmi-category">
                            BMI Category
                        </label>
                        <small id="consultation-bmi-category" type="text" placeholder=""
                        class="appearance-none block w-full bg-grey-lighter border-t-0 border-l-0 border-r-0 py-3 px-4 mb-3 text-sm text-center font-bold"
                        :class="bmiCategoryClass">
                            {{ bmiCategory }}
                        </small>
                        </div>
                    </div>
                    
    
    
    
                        <div
                            class="w-full text-base text-left flex flex-row mb-4 gap-6"
                        ></div>
    
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
                    </div>
                </div>
    
                <div
                    class="text-center rounded-md text-white w-auto mb-3 p-2 bg-[#186434]"
                >
                    <p class="font-medium">Family and Medical History</p>
                </div>
    
                <!-- Family and Medical History -->
                <div class="mx-0 md:flex mb-3 gap-3">
                    <!-- left side -->
                    <div class="w-1/2 text-base text-left flex-col mb-0 ">
                        <div class="text-center rounded-md text-white w-auto mb-10 p-1 bg-[#186434]">
                            <p class="font-medium">Family History</p>
                        </div>   
                        <div class="mx-0 md:flex flex-row gap-6 ml-2 mb-8">
                            <div>
                                <label for="option-history-ptb" class="text-base font-normal inline-flex items-center">
                                    <input  v-model="form.selectedFamilyHistory"
                                    id="option-history-ptb" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="PTB" >
                                    <span class="ml-2">PTB</span>
                                </label>
                            </div>
                            <div>
                                <label for="option-history-dm" class="text-base font-normal inline-flex items-center">
                                    <input v-model="form.selectedFamilyHistory"
                                    id="option-history-dm" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="DM" >
                                    <span class="ml-2">DM</span>
                                </label>
                            </div>
                            <div>
                                <label for="option-history-cancer" class="text-base font-normal inline-flex items-center">
                                    <input v-model="form.selectedFamilyHistory"
                                    id="option-history-cancer" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="Cancer" >
                                    <span class="ml-2">Cancer</span>
                                </label>
                            </div>
                            <div>
                                <label for="option-history-cardiovascular" class="text-base font-normal inline-flex items-center">
                                    <input v-model="form.selectedFamilyHistory"
                                    id="option-history-cardiovascular" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="Cardiovascular" >
                                    <span class="ml-2">Cardiovascular</span>
                                </label>
                            </div>
                            <div class="w-full flex">
                                <label for="option-history-others" class="text-base font-normal inline-flex items-center mr-2">
                                <input v-model="form.selectedFamilyHistoryOtherInput"
                                id="input-history-others" type="text" placeholder="others.." value="" class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" name="other_family_history">
                
                                </label>
                            </div>
                        </div>
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200 mb-3"></div>

                    </div>
    

                    <!-- right side -->
                    <div class="w-1/2 text-base text-left flex-col mb-0">
                    <div class="text-center rounded-md text-white w-auto mb-5 p-1 bg-[#186434]">
                        <p class="font-medium">Medical History</p>
                    </div> 
                    <div class="mx-0 md:flex flex-row gap-6 ml-2 mb-3">
                        <div class="w-1/4">
                            <label for="option-history-seizure" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-seizure" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Seizure">
                                <span class="ml-2">Seizure</span>
                            </label>
                        </div>
                        <div class="w-1/4">
                            <label for="option-history-asthma" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-asthma" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Asthma">
                                <span class="ml-2">Asthma</span>
                            </label>
                        </div>
                        <div class="w-1/4">
                            <label for="option-history-cardio" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-cardio" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Cardio" >
                                <span class="ml-2">Cardio</span>
                            </label>
                        </div>
                        <div class="w-1/2">
                            <label for="option-history-ptb" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-ptb" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="PTB" >
                                <span class="ml-2">PTB</span>
                            </label>
                        </div>
                    </div>

                    <!-- new row -->
                    <div class="mx-0 md:flex flex-row gap-6 ml-2 mb-3 justify-center">
                        <div class="w-1/4">
                            <label for="option-history-surgery" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-surgery" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Surgery" >
                                <span class="ml-2">Surgery</span>
                            </label>
                        </div>
                        <div class="w-1/4">
                            <label for="option-history-ob" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-ob" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="OBGyne" >
                                <span class="ml-2">OBGyne</span>
                            </label>
                        </div>
                        <div class="w-1/4">
                            <label for="option-history-neuro" class="text-base font-normal inline-flex items-center">
                                <input v-model="form.selectedMedicalHistory"
                                id="option-history-neuro" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Neuro">
                                <span class="ml-2">Neuro</span>
                            </label>
                        </div>
                        <div class="w-1/2 flex">
                            <label for="option-medical-history-neuro" class="text-base font-normal inline-flex mr-2">
                            <input v-model="form.selectedMedicalHistoryOtherInput"
                            id="input-medical-history-others" type="text" placeholder="others.." value="" class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" name="other_medical_history" >
                                <span class="ml-2">Others</span>
                            </label>
                        </div>
                    </div>
                    <!-- line -->
                    <div class="border-y-4 my-2 border-gray-200 mb-3"></div>
                </div>
                </div>
    
                <div class="mx-0 md:flex flex-col mb-3 gap-3">
                    <!-- label -->
                    <div
                        class="text-center rounded-md text-white w-full mb-3 p-1 bg-[#186434]"
                    >
                        <p class="font-medium">Patient with pain</p>
                    </div>
    
    
    
                    <!-- pain scale range -->
                    <div class="mx-0 md:flex inline-flex mb-4 gap-6 justify-center">
                    <label for="option-pain-yes" class="text-base font-normal inline-flex items-center ml-2">
                        <input
                            type="radio"
                            class="cursor-pointer w-6 h-6 items-center"
                            name="pain_with_pain_choice"
                            value="Yes"
                            v-model="form.painChoice"
                        />
                        <span class="ml-2">Yes</span>
                    </label>
        
                    <label for="option-pain-none" class="text-base font-normal inline-flex items-center">
                        <input
                            type="radio"
                            class="cursor-pointer w-6 h-6 items-center"
                            name="pain_with_pain_choice"
                            value="None"
                            id="option-pain-none"
                            v-model="form.painChoice"
                            @click="resetPainScale()"
                        />
                        <span class="ml-2">None</span>
                    </label>
                </div>
                
                <div class="text-base font-normal inline-flex justify-center items-center gap-8 mb-3" :class="{ 'opacity-50': form.painChoice === 'None' || form.painChoice === '' }">
                    <!-- 2 divs for disabled and able to select pain image -->
                    <div v-for="painLevel in painLevels" :key="painLevel.value" class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">
                       <div v-if="form.painChoice !=='Yes'">
                        <label :for="'pain-' + painLevel.value" class="cursor-pointer flex items-center">
                            <input
                                :id="'pain-' + painLevel.value"
                                :type="painChoice === 'None' ? 'checkbox' : 'radio'"
                                :name="painChoice === 'None' ? '' : 'form.selectedPain'"
                                :value="painLevel.value"
                                class="hidden"
                                 disabled
                            />
                            <img :src="painLevel.image" :alt="painLevel.label" class="rounded-lg shadow-md max-w-full h-auto" />
                        </label>
                       </div>

                        <div v-else>
                            <label :for="'pain-' + painLevel.value" class="cursor-pointer flex items-center" @click="updateSelectedPain(painLevel.value)">
                                <input
                                    :id="'pain-' + painLevel.value"
                                    :type="painChoice === 'None' ? 'checkbox' : 'radio'"
                                    :name="painChoice === 'None' ? '' : 'form.selectedPain'"
                                    :value="painLevel.value"
                                    class="hidden"
                                    :disabled="painChoice === 'None'"
                                />
                                <img :src="painLevel.image" :alt="painLevel.label" class="rounded-lg shadow-md max-w-full h-auto" />
                            </label>
                        </div>
                    </div>
                 <!--  up to here  -->
                    <div class="w-1/6">
                        <label class="uppercase block tracking-wide text-grey-darker text-xs font-bold mb-2" for="pain-scale">Pain Scale</label>
                        <input id="pain-scale" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" v-model="form.selectedPain" />
                    </div>
                    
            
                </div>
    
    
                    <!-- line -->
                    <div class="border-y-4 my-2 border-gray-200 mb-0"></div>
                </div>
    
                <!-- new row -->
                <div class="mx-0 md:flex mb-6 gap-3">
                    <!-- left side -->
                    <div
                        class="w-1/2 text-base flex-col mb-0 border border-gray-200 p-1"
                    >
                        <!-- patient with injuries -->
                        <div
                            class="text-center rounded-md text-white w-auto mb-5 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Patient with Injuries</p>
                        </div>
    
                        <div>
                    <div class="text-base flex flex-row ml-1 mb-4">
                    <!-- Option yes -->
                    <div class="w-1/2">
                        <label class="text-base font-normal inline-flex items-center ml-2">
                        <input
                            type="radio"
                            class="cursor-pointer form-radio w-6 h-6 items-center"
                            name="pain_with_injuries_choices"
                            value="Yes"
                            @click="toggleInjuryOptions(true)"
                        />
                        <span class="ml-2">Yes</span>
                        </label>
                        <!-- Options for yes -->
                        <div
                        class="text-base flex flex-col mb-0 my-3 ml-2"
                        :class="{ 'opacity-50': painCategory === 'None' || !painCategory }"
                        >
                        <label
                            class="text-grey-200 text-sm font-medium mb-2"
                            for="injury-type"
                        >
                            <i>If Yes, select type/s of injury:</i>
                        </label>
                        <div class="w-full">
                            <ul>
                            <li v-for="injury in injuries" :key="injury.value">
                                <label class="text-base font-normal inline-flex items-center">
                                <input
                                    type="checkbox"
                                    class="form-checkbox w-4 h-4 items-center"
                                    :disabled="painCategory === 'None' || !painCategory"
                                    v-model="form.selectedInjuries"
                                    :value="injury.value"
                                />
                                <span class="ml-2">{{ injury.label }}</span>
                                </label>
                            </li>
                            <li>
                                <div class="w-1/ flex">
                                <label
                                    for="injury-type"
                                    class="text-base font-normal inline-flex items-center"
                                >
                                    <input
                                    id="injury-type-others"
                                    type="checkbox"
                                    class="form-checkbox w-4 h-4 items-center"
                                    :disabled="painCategory === 'None' || !painCategory"
                                    v-model="form.selectedInjuries"
                                    value="Others"
                                    />
                                    <span class="ml-2 mr-2">Others:</span>
                                </label>
                                <input
                                    v-model="form.selectedInjuriesInput"
                                    id="injury-others-input"
                                    type="text"
                                    placeholder="others.."
                                    value=""
                                    name="pain_with_other"
                                    class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1"
                                    :disabled="painCategory === 'None' || !painCategory"
                                />
                                </div>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                
                    <!-- Option none -->
                    <div class="w-1/2">
                        <label class="text-base font-normal inline-flex items-center">
                        <input
                            type="radio"
                            class="cursor-pointer form-radio w-6 h-6 items-center"
                            name="pain_with_injuries_choices"
                            value="None"
                            @click="toggleInjuryOptions(false)"
                        />
                        <span class="ml-2">None</span>
                        </label>
                    </div>
                    </div>
                </div>
                        <!-- line -->
                        <div class="border-y-4 my-2 border-gray-200 mb-3"></div>
    
                        <div
                            class="text-center rounded-md text-white w-auto mb-3 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Glasgow Coma Scale</p>
                        </div>
    
                        <div class="flex flex-col">
                            <div class="w-full flex-row">
                                <!-- EYE -->
                                <div class="w-full flex flex-row mb-2 gap">
                                    <div class="w-1/2 flex flex-col justify-center text-center border border-gray-500 bg-green-100">
                                        <p class="uppercase font-medium text-xl">EYE</p>
                                    </div>
                                    <div class="w-full border border-gray-500 p-1 flex">
                                        <ul class="ml-2">
                                            <li v-for="score in [4, 3, 2, 1]" :key="score">
                                                <label class="text-base font-normal inline-flex items-center">
                                                    <input
                                                        type="radio"
                                                        class="form-radio w-4 h-4 items-center"
                                                        name="eye_glasgow_coma_scale"
                                                        :value="score.toString()"
                                                        v-model="form.selectedEyeScore"
                                                    />
                                                    <span class="ml-2 text-lg"> {{ score }} - Opens {{ score === 1 ? 'to' : 'Spontaneously' }} {{ score === 1 ? 'Pain' : score === 2 ? 'to Speech/Voice' : score === 3 ? 'to Pain' : '' }} </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                                        <p id="eye-scale-score" class="font-medium text-xl">{{ form.selectedEyeScore }}</p>
                                    </div>
                                </div>
    
                                <!-- Verbal -->
                                <div class="w-full flex flex-row mb-2 gap">
            <div class="w-1/2 flex flex-col justify-center text-center border border-gray-500 bg-green-100">
                <p class="uppercase font-medium text-xl">Verbal</p>
            </div>
            <div class="w-full border border-gray-500 p-1 flex">
                <ul class="ml-2">
                    <li v-for="score in [5, 4, 3, 2, 1]" :key="score">
                        <label class="text-base font-normal inline-flex items-center">
                            <input
                                type="radio"
                                class="form-radio w-4 h-4 items-center"
                                name="verbal_glasgow_coma_scale"
                                :value="score.toString()"
                                v-model="form.selectedVerbalScore"
                            />
                            <span class="ml-2 text-lg">
                                {{ score }} - {{ getVerbalDescription(score) }}
                            </span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                <p id="verbal-scale-score" class="font-medium text-xl">{{ form.selectedVerbalScore }}</p>
            </div>
        </div>
                                <!-- Motor -->
                                <div class="w-full flex flex-row mb-2 gap">
            <div class="w-1/2 flex flex-col justify-center text-center border border-gray-500 bg-green-100">
                <p class="uppercase font-medium text-xl">Motor</p>
            </div>
            <div class="w-full border border-gray-500 p-1 flex">
                <ul class="ml-2">
                    <li v-for="score in [6, 5, 4, 3, 2, 1]" :key="score">
                        <label class="text-base font-normal inline-flex items-center">
                            <input
                                type="radio"
                                class="form-radio w-4 h-4 items-center"
                                name="motor_glasgow_coma_scale"
                                :value="score.toString()"
                                v-model="form.selectedMotorScore"
                            />
                            <span class="ml-2 text-lg">
                                {{ score }} - {{ getMotorDescription(score) }}
                            </span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                <p id="motor-scale-score" class="font-medium text-xl">{{ form.selectedMotorScore }}</p>
            </div>
        </div>
                            </div>
                        </div>
                        <div class="w-full flex flex-row mb-2">
                <div class="w-full flex flex-row justify-center text-right p-2 py-4 border border-gray-500 bg-green-100 gap-2">
                    <p class="uppercase font-medium">Total Score:</p>
                    <p id="scale-total" class="uppercase font-bold">
                        {{ getTotalScore() }}
                    </p>
                </div>
            </div>
                    </div>
    
                    <!-- right side -->
                    <div
                        class="w-1/2 text-base text-left flex-col mb-0 border border-gray-200 p-1"
                    >
                        <!-- label -->
                        <div
                            class="text-center rounded-md text-white w-auto mb-3 p-1 bg-[#186434]"
                        >
                            <p class="font-medium">Incident</p>
                        </div>
    
                        <!-- new container for input -->
                        <div>
                            <div class="mx-0 md:flex flex flex-row mb-0 gap-4 px-3">
                                <div class="w-1/2 text-left mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                        for="body-noi"
                                    >
                                        NOI
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="body-noi"
                                        type="text"
                                        name="noi"
                                        v-model="form.noi"
                                    />
                                </div>
    
                                <div class="w-1/2 text-base text-left mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                        for="body-poi"
                                    >
                                        POI
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="body-poi"
                                        type="text"
                                        name="poi"
                                        v-model="form.poi"
                                    />
                                </div>
                            </div>
    
                            <div class="mx-0 md:flex flex flex-row mb-1 gap-4 px-3">
                                <div class="w-1/2 text-left mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                        for="body-doi"
                                    >
                                        DOI
                                    </label>
                                    <div class="relative max-w-sm">
                                        <input
                                            type="date"
                                            id="body-doi"
                                            max="{{ now()->toDateString() }}"
                                            name="doi"
                                            v-model="form.doi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500"
                                            placeholder="Select date"
                                        />
                                    </div>
                                </div>
    
                                <div class="w-1/2 text-base text-left mb-0">
                                    <label
                                        class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                        for="body-toi"
                                    >
                                        TOI
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="body-toi"
                                        type="text"
                                        name="toi"
                                        v-model="form.toi"
                                    />
                                </div>
                            </div>
                            <div class="border-y-4 my-2 border-gray-200 mb-5"></div>
                        </div>
   

                        <div class="flex flex-col text-center">
                            <div class="w-full bg-[#186434] rounded-md text-white flex-row">
                                <p class="font-medium">Head</p>
                            </div>
                            <div class="flex flex-row justify-center p-3">
                                <div class="relative" @click="addMark($event, 'head')">
                                <img src="/images/medical.png" alt="head image" class="w-64 h-auto">
                                <template v-for="(mark, index) in marks.head" :key="index">
                                    <div :style="{ top: mark.y + 'px', left: mark.x + 'px', width: mark.size + 'px', height: mark.size + 'px' }" class="absolute rounded-full glowing-circle"></div>
                                </template>
                                </div>
                        
                                <div class="flex flex-col justify-center gap-3 ml-20">
                                <p class="text-blue-700 text-xs font-semibold italic">Tap on head to put mark/s</p>
                                <input type="range" v-model="headSliderValue" min="5" max="50" step="1">
                                <button @click="resetMarks('head')" type="button" class="bg-red-500 text-white p-2 rounded w-14 h-9">Reset</button>
                                </div>
                            </div>

                            <input v-model="form.headmark" class="hidden"/>
                        </div>
                        
                        <div class="flex flex-row justify-center items-center p-3">
                            <div @click="addMark($event, 'body')" class="relative">
                                <img src="/images/bodymed.png" alt="body image" class="w-80 h-auto">
                                <template v-for="(mark, index) in marks.body" :key="index">
                                <div :style="{ position: 'absolute', top: mark.y + 'px', left: mark.x + 'px', width: mark.size + 'px', height: mark.size + 'px' }" class="rounded-full glowing-circle"></div>
                                </template>
                            </div>
                            <div class="flex flex-col justify-center gap-3 ml-6">
                                <p class="text-blue-700 text-xs font-semibold italic">Tap on body to put mark/s</p>
                                <input type="range" v-model="bodySliderValue" min="5" max="50" step="1">
                                <button @click="resetMarks('body')" type="button" class="bg-red-500 text-white p-2 rounded w-14 h-9">Reset</button>
                            </div>

                            <input v-model="form.bodymark" class="hidden"/>
                        </div>

                    </div>
                </div>
    
                <div class="mx-0 md:flex flex-col text-center">
                    <div class="flex-row mb-4">
                        <label
                            class="uppercase tracking-wide inline-flex text-grey-darker text-sm font-bold mb-2"
                            for="attending-physician"
                        >
                            Attending Physician:
                        </label>
                        <div class="inline-flex">
                            <select
                                class="bg-grey-lighter w-80 border border-grey-lighter text-grey-darker py-2 px-4 pr-8 rounded"
                                id="attending-physician"
                                v-model="form.selectedPhysician" 
                                required
                                oninvalid="this.setCustomValidity('Choose attending physician')"
                                oninput="this.setCustomValidity('')"
                            >
                                <option value="">Select Physician</option>
                                <option
                                    v-for="physician in physicianList"
                                    :key="physician.staff_id" 
                                    :value="physician.staff_id.toString()" 
                                >
                                {{ physician.first_name }} {{ physician.last_name }} (  {{ physician.specialization }} )
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

    
                <button type="submit" 
                        v-if="form.selectedPhysician && !isLoading" 
                        class="border border-stone-50 p-1 w-full bg-[#186434] hover:bg-green-900 text-white font-bold py-3 px-12 rounded-md"
                        @click="submit"
                >
                <span>Submit</span>
                </button>
                <button type="submit" 
                        v-else 
                        class="border border-stone-50 p-1 w-full bg-[#186434] hover:bg-green-900 text-white font-bold py-3 px-12 rounded-md"
                        disabled 
                >
                <span v-if="isLoading">Loading...</span>
                <span v-else> <i>Select attending physican first in order to submit the form</i></span>
                </button>
            </form>
        </div>
    </template>
    
<script>

import Swal from "sweetalert2";

const currentURL = window.location.href;
const urlParts = currentURL.split('/');
const patient_id = urlParts[urlParts.length - 1];
const patient_type = urlParts[urlParts.length - 3];

    export default {
      data() {
        return {
            form: {
                selectedPurpose: '',
                selectedCategory:'',
                selectedSubcategory: '',
                otherSubCategory: '',
                mode_of_arrival: '',
                selectedInjuries: [],
                selectedInjuriesInput: '',
                selectedAllergies: [], 
                selectedFamilyHistory: [],
                selectedFamilyHistoryOtherInput:'',
                selectedMedicalHistory: [],
                selectedMedicalHistoryOtherInput: '',
                bloodpressure: '',
                temperature: '',
                pulse_rate: '',
                respiratory_rate: '',
                oxygen_sat: '',
                lmp: '',
                otherAllergies: '',
                height: '',
                weight: '',
                bmi: '',
                noi:'',
                doi:'',
                toi:'',
                poi:'',
                selectedEyeScore:'',
                selectedVerbalScore:'',
                selectedMotorScore:'',
                selectedPain: '',
                headmark: [],
                bodymark: [],
                selectedPhysician:'',
                consulted_by: this.$page.props.auth.user.staff_id,
                patient_id_number: patient_id,
                patient_type: patient_type,

         },
         selectedSubcategory:'',
          searchTerm: '',
          showToast: false,
          toastMessage: '',
          success: false,
          formattedDate: '',
          mode_of_arrival:'',
          categories: {
                    'None': ['None'],
                    'Essentially Normal': ['Essentially Normal'],
                    'Dermatology': ['Allergy', 'Dermatoses', 'Infection', 'Viral Exanthem', 'Others'],
                    'Head': ['Headache', 'Others'],
                    'Eyes': ['Error of Refraction', 'Foreign Body', 'Conjunctivitis', 'Others'],
                    'Mouth, ENT': ['Dental Caries', 'Otitis', 'Hearing Loss', 'Vertigo', 'Rhinities', 'Sinusitis', 'Tonsillitis', 'Others'],
                    'Respiratory': ['URTI', 'Bronchitis', 'Asthma', 'Pneumonia', 'PTB', 'Covid-19', 'Others'],
                    'Cardiovascular': ['Hypertension', 'Hypotension', 'Angina Pectoris', 'Ischemic HD', 'Myocardial Infarction', 'Others'],
                    'Gastrointestinal': ['Gastroenteritis', 'Gastritis', 'GERD', 'Hepatitis', 'Ulcer', 'Cancer', 'Others'],
                    'Genitourinary': ['UTI', 'Kidney stones', 'CKD', 'Others'],
                    'Reproductive': ['Dysmenorrhea', 'Infection', 'Tumor/Polyp', 'Cancer', 'Others'],
                    'Endocrinology': ['Diabetes Mellitus', 'Hyperthyroidism', 'Hypothyroidism', 'Others'],
                    'Musculoskeletal': ['Fracture', 'Sprain/Strain', 'Others'],
                    'Trauma': ['Laceration', 'Abrasion', 'Avulsion', 'Burn', 'Concussion', 'Others'],
                    'Psychiatric': ['Psychiatric', 'Others'],
                    'Hematologic': ['Anemia', 'Others'],
                    'Neurologic': ['NCA/Syncope', 'CVD', 'Others'],
                },
          subcategories: [],
    

         
         selectedValuableCategory: '',
          selectedValuable: '',
          valuableOptions: [
            { value: 'Patient', label: 'Patient' },
            { value: 'Relative', label: 'Relative' },
            { value: 'Companion', label: 'Companion' },
            { value: 'CVSU Security', label: 'CvSU Security on Duty' }
          ],
          height: '',
          weight: '',
          bmi: '',
          bmiCategory: '',
          bmiCategoryClass: '',
          selectedAllergies: [],
          otherAllergies: '',
          selectedFamilyHistory: [],
          otherFamilyHistory: '',
          familyHistoryOptions: [
            { label: 'PTB', value: 'PTB' },
            { label: 'DM', value: 'DM' },
            { label: 'Cancer', value: 'Cancer' },
            { label: 'Cardiovascular', value: 'Cardiovascular' }
    
        ],
        selectedMedicalHistory: [],
            otherMedicalHistory: '',
            medicalHistoryOptions: [
                { label: 'Seizure', value: 'Seizure' },
                { label: 'Asthma', value: 'Asthma' },
                { label: 'Cardio', value: 'Cardio' },
                { label: 'PTB', value: 'PTB' },
                { label: 'Surgery', value: 'Surgery' },
                { label: 'OBGyne', value: 'OBGyne' },
                { label: 'Neuro', value: 'Neuro' }
            
        ],
        painChoice: '',      // Variable to store the selected option for pain
        selectedPain: '',
    
        painLevels: [ // Array containing pain scale options with image URLs and labels
            { value: '0', image: '/images/0.png', label: 'No Pain' },
            { value: '1-2', image: '/images/1-2.png', label: 'Mild Pain' },
            { value: '3-4', image: '/images/3-4.png', label: 'Moderate Pain' },
            { value: '5-6', image: '/images/5-6.png', label: 'Severe Pain' },
            { value: '7-8', image: '/images/7-8.png', label: 'Very Severe Pain' },
            { value: '9-10', image: '/images/9-10.png', label: 'Worst Possible Pain' }
        ],
        selectedEyeScore: null,
        selectedVerbalScore: null,
        selectedMotorScore: null,
        painCategory: '',
          injuries: [
            { value: 'Abrasion', label: 'Abrasion' },
            { value: 'Contusion', label: 'Contusion' },
            { value: 'Fracture', label: 'Fracture' },
            { value: 'Laceration', label: 'Laceration' },
            { value: 'Puncture', label: 'Puncture' },
            { value: 'Sprain', label: 'Sprain' }
          ],

          marks: {
          head: [],
          body: []
        },
        headSliderValue: 20, 
        bodySliderValue: 20 ,
        physicianList: [],
        isLoading: false,

    
    
    };
      },
      mounted() {
        const currentDate = new Date();
        const monthNames = [
          'January', 'February', 'March', 'April', 'May', 'June',
          'July', 'August', 'September', 'October', 'November', 'December'
        ];
        const month = monthNames[currentDate.getMonth()];
        const day = currentDate.getDate();
        const year = currentDate.getFullYear();
        this.formattedDate = `${month} ${day}, ${year}`;

        axios.get('/api/physicians')
        .then(response => {
            this.physicianList = response.data;
        })
        .catch(error => {
            console.error('Error fetching attending physicians:', error);
        });

      },
      methods: {
        submit() {
            
            if (this.isLoading) {
                return;
            }

            this.isLoading = true;

            axios.post('/api/consultation' , this.form)
            .then(response => {


                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "The consultation has been saved",
                    showConfirmButton: false,
                    timer: 1500
                });

                console.log(response);
            })
            .catch(error => {
                console.error('Error fetching attending physicians:', error);
            }).finally(() => {
          // Reset loading state to false after request is completed
             this.isLoading = false;
        });


        },
        resetCategory() {
                this.selectedSubcategory = '';
                this.form.otherSubCategory = '';
                this.otherSubCategory = '';
                this.updateSubcategories();
            },
            updateSubcategories() {
                this.subcategories = this.categories[this.form.selectedCategory] || [];

            },
            resetOtherSubcategory() {
                if (this.selectedSubcategory !== 'Others') {
                        this.form.otherSubCategory = '';                  
                    }

            },

        calculateBMI() {
          if (this.height && this.weight) {
            const heightInMeters = this.height / 100;
            this.bmi = (this.weight / (heightInMeters * heightInMeters)).toFixed(2);
            this.determineBMICategory();
            this.setBMICategoryClass(); 
          } else {
            this.bmi = '';
            this.bmiCategory = '';
            this.bmiCategoryClass = ''; 
          }
        },
        determineBMICategory() {
          const bmiValue = parseFloat(this.bmi);
          if (bmiValue < 18.5) {
            this.bmiCategory = 'Underweight';
          } else if (bmiValue < 24.9) {
            this.bmiCategory = 'Normal weight';
          } else if (bmiValue < 29.9) {
            this.bmiCategory = 'Overweight';
          } else if (bmiValue < 34.9) {
            this.bmiCategory = 'Obesity Class I';
          } else if (bmiValue < 39.9) {
            this.bmiCategory = 'Obesity Class II';
          } else {
            this.bmiCategory = 'Obesity Class III';
          }
        },
        setBMICategoryClass() {
          switch (this.bmiCategory) {
            case 'Underweight':
              this.bmiCategoryClass = 'text-blue-500';
              break;
            case 'Normal weight':
              this.bmiCategoryClass = 'text-green-500';
              break;
            case 'Overweight':
              this.bmiCategoryClass = 'text-yellow-500';
              break;
            default:
              this.bmiCategoryClass = 'text-red-500';
          }
        },
        toggleValuableOptions(enableOptions) {
          this.selectedValuableCategory = enableOptions ? 'Yes' : 'None';
          if (!enableOptions) {
            this.selectedValuable = '';
          }
        },
        updateSelectedPain(value) {
            if (this.painChoice === 'None') {
                // Reset the selectedPain when None is selected
                this.form.selectedPain = '';
            } else {
                // Update the selectedPain when a pain level is selected
                this.form.selectedPain = value;
            }
        },
        resetPainScale(){
            this.form.selectedPain = '';
        },
        getVerbalDescription(score) {
                switch (score) {
                    case 5:
                        return 'Oriented';
                    case 4:
                        return 'Confused';
                    case 3:
                        return 'Inappropriate Words';
                    case 2:
                        return 'Incomprehensible Words';
                    case 1:
                        return 'No Response';
                    default:
                        return '';
                }
        },
        getMotorDescription(score) {
            switch (score) {
                case 6:
                    return 'Obeys Commands';
                case 5:
                    return 'Localizes Pain';
                case 4:
                    return 'Withdrawal Signs';
                case 3:
                    return 'Flexion to Pain';
                case 2:
                    return 'Extension to Pain';
                case 1:
                    return 'No Response';
                default:
                    return '';
            }
        },
        getTotalScore() {
                const eyeScore = parseInt(this.form.selectedEyeScore) || 0;
                const verbalScore = parseInt(this.form.selectedVerbalScore) || 0;
                const motorScore = parseInt(this.form.selectedMotorScore) || 0;
                return eyeScore + verbalScore + motorScore;
        },
        toggleInjuryOptions(enableOptions) {
          this.painCategory = enableOptions ? 'Yes' : 'None';
          if (!enableOptions) {
            this.form.selectedInjuries = [];
          }
        },
        addMark(event, area) {
            const x = event.offsetX;
            const y = event.offsetY;
            const size = area === 'head' ? this.headSliderValue : this.bodySliderValue;
            this.marks[area].push({ x, y, size });

            // Store the values in the form object
            if (area === 'body') {
                this.form.bodymark.push({ x, y, size });
                console.log('Body Mark Added:', { x, y, size });
            } else if(area === 'head') {
                this.form.headmark.push({ x, y, size });
                console.log('Head Mark Added:', { x, y, size });
            }
        },

        resetMarks(area) {
            this.marks[area] = [];
            if (area === 'body') {
                this.form.bodymark =[];
            } else if (area === 'head'){
                this.form.headmark =[];
            }
        }
        
        
      },
    
    };
    </script>

<style scoped>
    .glowing-circle {
        animation: glow 1.5s infinite alternate;
        }
        
        @keyframes glow {
        0% {
            box-shadow: 0 0 10px 0px rgba(255, 0, 0, 0.5);
        }
        100% {
            box-shadow: 0 0 20px 10px rgba(255, 0, 0, 0.5);
        }
        }
</style>