<script setup>
import {computed, watch} from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import BackgroundWrapper from "@/Components/BackgroundWrapper.vue";
import DangerButton from "@/Components/DangerButton.vue";
import {useMessage} from "naive-ui";;

const props = defineProps({
    status: {
        type: String,
    },
});


const message = useMessage()

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'), {
        onSuccess: () => {
            message.success('Отправлена новая ссылка для подтверждения')
        }
    });
};

</script>

<template>
    <GuestLayout>
        <Head title="Подтверждение почты" />

        <background-wrapper classes="flex justify-center flex-col p-[35px] w-[350px] md:w-[500px] rounded-[30px] h-[200px]">
            <div class="mb-4 text-sm">
                Прежде чем начать, подтвердите свой адрес электронной почты, нажав на ссылку, которую мы только что отправили вам по электронной почте :)
            </div>
            <div class="flex items-center justify-center gap-10">
                <form @submit.prevent="submit">
                        <SecondaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Отправить снова
                        </SecondaryButton>

                </form>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        <DangerButton>Выйти</DangerButton>
                    </Link>
            </div>
        </background-wrapper>
    </GuestLayout>
</template>
