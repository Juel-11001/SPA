<template>
    <form>
        <div class="mb-4 mt-0 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
            <input v-model="filterForm.deleted" id="deleted" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch } from 'vue';
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

const filterForm = reactive({
  deleted: false,
});

// watch(
//     () => filterForm.deleted, () => {
//   filterForm.get(route('listing-profile.index'),
//    {
//     preserveState: true,
//     preserveScroll: true,
//   })
// })
watch(
    filterForm, debounce (() => 
    router.get(route('listing-profile.index'),
    filterForm,{
    preserveState: true,
    preserveScroll: true,
}), 1000))
</script>