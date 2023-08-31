<script setup>

import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import CompanyShowActionDropdown from "@/Components/Company/CompanyShowActionDropdown.vue";
import CompanyInfoTable from "@/Components/Company/CompanyInfoTable.vue";
import CompanyEmployeesTable from "@/Components/Employee/CompanyEmployeesTable.vue"

defineProps({
    'company': Object
});

</script>

<template>
    <Head :title="company.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <h2 class="text-xl font-semibold leading-tight text-gray-800">
                            #{{ company.id }} | {{ company.name }}
                        </h2>
                    </div>
                    <div class="text-right">
                        <CompanyShowActionDropdown :company="company" />
                    </div>
                </div>
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <CompanyInfoTable :company="company" />
            </div>

            <div class="flex justify-center mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8"
                 v-if="company.logoLink">
                <img :src="company.logoLink"
                     class="max-h-40" />
            </div>

            <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
                <CompanyEmployeesTable :company="company"
                                       :employees="company.employees"
                                       v-if="company.employees.length > 0" />
                <div class="p-5 bg-white rounded-xl"
                     v-else>
                    No Employees
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
