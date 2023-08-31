<script setup>

import { Head } from '@inertiajs/vue3';
import EmployeeInfoTable from "@/Components/Employee/EmployeeInfoTable.vue";
import EmployeeShowActionDropdown from "@/Components/Employee/EmployeeShowActionDropdown.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    employee: Object
})

</script>

<template>
    <Head :title="`${employee.first_name} ${employee.last_name}`" />

    <AuthenticatedLayout>
        <template #header>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">
                        #{{ employee.id }} | {{ employee.first_name }} {{ employee.last_name }}
                    </h2>
                </div>
                <div class="text-right">
                    <EmployeeShowActionDropdown :employee="employee" />
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <EmployeeInfoTable :employee="employee" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
