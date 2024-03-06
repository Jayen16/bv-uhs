<script setup>
    import Button from '@/Components/Button.vue';
</script>
<template>

<div class="w-full">
    <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>


            <tr class="bg-green-800 text-white text-left">
                <th class="py-3 px-8 border-b border-gray-200 uppercase">
                    Date
                </th>
                <th class="py-3 px-8 border-b border-gray-200 uppercase">
                    Available Time
                </th>
                <th class="py-3 px-8 border-b border-gray-200 uppercase">
                    Slots left
                </th>
                <th class="py-3 px-8 border-b border-gray-200 uppercase">
                    Slots taken
                </th>
                <th class="py-3 px-8 border-b border-gray-200 uppercase">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(appointment, index) in pageAppointment.data" :key="index" >
                <td class="py-2 px-8 border-b border-gray-200"> {{ formatDate(appointment.date) }}</td>
                <td class="py-2 px-8 border-b border-gray-200"> {{ appointment.time }}</td>
                <td class="py-2 px-8 border-b border-gray-200"> {{ appointment.slot }} slots</td>
                <td class="py-2 px-8 border-b border-gray-200"> {{ appointment.taken }} slots</td>
                <td class="py-2 px-8 border-b border-gray-200"> 

                    <Button @click="deleteSchedule(appointment.id)" variant="warning" size="sm"> Discard </Button>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-end mt-5" >
            <TailwindPagination :data="pageAppointment" @pagination-change-page="fetchAppointments" />
     </div>

</div>
</template>

<script>
    import axios from 'axios';
    import { TailwindPagination } from 'laravel-vue-pagination';
    import Swal from 'sweetalert2';
    export default {
        props: {
            appoint_type: {
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
                showModal: false,
                modalMaxWidth: '2xl',
                lastActivity: null,
                showToast: false,
                toastMessage: '',
                success: false,
                pageAppointment: {}, 
            };
        },
        mounted() {
            // console.log("Type:", this.appoint_type);
            this.fetchAppointments();
        },
        methods: {
            fetchAppointments(page = 1) {
                axios.get(`/api/schedule?page=${page}&type=${this.appoint_type}`)
                    .then(response => {
                        this.pageAppointment = response.data;
                    })
                    .catch(error => {
                        console.error('Error fetching appointment data:', error);
                    });
            },
            formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            const date = new Date(dateString);
            const manilaTime = new Intl.DateTimeFormat('en-US', {
                timeZone: 'Asia/Manila',
                ...options
            });
            return manilaTime.format(date);
        },
        deleteSchedule(schedule_id){

            Swal.fire({
                title: "Are you sure?",
                text: "The student who scheduled the appointment will receive an email regarding the cancellation.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, remove"
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/api/schedule/destroy/${schedule_id}`)
                    .then(response => {
                        Swal.fire({
                        title: "Deleted!",
                        text: response.data.message,
                        icon: "success"
                        });
                        this.fetchAppointments();
                    })
                    .catch(error => {
                        console.error('Error deleting user:', error);
                    });     
                }
                });
        }
        },
        
    }
</script>

