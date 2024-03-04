<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import StaffTable from '@/Pages/Components/UserManagement/StaffTable.vue';

</script>

<template>
    <AuthenticatedLayout title="Dashboard">

        <StaffTable/>

    </AuthenticatedLayout>
</template>

