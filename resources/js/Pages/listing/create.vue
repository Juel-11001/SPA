<template>
    <div>
        <form @submit.prevent="create">
            <div>
                <div>
                    <label>beds : </label>
                    <input type="text" v-model.number="form.beds" />
                </div>
                <div>
                    <label>bath : </label>
                    <input type="text" v-model.number="form.bath" />
                </div>
                <div>
                    <label>area : </label>
                    <input type="text" v-model.number="form.area"/>
                </div>
                <div>
                    <label>city : </label>
                    <input type="text" v-model="form.city"/>
                </div>
                <div>
                    <label>code : </label>
                    <input type="text" v-model="form.code"/>
                </div>
                <div>
                    <label>street : </label>
                    <input type="text" v-model="form.street"/>
                </div>
                <div>
                    <label>street number : </label>
                    <input type="text" v-model.number="form.street_number"/>
                </div>
                <div>
                    <label>price : </label>
                    <input type="text" v-model.number="form.price" />
                </div>
                <div>
                    <button class="btn" type="submit">Create</button>
                </div>
            </div>

        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
// import { reactive } from 'vue';


const form=useForm({
    beds:0,
    bath:0,
    area:0,
    city:null,
    code:null,
    street:null,
    street_number:0,
    price:0,
})
const baseUrl = window.location.origin + '/Training/GitHub/Juel-11001/SPA/public'
const create = () => form.post(`${baseUrl}/listing`)
</script>

<style scoped>
    body{
        margin: 0;
        padding:0px;
    }
    div{
        padding: 10px;
    }
    div>input{
        padding: 5px;
        
    }
    label{
        font-weight: 500;
        font-size: 20px;
    }
    .btn{
        padding: 10px 20px;
        background-color: rgb(52 129 209);
        color: black;
        border-radius: 10px;
        border: none;
        font-size: 15px;
        cursor:pointer;
        transition: 0.4s;
    }
    .btn:hover{
        padding: 10px 20px;
        background-color: white;
        color: black;
        border-radius: 10px;
        border:1px solid rgb(52 129 209);
        font-size: 15px;
        /* cursor:pointer; */
    }
</style>
