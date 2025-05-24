<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input v-model.number="filterForm.priceFrom" type="number" class="input-filter-l w-40 p-2"
                       name="priceFrom" id="priceFrom" placeholder="price from">
                <input v-model.number="filterForm.priceTo" type="number" class="input-filter-r w-40 p-2" name="priceTo"
                       id="priceTo" placeholder="Price to">
            </div>
            <div class="flex flex-nowrap items-center">
                <select class="input-filter-l w-25 p-2" v-model="filterForm.beds">
                    <option value="null">Beds</option>
                    <option v-for="i in 5" :key="i" :value="i">{{ i }}</option>
                    <option>6+</option>
                </select>
                <select class="input-filter-r w-25 p-2" v-model="filterForm.baths">
                    <option value="null">Baths</option>
                    <option v-for="i in 5" :key="i" :value="i">{{ i }}</option>
                    <option>6+</option>
                </select>
            </div>
            <div class="flex flex-nowrap items-center">
                <input v-model.number="filterForm.areaFrom" type="text" class="input-filter-l w-40 p-2" name="areaFrom"
                       id="areaFrom" placeholder="Area from">
                <input v-model.number="filterForm.areaTo" type="text" class="input-filter-r w-40 p-2" name="areaTo"
                       id="areaTo" placeholder="Area to">
            </div>
            <button type="submit"
                    class="bg-gray-600 hover:bg-gray-500 text-white font-medium p-2 rounded-md cursor-pointer ml-4">
                Filter
            </button>
            <button type="reset" class="cursor-pointer text-red-500" @click="clear">Clear</button>
        </div>
    </form>
</template>
<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    filters: Object
})
const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo:  props.filters.priceTo ?? null,
    beds:  props.filters.beds ?? null,
    baths:  props.filters.baths ?? null,
    areaFrom:  props.filters.areaFrom ?? null,
    areaTo:  props.filters.areaTo ?? null,

})
const filter = () => {
    filterForm.get(
        route('listing.index'),
        {
            preserveState: true,
            preserveScroll: true,
        }
    )
}
const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.beds = null
    filterForm.baths = null
    filterForm.areaFrom = null
    filterForm.areaTo = null
    filter()
}
</script>
