<script setup>

defineProps({
    modelValue: { type: File, required: false }
});

defineEmits(['update:modelValue'])

</script>

<template>
    <input class="text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
           aria-describedby="file_input_help"
           @input="$emit('update:modelValue', $event.target.files[0])"
           type="file">
</template>
