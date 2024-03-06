<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Modal from '@/Components/Modal.vue'
import VisitTable from '@/Pages/Components/Nurse/VisitTable.vue';

</script>

<template>
    <AuthenticatedLayout title="Visitor List">

        <VisitTable/>

    </AuthenticatedLayout>
</template>

<script>

export default {
    components: {
        Modal,
    },
    data() {
        return {
            showModal: false,
            modalMaxWidth: '2xl' 
        };
    }
};
</script>