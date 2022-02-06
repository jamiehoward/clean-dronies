<template>
    <div class="text-center text-red-500 mt-4">
        <div class="mb-4 uppercase font-bold">The top cleanest:</div>
            <div class="flex justify-center gap-4">
                <div v-for="leader in leaders" :key="leader.id">
                    <a v-bind:href="leader.url" target="_blank">
                        <img v-bind:src="leader.image" class="w-24"/>
                    </a>
                    <div>
                        {{leader.clean_score}}
                    </div>
                </div>
            </div>
        </div>
</template>


<script>
    export default {
        props : [],
        data() {
            return {
                leaders: [],
            }
        },
        mounted() {
           this.getLeaders()

           this.$root.$on('vote', (dronie) => {
               this.getLeaders()
           })
        },
        methods: {
            getLeaders() {
                const self = this

                axios.get('/api/leaders')
                    .then(response => {
                        this.leaders = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>
