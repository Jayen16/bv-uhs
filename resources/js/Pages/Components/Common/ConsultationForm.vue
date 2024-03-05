<script setup>
import HeadAndBody from "@/Pages/Components/Common/HeadAndBody.vue";
import Button from "@/Components/Button.vue";
</script>

<template>
<div class="bg-white p-6">


        

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mt-10 mr-5 flex flex-col my-2 w-full">

    

        <div class="text-center rounded-md text-xl text-white w-auto mb-4 py-4 p-3 bg-[#186434] ">
            <p class="uppercase font-bold">Consultation Form</p>
        </div>

        <div>
            <!-- <livewire:livewire_components.profile-preview :patient_id="$patient_id" :record_number="''"/> -->
            
        </div>

        
        <div>
            <!-- <livewire:livewire_components.consultation-form :patient_id="$patient_id" :patient_type="'student'"/> -->
        </div>
        
       
   
    </div>



    
<div class="text-center rounded-md text-white w-auto mb-5 p-3 bg-[#186434] " >
    <p class="uppercase font-medium">Assessment Section</p>
</div>



<!--new row  -->
<div class="mx-0 md:flex mb-6">
<!-- date and case no. -->
    <div class="w-1/2 text-base text-left flex-col mb-0">
        <p class="font-bold">Case No. : <span class="font-medium">#######</span></p> 
    </div>
    <div class="w-1/2 text-base text-right flex-col mb-0">
        <p class="font-bold">Date: <span class="current-date font-medium"> Asia/Manila time 
        </span></p>
    </div>
</div>

<!-- new row -->

<form >

    
<div class="mx-0 md:flex mb-3 gap-6">
    <div class="w-1/4 text-base text-left flex-col mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-category">
            Consultation Category <span class="text-red-600 text-lg text-bold">*</span>
        </label>
        <select wire:model="selectedPurpose" class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="consultation-category" required>
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
        <select   id="mainOption" class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
            <option selected value="">select complaint</option>

                 <option value="">main category loop</option>
        </select>  
    </div>
 
    <!-- sub category -->
    <div class="w-1/4 text-base text-left flex-col mb-0">
        <label for="dependentOption" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Sub-Category <span class="text-red-600 text-lg text-bold">*</span>
        </label>
        <select   id="dependentOption" class="placeholder placeholder-text w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                <option value="">sub category based sa main</option>  
       
        </select>
    </div>


    <div class="w-1/4 text-base text-left flex-col mb-0">
        <label for="complaintOthers" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
            Other subcategories
        </label>
         <input  id="complaintOthers" type="text" placeholder="others.." class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
    </div>
 
</div>

<!-- line -->
<div class="border-y-4 my-2 border-gray-200 mb-2"></div>

