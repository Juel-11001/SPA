<template>
    <div class="flex gap-1">
        <div v-for="(link, index) in links" :key="index">
            <Link
                v-if="link.url"
                :href="link.url"
                class="py-2 px-4 rounded-md"
                :class="{ 'bg-indigo-500 text-gray-300': link.active }"
                v-html="link.label"
            />
            <span
                v-else
                class="py-2 px-4 rounded-md text-gray-400 cursor-not-allowed"
                v-html="link.label"
            />
        </div>
    </div>
</template>


<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    links: Array
})
</script>
