<template>

    <Head title="User Create" />
    <div class="container mx-auto max-w-[500px] mt-10 border p-4 rounded-xl">
        <form @submit.prevent="submitForm" class="space-y-4">
            <div class="flex flex-col">
                <label for="name" class="mb-2 font-semibold">Name:</label>
                <input type="text" id="name" v-model="form.name"  class="p-2 border rounded">
                <div v-show="$page.props.errors.name" v-text="$page.props.errors.name" class="text-sm text-red-600"></div>
            </div>
            <div class="flex flex-col">
                <label for="email" class="mb-2 font-semibold">Email:</label>
                <input type="email" id="email" v-model="form.email"  class="p-2 border rounded">
                <div v-show="$page.props.errors.email" v-text="$page.props.errors.email" class="text-sm text-red-600"></div>

            </div>
            <div class="flex flex-col">
                <label for="password" class="mb-2 font-semibold">Password:</label>
                <input type="password" id="password" v-model="form.password"  class="p-2 border rounded">
                <div v-show="$page.props.errors.password" v-text="$page.props.errors.password" class="text-sm text-red-600"></div>

            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700" :disabled="processing">Create
                User</button>

            <Link class="ms-2 " as="button" href="/users">Back</Link>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { router, useForm, usePage } from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    errors: Object,
    test: Object
});

const processing = ref(false);

const form = reactive({
    name: '',
    email: '',
    password: ''
});
const page =usePage();

const testForm = useForm({
    name: '',
    email: '',
    password: ''
});

const submitForm = () => {
    processing.value = true;
    // Handle form submission logic here
    // console.log(form);
    // console.log(props.errors);
    router.post('/users/store',{
        name: form.name,
        email: form.email,
        password: form.password
    });
    processing.value = false;

};
</script>

<style lang="scss" scoped></style>
