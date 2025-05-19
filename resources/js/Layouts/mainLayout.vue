<template>
    <!--header section-->
    <header class="border-b border-gray-200 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg">
                    <Link :href="route('listing.index')">Listings</Link>&nbsp;
                </div>
                <div class="text-xl text-indigo-600 font-bold text-center">
                    <Link :href="route('listing.index')">SPA</Link>&nbsp;
                </div>
                <div class="text-lg">
                    <Link class="bg-indigo-600 hover:bg-indigo-800 text-white font-medium p-2 rounded-md"
                          :href="route('listing.create')">+ New Listing
                    </Link>
                </div>
            </nav>
        </div>
    </header>

    <!-- main section -->
    <main class="container mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 p-2 border rounded-md shadow-sm border-green-200 bg-green-100">
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'
import ListingSpace from "../Components/Ui/ListingSpace.vue";

//page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
// import { ref } from 'vue'
// const timer = ref(0)
// setInterval(()=>timer.value++,1000)
</script>
