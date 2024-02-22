<script setup>
import DanLayout from "@/Layouts/DanLayout.vue";
const { products } = defineProps({
    products: Object,
});
</script>
<template> <DanLayout title="Products">
    <template #body> <h3 class="">List Products</h3>
    </template>
</DanLayout>
</template>
