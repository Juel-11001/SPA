<template>
    <div class="form-wrapper">
        <form @submit.prevent="update" class="form-grid">
            <div class="form-group">
                <label for="beds">Beds:</label>
                <input type="number" id="beds" v-model.number="form.beds" />
                <span class="error" v-if="form.errors.beds">{{ form.errors.beds }}</span>
            </div>

            <div class="form-group">
                <label for="bath">Bath:</label>
                <input type="number" id="bath" v-model.number="form.bath" />
                <span class="error" v-if="form.errors.bath">{{ form.errors.bath }}</span>
            </div>

            <div class="form-group">
                <label for="area">Area:</label>
                <input type="number" id="area" v-model.number="form.area" />
                <span class="error" v-if="form.errors.area">{{ form.errors.area }}</span>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" v-model="form.city" />
                <span class="error" v-if="form.errors.city">{{ form.errors.city }}</span>
            </div>

            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" id="code" v-model="form.code" />
                <span class="error" v-if="form.errors.code">{{ form.errors.code }}</span>
            </div>

            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" id="street" v-model="form.street" />
                <span class="error" v-if="form.errors.street">{{ form.errors.street }}</span>
            </div>

            <div class="form-group">
                <label for="street_number">Street Number:</label>
                <input type="number" id="street_number" v-model.number="form.street_number" />
                <span class="error" v-if="form.errors.street_number">{{ form.errors.street_number }}</span>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" v-model.number="form.price" />
                <span class="error" v-if="form.errors.price">{{ form.errors.price }}</span>
            </div>

            <div class="form-group full-width">
                <button type="submit" class="btn">Update</button>
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

const update = () => form.put(route('listing.update', {listing: props.listing.id}))
</script>

<style scoped>
.form-wrapper {
    padding: 30px;
    background-color: #f9f9f9;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.form-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
}

input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border 0.2s, box-shadow 0.2s;
}

input:focus {
    border-color: #3481d1;
    box-shadow: 0 0 0 3px rgba(52, 129, 209, 0.1);
    outline: none;
}

.error {
    margin-top: 8px;
    background-color: #e53935;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
}

.btn {
    padding: 12px 24px;
    background-color: rgb(52, 129, 209);
    color: white;
    border-radius: 10px;
    border: none;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn:hover {
    background-color: white;
    color: rgb(52, 129, 209);
    border: 1px solid rgb(52, 129, 209);
    transition: all 0.3s ease;
}

.full-width {
    text-align: right;
}
</style>
