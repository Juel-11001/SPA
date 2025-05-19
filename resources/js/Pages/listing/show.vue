<template>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
           <div class="w-full text-center text-gray-500 font-medium"> N0 Image </div>
        </Box>
       <div class="md:col-span-5 flex flex-col gap-4">
         <Box>
            <template #header>
                Basic info
            </template>
            <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-600" />
         </Box>
         <Box class="gap-4">
            <template #header>
                Offer
            </template>
            Make an Offer
         </Box>
       </div>
   </div>
</template>


<script setup>
import ListingAddress from "../../Components/ListingAddress.vue";
import Box from "../../Components/Ui/Box.vue";
import ListingSpace from "../../Components/Ui/ListingSpace.vue";
import Price from "../../Components/Ui/Price.vue";
    defineProps({
        listing: Object
    })
</script>
