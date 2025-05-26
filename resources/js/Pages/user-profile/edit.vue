<template>
    <div class="form-wrapper">
        <form @submit.prevent="update">
             <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <label class="label">Beds:</label>
                <input type="number" v-model.number="form.beds"
                    class="input" />
                <span class="input-error mt-3" v-if="form.errors.beds">{{ form.errors.beds }}</span>
            </div>

            <div class="col-span-2">
                <label for="bath" class="label">Bath:</label>
                <input type="number" id="bath" v-model.number="form.bath"
                    class="input" />
                <span class="input-error" v-if="form.errors.bath">{{ form.errors.bath }}</span>
            </div>

            <div class="col-span-2">
                <label for="area" class="label">Area:</label>
                <input type="number" id="area" v-model.number="form.area"
                    class="input" />
                <span class="input-error mt-1" v-if="form.errors.area">{{ form.errors.area }}</span>
            </div>

            <div class="col-span-4">
                <label for="city" class="label">City:</label>
                <input type="text" id="city" v-model="form.city"
                    class="input" />
                <span class="input-error" v-if="form.errors.city">{{ form.errors.city }}</span>
            </div>

            <div class="col-span-2">
                <label for="code" class="label">Code:</label>
                <input type="text" id="code" v-model="form.code"
                    class="input" />
                <span class="input-error" v-if="form.errors.code">{{ form.errors.code }}</span>
            </div>

            <div class="col-span-4">
                <label for="street" class="label">Street:</label>
                <input type="text" id="street" v-model="form.street"
                    class="input" />
                <span class="input-error" v-if="form.errors.street">{{ form.errors.street }}</span>
            </div>

            <div class="col-span-2">
                <label for="street_number" class="label">Street Number:</label>
                <input type="number" id="street_number" v-model.number="form.street_number"
                    class="input" />
                <span class="input-error" v-if="form.errors.street_number">{{ form.errors.street_number }}</span>
            </div>

            <div class="col-span-6">
                <label for="price" class="label">Price:</label>
                <input type="number" id="price" v-model.number="form.price"
                    class="input" />
                <span class="input-error" v-if="form.errors.price">{{ form.errors.price }}</span>
            </div>

        </div>

            <div class="form-group full-width">
                <button type="submit" class="btn-primary mt-5">Update</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
const props=defineProps({
    listing:Object
})
const form = useForm({
    beds: props.listing.beds,
    bath: props.listing.bath,
    area: props.listing.area,
    city: props.listing.city,
    code: props.listing.code,
    street: props.listing.street,
    street_number: props.listing.street_number,
    price: props.listing.price,
})

const update = () => form.put(route('listing-profile.update', {listing_profile: props.listing.id}))
</script>
