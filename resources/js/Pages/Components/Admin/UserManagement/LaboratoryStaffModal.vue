<script setup>
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
</script>

<template>

<section class="p-2 w-[1500px] h-auto p-8 pt-5 mx-auto  dark:bg-gray-800 mt-5 mb-5">
            <h2 class="bg-[#186434] hover:bg-green-800 w-full p-3 rounded-md text-white font-medium mb-3">Add diagnostic physicians</h2>

            <form @submit.prevent="submit" enctype="multipart/form-data">

                <div class="border border-gray-200 rounded-lg p-2 py-4">
                    <div class="flex flex-row mb-2">
                        <div class="w-1/2 px-3">
                            <Label class="block tracking-wide text-gray-700 text-md font-medium mb-2" for="user-full-name">
                                Full Name
                            </Label>
                            <input v-model="form.full_name" class="w-full border p-2 rounded-md mb-2 focus:outline-none focus:border-green-700" id="user-full-name" type="text" placeholder="Full Name" required>
                        </div>
                        <div class="w-1/2 px-3">
                            <Label class="block tracking-wide text-gray-700 text-md font-medium mb-2" for="role-title">
                                Role Selection:
                            </Label>
                            <select v-model="form.role" id="role" name="role" class="w-full border p-2 rounded-md mb-2 focus:outline-none focus:border-green-700" required>
                                <option value="">select option</option>
                                <option value="Pathologist">Pathologist</option>
                                <option value="Medical Technologist">Medical Technologist</option>
                                <option value="Radiologic Technologist">Radiologic Technologist</option>
                                <option value="Radiologist">Radiologist</option>
                            </select>
                        </div>
                    </div>
                    <!-- new row -->
                    <div class="flex flex-row mb-2">
                        <div class="w-1/2 px-3">
                            <Label class="block tracking-wide text-gray-700 text-md font-medium mb-2" for="professional_title">
                                Professional Title
                            </Label>
                            <select v-model="form.professional_title"  id="professional_title" name="professional_title" class="w-full border p-2 rounded-md mb-2 focus:outline-none focus:border-green-700" required>
                                <option value="">select option</option>
                                <option value="RMT">RMT</option>
                                <option value="RRT">RRT</option>
                                <option value="MD">MD</option>
                            </select>
                        </div>
                        <div class="w-1/2 px-3">
                            <Label class="block tracking-wide text-gray-700 text-md font-medium mb-2" for="license-no">
                                License No.
                            </Label>
                            <input v-model="form.license_no" class="w-full border p-2 rounded-md mb-2 focus:outline-none focus:border-green-700" id="license-no" type="text" placeholder="License no." required>
                        </div>
                    </div>
                </div>

                <div class="px-3 w-[600] h-[300px] mt-5">
                    <div class="bg-white p-[2px] w-full h-full items-center border rounded-lg border-green-700 ml-1.5 mb-3 ">
                        <img v-if="imageUrl" class="object-contain w-full h-full " :src="imageUrl" alt="Selected Image">
                    </div>
                    <div>
                        <Label class="text-green-800 text-sm px-3 py-1 rounded-md bg-gray-300 hover:bg-gray-400 hover:text-white">
                            <Input type="file" id="image_signature" name="image_signature" accept="image/jpeg, image/png, image/jpg, image/gif" @change="handleFileUpload"> </Input>
                            Upload Image
                        </Label>
                    </div>
                </div>

                <div class="flex flex-row justify-end mt-20">
                    <Button type="submit" variant="success" aria-Label="Add">Add</Button>
                </div>
            </form>
    </section>


</template>



<script>
import axios from 'axios';
import Swal from "sweetalert2";

export default {
    data() {
        return {
            modalMaxWidth: '2xl',
            form: {
                full_name: '',
                license_no: '',
                role: '',
                professional_title: '',
                image_signature: null,
            },
            imageUrl: '', 
            loading: false 
        };
    },
    methods:{
        submit() {
            const formData = new FormData();
            Object.keys(this.form).forEach(key => {
                formData.append(key, this.form[key]);
            });

            console.log('Form submitted:', formData);

            axios.post('/api/laboratory/staff/add', formData)
                .then(response => {
                    this.$emit('close'); 
                    this.$emit('staffAdded');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "The staff has been added!",
                        showConfirmButton: false,
                        timer: 1500
                     });
                })
                .catch(error => {
                    console.error('Error adding user:', error);
                    this.toastMessage = 'Error adding user';
                    this.showToast = true;
                });
        },
        handleFileUpload(event) {
            this.form.image_signature = event.target.files[0];

            this.loading = true;
      
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = () => {
                this.imageUrl = reader.result;
                this.loading = false;
            };
            reader.readAsDataURL(file);
        },
    },
};
</script>

