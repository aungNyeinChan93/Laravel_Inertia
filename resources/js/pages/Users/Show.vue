<template>
    <div>
        <div class="container mx-auto px-10 mt-5">
            <Card :user="user">
                <Link as="button" href="/users" class="px-2 py-1 bg-blue-500 text-white rounded">Back</Link>
            </Card>
        </div>
    </div>
</template>

<script setup>
import Card from '../components/Card.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    user:{
        type: Object,
        required: true,
    }
});

</script>

<style lang="scss" scoped>

</style>
