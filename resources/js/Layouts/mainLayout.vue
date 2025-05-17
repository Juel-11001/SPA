<template>
    <div  v-if="flashSuccess" class="_success">
      {{ flashSuccess }}
      <!-- <b>The page with Time : {{ timer }}</b> -->
      <br>
    </div>
  <Link href="/Training/Course/Udemy/SPA/public/">Home Page</Link>&nbsp;
  <Link href="/Training/Course/Udemy/SPA/public/show">Show Page</Link>
<slot></slot>
</template>

<script setup>
  import {Link, usePage} from '@inertiajs/vue3'
import { computed } from 'vue';

    //page.props.value.flash.success
  const page=usePage()
  const flashSuccess=computed(()=>page.props.flash.success)
  // import { ref } from 'vue'
  // const timer = ref(0)
  // setInterval(()=>timer.value++,1000)
</script> 
<style scoped>
  ._success{
    background-color: green;
    color: black;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    padding: 10px;
    border-radius: 10px;
  }
</style>