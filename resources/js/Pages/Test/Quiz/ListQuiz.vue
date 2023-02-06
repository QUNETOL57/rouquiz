<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="font-bold text-5xl text-center text-indigo-700">
            {{ test.name }}
        </h1>
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <small>{{ idx + 1 }} / {{ questionsCount }}</small>
        <div
            v-for="question in this.test.questions"
            class="py-4"
        >
            <p class="text-2xl font-bold">{{ question.text }}</p>
            <label
                v-for="(answer, index) in question.answers"
                :key="index"
                :for="index"
                class="block mt-4 border border-gray-300 rounded-lg py-2 px-6 text-lg"
                :class="{
                        'hover:bg-gray-100 cursor-pointer' : index !== Number(selectedAnswer) || selectedAnswer === null,
                        'bg-indigo-200' : index === Number(selectedAnswer) && selectedAnswer !== null,
                        'cursor-not-allowed' : currentTime === 0
                    }"
            >
                <input
                    :id="index"
                    name="answer"
                    type="radio"
                    class="hidden"
                    :value="index"
                    @change="changeAnswer($event)"
                    :disabled="currentTime === 0"
                />
                {{ answer.text }}
            </label>
            <hr>
        </div>

                <div class="mt-6 flow-root">
                    <button
                        @click="answered"
                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"
                        :class="{'opacity-50 cursor-not-allowed' : selectedAnswer === null}"
                        :disabled="selectedAnswer === null"
                    >
                        Ответить &gt;
                    </button>
<!--                    <button-->
<!--                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"-->
<!--                        @click="showResults"-->
<!--                        v-show="(selectedAnswer === null && currentTime === 0) && idx === questionsCount - 1">-->
<!--                        Показать результаты-->
<!--                    </button>-->
                </div>

<!--                <h2 class="text-bold text-3xl">Results</h2>-->
<!--                <div class="flex justify-start space-x-4 mt-6">-->
<!--                    <p>-->
<!--                        Correct Answers:-->
<!--                        <span class="text-2xl text-green-700 font-bold"-->
<!--                        >{{ correctAnswers }}</span-->
<!--                        >-->
<!--                    </p>-->
<!--                    <p>-->
<!--                        Wrong Answers:-->
<!--                        <span class="text-2xl text-red-700 font-bold"-->
<!--                        >{{ wrongAnswers }}</span-->
<!--                        >-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="mt-6 flow-root">-->
<!--                    <button-->
<!--                        @click="resetQuiz"-->
<!--                        class="float-right bg-indigo-600 text-white text-sm font-bold tracking-wide rounded-full px-5 py-2"-->
<!--                    >-->
<!--                        Play again-->
<!--                    </button>-->
<!--                </div>-->
        </div>
    </div>
</template>

<script>
import {ref, watch} from 'vue'
import {useWindowFocus} from '@vueuse/core'

const focused = useWindowFocus();

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
        score: [],
        timerTime: 0,
        isLeave: false,
        leaveCount: 0
    }),
    computed: {
        questionsCount() {
            return this.test.questions.length;
        },
        currentQuestion() {
            return this.test.questions[this.idx];
        },
        currentTime: {
            get() {
                return this.timerTime;
            },
            set(newValue) {
                this.timerTime = newValue
            }
        },
    },
    mounted() {
        this.startTimer()
    },
    methods: {
        changeAnswer(e) {
            this.selectedAnswer = e.target.value;
        },
        answered() {
            this.stopTimer();
            let currentAnswerId = null;
            if (this.selectedAnswer !== null) {
                let currentAnswer = this.currentQuestion.answers[this.selectedAnswer];
                currentAnswerId = currentAnswer.id;

                if (currentAnswer.is_true) {
                    this.correctAnswers++;
                } else {
                    this.wrongAnswers++;
                }
            }

            this.answers.push({
                'question_id': this.currentQuestion.id,
                'answer_id': currentAnswerId,
                'time': this.currentQuestion.time - this.currentTime,
                'leave_count': this.leaveCount
            });

            if (this.idx < this.questionsCount - 1) {
                this.nextQuestion();
            } else {
                this.showResults();
            }
        },
        nextQuestion() {
            this.idx++;
            this.selectedAnswer = null;
            this.leaveCount = 0;
            document.querySelectorAll("input").forEach((el) => (el.checked = false));
            this.startTimer();
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
            this.leaveCount = 0;
            this.answers = [];
            this.startTimer();
        },
        startTimer() {
            this.timerTime = this.currentQuestion.time;
            this.timer = setInterval(() => {
                this.currentTime--
            }, 1000)
        },
        stopTimer() {
            clearTimeout(this.timer)
        },
    },
    watch: {
        currentTime(time) {
            if (time === 0) {
                this.answered(null)
            }
            watch(focused, (isFocused) => {
                if (isFocused) {
                    this.isLeave = false;
                } else {
                    if (this.isLeave === false) {
                        this.leaveCount++;
                        this.isLeave = true;
                    }
                }
            })

        }

    },
}
</script>

