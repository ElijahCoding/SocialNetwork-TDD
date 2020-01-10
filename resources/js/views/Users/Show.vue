<template>
    <div class="flex flex-col items-center" v-if="status.user === 'success' && user">
        <div class="relative mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">

            </div>

            <div class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20">
                <div class="w-32">

                </div>

                <p class="text-2xl text-gray-100 ml-4">{{ user.data.attributes.name }}</p>
            </div>

            <div class="absolute flex items-center bottom-0 right-0 mb-4 mr-12 z-20">
                <button class="py-1 px-3 bg-gray-400 rounded">
                    Add Friend
                </button>
            </div>
        </div>

        <div v-if="status.posts === 'loading'">Loading posts...</div>

        <div v-else-if="posts.data.length < 1">No posts found. Get started...</div>

        <Post v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
    </div>
</template>

<script>
    import Post from '../../components/Post'
    import { mapGetters } from 'vuex'

    export default {
        name: "Show",

        components: {
            Post
        },

        mounted () {
            this.$store.dispatch('fetchUser', this.$route.params.userId);
            this.$store.dispatch('fetchUserPosts', this.$route.params.userId);
        },

        computed: {
            ...mapGetters({
                user: 'user',
                status: 'status',
                posts: 'posts'
            })
        }
    }
</script>

<style scoped>

</style>
