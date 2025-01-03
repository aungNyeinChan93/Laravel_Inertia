<template>
    <nav class=" bg-gray-200 flex p-2 justify-between px-6">
        <span class="brand">
            <h4 class="text-lg text-green-600">WELCOME {{ username.toUpperCase() }} </h4>
        </span>
        <ul class="flex justify-center items-center space-x-4 ">
            <li class="px-2 py-1 bg-green-300 rounded-xl hover:bg-green-400" :class="{'bg-red-300':$page.component === 'Home'}">
                <Link href="/">Home</Link>
            </li>
            <li class="px-2 py-1 bg-green-300 rounded-xl hover:bg-green-400" :class="{'bg-red-300':$page.component === 'About'}">
                <Link href="/about">About </Link>
            </li>
            <li class="px-2 py-1 bg-green-300 rounded-xl hover:bg-green-400" :class="{'bg-red-300':$page.component === 'Test'}">
                <Link href="/test/users">Test</Link>
            </li>
            <li class="px-2 py-1 bg-green-300 rounded-xl hover:bg-green-400" :class="{'bg-red-300':$page.component === 'Users/Index'}">
                <Link href="/users">Users</Link>
            </li>
            <li class="px-2 py-1 bg-green-300 rounded-xl hover:bg-green-400" :class="{'bg-red-300':$page.url === '/logout'}">
                <Link href="/logout" method="post" :data="{name:'chan'}" as="button">Logout</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3"
import { computed, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";


const { props ,component } = usePage();

const username = computed(() => {
    return props.test.user;
});

// onMounted(()=>{
//     console.log(component);

// });

</script>

<style lang="scss" scoped></style>
