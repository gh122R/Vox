<script lang="ts">
import { defineComponent, ref } from 'vue'

export default defineComponent({
    setup() {

    }
})
</script>

<template>
    <n-space vertical>
        <n-select v-model:value="value" :options="options" placeholder="Выберите отдел"/>
    </n-space>
</template>
