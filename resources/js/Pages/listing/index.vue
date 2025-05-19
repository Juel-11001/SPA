<template>
    <div class="grid grid-cols-1  md:grid-cols-2 xl:gird-cols-3 lg:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <Link :href="route('listing.show', listing.id)">
                <!-- <Price :price="listing.price" class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-600"/> -->
            </Link>
            <div class="">
                <Link class="" :href="route('listing.edit', listing.id)">Edit</Link>
                <Link class="" :href="route('listing.destroy', listing.id)" method="delete">Delete</Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '../../Components/ListingAddress.vue';
import Box from "../../Components/Ui/Box.vue";
import ListingSpace from "../../Components/Ui/ListingSpace.vue";
import Price from  '../../Components/Ui/Price.vue'

defineProps({
    listings:Array
})
</script>
