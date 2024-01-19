<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input ref="input"
        class="border-slate-300 py-2.5 focus:border-slate-500 focus:ring-slate-500 rounded-lg text-xs placeholder:text-xs"
        :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
</template>