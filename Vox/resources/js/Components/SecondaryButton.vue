<script setup>
defineProps({
    classes:
        {
            type: String,
            default: ''
        },
    rounded:
        {
            type: String,
            default: 'rounded-[15px]'
        }
});
</script>

<template>
    <button
        :class="['inline-flex items-center text-white bg-voxBlue/100 px-[24px] ' +
         'py-2 text-[15px] font-semibold transition duration-250 hover:bg-voxBlue/70 disabled:opacity-25', rounded, classes]"
    >
        <slot />
    </button>
</template>
