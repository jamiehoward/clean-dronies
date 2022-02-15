<template>
    <div class="flex justify-center gap-4 text-red-500">
        <div
            @click="setWinnerAndLoser(dronie)"
            :dronie="dronie"
            v-for="dronie in dronies"
            :key="dronie.id"
            class="hover:scale-105 transition transform dronie-card">
            <img v-if="dronie" class="cursor-pointer border-green-300 border-solid border" v-bind:src="dronie.image" width="250px"/>
            <div>#{{dronie.nft_id}}</div>
        </div>
    </div>
</template>


<script>
    export default {
        props : [],
        data() {
            return {
                dronies: [],
                winner: {},
                loser: {},
                attribute: 'clean'
            }
        },
        mounted() {
           this.getDronies()
        },
        methods: {
            getDronies() {
                const self = this

                axios.get('/api/dronie-votes')
                    .then(response => {
                        this.dronies = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            setWinnerAndLoser(winner) {
                // go through each this.dronies and find the winner and loser
                const self = this
                Object.keys(self.dronies).forEach(function (key) {
                    if (self.dronies[key].id === winner.id) {
                        self.winner = self.dronies[key]
                    } else {
                        self.loser = self.dronies[key]
                    }
                })

                this.submitVote()
            },
            submitVote() {
                const self = this
                axios.post('/api/dronie-votes', {
                    winner_id: this.winner.id,
                    loser_id: this.loser.id,
                    attribute: this.attribute
                })
                    .then(response => {
                        self.getDronies()

                        this.$root.$emit('vote')    
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>
