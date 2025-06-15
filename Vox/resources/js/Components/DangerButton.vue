<script setup>
defineProps({
    type: {
        type: String,
        default: 'button'
    }
})
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-[15px] border border-transparent bg-red-600
        px-4 py-2 text-[14px] font-semibold tracking-widest text-white transition
        duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2
        focus:ring-red-500 focus:ring-offset-2 active:bg-red-700"
    >
        <slot />
    </button>
</template>
