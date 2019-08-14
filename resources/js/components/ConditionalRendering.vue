<template>
    <div class="conditional-rendering">
        <div class="block-1" v-if="isActive">
            block 1
        </div>
        <div class="block-2" v-else>
            block 2
        </div>
        <div>
            <button @click="toggleActive">Click me!</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ConditionalRendering",
        data() {
            return {
                isActive: true
            }
        },
        methods: {
            toggleActive() {
                this.isActive = !this.isActive;
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>

</style>