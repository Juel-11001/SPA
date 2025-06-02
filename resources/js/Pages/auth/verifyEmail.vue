<template>
<div class="flex flex-col items-center">
    <div class="font-medium mb-2 text-2xl">
        You need to verify Email to work with us!
    </div>
    <Link :href="route('verification.send')" method="post" as="button" class="text-indigo-500 cursor-pointer text-[20px]">Resent verification Email </Link>
</div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3'
</script>
