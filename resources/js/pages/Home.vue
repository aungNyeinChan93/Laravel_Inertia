<template>
    <Head>
        <title>Home Page</title>
    </Head>

        <h1 class="text-4xl font-bold ">Home Page</h1>
        <p class="text-lg mt-5">Welcome {{ $page.props.auth.user.name }} || {{ user.email }} </p>


</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';


const page = usePage();
let user = ref(page.props.auth.user);

</script>

<style lang="scss" scoped></style>
