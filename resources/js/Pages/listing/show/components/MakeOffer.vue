<template>
    <Box>
        <template #header>Make an offer</template>
        <div>
            <form @submit.prevent="makeOffer">
                <div class="mt-2">
                    <input v-model.number="form.amount" type="text" name="" id="" class="input">
                    <input v-model.number="form.amount" type="range" :min="min" :max="max" step="1000" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer mt-3" />
                </div>
                <button type="submit" class="btn-primary mt-5 items-center justify-center w-full">Make an offer</button>
                {{ form.errors.amount }}
            </form>
            <div class="flex justify-between text-gray-500 font-medium mt-5">
                <div>Diffrent</div>
                <Price :price="difference"/>
            </div>
        </div>
    </Box>
</template>

<script setup>
import { computed, watch } from 'vue';
import Box from '../../../../Components/Ui/Box.vue';
import { useForm } from '@inertiajs/vue3';
import Price from '../../../../Components/Ui/Price.vue';
import {debounce} from 'loadsh'

const props = defineProps({
    listingId: Number,
    price: Number
})
const form = useForm({
    amount: props.price
})
const min = computed(() => {
    return Math.round(props.price / 2)
})
const max = computed(() => {
    return Math.round(props.price * 2)
})
const difference=computed(()=>{
    return form.amount-props.price
})
const makeOffer=()=>
    form.post(route('listing.offer.store',{listing:props.listingId}),
    {
        preserveScroll:true,
        preserveState:true,
    })
const emit = defineEmits([
    'offerUpdated'
])
// console.log(form.amount);

watch(()=>form.amount, debounce ((value)=>
    emit('offerUpdated', value),200),
)
</script>