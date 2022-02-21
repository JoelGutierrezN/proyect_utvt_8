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
                            <form v-if="isEditable">
                                <h3>Formulario</h3>

                                <div class="flex justify-center my-3">
                                    <div
                                        class="flex flex-col justify-around items-center w-9/12"
                                    >
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
                                            v-model="form.description"
                                        ></textarea>
                                        <div class="flex justify-around">
                                            <div
                                                class="flex justify-center w-4/12 text-center align-center"
                                            >
                                                <span
                                                    class="bg-gray-800 text-white w-4/12 my-3 align-middle rounded-l-md leading-10"
                                                    >$</span
                                                >
                                                <input
                                                    type="text"
                                                    class="form-input p-2 rounded-r-md w-8/12 my-3 block py-2 focus:border-slate-700"
                                                    placeholder="Precio Proveedor"
                                                    v-model="
                                                        form.provider_price
                                                    "
                                                />
                                            </div>
                                            <div
                                                class="flex justify-center w-4/12 text-center align-center"
                                            >
                                                <span
                                                    class="bg-gray-800 text-white w-4/12 my-3 align-middle rounded-l-md leading-10"
                                                    >$</span
                                                >
                                                <input
                                                    type="text"
                                                    class="form-input border p-2 rounded-r-md w-8/12 my-3 block py-2"
                                                    placeholder="Precio Tienda"
                                                    v-model="form.shop_price"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-around">
                                    <input
                                        type="submit"
                                        class="text-white font-bold bg-emerald-400 hover:bg-emerald-500 rounded p-2"
                                        value="Guardar Cambios"
                                        @click.prevent="submit"
                                    />
                                </div>
                                <div class="flex justify-end md:px-5">
                                    <button
                                        @click.prevent="toggleForm"
                                        class="w-3/12"
                                    >
                                        <p class="flex justify-end">
                                            Regresar
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-5 ml-1"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </p>
                                    </button>
                                </div>
                            </form>
                            <section v-else>
                                <!-- <img src="" alt=""> -->

                                <h3>
                                    <span class="font-bold">
                                        {{ product.code }}
                                    </span>
                                    - {{ product.name }}
                                </h3>

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
                                        class="w-3/12"
                                    >
                                        <p class="flex justify-end">
                                            Regresar
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-5 ml-1"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                    clip-rule="evenodd"
                                                />
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
import SweetAlert from "sweetalert2";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },

    props: {
        product: Object,
    },

    data() {
        return {
            isEditable: false,
            form: {
                name: this.product.name,
                description: this.product.description,
                provider_price: this.product.provider_price,
                shop_price: this.product.shop_price,
            },
        };
    },

    methods: {
        toggleForm() {
            this.isEditable = !this.isEditable;
        },

        submit() {
            this.$inertia.put(
                this.route("products.update", this.product.id),
                this.form
            );
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
    },

    updated() {
        this.isEditable = false;
        if (this.$page.props.flash.status == "success") {
            this.showSuccessAlert();
        }
    },
};
</script>
