<script setup>

import FormLayout from "@/Components/FormLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <guest-layout>
        <div class="items-center px-4">
            <FormLayout rounded="rounded-[20px] md:rounded-[50px]">
              <section class="flex justify-start items-center gap-[18px]">
                <application-logo/>
                <p class="uppercase md:text-[48px] font-jost text-[28px]">Vox</p>
              </section>
              <section class="flex flex-col items-center">
                <p class="text-[clamp(16px,2vw,28px)] font-jost max-w-[400px] mt-[7px]">Внутрикорпоративный приём и обработка обращений</p>
                <p class="text-[clamp(14px,1.2vw,18px)] font-jost text-[#505050] mt-[24px] max-w-[380px]">Упростите внутренние процессы — принимайте и обрабатывайте обращения в единой системе.</p>
              </section>
              <section class="mt-[46px] flex justify-center gap-[10px] md:gap-[25px]">
                <primary-button
                    width="w-[100px] md:w-[150px]"
                    link="/login"
                    title="Вход"
                >
                    Войти
                </primary-button>
                <primary-button
                    width="w-[170px] md:w-[252px]"
                    color="text-voxBlue"
                    bg="bg-white"
                    border="border-[2px] border-voxBlue"
                    link="/register"
                    title="Регистрация"
                  >
                  Зарегистрироваться
                </primary-button>
              </section>
            </FormLayout>
        </div>
    </guest-layout>
</template>

