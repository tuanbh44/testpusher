<template>
    <div class="form-input-binding">
        <div class="input-form">
            <select v-model="message">
                <option disabled="">Choose one</option>
                <option :value="values.one">One</option>
                <option :value="values.two">Two</option>
            </select>
        </div>
        <div class="input-form"><input type="text" v-model.lazy="message" name="">
            <br><input type="number" v-model.number="message" name="">
            <br><input type="text" v-model.trim="message" name=""></div>
        <div class="input-form">
            <input type="checkbox" v-model="message" name="">
        </div>
        <div class="input-form">
            <input type="radio" v-model="message" value="1">
            <input type="radio" v-model="message" value="2">
        </div>
        <div class="text">
            {{ message }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "FormInputBinding",
        data() {
            return {
                message: false,
                values: {
                    one: 'this is one',
                    two: 'this is two'
                }
            }
        }
    }
</script>

<style scoped>

</style>