<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <n-message-provider>
    <main class="bg-gray-200 w-full min-h-screen flex justify-center items-center">
        <slot/>
    </main>
    </n-message-provider>
</template>
