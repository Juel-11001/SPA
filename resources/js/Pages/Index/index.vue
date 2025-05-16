<!-- <template>
  <div class="">
    Home Page
    <h2>The message is : {{ message }}</h2>
  </div>
  <Link href="/Training/Course/Udemy/SPA/public/show">show Page</Link>

</template>

<script setup>
  import {Link} from '@inertiajs/vue3'
  defineProps({
    message: String
  })
</script>  -->
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
<script>
import MainLayout from "../../Layouts/mainLayout.vue";
export default {
    layout: MainLayout
}
</script>




