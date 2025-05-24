<template>
    <div class="grid grid-cols-1  md:grid-cols-2 xl:gird-cols-3 lg:grid-cols-3 gap-4">
        <listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>
</template>

<script setup>
import Listing from "./index/components/Listing.vue";

defineProps({
    listings:Object
})
</script>
