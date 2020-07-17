<template>
    <div class="container">
        <h1>Posts</h1>
        <ul>
            <li v-for="post in posts">
                <b>{{ post.title }}</b> - <i>{{ post.author.name }}</i>
            </li>
        </ul>
    </div>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        apollo: {
            query: gql`{
                posts {
                    title
                    author {
                        name
                        id
                    }
                }
             }`,
        }
    }
</script>
