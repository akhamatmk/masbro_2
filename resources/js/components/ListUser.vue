<template>
    <div class="panel panel-default">
        <div class="panel-heading">List User</div>
        <div class="panel-body">
            <li v-for="user in users">                        
                <strong class="primary-font">{{ user.user.name }}</strong>
            </li>
        </div>        
    </div>
</template>
<script>
    export default {
        props: ['initialUsers'],

        data() {
        	console.log(this.initialUsers)
        	return {
                name: '',
                users: this.initialUsers
            }
        },

        mounted() {
            
        },

        methods: {
           
        }
    }
</script>