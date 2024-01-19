<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-xs text-slate-700 hover:bg-slate-50 disabled:opacity-25 transition ease-in-out duration-150">
        <slot />
    </button>
</template>