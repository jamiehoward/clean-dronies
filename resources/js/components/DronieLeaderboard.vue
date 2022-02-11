<template>
    <div class="text-center text-red-500 mt-4 md:w-1/3 w-2/3 p-4 mx-auto">
        <div class="mb-4 uppercase font-bold">The top cleanest:</div>
            <div class="grid grid-flow-col gap-4 text-center">
                <div v-for="leader in leaders" :key="leader.id">
                    <a v-bind:href="leader.dronie.url" target="_blank">
                        <img v-bind:src="leader.dronie.image" class="object-fill"/>
                    </a>
                    <div>
                        {{leader.clean_score}}.00
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
