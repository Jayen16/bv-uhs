<script setup>
import Card from 'primevue/card';
import { AppointmentIcon } from '@/Components/Icons/outline';
</script>

<template>

<Card style="width: 25rem; overflow: hidden" class="mb-5">

    <template #title> <AppointmentIcon size="lg"/> Appointment</template>
    <template #subtitle>Number of appointment</template>
    <template #content>
        <p class="m-0">
           Total Appointment
        </p>
    </template>

</Card>


</template>