<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { MailIcon, LockClosedIcon, LoginIcon } from '@heroicons/vue/outline'
import InputIconWrapper from '@/Components/InputIconWrapper.vue'
import Button from '@/Components/Button.vue'
import Checkbox from '@/Components/Checkbox.vue'
import GuestLayout from '@/Layouts/Guest.vue'
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import ValidationErrors from '@/Components/ValidationErrors.vue'
import ForgotPassword from './ForgotPassword.vue'

defineProps({
    canResetPassword: Boolean,
    status: String,
})

const form = useForm({
    username: '',
    password: '',
    remember: false
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <!-- <GuestLayout title="Log in"> -->
        <!-- <ValidationErrors class="mb-4" /> -->

        <div class="flex flex-row w-full h-screen">
            <div class="w-1/2  flex flex-col bg-cover bg-center h-full"  style="background-image: url('/images/cvsu.jpg');">
                <div class="flex items-center justify-center h-screen">
                    <div class="flex flex-col items-center">
                        <img class="w-96 mb-3" src="/images/infirmary_logo.png" alt="cvsu logo">
                        <div class="text-center text-white mb-2">
                            <p class="font-bold" style="font-size: 40px;">University Health Services Unit</p>
                        </div>
                        <div class="text-center text-white">
                            <p class="font-medium text-lg">
                                Manage Medical Records with ease - Cavite State University's <br> University Health Management Information System
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right side -->
            <div class="w-1/2 flex flex-col">
                <div class="flex h-full justify-center items-center space-y-8" style="background: #F6FFF1;">
                    <div class="text-center rounded-3xl">
                        <div class="py-12 px-12 bg-white rounded-2xl shadow-xl z-20">
                            <div>
                                <h1 class="text-3xl font-bold text-center mb-4">Login your Account</h1>
                                <p class="w-80 text-center text-sm mb-8 font-semibold text-gray-700 tracking-wide ">
                                    Manage Medical Records with ease</p>
                            </div>

                            <ValidationErrors class="mb-4" />

                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                {{ status }}
                            </div>

                            <form @submit.prevent="submit">
                                <div class="grid gap-6">
                                    <div class="space-y-2">
                                        <Label for="Username" value="Username" />
                                        <InputIconWrapper>
                                            <template #icon>
                                                <MailIcon aria-hidden="true" class="w-5 h-5" />
                                            </template>
                                            <Input withIcon id="username" type="text" class="block w-full" placeholder="Username" v-model="form.username" required autofocus autocomplete="username" />
                                        </InputIconWrapper>
                                    </div>

                                    <div class="space-y-2">
                                        <Label for="password" value="Password" />
                                        <InputIconWrapper>
                                            <template #icon>
                                                <LockClosedIcon aria-hidden="true" class="w-5 h-5" />
                                            </template>
                                            <Input withIcon id="password" type="password" class="block w-full" placeholder="Password" v-model="form.password" required autocomplete="current-password" />
                                        </InputIconWrapper>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <label class="flex items-center">
                                            <Checkbox name="remember" v-model:checked="form.remember" />
                                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                        </label>

                                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-blue-500 hover:underline">
                                            Forgot your password?
                                        </Link>
                                    </div>

                                    <div>
                                        <Button class="justify-center gap-2 w-full" :disabled="form.processing" v-slot="{iconSizeClasses}">
                                            <LoginIcon aria-hidden="true" :class="iconSizeClasses" />
                                            <span>Log in</span>
                                        </Button>
                                    </div>

                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Don't have an account?
                                        <Link :href="route('register')" class="text-blue-500 hover:underline">
                                            Register
                                        </Link>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 text-center p-4 ml-2">
                    <p class="text-base font-medium text-gray-700">© Copyright 2023 Cavite State University  | University Health Services Unit | Management Information System</p>
                </div>
            </div>
            <div class="flex-none absolute bottom-0 right-0">
                <img src="/images/laya at diwa - Edited.png" alt="Image" class="w-auto h-96 opacity-40" />
            </div>
        </div>
    <!-- </GuestLayout> -->
</template>