<!-- new row -->
<div class="mx-0 md:flex mb-1 gap-3">
    <!-- Mode of Arrival -->
    <div class="w-1/2 text-base text-left flex-col mb-0" >
        <div class="text-center rounded-md text-white w-auto mb-7 p-1 bg-[#186434]">
            <p class="font-medium">Mode of Arrival</p>
        </div>   
        <!-- MOA options -->
        <div class="mx-0 md:flex flex-row gap-16 ml-2">
            <div>
                <label class="text-base font-normal inline-flex items-center">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center" name="modeOfArrival" value="ambulatory" >
                    <span class="ml-2">Ambulatory</span>
                </label>
            </div>
            <div>
                <label class="text-base font-normal inline-flex items-center">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center" name="modeOfArrival" value="assisted" >
                    <span class="ml-2">Assisted</span>
                </label>
            </div>
            <div class="mb-4">
                <label class="text-base font-normal inline-flex items-center">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center" name="modeOfArrival" value="cuddled" >
                    <span class="ml-2">Cuddled/Carried</span>
                </label>
            </div>
        </div>
        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>

        <!-- Valuables -->
        <div class="text-center rounded-md text-white w-auto mb-5 p-1 bg-[#186434]">
            <p class="font-medium">Valuables</p>
        </div>    

        <!-- Valuables Option -->
        <div class="text-base flex flex-row mb-28 my-6" x-data="{ selected: '' }">
            <div class="w-1/2">
                <label class="text-base font-normal inline-flex items-center ml-2">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center"  name="valuable_choice" value="Yes">
                    <span class="ml-2">Yes</span>
                </label>
                <!-- options for yes -->
                <div class="text-base flex flex-col mb-0 my-3 ml-2">
                    <label class="text-grey-200 text-sm font-medium mb-2" for="item-release">
                        <i>If Yes, items were released to:</i>
                    </label>
                    <div class="w-full" x-show="selected === 'Yes'">
                        <ul>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="valuable" value="Patient" >
                                    <span class="ml-2">Patient</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="valuable" value="Relative" >
                                    <span class="ml-2">Relative</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="valuable" value="Companion" >
                                    <span class="ml-2">Companion</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="valuable" value="CVSU Security" >
                                    <span class="ml-2">CvSU Security on Duty</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <label class="text-base font-normal inline-flex items-center">
                    <input type="radio" x-model="selected" class="cursor-pointer form-radio w-6 h-6 items-center" name="valuable_choice" value="None">
                    <span class="ml-2">None</span>
                </label>
            </div>
        </div>
        
        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
    </div>

    
    <!-- new row -->
    <div class="w-1/2 text-base flex-row mb-0">

        <!-- Allergies -->
        <div class="text-center rounded-md text-white w-auto mb-6 p-1 bg-[#186434] ">
            <p class="font-medium">Allergies</p>
        </div>    
        <!-- new row -->
        <div class="w-full text-base text-left flex flex-row mb-6 gap-6 justify-center">
            <div class="w-1/3 ml-2 items-center">
                <label class="text-base font-normal inline-flex items-center">
                    <input type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center" name="allergies[]" value="Food" >
                    <span class="ml-2">Food</span>
                </label>
            </div>
            <div class="w-1/3">
                <label class="text-base font-normal inline-flex items-center">
                    <input type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center" name="allergies[]" value="Drugs" >
                    <span class="ml-2">Drugs</span>
                </label>
            </div>
            <div class="w-full flex">
                <label class="text-base font-normal inline-flex mr-2">
                    <input id="allergy-others-checkbox" type="checkbox" class="cursor-pointer form-radio w-6 h-6 items-center" >
                    <span class="ml-1">Others:</span>
                </label>
                <input id="allergy-others-input" type="text" placeholder="others.." value="" class="cursor-pointer form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" name="otherAllergies" >
            </div> 
        </div>
        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200"></div>

        <!-- Vital Signs -->
        <div class="text-center rounded-md text-white w-auto mb-6 p-1 bg-[#186434] ">
            <p class="font-medium">Vital Signs</p>
        </div>    
        <div class="w-full text-base text-left flex flex-row mb-2 gap-6">
            <div class="w-1/4 text-base flex-col ml-2">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-blood-pressure">
                    Blood Pressure
                </label>
                <input name="bloodpressure"  type="text" 
                    placeholder="eg. 120/70" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    pattern="\d+/\d+" title="Please enter blood pressure in the format: 120/90" oninput="this.value = this.value.replace(/[^0-9/]/g, '');">         
            </div> 
            <div class="w-1/4 text-base flex-col ml-2 relative">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-temperature">
                    Temperature C°
                </label>
                <div class="relative">
                    <input name="temperature"  type="text" placeholder="" 
                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 pr-12 mb-3"
                           oninput="this.value = this.value.replace(/[^0-9/]/g, '');">
                </div>
            </div>
            
            <div class="w-1/4 text-base flex-col ml-2">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-pulse-rate">
                    Pulse Rate
                </label>
                <input name="pulse_rate"  type="text" placeholder="" 
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
            </div>
            <div class="w-1/4 text-base flex-col ml-2">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-respiratory-rate">
                    Respiratory Rate
                </label>
                <input name="respiratory_rate" type="text" placeholder="" 
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
            </div>
        </div>
        <!-- next row -->
        <div class="w-full text-base text-left flex flex-row mb-0 gap-6">
            <div class="w-1/4 text-base flex-col ml-2">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-oxygen-sat">
                    Oxygen Sat
                </label>
                <input name="oxygen_sat"  type="text" placeholder="" 
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                 oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
            </div>

            <div class="w-1/3 text-base flex-col ml-2">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="consultation-lmp">
                    LMP 
                </label>

                <div class="relative max-w-sm" >
                    <input  name="lmp" type="date"  
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" 
                    >
              
                </div>
            </div>
        </div>
    <!-- next row -->

        <!-- @livewire('livewire_components.bmi-calculator')           -->

        <div class="w-full text-base text-left flex flex-row mb-4 gap-6"> </div>

        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200 mb-2"></div>
    </div>
