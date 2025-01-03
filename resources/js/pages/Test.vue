<template>
    <Head>
        <title>test</title>
    </Head>
    
        <h1 class="text-4xl font-bold mt-10">Test Page</h1>
        <p class="text-lg mt-5">Welcome to the Test Page</p>
        <ul>
            <li v-for="user in props.users" :key="user.id">{{ user.name }}</li>
        </ul>

        <p class="mt-[800px]">The time is: {{ time }}</p>
        <Link href="/test/users" as="button" class="px-2 py-1 rounded bg-red-500 m-3" preserve-scroll> Refresh</Link>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import { onMounted } from 'vue';
defineProps({
    // users: {
    //     type: Array,
    //     required: true
    // },
    time:{
        type: String,
        required: true
    }
})

const {props} = usePage();

onMounted(()=>{
    console.log(props.users);
});

console.log();


</script>

<style lang="scss" scoped></style>
