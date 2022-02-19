<template>
    <div class="flex justify-center md:text-3xl text-2xl">
        <input v-model="searchId" type="number" placeholder="e.g. 1234" class="text-center bg-transparent border border-green-400 active:border-green-400 focus:border-green-400 outline-none text-green-400 font-bold p-4"/>
        <button @click="setDronieData()" class="bg-slate-600 hover:bg-slate-700 transition duration-100 text-white px-8 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </button>
        <div v-if="modalIsOpen">
            <dronie-detail-card :dronie="dronie"></dronie-detail-card>
        </div>
    </div>
</template>


<script>
import DronieDetailCard from './DronieDetailCard.vue'
    export default {
  components: { DronieDetailCard },
        data() {
            return {
                dronie : {},
                searchId: '',
                dronieData: {"id":1,"nft_id":"8018","token_hash":"Dzdy4FCRe8UmhRorHPEMtH3StHJh8Lfb9FQqyVDtzQwE","url":"https:\/\/howrare.is\/dronies\/8018","token_link":"https:\/\/explorer.solana.com\/address\/Dzdy4FCRe8UmhRorHPEMtH3StHJh8Lfb9FQqyVDtzQwE","image":"https:\/\/media.howrare.is\/images\/dronies\/752841399779748f824c2cf03d9e2135.jpg","rank":7120,"score":1562,"attribute_count":9,"color":"Red","background":"Dark","back_storage":"None","body":"Type A","body_texture":"Explosion Markings","chest_accessory":"Body Armor","head":"Type A","eyes":"Half Scope","mask":"None","beak":"Crow","hat":"None","wings":"Type E","elite_prototype":"None","sale_link":null,"sale_price":null,"created_at":"2022-02-06T05:16:47.000000Z","updated_at":"2022-02-06T05:16:47.000000Z","clean_score":"0.00","top_dronie":{"id":1,"dronie_id":1,"clean_score":0,"total_votes":0,"win_percentage":0,"created_at":"2022-02-09T10:28:34.000000Z","updated_at":"2022-02-09T10:28:34.000000Z"},"winning_votes":[],"losing_votes":[]},
                modalIsOpen : false,
            }
        },
        mounted() {
            document.addEventListener('keyup', (e) => {
                if (e.keyCode === 27) {
                    this.hideModal()
                }
            })

            // hide modal if hideModal $root event is fired
            this.$root.$on('hideModal', () => {
                this.hideModal()
            })
        },
        methods: {
            searchForDronie() {
                const self = this
                axios.get('/api/dronies/getByNftId/' + self.searchId)
                this.modalIsOpen = true
            },
            setDronieData() {
                this.dronie = this.dronieData
                this.showModal()
            },
            showModal() {
                this.modalIsOpen = true
            },
            hideModal() {
                this.modalIsOpen = false
            }
        }
    }
</script>
