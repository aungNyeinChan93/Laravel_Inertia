<template>
    <div class="p-2 rounded-lg shadow-lg bg-gray-300">
        <div class="p-2">
            <h2 class="text-lg font-bold">{{ user.id }} || {{ user.name }}</h2>
            <p class="text-sm text-gray-500">{{ user.email }}</p>
        </div>
        <div class="p-2">
            <p class="text-sm">
                Created at: {{ user.created_at }}
            </p>
        </div>
        <div class="p-2">
            <slot>
                <Link as="button" :href="'users/'+user.id" class="px-2 py-1 ms-3 bg-blue-500 text-white rounded">Detail</Link>
                <Link as="button" :href="'users/'+user.id +'/edit'" class="px-2 py-1 ms-3 bg-yellow-500 text-white rounded">Edit</Link>
                <Link as="button" type="submit"  method="post" :href="'users/'+user.id" class="px-2 py-1 ms-3 bg-red-500 text-white rounded">Delete</Link>
            </slot>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    user: {
        type: Object,
        required: true
    }
});

</script>

<style lang="scss" scoped>

</style>
