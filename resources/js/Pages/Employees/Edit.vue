<script setup>

import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"

import InputSelect from "@/Components/Shared/Inputs/InputSelect.vue";
import InputError from "@/Components/Shared/Inputs/InputError.vue";
import InputLabel from "@/Components/Shared/Inputs/InputLabel.vue";
import TextInput from "@/Components/Shared/Inputs/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    companies: Array,
    employee: Object
})

const form = useForm({
    first_name: props.employee.first_name,
    last_name: props.employee.last_name,
    email: props.employee.email,
    phone: props.employee.phone,
    company_id: props.employee.company_id.toString(),
});

const submit = () => {
    form.patch(route('employees.update', { employee: props.employee.id }), {
        onFinish: (response) => {
            console.log(response);
        }
    })
}
</script>

<template>
    <Head :title="`Edit | ${employee.first_name} ${employee.last_name}`" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Create Employee</h2>
        </template>

        {{ form }}

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="p-5 bg-white rounded-xl">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="first_name"
                                        value="First Name" />
                            <TextInput type="text"
                                       class="block w-full mt-1"
                                       v-model="form.first_name"
                                       id="first_name"
                                       autofocus
                                       required />
                            <InputError :message="form.errors.first_name" />
                        </div>
                        <div class="mt-2">
                            <InputLabel for="last_name"
                                        value="Last Name" />
                            <TextInput type="text"
                                       class="block w-full mt-1"
                                       v-model="form.last_name"
                                       id="last_name"
                                       autofocus
                                       required />
                            <InputError :message="form.errors.last_name" />
                        </div>
                        <div class="mt-2">
                            <InputLabel for="email"
                                        value="Email" />
                            <TextInput id="email"
                                       type="email"
                                       v-model="form.email"
                                       class="block w-full mt-1" />
                            <InputError :message="form.errors.email" />
                        </div>
                        <div class="mt-2">
                            <InputLabel for="phone"
                                        value="Phone" />
                            <TextInput id="phone"
                                       type="text"
                                       v-model="form.phone"
                                       class="block w-full mt-1" />
                            <InputError :message="form.errors.phone" />
                        </div>
                        <div class="mt-2">
                            <InputLabel for="company_id"
                                        value="Company" />
                            <InputSelect id="company"
                                         v-model="form.company_id"
                                         class="block w-full mt-1"
                                         placeholder="Select a Company"
                                         required>
                                <option value=""></option>
                                <option :value="company.id"
                                        v-for="company in companies"
                                        :key="company.id">
                                    {{ company.name }}
                                </option>
                            </InputSelect>
                            <InputError :message="form.errors.company_id" />
                        </div>
                        <div class="mt-4 text-right">
                            <PrimaryButton :disabled="form.processing">Update</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
