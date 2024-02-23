<script setup>
import DanLayout from "@/Layouts/DanLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const { categories } = defineProps({ categories: Object, }); 
console.log(categories);
const form = useForm({ name: null, price: null, quantity: null, short_description: null, categories: [] });
const create = () => { 
    console.log(form) 
    form.post(route('products.store'), { 
        onSuccess: (data) => { 
            form.name = null; 
            form.quantity = null; 
            form.price = null; 
            form.short_description = null; 
            form.categories = []; 
            toast("Product added successfully", { autoClose: 4000, }); 
            }, 
            onError: (data) => { 
                toast("Incorrect details entered.", { autoClose: 4000, }); 
                } 
            }) 
        }
</script>
<template>
    <DanLayout title="Add Product">
        <template #body>
            <h3>Add Product</h3>
            <form @submit.prevent="create">
                <label for="product">Name: </label>
                <input type="text" name="product" v-model="form.name" /><br /><br />
                <label for="quantity">quantity: </label>
                <input type="text" name="quantity" v-model="form.quantity" /><br /><br />
                <label for="price">Price: </label>
                <input type="text" name="price" v-model="form.price" /><br /><br />
                <label for="short_description">short description: </label>
                <input type="text" name="short_description" v-model="form.short_description" /><br /><br />
                <label for="price">categories: </label>
                <select name="categories" multiple v-model="form.categories">
                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <br /><br />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    create
                </button>
            </form>
        </template>
    </DanLayout>
</template>
