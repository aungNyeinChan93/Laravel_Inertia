<template>
    <Head>
        <title> About</title>
    </Head>
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mt-10">About Page</h1>
            <p class="text-lg mt-5">Welcome to the About Page</p>

            <Lists :customers="customers" />
            <Table :customers="customers" />
        </div>
</template>

<script setup>

import { onMounted } from 'vue';
import Lists from './components/Lists.vue';
import Table from './components/Table.vue';

const customers = [
    { id: 1, name: 'John Doe', email: 'john@example.com', created_at: '2023-01-01', updated_at: '2023-01-02' },
    { id: 2, name: 'Jane Smith', email: 'jane@example.com', created_at: '2023-01-03', updated_at: '2023-01-04' },
    { id: 3, name: 'Sam Johnson', email: 'sam@example.com', created_at: '2023-01-05', updated_at: '2023-01-06' },
    { id: 4, name: 'Alice Brown', email: 'alice@example.com', created_at: '2023-01-07', updated_at: '2023-01-08' },
    { id: 5, name: 'Bob White', email: 'bob@example.com', created_at: '2023-01-09', updated_at: '2023-01-10' },
    { id: 6, name: 'Charlie Black', email: 'charlie@example.com', created_at: '2023-01-11', updated_at: '2023-01-12' },
    { id: 7, name: 'Diana Green', email: 'diana@example.com', created_at: '2023-01-13', updated_at: '2023-01-14' },
    { id: 8, name: 'Eve Blue', email: 'eve@example.com', created_at: '2023-01-15', updated_at: '2023-01-16' }
];

onMounted(() => {
    console.log('About page mounted');
});

</script>

<style lang="scss" scoped></style>
