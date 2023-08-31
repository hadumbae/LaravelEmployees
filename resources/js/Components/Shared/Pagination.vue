<script setup>
defineProps({
    'links': Array
})
</script>

<template>
    <Component v-for="link in links"
               :is="link.url ? 'Link': 'Span'"
               :href="link.url"
               v-html="link.label"
               class="px-1"
               preserve-scroll
               :class="{
                   'text-gray-400': !link.url,
                   'font-bold text-blue-400': link.active
               }"></Component>
</template>
