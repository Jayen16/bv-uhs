<template>

        <!-- start report generation -->

        <!-- end report generation -->

        <!-- start report table -->
        <div class="flex justify-center items-center">
            <div
                class="bg-white w-full shadow-md rounded px-8 pt-6 pb-8 mt-10 flex flex-col my-2 w-2/3 border border-gray-300">
                <!-- label -->
                <div class="flex mt-12">
                    <div class="w-1/3 flex justify-end items-center"> <!-- Center aligning infirmary logo -->
                        <img class="w-24 object-contain" src="images/infirmary_logo.png" alt="">
                    </div>
                    <div class="w-1/3 text-center">
                        <p class="font-medium text-lg">Republic of the Philippines <br>
                            PROVINCE OF CAVITE <br>
                            CAVITE STATE UNIVERSITY <br>
                            Indang, Cavite <br>
                            Health Services Unit</p>
                    </div>
                    <div class="w-1/3 flex justify-start items-center"> <!-- Center aligning CvSU logo -->
                        <img class="w-24 object-contain" src="images/CvSU logo.png" alt="">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-xl font-bold mt-6">Monthly Census (Consultation)</p>
                </div>

                <div class="flex w-full items-center justify-between px-12 mt-6">
                    <table class="w-full border-collapse">
                        <tr class="flex w-full justify-between font-bold">
                            <td class="w-1/6 text-center">YEAR</td>
                            <td class="w-1/6 text-center border-b border-black italic">data 1</td>
                            <td class="w-1/6 text-center">MONTH</td>
                            <td class="w-1/6 text-center border-b border-black italic">data 2</td>
                            <td class="w-1/6 text-center">Total Consult</td>
                            <td class="w-1/6 text-center border-b border-black italic">data 3</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-6 flex justify-center items-center">
                    <table class="w-full border-collapse">
                        <tbody>
                            <tr class="border border-black" style="font-weight: bold; font-size: 12px;">
                                <td class="text-center border border-black" rowspan="2">SYSTEM</td>
                                <td class="text-center border border-black" rowspan="2">DIAGNOSIS</td>
                                <td class="text-center border border-black" colspan="2">STUDENT</td>
                                <td class="text-center border border-black" colspan="2">EMPLOYEE</td>
                                <td class="text-center border border-black" colspan="2">DEPENDENT</td>
                                <td class="text-center border border-black" rowspan="2">TOTAL</td>
                            </tr>
                            <tr style="font-weight:bold; font-size: 12px;">
                                <td class="text-center border border-black">MALE</td>
                                <td class="text-center border border-black">FEMALE</td>
                                <td class="text-center border border-black">MALE</td>
                                <td class="text-center border border-black">FEMALE</td>
                                <td class="text-center border border-black">MALE</td>
                                <td class="text-center border border-black">FEMALE</td>
                            </tr>

                            <!-- essentially-normal -->
                            <tr class="text-center">
                                <td class="essentially-normal text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Essentially Normal
                                </td>
                                <td class="essentially-normal text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Essentially Normal
                                </td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- dermatology -->
                            <tr class="text-center border border-black">
                                <td class="dermatology text-center border border-black bg-[#fff3e7]" rowspan="5"
                                    style="font-weight: bold;">Dermatology
                                </td>
                                <td class="dermatology text-center border border-black bg-[#fff3e7]"
                                    style="font-weight: bold;">Allergy</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="dermatology text-center border border-black bg-[#fff3e7]"
                                    style="font-weight: bold;">Dermatoses</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="dermatology text-center border border-black bg-[#fff3e7]"
                                    style="font-weight: bold;">Infection</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="dermatology text-center border border-black bg-[#fff3e7]"
                                    style="font-weight: bold;">Viral Exanthem</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="dermatology text-center border border-black bg-[#fff3e7]"
                                    style="font-weight: bold;">Dematology Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Head -->
                            <tr class="text-center">
                                <td class="head text-center border border-black bg-[#fff0f0]" rowspan="2"
                                    style="font-weight: bold;">Head</td>
                                <td class="head text-center border border-black bg-[#fff0f0]"
                                    style="font-weight: bold;">Headache</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="head text-center border border-black bg-[#fff0f0]"
                                    style="font-weight: bold;">Head Others</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Eyes -->
                            <tr class="text-center">
                                <td class="eyes text-center border border-black bg-[#ececec]" rowspan="4"
                                    style="font-weight: bold;">Eyes</td>
                                <td class="eyes text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Error of Refraction</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="eyes text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Foreign Body</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="eyes text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Conjuctivitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="eyes text-center border border-black bg-[#ececec]"
                                    style="font-weight: bold;">Eyes Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Mouth, ENT -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" rowspan="8"
                                    style="font-weight: bold;">Mouth, ENT</td>
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Dental Carries</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Otitis Externa/Media</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Hearing Loss</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    BPPV/Vertigo</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Rhinitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Sinusitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">
                                    Tonsilitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe6b8]" style="font-weight: bold;">ENT
                                    Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Respiratory -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" rowspan="7"
                                    style="font-weight: bold;">Respiratory</td>
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">URTI
                                </td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Bronchitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Asthma</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Pneumonia</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">PTB
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    COVID-19</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Respiratory Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Cardiovascular -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" rowspan="6"
                                    style="font-weight: bold;">Cardiovascular</td>
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Hypertension</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Hypotension</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Angina Pectoris</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Ischemic HD</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Myocardial Infarction</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Cardiovascular Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Gastrointenstinal -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" rowspan="7"
                                    style="font-weight: bold;">Gastrointenstinal
                                </td>
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Gastroentritis</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Gastritis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">GERD
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Hepatitis</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Ulcer</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Cancer</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#ffe4fb]" style="font-weight: bold;">
                                    Gastrointenstinal Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Genitourinary -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" rowspan="4"
                                    style="font-weight: bold;">Genitourinary</td>
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">UTI
                                </td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Kidney Stones</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">CKD
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#dee2b0]" style="font-weight: bold;">
                                    Genitourinary Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Reproductive -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" rowspan="5"
                                    style="font-weight: bold;">Reproductive</td>
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">
                                    Dysmenorrhea</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">
                                    Infection</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">
                                    Tumor/Polyp</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">
                                    Cancer</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">
                                    Reproductive Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Endocrinology -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" rowspan="4"
                                    style="font-weight: bold;">Endocrinology</td>
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Diabetes Mellitus</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Hyperthyroidism</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Hypothyroidism</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Endocrinology Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Musculoskeletal -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" rowspan="3"
                                    style="font-weight: bold;">Musculoskeletal</td>
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Fracture</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Sprain/Strain</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e1e7ff]" style="font-weight: bold;">
                                    Musculoskeletal Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Trauma -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" rowspan="6"
                                    style="font-weight: bold;">Trauma</td>
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Laceration</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Abrasion</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Avulsion</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">Burn
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">Concussion
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">
                                    Trauma Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Psychiatric -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#e9d9c3]" rowspan="1" style="font-weight: bold;">
                                    Psychiatric</td>
                                <td class="text-center border border-black bg-[#e9d9c3]" style="font-weight: bold;">Psychiatric</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Hematologic -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#c6da8b]" rowspan="2" style="font-weight: bold;">
                                    Hematologic</td>
                                <td class="text-center border border-black bg-[#c6da8b]" style="font-weight: bold;">Anemia</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#c6da8b]" style="font-weight: bold;">Hematologic
                                    Others</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>

                            <!-- Neurologic -->
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" rowspan="3" style="font-weight: bold;">
                                    Neurologic</td>
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">NCA/Syncope</td>
                                <td class="border border-black">1</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">CVD</td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center border border-black bg-[#fff0f0]" style="font-weight: bold;">Neurologic Others
                                </td>
                                <td class="border border-black">2</td>
                                <td class="border border-black">3</td>
                                <td class="border border-black">4</td>
                                <td class="border border-black">5</td>
                                <td class="border border-black">6</td>
                                <td class="border border-black">7</td>
                                <td class="border border-black">7</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end report table -->

</template>