
<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Modal from '@/Components/Modal.vue'
import Button from '@/Components/Button.vue'
import StaffModal from '@/Pages/Components/UserManagement/StaffModal.vue'; 
import { ToggleIcon , DeleteIcon, EditIcon} from '@/Components/Icons/outline'

</script>



<template>
    <main class="flex flex-col flex-auto mt-14 mb-10 ">
        <div  class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex w-full justify-center text-center text-xl text-white w-auto mb-6 py-2 p-3 bg-[#186434] rounded-md">
                <p class="uppercase font-bold">Account Management</p>
            </div>

            <Modal :show="showModal" @close="showModal = false" :maxWidth="modalMaxWidth" :closeable="true">
                <StaffModal />
            </Modal>

            <div class="mr-5 mb-3 flex justify-end items-center">
                <Button @click="showModal = true" variant="success" >Add user</Button>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="w-auto">
                    <div>
                        <table :class="['bg-[white]',  'dark:bg-[#4A5568]']" class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-[#1B651B] text-white text-left">
                                    <th class="py-3 px-8 border-b border-gray-200">Role</th>
                                    <th class="py-3 px-8 border-b border-gray-200">Username</th>
                                    <th class="py-3 px-8 border-b border-gray-200">First Name</th>
                                    <th class="py-3 px-8 border-b border-gray-200">Last Name</th>
                                    <th class="py-3 px-8 border-b border-gray-200">Status</th>
                                    <th class="py-3 px-8 border-b border-gray-200">Activity</th>
                                    <th class="py-3 px-8 border-b border-gray-200">Last Access</th>
                                    <th class="py-3 px-8 border-b border-gray-200 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <p>{{ pageUser.data}}</p> -->

                                <tr v-for="(user, index) in pageUser.data" :key="index">
                                    <!-- <p>{{ user.staff.first_name }}</p> -->

                                    <template v-if="user.staff !== null">
                                        <td class="py-3 px-5 border-b border-gray-200">
                                            <div :class="[
                                                'inline',
                                                'px-3',
                                                'py-1',
                                                'text-sm',
                                                'font-normal',
                                                'rounded-full',
                                                'gap-x-2',
                                                {
                                                    'bg-emerald-100/60 text-red-500': user.type_id === '1',
                                                    'bg-violet-100/60 text-orange-600': user.type_id === '2',
                                                    'bg-emerald-100/60 text-emerald-500': user.type_id === '3',
                                                    'bg-amber-100/60 text-orange-600': user.type_id === '4',
                                                    'bg-orange-100/60 text-violet-600': user.type_id === '5',
                                                    'bg-violet-100/60 text-violet-600': user.type_id === '6'
                                                }
                                            ]">
                                                {{ getTypeName(user.type_id) }}
                                            </div>
                                        </td>
                                                                
                                        <td class="py-3 px-8 border-b border-gray-200">{{ user.username }}</td>
                                        <td class="py-3 px-8 border-b border-gray-200">{{ user.staff.first_name }}</td>
                                        <td class="py-3 px-8 border-b border-gray-200">{{ user.staff.last_name }}</td>
                                        <td class="py-3 px-8 border-b border-gray-200">

                                            <span v-if="user.status  ==='inactive'" class="text-gray-500 font-bold">Inactive</span>
                                            <span v-else-if="user.status  ==='active'"  class="text-green-700 font-bold">Active</span>

                                         </td>
                                                  
                                         <td class="py-3 px-8 border-b border-gray-200">
                                            <div v-if="user.activity.toLowerCase() === 'online'" class="h-2 w-2 rounded-full inline-block ml-6 bg-green-500"></div>
                                            <div v-if="user.activity.toLowerCase() === 'offline'" class="h-2 w-2 rounded-full inline-block ml-6 bg-red-500"></div>                         
                                        </td>

                                         <td class="py-3 px-8 border-b border-gray-200">
                                            <p v-if="user.activity.toLowerCase() === 'offline'">{{ formatLastActivity(user.last_activity) }}</p>
                                            <p v-else-if="user.activity.toLowerCase() === 'online'">Online</p>
                                        </td>
                                        <td class="py-3 px-8 border-b border-gray-200 text-center">
                                            <div class="flex gap-3 justify-center">
          
                                            <Button @click="toggleStatus(user.staff_id)" size="sm" :variant="user.status.toLowerCase() === 'active' ? 'warning' : 'success'" >
                                                {{ user.status.toLowerCase() === 'active' ? 'Deactivate' : 'Activate' }}
                                            </Button>
                                            
                                            <Button @click="removeStaff(user.staff_id)" size="sm" variant="danger" >
                                                <DeleteIcon aria-hidden="true" />                                            
                                                <span class="p-1">Remove</span>
                                            </Button>

                                            </div>
                                        </td>
                                    </template> 
                                </tr>
                                  <tr v-if="pageUser.length === 0" class="p-8 border-b border-gray-200 text-center">
                                    <td colspan="8">
                                        No User records
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-5" >
                <TailwindPagination :data="pageUser" @pagination-change-page="fetchUsers" />
            </div>
        </div>
    </main>
    <ToastNotification :message="toastMessage" :show="showToast" :success="success" />

</template>

<script>

import axios from 'axios';
import moment from 'moment';
import ToastNotification from '@/Components/ToastNotification.vue';
import Swal from 'sweetalert2';
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    components: {
        ToastNotification,
        TailwindPagination
    },
    data() {
        return {
            showModal: false,
            modalMaxWidth: '2xl',
            lastActivity: null ,
            showToast: false,
            toastMessage: '',
            success:false,
            pageUser:{},
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers(page = 1) {
            axios.get('/api/staffs?page=' + page)
                .then(response => {
                    this.pageUser = response.data;
                })
                .catch(error => {
                    console.error('Error fetching staff data:', error);
                });
        },
        getTypeName(typeId) {
            switch (typeId) {
                case '1':
                    return 'Admin';
                case '2':
                    return 'Nurse';
                case '3':
                    return 'Doctor';
                case '4':
                    return 'Dentist';
                case '5':
                    return 'Radtech';
                case '6':
                    return 'Medtech';
                default:
                    return 'Unknown';
            }
        },
        formatLastActivity(timestamp) {
            if (timestamp) {
                const now = moment();
                const activityTime = moment(timestamp);
                const diffMinutes = now.diff(activityTime, 'minutes');
                if (diffMinutes < 1440) { 
                    return moment.duration(diffMinutes, 'minutes').humanize();
                } else {
                    return activityTime.fromNow();
                }
            } else {
                return 'Not yet active';
            }
        },
        toggleStatus(staff_id) {
            axios.put(`/api/user/update/status/${staff_id}`)
                .then(response => {

                this.fetchUsers();
                
                this.showToast = true;
                this.toastMessage = response.data.message;
                this.success = true;

                setTimeout(() => {
                    this.showToast = false;
                }, 5000);

                })
                .catch(error => {
                console.error('Error toggling user status:', error);
                });
         },
        removeStaff(staff_id) {
            Swal.fire({
                title: "Remove this user",
                text: "Once removed, you will not be able to recover this user!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#22C55E",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with deletion
                    axios.get(`/api/user/delete/${staff_id}`)
                    .then(response => {
                        this.fetchUsers();
                        this.showToast = true;
                        this.toastMessage = response.data.message;
                        this.success = true;
                        
                        setTimeout(() => {
                            this.showToast = false;
                        }, 5000);
                    })
                    .catch(error => {
                        console.error('Error deleting user:', error);
                    });
                } else {
                    // User cancelled, do nothing
                }
            });
        }

    }
};
</script>


