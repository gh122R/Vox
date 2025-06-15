<script setup>

import BackgroundWrapper from "@/Components/BackgroundWrapper.vue";
import {router, usePage} from "@inertiajs/vue3";

const user = usePage().props.auth.user;

</script>

<template>
    <BackgroundWrapper classes="flex justify-center items-center rounded-[50px] lg:rounded-[70px] w-[240px] lg:w-[300px] h-[70px] lg:h-[85px]">
        <div class="flex justify-center items-center gap-[32px]">
            <div class="min-w-[50px] ml-[20px] cursor-pointer hover:translate-x-[2.5px] hover:translate-y-[2.5px] duration-200">
                <img src="/svg/notification.svg" alt="Уведомления">
            </div>
            <div class="min-w-[30px] mt-[10px] cursor-pointer hover:translate-x-[2.5px] hover:translate-y-[2.5px] duration-200">
                <img src="/svg/message.svg" alt="Обращения">
            </div>
            <div @click.prevent="router.visit(route('profile.edit'))" class="cursor-pointer hover:translate-x-[2.5px] hover:translate-y-[2.5px] duration-200">
                <img :src="`storage/${user.avatar}` || '/jpg/defaultUserAvatar.jpg'" alt="аватар" class="border object-cover border-black rounded-full w-[45px] h-[45px] lg:w-[60px] lg:h-[60px] mr-[45px]">
            </div>
        </div>
    </BackgroundWrapper>
</template>

<style scoped>

</style>
