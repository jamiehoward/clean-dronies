<template>
    <div class="flex justify-center gap-4 text-slate-400">
        <div
            @click="setWinnerAndLoser(dronie)"
            :dronie="dronie"
            v-for="dronie in dronies"
            :key="dronie.id"
            class="dronie-card hover:scale-105 hover:translate-y-2 bg-gradient-to-b hover:shadow-lg from-slate-700 to-slate-800 ease-in-out duration-200 transition transform p-8 rounded-md cursor-pointer animate-fade-in-down border border-green-400">
            <img v-if="dronie" class="rounded-md border-slate-500 border-2" v-bind:src="dronie.image" width="250px"/>
            <div class="flex justify-end w-full">
                <div>#{{dronie.nft_id}}</div>
            </div>
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
