<template>

    <div class="overflow-x-auto mt-10 ">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Created</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Updated</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr v-for="customer in customers" :key="customer.id">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ customer.name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ customer.email }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ customer.created_at }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ customer.updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
    defineProps({
        customers:{
            type:Array,
            required:true
        }
    });
</script>


