<template>
    <div>
       <span class="font-medium"> {{ listing.beds }} bds </span><span class="text-gray-400">| </span>
       <span class="font-medium"> {{ listing.bath }} ba </span><span class="text-gray-400">| </span>
        <span class="font-medium"> {{ listing.area }} m<sup>2</sup></span>

    </div>
</template>
<script setup>
    defineProps({
        listing:Object
    })
</script>
