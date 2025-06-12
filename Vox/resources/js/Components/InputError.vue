<script setup>

defineProps({
    message: {
        type: String,
    },
});

</script>

<template>
    <div v-show="message" class="flex justify-center">
        <p class="text-[14px] font-thin font-jost text-red-600 py-2 absolute">
            {{ message }}
        </p>
    </div>
</template>
