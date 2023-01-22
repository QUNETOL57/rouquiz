<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="font-bold text-5xl text-center text-indigo-700">
            {{ test.name }}
        </h1>
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div v-if="idx < questionsCount">
                <p class="text-2xl font-bold">{{ currentQuestion.text }}</p>
                <small>{{ idx + 1 }} / {{ questionsCount }}</small>
                <label
                    v-for="(answer, index) in currentQuestion.answers"
                    :key="index"
                    :for="index"
                    class="block mt-4 border border-gray-300 rounded-lg py-2 px-6 text-lg"
                    :class="{'hover:bg-gray-100 cursor-pointer' : index !== Number(selectedAnswer) || selectedAnswer === null, 'bg-indigo-200' : index === Number(selectedAnswer) && selectedAnswer !== null}"
                >
                    <input
                        :id="index"
                        name="answers"
                        type="radio"
                        class="hidden"
                        :value="index"
                        @change="answered($event)"

                    />
                    {{ answer.text }}
                </label>
                <div class="mt-6 flow-root">
                    <button
                        @click="nextQuestion"
                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"
                        :class="{'opacity-50 cursor-not-allowed' : selectedAnswer === null}"
                        :disabled="selectedAnswer === null"
                        v-show="idx < questionsCount - 1"
                    >
                        Next &gt;
                    </button>
                    <button
                        @click="showResults"
                        v-show="selectedAnswer !== '' && idx === questionsCount - 1">
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

<script>
export default {
    props: {
        test: Object,
    },
    data: () => ({
        idx: 0,
        selectedAnswer: null,
        correctAnswers: 0,
        wrongAnswers: 0,
        answers: [],
    }),
    computed: {
        questionsCount() {
            return this.test.questions.length;
        },
        currentQuestion() {
            return this.test.questions[this.idx];
        },
    },
    methods: {
        answered(e) {
            this.selectedAnswer = e.target.value;
            let currentAnswer = this.currentQuestion.answers[this.selectedAnswer];

            if (currentAnswer.is_true) {
                this.correctAnswers++;
            } else {
                this.wrongAnswers++;
            }
            this.answers.push([this.currentQuestion.id, currentAnswer.id]);
        },
        nextQuestion() {
            this.idx++;
            this.selectedAnswer = null;
            document.querySelectorAll("input").forEach((el) => (el.checked = false));
        },
        showResults() {
            console.log(this.answers)
            this.idx++;
        },
        resetQuiz() {
            this.idx = 0;
            this.selectedAnswer = null;
            this.correctAnswers = 0;
            this.wrongAnswers = 0;
        }
    }
}
</script>
