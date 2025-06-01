<template>
    <div>
        <Link
            :href="route('listing-profile.index')"
            class="btn-primary font-xs">
            < Back to Listings</Link>
    </div>
    <section class="flex flex-col-reverse md:grid grid-cols-12 gap-4 mt-5">
        <Box v-if="!hasOffer" class="flex md:col-span-7 items-center">
            <div class="w-full text-center font-medium text-gray-500">
                No Offers
            </div>
        </Box>
        <div v-else class="md:col-span-7 flex flex-col gap-4">
          <Offer v-for="offer in listing.offers" :key="offer.id" :offer="offer" :listing-price="listing.price" :user="props.user" :isSold="listing.sold_at !== null">
          </Offer>
        </div>
        <div class="md:col-span-5">
            <Box>
                <template #header> Basic info </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-600" />
            </Box>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Box from "../../Components/Ui/Box.vue";
import Price from "../../Components/Ui/Price.vue";
import ListingSpace from "../../Components/Ui/ListingSpace.vue";
import ListingAddress from "../../Components/ListingAddress.vue";
import { computed } from "vue";
import Offer from "./show/component/Offer.vue";

const props = defineProps({
    listing: Object,
    user: Object,
});

const hasOffer = computed(() => props.listing.offers.length);
</script>
