<script setup>
import { ref } from 'vue';
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
        }
})
</script>

<template>
    <div class="min-h-screen bg-bgColor lg:px-4 lg:py-4">
<!--        <div class="lg:border lg:border-black min-h-screen lg:rounded-[50px]">-->
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
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div
                        class="border-t border-gray-200 pb-1 pt-4"
                    >
                        <div class="px-4">
                            <div
                                class="text-base font-medium text-gray-800"
                            >
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="mx-[50px] md:mx-[240px] mt-[40px] text-[clamp(18px,4vw,48px)] font-jost border-b border-black">
                <p>{{header}}</p>
            </div>


            <!-- Page Content -->
            <main>
                <slot />
            </main>
<!--        </div>-->
    </div>
</template>
