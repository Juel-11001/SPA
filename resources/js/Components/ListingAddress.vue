<template>
    <div>
        <span>City : </span>{{ listing.city }}, <span>zip code : </span
        >{{ listing.code }}, <span>street : </span>{{ listing.street }},
        <span>Price : </span>${{ listing.price }}
    </div>
</template>
   
<script setup>
 defineProps({
        listing:Object
    })
</script>
