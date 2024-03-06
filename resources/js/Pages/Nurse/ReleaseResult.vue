<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import ReleaseTable from '@/Pages/Components/Nurse/ReleaseTable.vue';

</script>

<template>
    <AuthenticatedLayout title="Dashboard">

        <ReleaseTable/>

    </AuthenticatedLayout>
</template>

<script>

export default {
    components: {
    },
    data() {
        return {
            showModal: false,
            modalMaxWidth: '2xl' 
        };
    }
};
</script>