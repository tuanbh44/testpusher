<template>
    <div class="user-dashboard">
        <div class="list-user-comp">
            <h4>List User</h4>
            <ListUser @userSelected="childrenSelectUser"></ListUser>
        </div>
        <hr>
        <div class="list-detail-comp">
            <h4>User Detail</h4>
            <UserDetail :userDetailInfo="userSelectedFromChild" :numberDetail="number"></UserDetail>
        </div>
    </div>
</template>

<script>
    import ListUser from './ListUser.vue'
    import UserDetail from './UserDetail.vue'
    export default {
        name: "UserDashboard",
        components: {
            ListUser,
            UserDetail
        },
        data() {
            return {
                userSelectedFromChild: {},
                number: {}
            }
        },
        methods: {
            //process event emitted from child
            childrenSelectUser(user, number, string) {
                this.userSelectedFromChild = user;
                this.number = number
            }
        }
    }
</script>

<style scoped>

</style>