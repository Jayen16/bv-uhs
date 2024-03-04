<script setup>
import { Head } from '@inertiajs/vue3'
import Sidebar from '@/Components/Sidebar/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
import PageFooter from '@/Components/PageFooter.vue'
import { sidebarState } from '@/Composables'


defineProps({
    title: String
})

</script>

<template>
    <Head :title="title">
    </Head>

    <div
        class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-eval-0 dark:text-gray-100"
    >
        <!-- Sidebar -->
        <Sidebar />

        <div
            style="transition-property: margin; transition-duration: 150ms"
            :class="[
                'min-h-screen flex flex-col',
                {
                    'lg:ml-64': sidebarState.isOpen,
                    'md:ml-16': !sidebarState.isOpen,
                },
            ]"
        >
            <!-- Navbar -->
            <Navbar />

            <!-- Page Heading -->
            <header v-if="$slots.header">
                <div class="p-4 sm:p-6">
                    <slot name="header" />
                </div>
            </header>


            <!-- <div class="flex justify-center items-center h-screen w-screen fixed top-0 left-0 bg-opacity-50 bg-gray-300 z-50" v-if="loading">
                <SpinnerVue/>
            </div> -->

            <!-- Page Content -->
            <main class="flex-1 px-4 sm:px-6">
                <slot />
            </main>

            <PageFooter />
        </div>
    </div>

   
</template>


<!-- <script>
import SpinnerVue from '@/Components/Spinner.vue';

export default {
  components: {
    SpinnerVue
  },
  data() {
    return {
      loading: false // Initially set to true
    };
  },
  mounted() {
    // Attach an event listener to the window.onload event
    window.onload = () => {
      // Set loading to false when all resources on the page have finished loading
      this.loading = false;
    };
  }
};
</script> -->

