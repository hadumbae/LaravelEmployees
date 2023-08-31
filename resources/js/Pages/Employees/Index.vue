<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '../../Components/Shared/Pagination.vue';
import EmployeesIndexTable from '../../Components/Employee/EmployeesIndexTable.vue';
import DismissableMessageButton from '@/Components/Shared/DismissableMessageButton.vue';

import { Head } from '@inertiajs/vue3';

defineProps({
    'employees': Object
})
</script>

<template>
    <Head title="Employees | Index" />

    <AuthenticatedLayout>
        <template #header>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">Employee Index</h2>
                </div>
                <div class="text-right">
                    <DismissableMessageButton :message="$page.props.flash.message" />
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <!-- With Data -->

                    <div class="relative overflow-x-auto"
                         v-if="employees.data.length > 0">
                        <EmployeesIndexTable :employees="employees" />
                        <div class="p-3 text-center">
                            <Pagination :links="employees.links" />
                        </div>
                    </div>

                    <!-- No Data -->

                    <div class="p-6 text-gray-600"
                         v-else>
                        <div class="relative overflow-x-auto">
                            No Employees
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<!-- mx-auto            -   margin-left: auto; margin-right: auto; -->
<!-- max-w-7xl          -   max-width: 80rem; /* 1280px */ -->
<!-- overflow-hidden	-   overflow: hidden; -->
<!-- relative           -   position: relative -->
