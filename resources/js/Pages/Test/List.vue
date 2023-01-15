<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    tests: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <Head title="Tests List"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tests List</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>


                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">

                            <div
                                class="relative overflow-x-auto shadow-md sm:rounded-lg"
                            >
                                <table
                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                                >
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                    >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Название
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Показывать ответ
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Действия
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr
                                        v-for="test in tests"
                                        :key="test.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <td
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ test.id }}
                                        </td>
                                        <td
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ test.name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ test.is_show_answer }}
                                        </td>


                                        <td class="px-6 py-4">
                                            <Link :href="route('test.show', test.id)">Show</Link>

                                        </td>
<!--                                        <td class="px-6 py-4">-->
<!--                                            <BreezeButton-->
<!--                                                class="bg-red-700"-->
<!--                                                @click="destroy(test.id)"-->
<!--                                            >-->
<!--                                                Delete-->
<!--                                            </BreezeButton>-->
<!--                                        </td>-->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
