<template>
    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div @click="hideModal()" class="fixed inset-0 bg-slate-800 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="text-slate-400 mb-24 inline-block align-bottom bg-transparent rounded-lg text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full border border-green-400">    
                <div class="dronie-card  bg-gradient-to-b hover:shadow-lg from-slate-700 to-slate-800 ease-in-out p-2 rounded-md relative">
                    <div class="text-xs text-center uppercase flex justify-between">
                        <div>cleandronies.com</div>
                        <div class="text-xl">#{{dronie.nft_id}}</div>
                    </div>
                    <div class="w-full p-8">
                        <div>
                            <img class="rounded-md border-slate-500 border-2 w-64 h-64 mx-auto" v-bind:src="dronie.image" alt="" />
                        </div>
                        
                        <div class="grid grid-flow-col gap-4 text-center mt-8">
                            <div class="text-base leading-tight mb-4">
                                <div class="font-bold text-green-300">{{ dronie.top_dronie.id }}/10000</div>
                                <div class="uppercase md:text-xs text-2xs">Voted Clean Rank</div>
                            </div>
                            <div class="text-base leading-tight mb-4">
                                <div class="font-bold text-green-300">{{dronie.clean_meter_rating.clean_score}}%</div>
                                <div class="uppercase md:text-xs text-2xs">CleanMeter Score</div>
                            </div>
                            <div class="text-base leading-tight mb-4">
                                <div class="font-bold text-green-300">{{dronie.clean_meter_rating.clean_category}}</div>
                                <div class="uppercase md:text-xs text-2xs">CleanMeter Class</div>
                            </div>
                        </div>

                        <div class="text-sm w-full">
                            <ul>
                                <li class="flex justify-between">
                                    <span>Attributes</span>
                                    <span class="font-bold">{{ dronie.attribute_count }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Rank</span>
                                    <span class="font-bold">#{{ dronie.rank }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Color</span>
                                    <span class="font-bold">{{ dronie.color }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Background</span>
                                    <span class="font-bold">{{ dronie.background }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Back Storage</span>
                                    <span class="font-bold">{{ dronie.back_storage }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Body</span>
                                    <span class="font-bold">{{ dronie.body }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Body Texture</span>
                                    <span class="font-bold">{{ dronie.body_texture }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Chest Accessory</span>
                                    <span class="font-bold">{{ dronie.chest_accessory }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Head</span>
                                    <span class="font-bold">{{ dronie.head }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Eyes</span>
                                    <span class="font-bold">{{ dronie.eyes }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Mask</span>
                                    <span class="font-bold">{{ dronie.mask }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Beak</span>
                                    <span class="font-bold">{{ dronie.beak }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Hat</span>
                                    <span class="font-bold">{{ dronie.hat }}</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Wings</span>
                                    <span class="font-bold">{{ dronie.wings }}</span>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props : ['dronie'],
        data() {
            return {
                
            }
        },
        mounted() {
           
        },
        methods: {
            hideModal() {
                this.$root.$emit('hideModal');
            }
        }
    }
</script>
