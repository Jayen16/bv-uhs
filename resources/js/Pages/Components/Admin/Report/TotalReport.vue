<script setup>
    import Chart from 'primevue/chart';

    import { ref, onMounted } from "vue";

    onMounted(() => {
        chartData.value = setChartData();
        chartOptions.value = setChartOptions();
    });

    const chartData = ref();
    const chartOptions = ref();

    const setChartData = () => {
        const documentStyle = getComputedStyle(document.body);

        return {
            labels: ['A', 'B', 'C'],
            datasets: [
                {
                    data: [540, 325, 702],
                    backgroundColor: [documentStyle.getPropertyValue('--cyan-500'), documentStyle.getPropertyValue('--orange-500'), documentStyle.getPropertyValue('--gray-500')],
                    hoverBackgroundColor: [documentStyle.getPropertyValue('--cyan-400'), documentStyle.getPropertyValue('--orange-400'), documentStyle.getPropertyValue('--gray-400')]
                }
            ]
        };
    };

    const setChartOptions = () => {
        const documentStyle = getComputedStyle(document.documentElement);
        const textColor = documentStyle.getPropertyValue('--text-color');

        return {
            plugins: {
                legend: {
                    labels: {
                        usePointStyle: true,
                        color: textColor
                    }
                }
            }
        };
    };
</script>


 <template>
    
    <div class="flex justify-center items-center">
     <div
         class="bg-white shadow-md rounded px-8 pt-6 pb-8 mt-10 flex flex-col my-2 w-full border border-gray-300">
 
         <div class="text-center mt-4">
             <p class="text-xl font-bold mt-6 uppercase">Total Consultation Summary</p>
         </div>
 
         <div class="mt-6 flex justify-center items-center gap-2">
             <div class="w-1/3">
                 <table class="text-center">
                     <tr>
                         <td class="td-borderless" colspan="1" style="width: 50%; text-align: left;">Month :</td>
                         <td class="td-borderless" colspan="2"
                             style="width: 50%; font-weight:bold; font-size: 14px; text-align: left; border-bottom: 1px solid black;">
                             MONTH </td>
                     </tr>
                     <tr>
                         <td class="td-borderless" colspan="1" style="width: 50%; text-align: left;">Year :</td>
                         <td class="td-borderless" colspan="2"
                             style="width: 50%; font-weight:bold; font-size: 14px; text-align: left; border-bottom: 1px solid black;">
                            YEAR </td>
                     </tr>
 
                     <tr>
                         <td class="td-borderless"><br></td>
                     </tr>
 
                     <tr>
                         <td style="font-weight: bold; text-align: left;" class="td-borderless">System</td>
                         <td class="border border-black p-1" style="font-weight: bold;">No. of Cases</td>
                         <td class="border border-black p-1" style="font-weight: bold;">Case Percentage</td>
                     </tr>
 
           
 
                     
                     <tr>
                         <td class="border border-black font-semibold bg-green-500" style="font-style: italic; text-align: left;"> Complaint</td>                                              
                         <td class="border border-black">s</td>
                         <td class="border border-black">s %</td>
 
                     </tr>
 
 
                     <tr style="font-weight: bold;">
                         <td style="text-align: left; border: 1px solid black;">Total</td>
                         <td class="border border-black" style="border: 1px solid black;"> s </td>
                         <td class="border border-black" style="border: 1px solid black;">s %</td>
                     </tr>
 
                     <tr>
                         <td style="border: none;"><br></td>
                     </tr>
 
                     <tr>
                         <td style="font-weight: bold; text-align: left;" class="td-borderless">SEX</td>
                         <td class="border border-black" style="font-weight: bold;">No. of Cases</td>
                         <td class="border border-black" style="font-weight: bold;">Case Percentage</td>
                     </tr>
                     <tr>
                         <td class="border border-black " style="font-style: italic; font-weight: bold; text-align: left; background-color : #d4deff;">MALE</td>
                         <td class="border border-black " style="background-color : #d4deff;">s</td>
                         <td class="border border-black " style="background-color : #d4deff;">s %</td>
                     </tr>
                     <tr>
                         <td class="border border-black"
                             style="font-style: italic; font-weight: bold; text-align: left; background-color : #ffecff;">FEMALE
                         </td>
                         <td class="border border-black" style="background-color : #ffecff;">s</td>
                         <td class="border border-black" style="background-color : #ffecff;">s %</td>
                     </tr>
                     <tr>
                         <td class="sex-total"
                             style="font-weight: bold; text-align: left; border: 1px solid black;">
                             TOTAL</td>
                         <td class="sex-total" style="font-weight: bold; border: 1px solid black;">s</td>
                         <td class="sex-total" style="font-weight: bold; border: 1px solid black;">s %</td>
                     </tr>
 
 
                     <tr>
                         <td class="td-borderless" style="padding-top: 10px; padding-bottom: 10px;"></td>
                     </tr>
 
                     <tr>
                         <td style="font-weight: bold; text-align: left;" class="td-borderless">CLASSIFICATION
                         </td>
                         <td class="border border-black" style="font-weight: bold;">No. of Cases</td>
                         <td class="border border-black" style="font-weight: bold;">Case Percentage</td>
                     </tr>
                     <tr>
                         <td class="border border-black"
                             style="font-style: italic; font-weight: bold; text-align: left; background-color : #ffe4fb;">
                             STUDENT
                         </td>
                         <td class="border border-black" style="background-color : #ffe4fb;">s</td>
                         <td class="border border-black" style="background-color : #ffe4fb;">s %</td>
                     </tr>
                     <tr>
                         <td class="border border-black "
                             style="font-style: italic; font-weight: bold; text-align: left; background-color : #c6da8b;">
                             EMPLOYEE
                         </td>
                         <td class="border border-black" style="background-color : #c6da8b;">s</td>
                         <td class="border border-black" style="background-color : #c6da8b;">s %</td>
                     </tr>
                     <tr>
                         <td class="border border-black "
                             style="font-style: italic; font-weight: bold; text-align: left; background-color : #fff8ec;" >
                             DEPENDENT
                         </td>
                         <td class="border border-black" style="background-color : #fff8ec;">s</td>
                         <td class="border border-black" style="background-color : #fff8ec;">s %</td>
                     </tr>
                     <tr>
                         <td style="font-weight: bold; text-align: left; border: 1px solid black;">TOTAL</td>
                         <td style="font-weight: bold; border: 1px solid black;">s</td>
                         <td style="font-weight: bold; border: 1px solid black;">s %</td>
                                                              
                     </tr>
                 </table>
             </div>
 
             <div class="w-2/3 flex justify-center items-center">

                <div class="card flex justify-content-center">
                    <Chart type="pie" :data="chartData" :options="chartOptions" class="w-full md:w-30rem" />
                </div>
             
             </div>
 
 
 
         </div>
     </div>
 </div>

 
 
 
 </template>