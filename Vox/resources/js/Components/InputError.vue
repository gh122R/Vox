<script setup>
defineProps({
    message: {
        type: String,
    },
    width:
        {
            type: String,
            default: ''
        },
    margin:
        {
            type: String,
            default: ''
        }
});
</script>

<template>
    <div v-show="message" :class="[width, margin]">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
