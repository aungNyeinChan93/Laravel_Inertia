<template>

    <Head title="User Create" />
    {{ page }}
    <div class="container mx-auto max-w-[500px] mt-10 border p-4 rounded-xl">
        <form @submit.prevent="submitForm" class="space-y-4">
            <div class="flex flex-col">
                <label for="name" class="mb-2 font-semibold">Name:</label>
                <input type="text" id="name" v-model="form.name"  class="p-2 border rounded">
            </div>
            <div class="flex flex-col">
                <label for="email" class="mb-2 font-semibold">Email:</label>
                <input type="email" id="email" v-model="form.email"  class="p-2 border rounded">
            </div>
            <div class="flex flex-col">
                <label for="password" class="mb-2 font-semibold">Password:</label>
                <input type="password" id="password" v-model="form.password"  class="p-2 border rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Create
                User</button>

            <Link class="ms-2 " as="button" href="/users">Back</Link>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3'

const form = reactive({
    name: '',
    email: '',
    password: ''
});
const page =usePage();

const submitForm = () => {
    // Handle form submission logic here
    console.log(form);
    router.post('/users/store',{data:form});

};
</script>

<style lang="scss" scoped></style>
