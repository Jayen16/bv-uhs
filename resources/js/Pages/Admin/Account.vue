<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import AccountTable from '@/Pages/Components/UserManagement/StaffAccount.vue';

</script>

<template>
    <AuthenticatedLayout title="Dashboard">

        <AccountTable />

    </AuthenticatedLayout>
</template>

<script>

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
</script>