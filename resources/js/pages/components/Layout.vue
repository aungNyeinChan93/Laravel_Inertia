<template>
    <div class="">
        <Head>
            <title>
                My App
            </title>
        </Head>
        <Navbar/>

        <main>
            <slot/>
        </main>

        <footer>
            <slot name="footer"/>

        </footer>
    </div>
</template>

<script setup>
import Navbar from './navbar.vue';
import { Head } from '@inertiajs/vue3';

</script>

<style lang="scss" scoped>

</style>
