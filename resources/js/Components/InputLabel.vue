<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block text-xs text-slate-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
