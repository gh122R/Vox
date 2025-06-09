<script setup>
defineProps({
    rounded:
        {
            type: String,
            default: 'rounded-[50px]'
        }
})
</script>

<template>
    <div :class="`bg-white h-full w-full p-[30px] shadow-[10px_10px_0px_rgba(0,0,0,0.05)] min-w-[200px] w-[300px] md:w-[500px] ${rounded}`">
        <slot/>
    </div>
</template>

