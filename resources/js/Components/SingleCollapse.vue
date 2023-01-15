<script setup>
import { ref } from 'vue'
import { Collapse } from 'vue-collapsed'


const props = defineProps({
    title: String,
    body: String,
});

const isOpen = ref(false) // Initial value

function handleCollapse() {
    isOpen.value = !isOpen.value
}
</script>

<template>
    <div>
        <button @click="handleCollapse">{{ title }}</button>
        <Collapse :when="isOpen" class="v-collapse">
            {{ body }}
        </Collapse>
    </div>
</template>

<style>
.v-collapse {
    transition: height var(--vc-auto-duration) cubic-bezier(0.3, 0, 0.6, 1);
}
</style>
