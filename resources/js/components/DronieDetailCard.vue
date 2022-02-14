<template>
    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div @click="closeModal()" class="fixed inset-0 bg-slate-800 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="text-slate-400 mb-24 inline-block align-bottom bg-transparent rounded-lg text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-green-400">    
                <div class="dronie-card  bg-gradient-to-b hover:shadow-lg from-slate-700 to-slate-800 ease-in-out p-8 rounded-md">
                    <img class="rounded-md border-slate-500 border-2" v-bind:src="dronie.image" width="250px"/>
                    <div class="flex justify-end w-full">
                        <div>#{{dronie.nft_id}}</div>
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
            
        }
    }
</script>
