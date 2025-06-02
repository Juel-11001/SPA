<template>
    <h1 class="text-2xl font-medium"> Your Notification</h1>
    <section v-if="notifications.data.length" class="text-gray-700">
        <div v-for="notifications in notifications.data" :key="notifications.id"
             class="border-b border-gray-300 flex justify-between py-4 items-center ">
            <div>
                <span v-if="notifications.type==='App\\Notifications\\OfferMade'">
                   Offer
                   <Price :price="notifications.data.amount"/> For
                   <Link :href="route('listing.show', {listing:notifications.data.listing_id})" class="text-indigo-500">
                       listing
                   </Link> was made
               </span>
            </div>
            <div>
                <Link :href="route('notification.read', {notification:notifications.id})" v-if="!notifications.read_at" class="btn-outline-2 text-xs uppercase" method="put" as="button">Mark as Read</Link>
            </div>
        </div>
    </section>
    <EmptyState v-else>No Notification</EmptyState>

    <section v-if="notifications.data.length" class="pagination">
        <Pagination :links="notifications.links"/>
    </section>

</template>
<script setup>
import EmptyState from "../../Components/Ui/EmptyState.vue";
import Price from "../../Components/Ui/Price.vue";
import Pagination from "../../Components/Ui/Pagination.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    notifications: Object
})
</script>
