<template>
    <div class="uppercase text-green-400 text-sm">Total Votes: {{totalVotes}}</div>
</template>


<script>
    export default {
        data() {
            return {
                totalVotes : 0
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
                        self.totalVotes = response.data
                    })
                    .catch(function (error) {
                        console.log(error)
                    })                
            },
        }
    }
</script>
