<template>
    <ul class="list-disc pl-5 bg-gray-500 rounded p-2">
        <li v-for="customer in customers" :key="customer.id" class="mb-2">
            <span class="font-bold">{{ customer.name }}</span> - <span class="text-gray-600">{{ customer.email }}</span>
        </li>
    </ul>
</template>

<script setup>
defineProps({
    customers:{
        type: Array,
        required: true
    }
})
</script>

<style lang="scss" scoped>

</style>
