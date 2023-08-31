<script setup>

defineProps({
    companies: Object
})

</script>

<template>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col"
                    class="px-6 py-3">Name</th>
                <th scope="col"
                    class="px-6 py-3">Email</th>
                <th scope="col"
                    class="px-6 py-3">Website</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-gray-400 bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="(company, index) in companies.data"
                :key="company.id">
                <th scope="row"
                    class="px-6 py-4 font-medium underline hover:font-bold hover:text-gray-800 whitespace-nowrap dark:text-white">
                    <Link :href="route('companies.show', { company: company.id })">
                    {{ company.name }}</Link>
                </th>
                <td class="px-6 py-4 ">
                    {{ company.email }}
                </td>
                <td class="px-6 py-4 ">
                    {{ company.website }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
