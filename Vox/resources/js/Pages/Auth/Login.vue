<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import FormLayout from "@/Components/FormLayout.vue";
import PrimaryInput from "@/Components/PrimaryInput.vue";
import {onMounted, ref} from "vue";
import {useMessage} from "naive-ui";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const message = ref('')

onMounted( () => {
    message.value = useMessage()
} )

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    if (!form.email || !form.password)
    {
        message.value.warning('Заполните все поля!')
        return
    }
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <guestLayout>
        <Head title="Вход" />
        <div class="min-w-[340px]">
            <form-layout rounded="rounded-[20px] md:rounded-[50px]">
                <section class="flex flex-col items-center">
                    <primary-input
                        label="Email"
                        bg="bg-white"
                        name="email"
                        id="email"
                        v-model="form.email"
                        border="border-[2px] border-voxBlue"
                        color="text-black"
                        width="w-[250px] md:w-[342px]"
                        height="h-[42px] md:h-[52px]"
                        margin="mt-[25px]"
                    />
                    <input-error :message="form.errors.email"
                                 width="w-[190px] md:w-[342px]"
                                 margin="mt-[10px]"
                    />
                    <primary-input
                        label="Пароль"
                        type="password"
                        name="password"
                        id="password"
                        v-model="form.password"
                        bg="bg-white"
                        border="border-[2px] border-voxBlue"
                        color="text-black"
                        width="w-[250px] md:w-[342px]"
                        height="h-[42px] md:h-[52px]"
                        margin="mt-[25px]"
                    />
                    <input-error :message="form.errors.password"
                                 width="w-[190px] md:w-[342px]"
                                 margin="mt-[10px]"
                    />
                    <primary-button @click="submit" margin="mt-[25px]">Войти</primary-button>
                </section>
                <section class="flex justify-center mt-[20px]">
                    <small class="text-sm">Нет аккаунта? <button class="text-voxBlue" @click.prevent="router.visit(route('register'))">Регистрация</button></small>
                </section>
            </form-layout>
        </div>
    </guestLayout>
</template>
