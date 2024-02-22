<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div
        class="w-full min-h-screen flex flex-col items-center pt-6 bg-gray-100">
        <div class="w-full mt-6 px-6 py-4 bg-white overflow-hidden">
            <slot name="body" />
        </div>
    </div>
</template>
