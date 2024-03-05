<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import AppointmentTable from '@/Pages/Components/Admin/Appointment/AppointmentGeneral.vue';
</script>

<template>
    <AuthenticatedLayout title="Dashboard">

        
        <AppointmentTable/>


    </AuthenticatedLayout>
</template>

<!-- <script>

export default {
    components: {
        Modal,
        AccountTable
    },
    data() {
        return {
            showModal: false,
            modalMaxWidth: '2xl' 
        };
    }
};
</script> -->