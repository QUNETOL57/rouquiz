<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SingleCollapse from '@/Components/SingleCollapse.vue';
import {Head, Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    test: {
        type: Object,
        default: () => ({}),
    },
});

console.log(props.test)
// const toggleActive =  true;
</script>

<template>
    <Head title="Tests List"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ test.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg row-span-3">
                        <div class="p-4 text-gray-900">
                            еще хрень
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="p-4 text-gray-900">
                            <div class="flex justify-between items-center">
                                <h2>Показывать правильные ответы </h2>
                                <div @click="test.is_show_answer = !test.is_show_answer">
                                    <div
                                        class="w-16 h-10 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out"
                                        :class="{ 'bg-green-400': test.is_show_answer}">
                                        <div
                                            class="bg-white w-8 h-8 rounded-full shadow-md transform duration-300 ease-in-out"
                                            :class="{ 'translate-x-6': test.is_show_answer,}"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="p-4 text-gray-900">
                            <div class="flex justify-between items-center">
                                <h2>Показывать правильные ответы </h2>
                                <div @click="test.is_show_answer = !test.is_show_answer">
                                    <div
                                        class="w-16 h-10 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out"
                                        :class="{ 'bg-green-400': test.is_show_answer}">
                                        <div
                                            class="bg-white w-8 h-8 rounded-full shadow-md transform duration-300 ease-in-out"
                                            :class="{ 'translate-x-6': test.is_show_answer,}"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="p-4 text-gray-900">
                            <div class="flex justify-between items-center">
                                <h2>Показывать правильные ответы </h2>
                                <div @click="test.is_show_answer = !test.is_show_answer">
                                    <div
                                        class="w-16 h-10 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out"
                                        :class="{ 'bg-green-400': test.is_show_answer}">
                                        <div
                                            class="bg-white w-8 h-8 rounded-full shadow-md transform duration-300 ease-in-out"
                                            :class="{ 'translate-x-6': test.is_show_answer,}"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>Вопросы:</p>

                        <div
                            v-for="question in test.questions"
                            :key="test.questions.id">
                            <div class="flex justify-between space-x-6 items-center p-6">
                                <div class="flex items-center space-x-4">
                                    <div class="flex flex-col space-y-2">
                                        <span>{{question.text}}</span>

                                        <span v-if="question.level === 1" class="bg-green-300 text-gray-50 rounded-md px-2">{{question.level}}</span>
                                        <span v-if="question.level === 2" class="bg-yellow-300 text-gray-50 rounded-md px-2">{{question.level}}</span>
                                        <span v-if="question.level === 3" class="bg-red-300 text-gray-50 rounded-md px-2">{{question.level}}</span>
                                    </div>

                                </div>
                                <div>
                                    <div class="flex flex-col space-y-2">
                                        <span>{{question.time}} сек</span>
                                        <span>{{question.type}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
