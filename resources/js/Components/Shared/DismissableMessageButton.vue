<script setup>

import { ref } from "vue";

const props = defineProps({
    message: String
})

const flashMessage = ref(props.message);
</script>

<template>
    <button class="px-4 py-1 font-bold text-blue-400 border border-blue-400 hover:bg-white hover:text-red-300 hover:border-red-300"
            @click="flashMessage = null"
            v-if="flashMessage">
        {{ flashMessage }}
    </button>
</template>
