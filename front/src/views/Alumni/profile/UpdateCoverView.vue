<template>
    <div class="flex items-center w-full p-4 bg-[#23242986] fixed h-full top-0">
        <div class="bg-white rounded p-5 mt-24 w-[70%] m-auto text-center" v-click-outside="cancelUpdate">
            <div class="flex items-center justify-between mb-4 text-lg">
                <p></p>
                <p class="font-semibold">Upload Cover</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6  cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="$emit('cancelUpdate')">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="border-[1px] border-gray-300">
                <img class="w-[73rem] h-48 object-cover" :src="cover">
            </div>
            <div class="w-full mt-5 flex justify-end">

                <input @change="tageImage()" id="cover-upload" type="file" accept="image/*" hidden>
                <label for="cover-upload">
                    <p class="hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline cursor-pointer">
                    Select
                    </p>
                </label>
                <button @click="$emit('save-cover')" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['cover'],
        data(){
            return {
                image:'',
            }
        },
        methods:{
            cancelUpdate(){
                this.$emit('cancelUpdate');
            },
        }
        
    }
</script>