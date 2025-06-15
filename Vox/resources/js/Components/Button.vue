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
    <button :class="bg- [classes]">
        <slot/>
    </button>
</template>

