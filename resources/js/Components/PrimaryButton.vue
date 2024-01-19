<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type"
        class="flex w-full justify-center bg-slate-700 hover:bg-slate-800 text-white py-2.5 px-4 border border-slate-700 hover:border-slate-800 focus:outline-none rounded-lg text-xs transition ease-in-out duration-150">
        <slot />
    </button>
</template>