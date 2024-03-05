<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import PatientTable from "@/Pages/Components/Common/PatientTable.vue";
import ConsultationForm from "@/Pages/Components/Common/ConsultationForm.vue";

</script>


<template>
    <AuthenticatedLayout title="Profile">
        <div class="p-8">
            <div class="flex justify-center items-center pl-14">
                <div class="flex flex-col justify-center pt-4 w-5/6">

                    <ConsultationForm/>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
