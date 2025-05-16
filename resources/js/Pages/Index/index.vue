<template>
    <div class="">Home Page</div>
    <span class="text-2xl">The Message is {{ message }}</span>
    <br />
</template>

<script setup>
defineProps({
    message: String,
})

</script>
<!-- <script>
 import MainLayout from "../../Layouts/mainLayout.vue";
 export default {
     layout: MainLayout
 }
 </script> -->




