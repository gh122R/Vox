<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import FormLayout from "@/Components/FormLayout.vue";
import Test from "@/Components/NumericInput.vue";
import {ref} from "vue";
import NumericInput from "@/Components/NumericInput.vue";
import PrimaryInput from "@/Components/PrimaryInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimarySelect from "@/Components/PrimarySelect.vue";


const form = useForm({
    name: '',
    email: '',
    department_id: '',
    password: '',
    password_confirmation: ''
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <guest-layout>
        <div class="min-w-[300px]">
            <form-layout rounded="rounded-[20px] md:rounded-[50px]">
                <section class="flex flex-col justify-center items-center mb-[22px]">
                    <primary-input placeholder="Пётр..." v-model="form.name"
                                   label="Имя"
                                   id="name"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[190px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"/>
                    <input-error :message="form.errors.name"/>
                    <primary-input placeholder="petr@gmail.com" v-model="form.email"
                                   label="Email"
                                   id="email"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[190px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.email"/>
                    <primary-input placeholder="Пётр..." v-model="form.c"
                                   label="Пароль"
                                   id="password"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[190px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.password"/>
                    <primary-input placeholder="Пётр..." v-model="form.password_confirmation"
                                   label="Подтвердите пароль"
                                   id="password_confirmation"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[190px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.password_confirmation"/>
                    <primary-input placeholder="Пётр..." v-model="form.department_id"
                                   label="Имя"
                                   id="departmentId"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[190px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.department_id"/>

                </section>
                <primary-select/>
                <section class="flex justify-center">
                    <primary-button @click.prevent="submit" width="w-[190px] md:w-[252px]">Зарегистрироваться</primary-button>
                </section>
            </form-layout>
        </div>
    </guest-layout>
</template>
