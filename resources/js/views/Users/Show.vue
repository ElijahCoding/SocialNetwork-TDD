<template>
    <div class="flex flex-col items-center">
        <div class="relative mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">

            </div>
            <div class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20">
                <div class="w-32">

                </div>
                <p class="text-2xl text-gray-100 ml-4">{{ user.data.attributes.name }}</p>
            </div>
        </div>

        <div v-if="postLoading">Loading posts...</div>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />
    </div>
</template>

<script>
    import Post from '../../components/Post'

    export default {
        name: "Show",

        components: {
            Post
        },

        data: () => {
            return {
                user: null,
                posts: null,
                userLoading: true,
                postLoading: true
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
                     this.userLoading = false
                 })

            axios.get('/api/users/' + this.$route.params.userId + '/posts')
                .then(res => {
                    this.posts = res.data
                })
                .catch(error => {
                    console.log('Unable to fetch posts')
                })
                .finally(() => {
                    this.postLoading = false
                })
        }
    }
</script>

<style scoped>

</style>
