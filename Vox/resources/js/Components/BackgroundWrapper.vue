<script setup>
defineProps({
    classes:
        {
        type: String,
        default: ''
        }
})
</script>
<template>
    <div :class="['bg-lightGray border border-black', classes]">
        <slot />
    </div>
</template>
