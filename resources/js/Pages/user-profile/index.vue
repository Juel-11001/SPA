<template>
    <h1 class="text-3xl font-bold mb-5">Your Listing</h1>
    <section class="mb-4">
        <FiltersU :filters="filters"/>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" class="text-lg" />
                    </div>
                    <ListingAddress :listing="listing" class="text-gray-600" />
                </div>
                <div>
                    <div class="flex items-center gap-1 text-gray-500">

                        <a class="btn-outline text-xs font-medium" :href="route('listing.show', listing.id)" target="_blank">
                            Preview
                        </a>
                        <Link class="btn-primary text-xs font-medium"
                            :href="route('listing-profile.edit',  {listing_profile:listing.id} )">
                        Edit
                        </Link>
                        <Link class="btn-danger text-xs font-medium"
                            :href="route('listing-profile.destroy', { listing_profile: listing.id })" method="delete"
                            as="button">
                        Delete
                        </Link>
                    </div>
                </div>
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