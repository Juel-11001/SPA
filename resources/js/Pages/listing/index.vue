<template>

    <div v-for="listing in listings" :key="listing.id">
        <Link :href="route('listing.show', listing.id)">
       <ListingAddress :listing="listing"/>
        </Link>
            <div class="n_links">
                <Link class="btn btn_edit" :href="route('listing.edit', listing.id)">Edit</Link>
                <Link class="btn btn_delete" :href="route('listing.destroy', listing.id)" method="delete">Delete</Link>
            </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '../../Components/ListingAddress.vue';
defineProps({
    listings:Array
})
</script>
<style scoped>
.n_links{
    padding: 10px 10px 10px 0;
    margin: 10px 10px 10px 0;
}
.btn_edit{
    background-color: #0d6efd;
    color: white;
}
.btn{
    padding: 10px;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.4s;
    font-weight: 400;
    border: none;
}
.btn_edit:hover{
    background-color: #0b5ed7;
}
.btn_delete{
    background-color: red;
    margin-left: 10px;
    color: white;
}
.btn_delete:hover{
    background-color: #c20f0f;
}
</style>
