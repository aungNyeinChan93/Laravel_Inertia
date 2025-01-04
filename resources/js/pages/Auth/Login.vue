<template>

    <Head title="Login" />

    <div class="container mx-auto max-w-[500px] mt-10 border p-4 rounded-xl">

        <form @submit.prevent="submitForm" class="space-y-4">
            <h2 class="text-center p-2 text-2xl">Login</h2>
            <div class="flex flex-col">
                <label for="email" class="mb-2 font-semibold">Email:</label>
                <input type="email" id="email" v-model="form.email"  class="p-2 border rounded">
                <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-800 text-sm "></div>
            </div>

            <div class="flex flex-col">
                <label for="password" class="mb-2 font-semibold">Password:</label>
                <input type="password" id="password" v-model="form.password"  class="p-2 border rounded">
                <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-800 text-sm "></div>

            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700" >Login</button>

        </form>
    </div>

</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';


const form =useForm({
    email: '',
    password: ''
});

const submitForm = () => {
    form.post('/login');
}

</script>


