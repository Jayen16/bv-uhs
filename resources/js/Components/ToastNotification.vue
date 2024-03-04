<template>
    <div class="fixed bottom-10 right-0 z-50 p-4">
        <div
            :class="{
                'bg-white border-gray-100': success,
                'bg-red-100 border-red-500': !success
            }"
            v-if="show"
            class="max-w-xs border rounded-xl shadow-lg dark:border-gray-700"
            role="alert"
        >
            <div class="flex p-4">
                <!-- Icon -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-2">
                        <svg
                            v-if="success"
                            class="w-8 h-8 text-green-500"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                        <svg
                            v-else
                            class="w-8 h-8 text-red-500"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </div>

                    <div class="flex-grow">
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            {{ message }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true,
        },
        show: {
            type: Boolean,
            default: false,
        },
        success: {
            type: Boolean,
            default: true, // Default to success
        },
    },
};
</script>
