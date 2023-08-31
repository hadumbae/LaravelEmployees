<script setup>

import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/Shared/Inputs/InputLabel.vue';
import TextInput from '@/Components/Shared/Inputs/TextInput.vue';
import InputError from '@/Components/Shared/Inputs/InputError.vue';
import InputFileUpload from '@/Components/Shared/Inputs/InputFileUpload.vue';

const form = useForm({
    name: '',
    email: '',
    website: '',
    logo: null,
    logoFile: null
});

const submit = () => {
    form.logo = form.logoFile ? form.logoFile.name : null;

    form.post(route('companies.store'), {
        onFinish: (response) => {
            console.log(response);
        }
    })
}

</script>

<template>
    <Head title="Companies | Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Create A Company</h2>
        </template>

        {{ form }}

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="p-5 bg-white rounded-xl">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name"
                                        value="Name" />
                            <TextInput id="name"
                                       type="text"
                                       v-model="form.name"
                                       class="block w-full mt-1"
                                       autofocus
                                       required></TextInput>
                            <InputError :message="form.errors.name" />
                        </div>
                        <div class="mt-3">
                            <InputLabel for="email"
                                        value="Email" />
                            <TextInput id="email"
                                       type="email"
                                       v-model="form.email"
                                       class="block w-full mt-1"></TextInput>
                            <InputError :message="form.errors.email" />
                        </div>
                        <div class="mt-3">
                            <InputLabel for="website"
                                        value="Website" />
                            <TextInput id="website"
                                       type="text"
                                       v-model="form.website"
                                       class="block w-full mt-1"></TextInput>
                            <InputError :message="form.errors.website" />
                        </div>
                        <div class="mt-3">
                            <InputLabel for="logoFile"
                                        value="Logo" />
                            <InputFileUpload id="logoFile"
                                             v-model="form.logoFile"
                                             class="block w-full mt-1"></InputFileUpload>
                            <InputError :message="form.errors.website" />
                        </div>
                        <div class="grid grid-cols-1 gap-1 mt-5 text-right">
                            <div>
                                <PrimaryButton>Submit</PrimaryButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
