<script setup>

defineProps({
    employees: Object
});

</script>

<template>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col"
                    class="px-6 py-3">Name</th>
                <th scope="col"
                    class="px-6 py-3">Company</th>
                <th scope="col"
                    class="px-6 py-3">Email</th>
                <th scope="col"
                    class="px-6 py-3">Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-gray-400 bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                v-for="(employee, index) in employees.data"
                :key="employee.id">
                <th scope="row"
                    class="px-6 py-4 font-medium underline whitespace-nowrap dark:text-white hover:font-bold hover:text-gray-700">
                    <Link :href="route('employees.show', { employee: employee.id })">
                    {{ employee.first_name }} {{ employee.last_name }}
                    </Link>
                </th>
                <td class="px-6 py-4 underline hover:font-bold hover:text-gray-700">
                    <Link :href="route('companies.show', { company: employee.company_id })">
                    {{ employee.company.name }}
                    </Link>
                </td>
                <td class="px-6 py-4">
                    {{ employee.email }}
                </td>
                <td class="px-6 py-4">
                    {{ employee.phone }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