</div>

<div class="text-center rounded-md text-white w-auto mb-3 p-2 bg-[#186434] ">
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
                    <input id="option-history-ptb" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="PTB"  >
                    <span class="ml-2">PTB</span>
                </label>
            </div>
            <div>
                <label for="option-history-dm" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-dm" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="DM"  >
                    <span class="ml-2">DM</span>
                </label>
            </div>
            <div>
                <label for="option-history-cancer" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-cancer" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="Cancer"  >
                    <span class="ml-2">Cancer</span>
                </label>
            </div>
            <div>
                <label for="option-history-cardiovascular" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-cardiovascular" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="family_history[]" value="Cardiovascular"  >
                    <span class="ml-2">Cardiovascular</span>
                </label>
            </div>
            <div class="w-full flex">
                <label for="option-history-others" class="text-base font-normal inline-flex items-center mr-2">
                <input id="input-history-others" type="text" placeholder="others.." value="" class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" name="other_family_history"  >

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
                    <input id="option-history-seizure" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Seizure"  >
                    <span class="ml-2">Seizure</span>
                </label>
            </div>
            <div class="w-1/4">
                <label for="option-history-asthma" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-asthma" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Asthma"  >
                    <span class="ml-2">Asthma</span>
                </label>
            </div>
            <div class="w-1/4">
                <label for="option-history-cardio" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-cardio" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Cardio"  >
                    <span class="ml-2">Cardio</span>
                </label>
            </div>
            <div class="w-1/2">
                <label for="option-history-ptb" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-ptb" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="PTB"  >
                    <span class="ml-2">PTB</span>
                </label>
            </div>
        </div>

        <!-- new row -->
        <div class="mx-0 md:flex flex-row gap-6 ml-2 mb-3 justify-center">
            <div class="w-1/4">
                <label for="option-history-surgery" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-surgery" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Surgery"  >
                    <span class="ml-2">Surgery</span>
                </label>
            </div>
            <div class="w-1/4">
                <label for="option-history-ob" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-ob" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="OBGyne"   >
                    <span class="ml-2">OBGyne</span>
                </label>
            </div>
            <div class="w-1/4">
                <label for="option-history-neuro" class="text-base font-normal inline-flex items-center">
                    <input id="option-history-neuro" type="checkbox" class="cursor-pointer form-checkbox w-6 h-6 items-center"  name="medical_history[]" value="Neuro"  >
                    <span class="ml-2">Neuro</span>
                </label>
            </div>
            <div class="w-1/2 flex">
                <label for="option-medical-history-neuro" class="text-base font-normal inline-flex mr-2">
                  <input id="input-medical-history-others" type="text" placeholder="others.." value="" class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" name="other_medical_history" >
                    <span class="ml-2">Others</span>
                </label>
            </div>
        </div>
        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200 mb-3"></div>
    </div>
</div>

