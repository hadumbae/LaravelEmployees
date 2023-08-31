<script setup>
defineProps({
    company: Object,
    employees: Array
})
</script>

<template>
    <table class="w-full text-sm text-left text-gray-500 shadow-md dark:text-gray-400 rounded-xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col"
                    class="px-6 py-3"
                    colspan="3">
                    {{ company.name }}'s Employees
                </th>
            </tr>
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
                    Phone
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-gray-400 bg-white border-b dark:bg-gray-800 dark:border-gray-800"
                v-for="employee in employees"
                :key="employee.id">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <Link :href="route('employees.show', { employee: employee.id })">
                    {{ employee.first_name }} {{ employee.last_name }}
                    </Link>
                </th>
                <td class="px-6 py-4">
                    {{ employee.email ? employee.email : "-" }}
                </td>
                <td class="px-6 py-4">
                    {{ employee.phone ? employee.phone : "-" }}
                </td>

            </tr>
        </tbody>
    </table>
</template>
