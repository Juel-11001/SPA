<template>
    <Box >
        <div class="flex items-center gap-1">
            <Price :price="listing.price" class="text-2xl font-bold"/>
            <div class="text-xs text-gray-500">
                <Price :price="monthlyPayment"/> pm
            </div>
        </div>
        <ListingSpace :listing="listing" class="text-lg"/>
        <Link :href="route('listing.show', listing.id)">
            <ListingAddress :listing="listing" class="text-gray-600"/>
        </Link>
        <!-- <div class="mt-5 items-center">
            <Link class="btn-primary text-sm mr-3 " :href="route('listing.edit', listing.id)">Edit</Link>
        </div> -->
        <!-- <div class="mt-5 items-center">
            <Link class="btn-danger text-sm mr-3 " :href="route('listing.destroy', listing.id)" method="delete" >delete</Link>
        </div> -->
    </Box>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Box from "../../../../Components/Ui/Box.vue";
import Price from "../../../../Components/Ui/Price.vue";
import ListingSpace from "../../../../Components/Ui/ListingSpace.vue";
import ListingAddress from "../../../../Components/ListingAddress.vue";
import {useMonthlyPayment} from "../../../../Composables/useMonthlyPayment.js";

const props=defineProps({
    listing:Object
})
const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>