<div class="mx-0  md:flex flex-col mb-3 gap-3 " >
<!-- label -->
    <div class="text-center rounded-md text-white w-full mb-3 p-1 bg-[#186434]">
        <p class="font-medium">Patient with pain</p>
    </div> 
    

    <div class="mx-0 md:flex inline-flex mb-4 gap-6 justify-center">
        <label for="option-pain-yes" class="text-base font-normal inline-flex items-center ml-2">
            <input type="radio"  class=" cursor-pointer w-6 h-6 items-center" name="pain_with_pain_choice" value="Yes" >
            <span class="ml-2">Yes</span>                      
        </label>
        
        <label for="option-pain-none" class="text-base font-normal inline-flex items-center">
            <input type="radio"   class=" cursor-pointer w-6 h-6 items-center" name="pain_with_pain_choice" value="None" id="option-pain-none"  >
            <span class="ml-2">None</span>
        </label>
    </div>

    <!-- pain scale range -->
    <div class="text-base font-normal inline-flex justify-center items-center gap-8 mb-3" >
        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-0" class="cursor-pointer flex items-center">
                <input id="pain-0" type="radio" name="selectedPain" value="0"  class="hidden" >
                    <img src="/images/0.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>

        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-1-2" class="cursor-pointer flex items-center">
                <input id="pain-1-2" type="radio" name="selectedPain" value="1-2"  class="hidden" >
                    <img src="/images/1-2.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>
        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-3-4" class="cursor-pointer flex items-center">
                <input id="pain-3-4" type="radio" name="selectedPain" value="3-4"  class="hidden" >
                    <img src="/images/3-4.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>
        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-5-6" class="cursor-pointer flex items-center">
                <input id="pain-5-6" type="radio" name="selectedPain" value="5-6"  class="hidden" >
                    <img src="/images/5-6.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>
        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-7-8" class="cursor-pointer flex items-center">
                <input id="pain-7-8" type="radio" name="selectedPain" value="7-8"  class="hidden" >
                    <img src="/images/7-8.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>
        <div class="w-1/6 p-1 bg-gray-100 border border-gray-500 transition duration-200 ease-in-out hover:bg-green-200">      
            <label for="pain-9-10" class="cursor-pointer flex items-center">
                <input id="pain-9-10" type="radio" name="selectedPain" value="9-10"  class="hidden" >
                    <img src="/images/9-10.png" alt="" class="rounded-lg shadow-md max-w-full h-auto">
            </label>
        </div>


        <div class="w-1/6" >
            <label class="uppercase block tracking-wide text-grey-darker text-xs font-bold mb-2" for="pain-scale">
                Pain Scale
            </label>
            <input id="pain-scale" type="text" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" >
        </div>
    </div>
    <!-- line -->
    <div class="border-y-4 my-2 border-gray-200 mb-0"></div>
</div>


