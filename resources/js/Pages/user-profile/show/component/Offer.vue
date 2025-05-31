<template>
    <Box>
        <template #header>Offer #{{ offer.id }}</template>
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
                <Link class="btn-primary text-xs font-medium" as="button">Accept</Link>
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
    user:Object
})
// console.log(props.user);

const differece=computed(
    () => props.offer.amount - props.listingPrice
)
const madeOne=computed(
    ()=> new Date(props.offer.created_at).toDateString()
)
</script>