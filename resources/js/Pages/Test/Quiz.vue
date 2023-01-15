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
//
// let idx = 0;
// let selectedAnswer = "";
// let correctAnswers = 0;
// let wrongAnswers = 0;
// let count = 3;
// let questions = [
//     {
//         question:
//             "Rolex is a company that specializes in what type of product?",
//         answers: {a: "Bags", b: "Watches", c: "Shoes", d: "Laptops"},
//         correctAnswer: "b",
//     },
//     {
//         question: "When did Facebook launch?",
//         answers: {a: "2005", b: "2008", c: "2003", d: "2004"},
//         correctAnswer: "d",
//     },
//     {
//         question:
//             "Albert Einstein had trouble with mathematics when he was in school?",
//         answers: {a: "True", b: "False"},
//         correctAnswer: "b",
//     },
// ];

</script>


<script>
export default {
    data: () => ({
        idx: 0,
        selectedAnswer: "",
        correctAnswers: 0,
        wrongAnswers: 0,
        count: 5,
        answers: [],
        questions: [
            {
                question:
                    "Rolex is a company that specializes in what type of product?",
                answers: {a: "Bags", b: "Watches", c: "Shoes", d: "Laptops"},
                correctAnswer: "b",
                selectedAnswer: ""
            },
            {
                question: "When did Facebook launch?",
                answers: {a: "2005", b: "2008", c: "2003", d: "2004"},
                correctAnswer: "d",
                selectedAnswer: ""
            },
            {
                question:
                    "Albert Einstein had trouble with mathematics when he was in school?",
                answers: {a: "True", b: "False"},
                correctAnswer: "b",
                selectedAnswer: ""
            },
        ],
    }),
    methods: {
        answered(e) {
            this.selectedAnswer = e.target.value;
            if (this.selectedAnswer === this.questions[this.idx].correctAnswer) {
                this.answers.push(this.selectedAnswer);
                this.correctAnswers++;
            } else {
                this.wrongAnswers++;
            }
            this.nextQuestion()
        },
        nextQuestion() {
            this.idx++;
            this.selectedAnswer = "";
            document.querySelectorAll("input").forEach((el) => (el.checked = false));
        },
        showResults() {
            console.log(this.answers)
            this.idx++;
        },
        resetQuiz() {
            this.idx = 0;
            this.selectedAnswer = "";
            this.correctAnswers = 0;
            this.wrongAnswers = 0;
        }
    }
}
</script>


<template>
    {{test.questions.length}}
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="font-bold text-5xl text-center text-indigo-700">
            {{ test.name }}
        </h1>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div v-if="idx < count">
                <p class="text-2xl font-bold">{{ test.questions[idx].text }}</p>
                <label
                    v-for="(answer, index) in test.questions[idx].answers"
                    :key="index"
                    :for="index"
                    class="block mt-4 border border-gray-300 rounded-lg py-2 px-6 text-lg"
                    :class="{'hover:bg-gray-100 cursor-pointer' : selectedAnswer === ''}, {'bg-green-200' : index === questions[idx].correctAnswer && selectedAnswer !== ''}, {'bg-red-200' : selectedAnswer === index}"
                >
                    <input
                        :id="index"
                        type="radio"
                        class="hidden"
                        :value="index"
                        @change="answered($event)"
                        :disabled="selectedAnswer !== ''"
                    />
                    {{ answer.text }}
                </label>
                <div class="mt-6 flow-root">
                    <button
                        @click="nextQuestion"
                        v-show="selectedAnswer !== '' && idx < count - 1"
                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"
                    >
                        Next &gt;
                    </button>
                    <button
                        @click="showResults"
                        v-show="selectedAnswer !== '' && idx === count - 1">
<!--                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"-->
<!--                    >-->
                        Finish
                    </button>
                </div>
            </div>
            <div v-else>
                <h2 class="text-bold text-3xl">Results</h2>
                <div class="flex justify-start space-x-4 mt-6">
                    <p>
                        Correct Answers:
                        <span class="text-2xl text-green-700 font-bold"
                        >{{ correctAnswers }}</span
                        >
                    </p>
                    <p>
                        Wrong Answers:
                        <span class="text-2xl text-red-700 font-bold"
                        >{{ wrongAnswers }}</span
                        >
                    </p>
                </div>
                <div class="mt-6 flow-root">
                    <button
                        @click="resetQuiz"
                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"
                    >
                        Play again
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
