<script setup>

defineProps({
    company: Object
})

</script>

<template>
    <table class="w-full text-sm text-left text-gray-500 shadow-md dark:text-gray-400 rounded-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col"
                    class="px-6 py-3">
                    Name
                </th>

                <th scope="col"
                    class="px-6 py-3">
                    Email
                </th>

                <th scope="col"
                    class="px-6 py-3">
                    Website
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ company.name }}
                </th>
                <td class="px-6 py-4">
                    {{ company.email ? company.email : "-" }}
                </td>
                <td class="px-6 py-4">
                    {{ company.website ? company.website : "-" }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
