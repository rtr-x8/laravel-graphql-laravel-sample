<template>
    <div class="container">
        <h1>Users</h1>
        <ul>
            <li v-for="user in users" v-bind:key="user.id">
                <b>{{ user.id }}</b>
            </li>
        </ul>
    </div>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        apollo: {
            users: gql`{
                users {
                    id
                }
            }`,
        }
    }
</script>
