<script setup>
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import Dropdown from '@/Components/Dropdown.vue'
import { Link, useForm, usePage } from '@inertiajs/vue3'


const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
})

// const user = usePage().props.auth.user
const staff = usePage().props.auth.staff

const form = useForm({
    first_name: staff.first_name,
    last_name: staff.last_name,
    license_no: staff.license_no,
    address: staff.address,
    specialization: staff.specialization,
    image_signature: staff.image_signature,
})


</script>

<template>


    <div class="w-full"></div>

   <div class="grid grid-cols-2">

    <section class="w-3/5">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Staff Information
            </h2>

            <!-- <p>{{ staff }}</p> -->
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Update your account's profile information and email address.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.updateStaff'))"
            class="mt-6 space-y-6"
        >
            <div>
                <Label for="First Name" value="First Name" />

                <Input
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="first_name"
                />

            </div>

            <div>
                <Label for="Last Name" value="Last Name" />

                <Input
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autofocus
                    autocomplete="last_name"
                />

            </div>

            <div>
                <Label for="License No." value="License No." />

                <Input
                    id="license_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.license_no"
                    required
                    autofocus
                    autocomplete="license_no"
                />

            </div>


            <div>
                <Label for="Address" value="Address" />

                <Input
                    id="address"
                    type="text"
                    class="mt-1 block w-full rounded-md"
                    v-model="form.address"
                    required
                    autofocus
                    autocomplete="address"
                ></Input>

            </div>

            <div v-if="$page.props.auth.user.type_id === '3'">
                <Label for="Specialization" value="Specialization" />

                <Dropdown>
                    <select
                        id="specialization"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.specialization"
                        required
                        autofocus
                        autocomplete="specialization"
                    >
                        <option value="General Physician">General physician</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Dermatologist">Dermatologist</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Gynecologist">Gynecologist</option>
                        <option value="Orthopedist">Orthopedist</option>
                        <option value="Neurologist">Neurologist</option>
                        <option value="Psychiatrist">Psychiatrist</option>
                        <option value="Oncologist">Oncologist</option>
                        <option value="Ophthalmologist">Ophthalmologist</option>
                    </select>
                </Dropdown> 
            </div>


            <div class="flex items-center gap-4">
                <Button :disabled="form.processing">Save</Button>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>

    <section class="w-1/2">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Upload Photo
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Upload your account's profile photo.
            </p>
        </header>

        <form @submit.prevent="SaveUploadPhoto" enctype="multipart/form-data"
            class="mt-6 space-y-6">

            <div class="mx-auto w-64 text-center mt-20">
                <div class="relative w-64">
                    <!-- Displayed image -->

                    <img class="w-64 h-64 rounded-full absolute border" 
                    :src="$page.props.auth.user.image_user ? '/storage/uploads/' + $page.props.auth.user.image_user : 'images/default-profile.jpg'" 
                    alt="" />

                    <!-- Overlay for clicking to upload -->
                    <label for="image_user" class="w-64 h-64 group hover:bg-gray-200 opacity-60 rounded-full absolute flex justify-center items-center cursor-pointer transition duration-500">
                        <img class="hidden group-hover:block w-12" src="https://www.svgrepo.com/show/33565/upload.svg" alt="" />
                        <input type="file" id="image_user" name="image_user" accept="image/jpeg, image/png, image/jpg, image/gif" class="hidden" @change="handleFileUpload">
                    </label>
                </div>
            </div>     
           
            <Button type="submit" >SAVE ME </Button>
        </form>
    </section>

    </div>

</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        image_user: null,
      },
    };
  },
  methods: {
    SaveUploadPhoto() {
      const formData = new FormData();
      formData.append('image_user', this.form.image_user); // Use the correct key and value

      console.log('Form submitted:', this.form.image_user);

      axios.patch('/profile/staff/photo', formData)
        .then(response => {
          // Handle success response if needed
        })
        .catch(error => {
          console.error('Error adding user:', error);
        });
    },
    handleFileUpload(event) {
      this.form.image_user = event.target.files[0];
    //   console.log(this.form.image_signature);
    },
  }
}
</script>
