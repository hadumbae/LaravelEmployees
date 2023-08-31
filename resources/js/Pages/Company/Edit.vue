<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/Shared/Inputs/InputError.vue';
import TextInput from '@/Components/Shared/Inputs/TextInput.vue';
import InputLabel from '@/Components/Shared/Inputs/InputLabel.vue';

const props = defineProps({ 'company': Object })

const form = useForm({
    'name': props.company.name,
    'email': props.company.email,
    'website': props.company.website,
    'logo': props.company.logo
});

const UpdateCompanyAction = () => {
    console.log("Submitted");

    form.patch(route('companies.update', { company: props.company.id }), {
        onFinish: (response) => {
            console.log(response);
        }
    })
}

</script>

<template>
    <Head title="Edit Company" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit | {{ company.name }}</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-5 bg-white rounded-xl">
                    <form @submit.prevent="UpdateCompanyAction">
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <InputLabel for="name"
                                            value="Name" />
                                <TextInput id="name"
                                           type="text"
                                           v-model="form.name"
                                           class="block w-full mt-1"
                                           autofocus
                                           required />
                                <InputError :message="form.errors.name" />
                            </div>
                            <div>
                                <InputLabel for="email"
                                            value="Email" />
                                <TextInput id="email"
                                           type="email"
                                           v-model="form.email"
                                           class="block w-full mt-1"
                                           autofocus
                                           required />
                                <InputError :message="form.errors.email" />
                            </div>
                            <div>
                                <InputLabel for="website"
                                            value="Website" />
                                <TextInput id="name"
                                           type="text"
                                           v-model="form.website"
                                           class="block w-full mt-1"
                                           autofocus
                                           required />
                                <InputError :message="form.errors.website" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-1">
                            <div class="mt-5 text-right">
                                <PrimaryButton>Submit</PrimaryButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
