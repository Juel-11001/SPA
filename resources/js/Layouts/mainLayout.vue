<template>
    <div  v-if="flashSuccess" class="_success">
      {{ flashSuccess }}
      <!-- <b>The page with Time : {{ timer }}</b> -->
      <br>
    </div>
    <div class="links">
        <Link class="nav_links" href="/">Home</Link>&nbsp;
        <Link class="nav_links" href="/listing">Listings</Link>&nbsp;
        <Link class="nav_links" href="/listing/create">Create New Listing</Link>
    </div>
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
  .links{
      padding: 20px;
  }
  .nav_links{
      background-color: #0d6efd;
      color: white;
      padding: 10px;
      text-decoration: none;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
  }
  .nav_links:hover{
      background-color: #0b5ed7;
  }
</style>
