<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import ScheduleTable from '@/Pages/Components/Admin/Schedule/ScheduleList.vue';
</script>

<template>
    <AuthenticatedLayout title="Schedule">

        
        <ScheduleTable/>


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