<template>
    <Box>
        <template #header>Offer #{{ offer.id }} <span v-if="offer.accepted_at" class="text-green-900 bg-green-200 rounded-md p-1 font-medium uppercase">accepted</span></template>
        <section class="flex items-center justify-between">
            <div>
                <Price :price="offer.amount" class="text-2xl" />
                <div class="text-gray-500 mt-1">
                    Diffrence: <Price :price="differece"/>
                </div>
                 <div class="text-gray-500 text-sm">
                Made by {{ props.user.name }}
            </div>

            <div class="text-gray-500 text-sm">
                {{ madeOne }}
            </div>
            </div>
            <div>
                <Link v-if="!isSold" :href="route('listing.offer.accept', {offer:offer.id})" class="btn-primary text-xs font-medium" as="button" method="put">Accept</Link>
            </div>
           
        </section>
    </Box>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Box from '../../../../Components/Ui/Box.vue';
import Price from '../../../../Components/Ui/Price.vue';
import { computed } from 'vue';

const props=defineProps({
    offer:Object,
    listingPrice:Number,
    user:Object,
    isSold:Boolean,
})
// console.log(props.user);

const differece=computed(
    () => props.offer.amount - props.listingPrice
)
const madeOne=computed(
    ()=> new Date(props.offer.created_at).toDateString()
)
// const notSold=computed(()=>
//     !props.offer.accepted_at && !props.offer.declined_at
// )
</script>