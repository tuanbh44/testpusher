<template>
        <div class="my-component">
                <span v-bind:title="message">
                        {{ changeStr }}
                </span>
                <ol>
                        <li v-for="todo in todos">
                                {{ todo.text }}
                        </li>
                </ol>
                <button @click="reverse">Reverse</button>
                <input v-model="str">
        </div>
</template>

<script>
    export default {
        name: "MyComponent",
            data() {
                return {
                        str: 'hover me!',
                        message: 'You loaded this page on ' + new Date().toLocaleString(),
                        todos: [
                                { text: 'Learn JavaScript' },
                                { text: 'Learn Vue' },
                                { text: 'Build something awesome' }
                        ]
                }
            },
            methods: {
                reverse: function () {
                        this.str = this.str.split('').reverse().join('');
                        alert('hi you!')
                }
            },
            computed: {
                    changeStr() {
                            return this.str.split('').reverse().join('')
                    }
            },
            watch: {
                changeStr() {
                        console.log('str change');
                }
            },
            mounted() {

            }
    }
</script>

<style lang="scss" scoped>
    .my-component {
        color : blue;
    }
</style>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             