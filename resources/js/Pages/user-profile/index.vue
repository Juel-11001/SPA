<template>
    <h1 class="text-3xl font-bold mb-5">Your Listing</h1>
    <section class="mb-4">
        <FiltersU :filters="filters"/>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :class="{'border-dashed': listing.deleted_at}">
            <div v-if="listing.sold_at" class="text-xs font-medium text-green-500 border border-dashed p-1 border-green-200 rounded-md inline-block uppercase">
                sold
            </div>
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div :class="{'opacity-50': listing.deleted_at}">
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" class="text-lg" />
                    </div>
                    <ListingAddress :listing="listing" class="text-gray-600" />
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-500">

                        <a class="btn-outline text-xs font-medium" :href="route('listing.show', listing.id)" target="_blank">
                            Preview
                        </a>
                        <Link class="btn-primary text-xs font-medium"
                            :href="route('listing-profile.edit',  {listing_profile: listing.id} )">
                        Edit
                        </Link>
                        <Link v-if="!listing.deleted_at" class="btn-danger text-xs font-medium"
                            :href="route('listing-profile.destroy', { listing_profile: listing.id })" method="delete"
                            as="button">
                        Delete
                        </Link>
                        <Link v-else class="btn-danger text-xs font-medium" :href="route('listing-profile.restore', { listing_profile: listing.id })" method="PUT" as="button" >
                        Restore
                        </Link>
                    </div>
                    <div class="mt-2">
                        <Link :href="route('listing.image.create', {listing:listing.id})" class="block w-full md:w-full text-xs font-medium btn-outline text-center">Image ({{listing.images_count}})</Link>
                    </div>
                    <div class="mt-2">
                        <Link :href="route('listing-profile.show', {listing_profile:listing.id})" class="block w-full md:w-full text-xs font-medium btn-outline text-center">Offers ({{listing.offers_count}})</Link>
                    </div>
                </section>

            </div>
        </Box>
    </section>
    <div v-if="listings.data.length" class="pagination">
        <Pagination :links="listings.links" />
    </div>
</template>
<script setup>
import Box from '../../Components/Ui/Box.vue';
import Price from '../../Components/Ui/Price.vue';
import ListingSpace from '../../Components/Ui/ListingSpace.vue';
import ListingAddress from '../../Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';
import FiltersU from './index/Components/Filters-u.vue';
import Pagination from '../../Components/Ui/Pagination.vue';

defineProps({
    listings: Object,
    filters: Object
})
</script>
