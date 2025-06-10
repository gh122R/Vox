<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Head, Link, router, useForm, usePage} from '@inertiajs/vue3';
import FormLayout from "@/Components/FormLayout.vue";
import PrimaryInput from "@/Components/PrimaryInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimarySelect from "@/Components/PrimarySelect.vue";
import {useMessage} from "naive-ui";
import {onMounted, ref} from "vue";

const {props} = usePage()
const departments = props.departments
const message = ref(null)

onMounted(() => {
    message.value = useMessage()
})

const form = useForm({
    name: '',
    email: '',
    department_id: '',
    password: '',
    password_confirmation: ''
});

const submit = () => {
    if (!form.name || !form.email || !form.password || !form.password_confirmation || !form.department_id)
    {
        message.value.warning('Заполните все поля!')
        return
    }
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>
    <GuestLayout>
        <Head title="Регистрация"/>
        <div class="min-w-[340px]">
            <form-layout rounded="rounded-[20px] md:rounded-[50px]">
                <section class="flex flex-col justify-center items-center mb-[22px]">
                    <primary-input placeholder="Пётр..."
                                   v-model="form.name"
                                   label="Имя"
                                   id="name"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[250px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"/>
                    <input-error :message="form.errors.name"/>
                    <primary-input placeholder="petr@gmail.com"
                                   v-model="form.email"
                                   label="Email"
                                   id="email"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[250px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.email"/>
                    <primary-input v-model="form.password"
                                   label="Пароль"
                                   id="password"
                                   bg="bg-white"
                                   type="password"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[250px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.password"/>
                    <primary-input v-model="form.password_confirmation"
                                   label="Подтвердите пароль"
                                   id="password_confirmation"
                                   type="password"
                                   bg="bg-white"
                                   border="border-[2px] border-voxBlue"
                                   color="text-black"
                                   width="w-[250px] md:w-[342px]"
                                   height="h-[42px] md:h-[52px]"
                                   margin="mt-[24px]"/>
                    <input-error :message="form.errors.password_confirmation"/>
                    <primary-select placeholder="Выберите отдел"
                                    v-model="form.department_id"
                                    :options="departments"
                                    name="department_id"
                                    label="Ваш отдел"
                                    bg="bg-white"
                                    border="border-[2px] border-voxBlue"
                                    color="text-black"
                                    width="w-[200px] md:w-[250px]"
                                    height="h-[42px] md:h-[52px]" margin="mt-[24px] mr-[40px] md:mr-[100px]"/>

                    <input-error :message="form.errors.department_id"/>
                </section>
                <section class="flex justify-center">
                    <primary-button @click.prevent="submit" width="w-[190px] md:w-[252px]">Зарегистрироваться</primary-button>
                </section>
                <section class="flex justify-center mt-[20px]">
                    <small class="text-sm">Есть аккаунт? <button class="text-voxBlue" @click.prevent="router.visit('/login')">Войти</button></small>
                </section>
            </form-layout>
        </div>
    </GuestLayout>
</template>
