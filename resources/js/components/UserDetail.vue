<template>
    <div class="user-detail">
        <div class="user-detail-container" v-if="Object.keys(userDetailInfo).length !== 0">
            <div class="user-name">
                Name: {{ userDetailInfo.name }}
            </div>
            <div class="user-email">
                Email: {{ userDetailInfo.email }}
            </div>
            <div class="user-dob">
                DOB: {{ userDetailInfo.birthday }}
            </div>
            <div class="user-address">
                Address: {{ userDetailInfo.address }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserDetail",
        props: {
            userDetailInfo: {
                type: Object
            }
        }
    }
</script>

<style scoped>

</style>