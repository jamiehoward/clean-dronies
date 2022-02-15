<template>
    <div class="uppercase text-green-400 text-sm">My votes: {{userVotes}} (Total Votes: {{totalVotes}})</div>
</template>


<script>
    export default {
        data() {
            return {
                totalVotes : 0,
                userVotes: 0
            }
        },
        mounted() {
            this.getVotes()

            this.$root.$on('vote', () => {
                this.getVotes()
            })
        },
        methods: {
            getVotes() {
                const self = this
                axios.get('/api/votes/total')
                    .then(function (response) {
                        self.totalVotes = response.data.totalVotes
                        self.userVotes = response.data.userVotes
                    })
                    .catch(function (error) {
                        console.log(error)
                    })                
            },
        }
    }
</script>
