<script setup>

import {router} from "@inertiajs/vue3";

defineProps({
    color:
        {
            type: String,
            default: 'text-white'
        },
    width:
        {
            type: String,
            default: 'w-[164px]'
        },
    height:
        {
            type: String,
            default: 'h-[38px]'
        },
    bg:
        {
            type: String,
            default: 'bg-voxBlue'
        },
    margin:
        {
          type: String,
          default: ''
        },
    border:
        {
            type: String,
            default: ''
        },
    link:
        {
            type: String,
            default: ''
        },
    placeholder:
        {
            type: String,
            default: ''
        },
    id:
        {
            type: String,
            default: 'primaryInput'
        },
    label:
        {
            type: String,
            default: ''
        },
    modelValue:
        {
            type: String,
            default: ''
        }
})

const emit = defineEmits(['update:modelValue'])

function onInput(event)
{
    emit('update:modelValue', event.target.value)
}

function goTo(path)
{
    if(path) router.visit(path)
}

</script>
<template>
    <div :class="['flex flex-col', margin]">
        <label :for="id" class="font-jost font-medium text-[clamp(14px,1vw,18px)]">{{label}}</label>
        <div class="relative inline-block">
            <div :class="['absolute top-[5px] left-[5px] w-full h-full rounded-[15px] bg-transparent border border-black', width,height]"></div>
            <input  :id="[id]" @click="goTo(link)" @input="onInput" :placeholder="[placeholder]" :value="modelValue"
                    :class="['focus:translate-x-[5px] rounded-[15px] focus:translate-y-[5px] ' +
                         'transition-all duration-150 relative z-10 text-[14px] md:text-[18px] ' +
                         'font-medium md:px-[28px] py-[7px]' +
                         'md:h-[48px] placeholder-gray-400',width,height,bg,color,border]"/>
        </div>
    </div>
</template>

