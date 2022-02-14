<template>
    <div class="flex justify-center md:text-3xl text-2xl">
        <input type="number" placeholder="e.g. 1234" class="text-center bg-transparent border border-green-400 active:border-green-400 focus:border-green-400 outline-none text-green-400 font-bold p-4"/>
        <button class="bg-slate-600 hover:bg-slate-700 transition duration-100 text-white px-8 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
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
