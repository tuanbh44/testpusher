<template>
    <div class="event-handling">
        <div>Current Number: {{ counter }}</div>
        <button @click="increaseCounter(50)">CLick</button>
        <div @click="alertHello">
            <button @click.stop="alertWelcome">Click</button>
        </div>
        <form @submit.prevent="sayGoodbye">
            <button type="submit">Submit</button>
        </form>
        <input @keyup.enter="alertHello">

        <input @keyup.up="alertHello">
    </div>
</template>

<script>
    export default {
        name: "EventHanding",
        data() {
            return {
                counter: 0
            }
        },
        methods: {
            increaseCounter(number) {
                this.counter += number
            },
            alertHello() {
                alert('Hello')
            },
            alertWelcome() {
                alert('Welcome')
            },
            sayGoodbye() {
                alert('bye bye')
            }
        }
    }
</script>

<style scoped>

</style>