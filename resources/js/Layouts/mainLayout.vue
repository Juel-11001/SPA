<template>
    <div class="">
      <b>The page with Time : {{ timer }}</b>
      <br>
    </div>
  <Link href="/Training/Course/Udemy/SPA/public/">Home Page</Link>&nbsp;
  <Link href="/Training/Course/Udemy/SPA/public/show">Show Page</Link>
<slot></slot>
</template>

<script setup>
  import {Link} from '@inertiajs/vue3'
  import { ref } from 'vue'
  const timer = ref(0)
  setInterval(()=>timer.value++,1000)
</script> 