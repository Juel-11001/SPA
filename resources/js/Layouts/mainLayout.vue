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
                <div v-if="user" class="flex items-center gap-4" >
                    <div class="text-sm text-gray-500">{{ user.name }}</div>
                    <Link class="btn-primary"
                          :href="route('listing.create')">+ New Listing
                    </Link>
                    <Link class="btn-danger" :href="route('logout.destroy')" method="delete" as="button">Logout</Link>
                </div>
                <div v-else>
                    <Link class="btn-primary"
                          :href="route('login')">Sign In
                    </Link>
                </div>
            </nav>
        </div>
    </header>

    <!-- main section -->
    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 p-2 border rounded-md shadow-sm border-green-200 bg-green-100 flex justify-between items-center">
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from 'vue'
import ListingSpace from "../Components/Ui/ListingSpace.vue";

const page = usePage()
const flashSuccess = computed(
    () => page.props.flash.success
)
const user = computed(
    () => page.props.user,
)
</script>
