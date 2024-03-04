<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { UserIcon, MailIcon, LockClosedIcon, UserAddIcon } from '@heroicons/vue/outline'
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import InputIconWrapper from '@/Components/InputIconWrapper.vue'
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'



</script>


<template>

    <section class="max-w-screen-xl p-2 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20 mb-20">
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Account settings</h1>
        <form @submit.prevent="submit" enctype="multipart/form-data">
          
            <div class="w-full mt-20 mb-20 grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                <div>
                    <label class="text-white dark:text-gray-200"  for="first_name">First Name</label>
                    <input id="first_name" type="text" v-model="form.first_name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>   
                <div>
                    <label class="text-white dark:text-gray-200"  for="last_name">Last Name</label>
                    <input id="last_name" type="text" v-model="form.last_name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>     

                <div>
                    <label class="text-white dark:text-gray-200" for="email">Email Address</label>
                    <input id="email" type="email" v-model="form.email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-white dark:text-gray-200" for="license_no">License number</label>
                    <input id="liclicense_noense" type="license" v-model="form.license_no" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                
                <div>
                    <label class="text-white dark:text-gray-200" for="type_id">Role Selection</label>
                    <select v-model="form.type_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        <option value="1">Admin</option>
                        <option value="2">Nurse</option>
                        <option value="3">Doctor</option>
                        <option value="4">Dentist</option>
                        <option value="5">Radtech</option>
                        <option value="6">Medtech</option>
                    </select>
                </div>
         </div>

         <div class="w-full mt-20 mb-20 grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
    
            <p> FOR USER IMAGE </p>
            <div class="w-full">
                <label class="block text-sm font-medium text-white">
                    Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="image_user" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span class="">Upload a file</span>
                        <input type="file" id="image_user" name="image_user" accept="image/jpeg, image/png, image/jpg, image/gif" @change="handleFileUpload">
                        </label>
                        <p class="pl-1 text-white">or drag and drop</p>
                    </div>
                    <p class="text-xs text-white">
                        PNG, JPG, GIF up to 10MB
                    </p>
                    </div>
                </div>
                </div>

                <p> FOR SIGNATURE </p>
                <div class="w-full">
                <label class="block text-sm font-medium text-white">
                    Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="image_signature" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span class="">Upload a file</span>
                            <input type="file" id="image_signature" name="image_signature" accept="image/jpeg, image/png, image/jpg, image/gif" @change="handleFileUpload2">
                        </label>
                        <p class="pl-1 text-white">or drag and drop</p>
                    </div>
                    <p class="text-xs text-white">
                        PNG, JPG, GIF up to 10MB
                    </p>
                    </div>
                </div>
                </div>
         </div>

            <div class="w-full mt-20 mb-20 grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-white dark:text-gray-200"  for="username">Username</label>
                    <input id="username" type="text" v-model="form.username" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>         

                <div>
                    <label class="text-white dark:text-gray-200" for="password">Password</label>
                    <input id="password" type="password" v-model="form.password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>

                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="password_confirmation">Password Confirmation</label>
                    <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <Button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</Button>
            </div>
        </form>
    </section>

    <ToastNotification :message="toastMessage" :show="showToast" />

</template>

<script>
import axios from 'axios';
import ToastNotification from '@/Components/ToastNotification.vue';

export default {
  components: {
    ToastNotification
  },
  data() {
    return {
      form: {
        username: '',
        password: '',
        password_confirmation: '',
        first_name: '',
        last_name: '',
        email: '',
        license_no: '',
        type_id: '',
        image_user: null,
        image_signature: null,
      },
      showToast: false,
      toastMessage: ''
    };
  },
  methods: {
    submit() {

      const formData = new FormData();
      Object.keys(this.form).forEach(key => {
        formData.append(key, this.form[key]);
      });

      console.log('Form submitted:', this.formData);

      axios.post('/api/user/add', formData)
        .then(response => {
          this.toastMessage = 'User added successfully';
          this.showToast = true;
        })
        .catch(error => {
          console.error('Error adding user:', error);
          this.toastMessage = 'Error adding user';
          this.showToast = true;
        });
    },
    handleFileUpload(event) {
      this.form.image_user = event.target.files[0];
    },
    handleFileUpload2(event) {
      this.form.image_signature = event.target.files[0];
    },
    closeModal() {
      this.$emit('closeModal');
    }
  }
}
</script>