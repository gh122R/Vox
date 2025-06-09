<script setup lang="ts">
import { ref } from 'vue'

const value = ref(''.split(''))

defineProps({
    mask: {
        type: Boolean,
        default: false
    }
})

</script>

<template >
    <n-input-otp
        v-model:value="value"
        :mask="mask"
    />
</template>
