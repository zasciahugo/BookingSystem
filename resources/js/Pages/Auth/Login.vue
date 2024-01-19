<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Sign In" />

    <AuthenticationCard>
        <template #logo>
            <div class="text-center">
                <h1 class="font-bold text-2xl text-slate-800">Sign In</h1>
                <p class="text-xs">Welcome back, you've been missed!</p>
            </div>
        </template>

        <div v-if="status" class="mb-4 font-medium text-xs text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="relative">
                <InputLabel for="email" value="Email Address" />

                <div class="text-slate-700 absolute inset-y-0 left-0 pl-3 pt-5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </div>

                <TextInput id="email" v-model="form.email" type="email" class="pl-9 mt-1 block w-full" required autofocus
                    autocomplete="email" placeholder="Email Address" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>


            <div class="mt-4 relative">
                <InputLabel for="password" value="Password" />

                <div class="text-slate-700 absolute inset-y-0 left-0 pl-3 pt-5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
                    </svg>
                </div>

                <TextInput id="password" v-model="form.password" type="password" class="pl-9 mt-1 block w-full" required
                    autocomplete="current-password" placeholder="Password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>


            <div class="flex items-center justify-between mt-4">
                <div>
                    <label class="flex items-center">
                        <Checkbox v-model:checked="form.remember" name="remember" />
                        <span class="ms-2 text-xs text-slate-700">Remember Me</span>
                    </label>
                </div>

                <Link :href="route('password.request')" class="text-xs text-slate-700 hover:text-slate-950 underline">
                Forgot Password?
                </Link>
            </div>

            <div class="mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Sign In
                </PrimaryButton>
            </div>
        </form>

        <div>
            <p class="mt-4 text-xs text-slate-700">New to Booking System? <a :href="route('register')"
                    class="underline">Register</a></p>
        </div>
    </AuthenticationCard>
</template>