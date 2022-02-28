<template>
    <Head title="Detalle de Producto" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle de Producto
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container text-center">
                            <form v-if="isEditable" @submit.prevent="submit">
                                <div class="flex justify-center my-3">
                                    <div class="flex flex-col justify-around items-center w-9/12">
                                    <div class="w-2/12 mx-auto p-2 my-4">
                                        <img v-if="product.image" :src=" `/storage/${product.image}` " :alt="product.image">
                                        <img v-else :src="'/img/products/product.png'" alt="product-image">
                                    </div>
                                    <h6 class="text-center text-white bg-emerald-800 rounded w-full py-2 my-3">Informacion del Producto</h6>
                                        <input
                                            type="text"
                                            class="form-input p-2 rounded-md w-11/12 my-3 block py-2"
                                            placeholder="Nombre"
                                            v-model="form.name"
                                        />
                                        <textarea
                                            type="text"
                                            class="form-input h-60 p-2 rounded-md w-11/12 my-3 block py-2 resize-none"
                                            placeholder="Descripcion"
                                            v-model="form.description"></textarea>

                                        <div class="flex justify-around">
                                            <div class="flex justify-center w-4/12 text-center align-center">
                                                <span class="bg-gray-800 text-white w-4/12 my-3 align-middle rounded-l-md leading-10">$</span>
                                                <input
                                                    type="text"
                                                    class="form-input p-2 rounded-r-md w-8/12 my-3 block py-2 focus:border-slate-700"
                                                    placeholder="Precio Proveedor"
                                                    v-model="form.provider_price"/>
                                            </div>
                                            <div class="flex justify-center w-4/12 text-center align-center">
                                                <span class="bg-gray-800 text-white w-4/12 my-3 align-middle rounded-l-md leading-10">$</span>
                                                <input
                                                    type="text"
                                                    class="form-input border p-2 rounded-r-md w-8/12 my-3 block py-2"
                                                    placeholder="Precio Tienda"
                                                    v-model="form.shop_price"
                                                />
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap">
                                            <h6 class="text-center text-white bg-emerald-800 rounded w-full py-2 my-3">¿Este producto es de...?</h6>
                                            <div class="flex justify-start w-11/12 md:w-4/12 space-x-4" v-for="user in users" :key="user.id">
                                                <input type="radio" id="user_{{ user.id }}" class="rounded text-pink-500 m-r-2" name="user_id" v-model="form.user_id" :value="user.id" :checked="(user.id == product.user_id) ? true : false">
                                                <label for="user_{{ user.id }}">{{ user.name }}</label>
                                            </div>
                                        </div>

                                        <div class="flex justify-center flex-col items-center w-full">
                                            <h6 class="text-center text-white bg-emerald-800 rounded w-full py-2 my-3">Imagen del Producto</h6>
                                            <label class="block text-sm font-medium text-gray-700"> Imagen del Producto </label>
                                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md space-x-8">
                                                <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Subir un Archivo</span>
                                                    <input name="file-upload" id="file-upload" type="file" @input="form.image = $event.target.files[0]" class="sr-only" @change="onFileChange">
                                                    </label>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG ó JPG</p>
                                                </div>

                                                <div v-if="url != null" class="flex justify-center w-2/12">
                                                    <img :src="url" alt="selected-image" class="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex justify-around">
                                    <input
                                        type="submit"
                                        class="text-white font-bold bg-emerald-400 hover:bg-emerald-500 rounded p-2"
                                        value="Guardar Cambios"
                                    />
                                </div>
                                <div class="flex justify-end md:px-5">
                                    <button
                                        @click.prevent="toggleForm"
                                        class="w-3/12">
                                        <p class="flex justify-end">
                                            Regresar
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-5 ml-1"
                                                viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                    clip-rule="evenodd"/>
                                            </svg>
                                        </p>
                                    </button>
                                </div>
                            </form>
                            <section v-else>
                                <h3>
                                    <span class="font-bold">
                                        {{ product.code }}
                                    </span>
                                    - {{ product.name }}
                                </h3>

                                <div class="w-2/12 mx-auto p-2 my-4">
                                    <img v-if="product.image" :src=" `/storage/${product.image}` " :alt="product.image">
                                    <img v-else :src="'/img/products/product.png'" alt="product-image">
                                </div>

                                <p
                                    class="mb-8"
                                    :class="{
                                        'text-green-500': product.stock >= 20,
                                        'text-orange-500': product.stock <= 19,
                                        'text-red-500': product.stock <= 5,
                                    }"
                                >
                                    {{ product.stock }} Existentes
                                </p>

                                <p class="mb-8">
                                    {{ product.description }}
                                    <span class="block">{{
                                        product.created_by
                                    }}</span>
                                </p>

                                <p class="flex justify-around">
                                    <span class="text-red-600">
                                        <p class="font-bold text-slate-900">
                                            Precio de Proveedor:
                                        </p>
                                        ${{ product.provider_price }}
                                    </span>
                                    <span class="text-green-600">
                                        <p class="font-bold text-slate-900">
                                            Precio en Tienda:
                                        </p>
                                        ${{ product.shop_price }}
                                    </span>
                                </p>

                                <div class="flex justify-around w-12/12 my-10">
                                    <button
                                        @click.prevent="toggleForm"
                                        class="bg-emerald-400 text-white hover:bg-emerald-500 p-2 rounded font-bold w-3/12"
                                    >
                                        Modificar Producto
                                    </button>
                                </div>
                                <div class="flex justify-end md:px-5">
                                    <button
                                        @click.prevent="backToIndex"
                                        class="w-3/12">
                                        <p class="flex justify-end">
                                            Regresar
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-5 ml-1"
                                                viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                    clip-rule="evenodd"/>
                                            </svg>
                                        </p>
                                    </button>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3'
import SweetAlert from "sweetalert2";
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        useForm
    },

    props: {
        product: Object,
        users: Array
    },

    setup(props){
        const form = useForm({
            _method: 'put',
            name: props.product.name,
            description: props.product.description,
            provider_price: props.product.provider_price,
            shop_price: props.product.shop_price,
            image: props.product.image,
            user_id: props.product.user_id
        });

        function submit() {
            Inertia.post(`/products/${props.product.id}`, form);
        }

        return { form, submit }
    },

    data() {
        return {
            isEditable: false,
            url: null
        };
    },

    methods: {
        toggleForm() {
            this.isEditable = !this.isEditable;
        },

        showSuccessAlert() {
            // Use sweetalert2
            this.$swal.fire({
                position: "center",
                icon: "success",
                title: "Actualizado con Exito",
                showConfirmButton: false,
                timer: 1500,
            });
        },

        backToIndex() {
            this.$inertia.get(this.route("products.index"));
        },

        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        }
    },

    updated() {
        this.isEditable = false;
        this.url = null;
        if (this.$page.props.flash.status == "success") {
            this.showSuccessAlert();
        }
    },
};
</script>
