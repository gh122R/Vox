<script setup>
import {onBeforeUnmount, onMounted, ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link, router} from '@inertiajs/vue3';
import HeaderUserPanel from "@/Components/HeaderUserPanel.vue";

const showingNavigationDropdown = ref(false);

defineProps({
    header:
        {
            type: String,
            default: ''
        },
    pageUrl:
        {
            type: String,
            default: ''
        }
})


onMounted(() => {
    const page = document.getElementById('page')

    const opacity = () => {
        setTimeout(() => {
            page.classList.remove('opacity-0')
            page.classList.add('opacity-100')
        }, 50)
    }

    opacity()
})

</script>

<template>
    <div class="min-h-screen bg-bgColor lg:px-4 lg:py-4">
            <nav>
                <!-- Primary Navigation Menu -->
                <div class="mx-auto py-[45px] px-[35px] md:px-[55px] lg:px-[85px]">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link href="/dashboard">
                                    <ApplicationLogo/>
                                </Link>
                                <span class="font-jost uppercase text-[clamp(30px,2vw,44px)] ml-[18px]">vox</span>
                            </div>
                        </div>
                        <!-- Navigation Links -->
                        <div class="">
                            <div class="hidden justify-end sm:-my-px sm:ms-10 sm:flex">
                                <HeaderUserPanel />
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex':
                                            !showingNavigationDropdown,
                                    }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex':
                                            showingNavigationDropdown,
                                    }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                    <div
                        :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                        class="sm:hidden"
                    >
                        <div class="space-y-1 pb-3 pt-2">
                            <ResponsiveNavLink
                                :href="route('dashboard')"
                                :active="route().current('dashboard')"
                            >
                                Мои обращения
                            </ResponsiveNavLink>
                        </div>

                        <!-- Responsive Settings Options -->
                        <div
                            class="border-t border-gray-200 pb-1 pt-4"
                        >
                            <div class="px-4">
                                <div class="text-base font-medium text-gray-800">
                                    <span>Имя:</span> {{ $page.props.auth.user.name }}
                                </div>
                                <div class="text-sm font-medium text-gray-500">
                                    <span>Почта:</span> {{ $page.props.auth.user.email }}
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink :href="route('profile.edit')">
                                    Настройки профиля
                                </ResponsiveNavLink>
                                <ResponsiveNavLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    <span class="text-red-500">Выйти</span>
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
            </nav>

            <div class="mx-[30px] md:mx-[100px] lg:mx-[240px] mt-[40px] text-[clamp(24px,4vw,48px)] font-jost border-b border-black">
                <p>{{header}}</p>
            </div>

            <main id="page" class="opacity-0 transition-opacity duration-500 ease-in">
                <slot />
            </main>
    </div>
</template>

<style scoped>

</style>
