<script setup>

import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

defineProps({ company: Object })

</script>

<template>
    <Dropdown align="right"
              width="48">
        <template #trigger>
            <span class="inline-flex rounded-md">
                <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md cursor-pointer hover:text-gray-700 focus:outline-none">
                    Actions

                    <svg class="ml-2 -mr-0.5 h-4 w-4"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </button>
            </span>
        </template>

        <template #content>
            <DropdownLink :href="route('companies.index')"> Companies Index </DropdownLink>
            <DropdownLink :href="route('companies.edit', { company: company.id })"
                          class="text-blue-300"> Edit Company </DropdownLink>
            <DropdownLink method="DELETE"
                          :href="route('companies.destroy', { company: company.id })"
                          as="button"
                          class="text-red-500"> Delete Company </DropdownLink>
        </template>
    </Dropdown>
</template>
