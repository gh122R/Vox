<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import BackgroundWrapper from "@/Components/BackgroundWrapper.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout header="Настройки профиля">
        <div class="py-12 flex justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 place-items-center">
                <BackgroundWrapper classes="p-4 sm:p-8 w-[350px] md:w-[340px] lg:w-[400px] rounded-[clamp(25px,2vw,50px)] flex justify-center">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                    />
                </BackgroundWrapper>

                <BackgroundWrapper classes="p-4 sm:p-8 w-[350px] md:w-[400px] rounded-[clamp(25px,2vw,50px)] flex justify-center">
                    <UpdatePasswordForm class="w-full" />
                </BackgroundWrapper>

                <BackgroundWrapper class="col-span-1 md:col-span-2 p-4 shadow rounded-[clamp(25px,2vw,50px)] sm:p-8 w-3/4 md:w-full max-w-[700px] flex justify-center">
                    <DeleteUserForm class="w-full" />
                </BackgroundWrapper>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
