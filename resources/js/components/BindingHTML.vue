<template>
    <div class="binding-html">
        <div class="text-title" :class="{active: isActive}">
            Hello world
        </div>
        <div :style="{ display: ['-webkit-box', '-ms-flexbox', 'flex'] }"></div>
        <button @click="isActive= !isActive">Active text</button>
    </div>
</template>

<script>
    export default {
        name: "BindingHTML",
        data() {
            return {
                isActive: false
            }
        }
    }
</script>

<style lang="scss" scoped>
.active {
    color: red;
}
</style>