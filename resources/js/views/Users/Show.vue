<template>
    <div class="flex flex-col items-center">
        <div class="relative mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",

        data: () => {
            return {
                user: null,
                loading: true
            }
        },

        mounted () {
            axios.get('/api/users/' + this.$route.params.userId)
                 .then(res => {
                     this.user = res.data
                 })
                 .catch(error => {
                     console.log('Unable to fetch the user from server')
                 })
                 .finally(() => {
                     this.loading = false
                 })
        }
    }
</script>

<style scoped>

</style>
