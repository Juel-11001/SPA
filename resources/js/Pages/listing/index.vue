<template>
    <Filters :filters="filters"/>
    <div class="grid grid-cols-1  md:grid-cols-2 xl:gird-cols-3 lg:grid-cols-3 gap-4">
        <listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
        <Pagination :links="listings.links" />
    </div>
</template>

<script setup>
import Listing from "./index/components/Listing.vue";
import Pagination from "../../Components/Ui/Pagination.vue";
import Filters from "./index/components/Filters.vue"

defineProps({
    listings:Object,
    filters: Object
})
</script>
