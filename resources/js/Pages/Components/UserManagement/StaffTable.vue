<script setup>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Modal from "@/Components/Modal.vue";
import Button from "@/Components/Button.vue";
import LaboratoryStaffModal from "@/Pages/Components/UserManagement/LaboratoryStaffModal.vue";
import { DeleteIcon} from '@/Components/Icons/outline'
</script>

<template>
    <main class="flex flex-col flex-auto mt-14 mb-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="flex w-full justify-center text-center text-xl text-white w-auto mb-6 py-2 p-3 bg-[#186434] rounded-md"
            >
                <p class="uppercase font-bold">Diagnostic Physicians</p>
            </div>

            <div
                class="py-2 flex justify-end items-center"
                x-data="{ showModal: false }"
            >
                <Modal
                    :show="showModal"
                    @close="showModal = false"
                    :maxWidth="modalMaxWidth"
                    :closeable="true"
                >
                    <LaboratoryStaffModal @close="showModal = false" @staffAdded="fetchStaffData" />
                </Modal>

                <Button
                    @click="showModal = true"
                    variant="success"
                    class="mr-5 mb-3"
                >
                    Add diagnostic physicians
                </Button>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="w-auto">
                    <div>
                        <table
                            :class="['bg-[white]', 'dark:bg-[#4A5568]']"
                            class="w-full bg-white border border-gray-200 rounded-lg shadow-md"
                        >
                            <thead>
                                <tr class="bg-[#1B651B] text-white text-left">
                                    <th
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        Laboratory Role
                                    </th>
                                    <th
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        Professional Title
                                    </th>
                                    <th
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        License No.
                                    </th>
                                    <th
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        Status
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
                                    v-for="(
                                        lab_staff, index
                                    ) in laboratory_staff"
                                    :key="index"
                                >
                                    <td
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        <div
                                            class="inline px-3 py-1 text-sm font-normal rounded-full gap-x-2"
                                        >
                                            {{ lab_staff.role }}
                                        </div>
                                    </td>
                                    <td
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        {{ lab_staff.full_name }}
                                    </td>

                                    <td
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        {{ lab_staff.professional_title }}
                                    </td>
                                    <td
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        {{ lab_staff.license_no }}
                                    </td>
                                    <td
                                        class="py-3 px-8 border-b border-gray-200"
                                    >
                                        <select
                                            :class="[
                                                'bg-[white]',
                                                'dark:bg-[#4A5568]',
                                            ]"
                                            data-te-select-init
                                            data-te-select-auto-select="true"
                                            v-model="lab_staff.status"
                                            @change="handleChange(index)"
                                            class="text-center"
                                        >
                                            <option selected>select</option>
                                            <option value="active">
                                                Active
                                            </option>
                                            <option value="non-active">
                                                Non-active
                                            </option>
                                        </select>
                                    </td>

                                    <td
                                        class="py-3 px-8 border-b border-gray-200 text-center"
                                    >
                                        <div
                                            class="flex justify-center w-full gap-5 text-center"
                                        >

                                            <div>

                                                <Button @click="removeStaff(lab_staff.id)" size="sm" variant="danger" >
                                                    <DeleteIcon aria-hidden="true" />                                            
                                                    <span class="p-1">Remove</span>
                                                </Button>


                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <ToastNotification
            :message="toastMessage"
            :show="showToast"
            :success="success"
        />
    </main>
</template>

<script>
import axios from "axios";
import ToastNotification from "@/Components/ToastNotification.vue";
import Swal from "sweetalert2";

export default {
    components: {
        LaboratoryStaffModal,
        ToastNotification,
    },
    data() {
        return {
            showModal: false,
            modalMaxWidth: "2xl",
            laboratory_staff: [],
            lastActivity: null,
            showToast: false,
            toastMessage: "",
            success: false,
        };
    },
    mounted() {
        this.fetchStaffData();
    },
    methods: {
        fetchStaffData() {
            axios
                .get("/api/laboratory/staff")
                .then((response) => {
                    this.laboratory_staff = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching staff data:", error);
                });
        },
        handleChange(index) {
            const lab_staff = this.laboratory_staff[index];

            axios
                .put(
                    `/api/laboratory/staff/${lab_staff.id}/${lab_staff.status}`
                )
                .then((response) => {
                    this.fetchStaffData();
                    this.showToast = true;
                    this.toastMessage = response.data.message;
                    this.success = true;

                    setTimeout(() => {
                        this.showToast = false;
                    }, 5000);


                })
                .catch((error) => {
                    console.error("Error fetching staff data:", error);
                });
        },
        removeStaff(laboratory_staff_id) {
            Swal.fire({
                title: "Remove this staff user",
                text: "Once removed, you will not be able to recover this staff!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#22C55E",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with deletion
                    axios.post(`/api/laboratory/staff/delete/${laboratory_staff_id}`)
                    .then(response => {
                        this.fetchStaffData();
                        this.showToast = true;
                        this.toastMessage = response.data.message;
                        this.success = true;
                        
                        setTimeout(() => {
                            this.showToast = false;
                        }, 5000);
                    })
                    .catch(error => {
                        console.error('Error deleting staff:', error);
                    });
                } else {
                    // User cancelled, do nothing
                }
            });
        }
    },
};

// {lab_staff_id}
</script>
