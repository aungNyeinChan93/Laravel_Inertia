<template>

    <Head title="Users" />
    <div class="flex justify-between px-10 my-2">
        <div>
            <Link href="/users" class="text-xl me-10  text-red-500 p-2">User List</Link>
            <Link v-if="can.create"  href="/users/create" as="button"  class="text-xl me-10 text-red-500 p-2">Create</Link>
        </div>

        <input type="text" name="search" placeholder="Search" v-model="search"
            class="px-1 rounded-xl border border-red-400">
        <!-- <form @submit.prevent="formSearch" class="mt-3"> -->
        <!-- </form> -->
    </div>
    <div class="container mt-3 mx-auto text-center">
        <CardList>
            <Card v-for="user of users.data" :key="user.id" :user="user" />
        </CardList>
        <div class="paginate mt-6 space-x-3 py-3">
            <template v-for="link in users.links" :key="link.url">
                <Link class="px-2 py-1 bg-green-400 rounded-md" :href="link.url"
                    :class="{ 'text-red-700 ': link.active }">
                {{ link.label }}
                </Link>
            </template>
        </div>
    </div>
</template>

<script setup>
import CardList from '../components/CardList.vue';
import Card from '../components/Card.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { throttle ,debounce } from 'lodash'; //limit request

defineProps({
    users: {
        type: Object,
        required: true,
    },
    can:{
        type: Object,
    }
});

const search = ref('');

// const formSearch = () => {
//     router.get(`users?search=${search.value}`)
// }

watch(search,throttle((value) => {
    console.log(value);
    router.get(`users?search=${value}`, {}, { preserveState: true });
}, 500))


</script>

<style lang="scss" scoped></style>
