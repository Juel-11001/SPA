<template>
    <div class="my-4">
        <a class="btn-primary" :href="route('listing.index')"> < Back</a>
    </div>
    <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-col-3 md:grid-col-3 lg:grid-col-3 gap-1">
                <img v-for="image in listing.images" :key="image.id" :src="image.src" />
            </div>
            <div v-else class="w-full text-center text-gray-500 font-medium"> N0 Image</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-600"/>
            </Box>
            <Box class="gap-4">
                <template #header>
                    Monthly Payment
                </template>
                <div>
                    <label for="" class="label">Interest Rate ({{ interestRate }} %)</label>
                    <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1"
                           class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer "/>
                </div>
                <div>
                    <label for="" class="label">Duration ({{ duration }} years)</label>
                    <input v-model.number="duration" type="range" min="3" max="35" step="1"
                           class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer "/>
                </div>
                <div class="text-gray-600 mt-2">
                    <div class="text-gray-400 text-sm mb-2">
                        Your Monthly Payment :
                    </div>
                    <price :price="monthlyPayment" class="text-2xl"/>
                </div>
                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>total Paid</div>
                        <div>
                            <Price :price="totalPaid" class="font-medium" />
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>Principle Paid</div>
                        <div>
                            <Price :price="listing.price" class="font-medium" />
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>total Interest</div>
                        <div>
                            <Price :price="totalInterest" class="font-medium" />
                        </div>
                    </div>
                </div>

            </Box>
           <MakeOffer @offer-updated="offer=$event" v-if="user && !props.OfferMade" :listing-id="listing.id" :price="listing.price"/>
            <OfferMade v-if="user && props.OfferMade" :initalOffer="props.OfferMade"/>
        </div>
    </div>
</template>


<script setup>
import ListingAddress from "../../Components/ListingAddress.vue";
import Box from "../../Components/Ui/Box.vue";
import ListingSpace from "../../Components/Ui/ListingSpace.vue";
import Price from "../../Components/Ui/Price.vue";
import {computed, ref} from 'vue'
import {useMonthlyPayment} from "../../Composables/useMonthlyPayment.js";
import MakeOffer from "./show/components/MakeOffer.vue";
import { usePage } from "@inertiajs/vue3";
import OfferMade from "./show/components/OfferMade.vue";

const interestRate = ref(2.5)
const duration = ref(25)
const props = defineProps({
    listing: Object,
    OfferMade:Object
})
// console.log(props.OfferMade);

const offer=ref(props.listing.price)
const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(offer, interestRate, duration)

const page=usePage()
const user=computed(()=>page.props.user ?? null)
</script>
