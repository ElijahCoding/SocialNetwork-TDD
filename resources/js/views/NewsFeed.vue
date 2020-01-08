<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />

        <Post />
    </div>
</template>

<script>
    import NewPost from '../../../../../../Downloads/code (1)/1. Introduction & Downloadable Files/design-assets-components-pack1/components/NewPost';
    import Post from '../../../../../../Downloads/code (1)/1. Introduction & Downloadable Files/design-assets-components-pack1/components/Post';

    export default {
        name: "NewsFeed",

        components: {
            NewPost,
            Post,
        }
    }
</script>

<style scoped>

</style>
