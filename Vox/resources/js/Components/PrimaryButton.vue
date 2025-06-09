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
    bg:
        {
            type: String,
            default: 'bg-voxBlue'
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
        }
})



function goTo(path)
{
    router.visit(path)
}

</script>
<template>
    <div class="relative inline-block group">
        <div class="absolute top-[5px] left-[5px] w-full h-full rounded-[15px] bg-transparent border border-black "></div>
        <button @click="goTo(link)"
            :class="['group-hover:translate-x-[5px] group-hover:translate-y-[5px] transition-all duration-150 relative z-10 text-[14px] md:text-[18px] font-medium text-center px-[28px] py-[7px] rounded-[15px] md:h-[48px] h-[38px]',width,bg,color,border]"
        >
            <slot />
        </button>
    </div>
</template>

