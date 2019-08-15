<template>
    <div class="life-cycle" id="my-text">
        <div>
            Name: {{ person.name }}
        </div>
        <div>
            Nick name: {{ person.nickname }}
        </div>
        <div>
            <button @click="changeName">Change Name</button>
        </div>
        <div>
            <button @click="changeNickname">Change Nick Name</button>
        </div>
        <div>
            <button @click="changeNicknameProperly">Change NIck name properly</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LifeCycle",
        data() {
            return {
                person: {
                    name: 'Ema'
                }
            }
        },
        methods: {
            changeName() {
                this.person.name = 'Adam';
            },
            changeNickname() {
                this.person.nickname = Math.random().toString(36).substring(7);
                this.$forceUpdate()
            },
            changeNicknameProperly() {
                Vue.set(this.person, 'nickname', 'Louis');
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>