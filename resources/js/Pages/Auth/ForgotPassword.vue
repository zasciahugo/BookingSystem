<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AuthenticationCard>
        <template #logo>
            <div class="text-center">
                <h1 class="font-bold text-2xl text-slate-800">Reset Password</h1>
                <p class="text-xs">Forgot your password? No problem.</p>
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

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>

        <div>
            <p class="mt-4 text-xs text-slate-700">Back to <a :href="route('login')" class="underline">Sign
                    In</a></p>
        </div>
    </AuthenticationCard>
</template>