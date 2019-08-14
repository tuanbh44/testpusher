<template>
    <div class="list-user">
        <table class="tbl-list-user">
            <thead>
                <th>Name</th>
            </thead>
            <tbody>
                <tr v-for="user in userData">
                    <td><a @click="selectUser(user)">{{ user.name }}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ListUser",
        data() {
            return {
                userData : null,
                number: 1410,
                string: 'MTD'
            }
        },
        mounted() {
            axios
                .get('http://localhost:8000/user-api')
                .then(response => (this.userData = response.data.users))
        },
        methods: {
            // This line below
            selectUser(user) {
                this.$emit('userSelected', user, this.number, this.string)
            }
        }
    }
</script>

<style scoped>

</style>