<!-- new row -->
<div class="mx-0 md:flex mb-6 gap-3" >
    <!-- left side -->
    <div class="w-1/2 text-base flex-col mb-0 border border-gray-200 p-1">
        <!-- patient with injuries -->
        <div class="text-center rounded-md text-white w-auto mb-5 p-1 bg-[#186434]">
            <p class="font-medium">Patient with Injuries</p>
        </div>

        <div class="text-base flex flex-row ml-1 mb-4">
            <!-- option yes -->
            <div class="w-1/2"> 
                <label class="text-base font-normal inline-flex items-center ml-2">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center" name="pain_with_injuries_choices" value="Yes" >
                    <span class="ml-2">Yes</span>                      
                </label>
                <!-- options for yes -->
                <div class="text-base flex flex-col mb-0 my-3 ml-2">
                    <label class="text-grey-200 text-sm font-medium mb-2" for="injury-type">
                        <i>If Yes, select type/s of injury:</i>
                    </label>
                    <div class="w-full"  >
                        <ul>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center"name="pain_with_injuries[]" value="Abrasion" >
                                    <span class="ml-2">Abrasion</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center" name="pain_with_injuries[]" value="Contusion" >
                                    <span class="ml-2">Contusion</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center" name="pain_with_injuries[]" value="Fracture" >
                                    <span class="ml-2">Fracture</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center" name="pain_with_injuries[]" value="Laceration" >
                                    <span class="ml-2">Laceration</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center" name="pain_with_injuries[]" value="Puncture" >
                                    <span class="ml-2">Puncture</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox w-4 h-4 items-center" name="pain_with_injuries[]" value="Sprain" >
                                    <span class="ml-2">Sprain</span>
                                </label>
                            </li>
                            <li>
                                <div class="w-1/ flex">
                                    <label for="injury-type" class="text-base font-normal inline-flex items-center">
                                        <input id="injury-type-others" type="checkbox" class="form-checkbox w-4 h-4 items-center" >
                                        <span class="ml-2 mr-2">Others:</span>
                                    </label>
                                    <input id="injury-others-input" type="text" placeholder="others.." value="" name="pain_with_other" class="form-input w-full bg-grey-lighter text-grey-darker border border-red rounded h-7 px-1" >
                                </div>
                            </li>
                        </ul>      
                    </div>
                </div>
            </div>

            <!-- option none -->
            <div class="w-1/2"> 
                <label class="text-base font-normal inline-flex items-center">
                    <input type="radio" class="cursor-pointer form-radio w-6 h-6 items-center" name="pain_with_injuries_choices" value="None" >
                    <span class="ml-2">None</span>
                </label>
            </div>
        </div>
        <!-- line -->
        <div class="border-y-4 my-2 border-gray-200 mb-3"></div>

        <div class="text-center rounded-md text-white w-auto mb-3 p-1 bg-[#186434]">
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
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="eye_glasgow_coma_scale" value="4"  >
                                    <span class="ml-2 text-lg">4 - Opens Spontaneously</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="eye_glasgow_coma_scale" value="3"  >
                                    <span class="ml-2 text-lg">3 - Opens to Speech/Voice</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="eye_glasgow_coma_scale" value="2" >
                                    <span class="ml-2 text-lg">2 - Opens to Pain</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="eye_glasgow_coma_scale" value="1" >
                                    <span class="ml-2 text-lg">1 - No Response</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                            <p id="eye-scale-score" class="font-medium text-xl"> 
                                EYE
                            </p> 
                    </div>
                </div>
                <!-- Verbal -->
                <div class="w-full flex flex-row mb-2 gap">
                    <div class="w-1/2 flex flex-col justify-center text-center border border-gray-500 bg-green-100">
                        <p class="uppercase font-medium text-xl">Verbal</p> 
                    </div>
                    <div class="w-full border border-gray-500 p-1 flex">
                        <ul class="ml-2">
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="verbal_glasgow_coma_scale" value="5" >
                                    <span class="ml-2 text-lg">5 - Oriented</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="verbal_glasgow_coma_scale" value="4" >
                                    <span class="ml-2 text-lg">4 - Confused</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="verbal_glasgow_coma_scale" value="3" >
                                    <span class="ml-2 text-lg">3 - Inappropriate Words</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="verbal_glasgow_coma_scale" value="2" >
                                    <span class="ml-2 text-lg">2 - Incomprehensible Words</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="verbal_glasgow_coma_scale" value="1" >
                                    <span class="ml-2 text-lg">1 - No Response</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                            <p id="verbal-scale-score" class="font-medium text-xl">
                               VERBAL
                            </p> 
                    </div>
                </div>
                <!-- Motor -->
                <div class="w-full flex flex-row mb-2 gap">
                    <div class="w-1/2 flex flex-col justify-center text-center border border-gray-500 bg-green-100">
                        <p class="uppercase font-medium text-xl">Motor</p> 
                    </div>
                    <div class="w-full border border-gray-500 p-1 flex">
                        <ul class="ml-2">
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="6" >
                                    <span class="ml-2 text-lg">6 - Obeys Commands</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="5" >
                                    <span class="ml-2 text-lg">5 - Loxalizes Pain</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="4" >
                                    <span class="ml-2 text-lg">4 - Withdrawal Signs</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="3" >
                                    <span class="ml-2 text-lg">3 - Flexion to Pain</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="2" >
                                    <span class="ml-2 text-lg">2 - Extension to Pain</span>
                                </label>
                            </li>
                            <li>
                                <label class="text-base font-normal inline-flex items-center">
                                    <input type="radio" class="form-radio w-4 h-4 items-center" name="motor_glasgow_coma_scale" value="1" >
                                    <span class="ml-2 text-lg">1 - No Response</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/4 flex flex-col justify-center text-center border border-gray-500 bg-gray-100">
                            <p id="motor-scale-score" class="font-medium text-xl">
                                MOTOR
                            </p> 
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-row mb-2">
            <div class="w-full flex flex-row justify-center text-right p-2 py-4 border border-gray-500 bg-green-100 gap-2">
                <p class="uppercase font-medium">Total Score:</p> 
                <p id="scale-total" class="uppercase font-bold"> EYE + VERBAL + MOTOR </p>
            </div>
        </div>
    </div>


    <!-- right side -->
    <div class="w-1/2 text-base text-left flex-col mb-0 border border-gray-200 p-1">
        <!-- label -->
        <div class="text-center rounded-md text-white w-auto mb-3 p-1 bg-[#186434]">
            <p class="font-medium">Incident</p>
        </div> 
        
        <!-- new container for input -->
        <div>
            <div class="mx-0 md:flex flex flex-row mb-0 gap-4 px-3">
                <div class=" w-1/2 text-left mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body-noi">
                        NOI
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="body-noi" type="text" name="NOI" >
                </div>     

                <div class="w-1/2 text-base text-left mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body-poi">
                        POI
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="body-poi" type="text"  name="POI" >
                </div>   
            </div>

            <div class="mx-0 md:flex flex flex-row mb-1 gap-4 px-3">
                <div class=" w-1/2 text-left mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body-doi">
                        DOI
                    </label>
                    <div class="relative max-w-sm">
                        <input type="date" id="body-doi" max="{{ now()->toDateString() }}" name="DOI" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Select date" >
                    </div>
                </div>     

                <div class="w-1/2 text-base text-left mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body-toi">
                        TOI
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="body-toi" type="text" name="TOI" >
                </div>   
            </div>
            <!-- line -->
            <div class="border-y-4 my-2 border-gray-200 mb-5"></div>
        </div>
        <!-- new container head -->
        <!-- <livewire:livewire_components.head-marker :patient_id="$patient_id"  /> -->

        <!-- new container body -->
        <!-- <livewire:livewire_components.body-marker :patient_id="$patient_id"  /> -->
        <HeadAndBody/>

    </div>   
    


</div>


<div class="mx-0 md:flex flex-col  text-center">
    <div class="flex-row mb-4">
        <label class="uppercase tracking-wide inline-flex text-grey-darker text-sm font-bold mb-2" for="attending-physician">
        Attending Physician: 
        </label>
        <div class="inline-flex">
            <select class="bg-grey-lighter w-80 border border-grey-lighter text-grey-darker py-2 px-4 pr-8 rounded" 
            id="attending-physician" 
            required  oninvalid="this.setCustomValidity('Choose attending physician')" oninput="this.setCustomValidity('')">
                <option></option>
                    <option value="" >
                       display physicians
                    </option>             
            </select>
        </div>
    </div>


</div>

    
    <button  class="border border-stone-50 p-1 w-full bg-[#186434] hover:bg-green-900 text-white font-bold py-3 px-12 rounded-md">
        <span >Submit</span>

    </button>           

</form>






</div>
</template>