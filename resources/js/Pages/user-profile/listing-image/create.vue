<template>
    <Box>
        <template #header>upload new Images</template>
        <form @submit.prevent="up">
           <div class="flex items-center gap-2 my-4">
               <input  type="file"  @input="addFiles" multiple class="border rounded-md file:px-4 file:py-2 border-gray-200 file:text-gray-700 file:border-0 file:bg-gray-100 file:font-medium file:hover:cursor-pointer file:mr-4 mr-4">
               <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 mr-3 disabled:opacity-30 :disabled:cursor-not-allowed cursor-pointer" :disabled="!canUpload">upload</button>
               <button type="reset" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer" @click="reset">reset</button>
           </div>
            <div v-if="imageErrors.length" class="input-error">
                <div v-for="(error, index) in imageErrors" :key="index">
                    {{ error}}
                </div>
            </div>

        </form>
    </Box>
    <Box v-if="listing.images.length" class="mt-4" >
        <template #header>Current Listing Images </template>
            <section class="mt-4 grid grid-cols-3 gap-4">
                <div v-for="images in listing.images" :key="images.id" class="flex flex-col  justify-between">
                    <img :src="images.src" class="rounded-md" >
                    <Link :href="route('listing.image.destroy', {listing:props.listing.id, image: images.id})" method="delete" class="btn-danger mt-2 text-xs">Delete</Link>
                </div>
            </section>

    </Box>
</template>

<script setup>
import Box from "../../../Components/Ui/Box.vue";
import {router, useForm, Link} from "@inertiajs/vue3";
import {computed} from "vue";
import NProgress from 'nprogress'

const props=defineProps({
    listing: Object
})

router.on('progress',(event)=>{
    if(event.detail.progress.percentage){
        NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
})
const form = useForm({
    images:[],
})
const imageErrors=computed(()=> Object.values(form.errors))
const canUpload=computed(()=>form.images.length)
const up=()=>{
    form.post(route('listing.image.store',{listing:props.listing.id}))
}
const addFiles=(event)=>{
    for(const image of event.target.files){
        form.images.push(image)
    }
}
const reset=()=>form.reset('images')
</script>
