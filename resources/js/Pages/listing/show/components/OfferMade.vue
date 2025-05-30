<template>
    <Box>
        <template #header>Offer made</template>
        <Price :price="initalOffer.amount" class="text-2xl font-bold"/>
        <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
            <div>Made on</div>
            <div  class="font-medium"> {{ OfferMadeOn }}</div>
        </section>
    </Box>
</template>
<script setup>
import { computed } from 'vue';
import Box from '../../../../Components/Ui/Box.vue';
import Price from '../../../../Components/Ui/Price.vue';
const props=defineProps({
    initalOffer: Object
})
// console.log(props.initalOffer);

const OfferMadeOn=computed(
    () => new Date(props.initalOffer.created_at).toDateString()
    
)
</script>