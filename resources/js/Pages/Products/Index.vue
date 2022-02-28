<template>
    <Head title="Productos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-around my-5">
                            <input type="search" class="w-6/12 form-input rounded-md shadow-md" placeholder="Buscar un Producto" v-model="q">
                            <Link class="rounded bg-emerald-400 hover:bg-emerald-600 shadow-sm text-white p-2 w-2/12 text-center" :href="route('products.create')">Nuevo Producto</Link>
                        </div>
                        <!-- Products Table -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Producto
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Descripcion
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Precio en Tienda
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        &nbsp;
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr
                                                v-for="product in products.data"
                                                :key="product.id" >
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <Link :href=" route('products.edit', product.id) ">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </Link>
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    <span class="text-black-900 font-bold">{{ product.code }} -</span>
                                                                    {{ product.name }}
                                                                </div>
                                                                <div class="text-sm" :class="{ 'text-green-500': product.stock >= 20, 'text-orange-500': product.stock <=19, 'text-red-500': product.stock <= 5 }">
                                                                    <span v-if="product.stock > 0 " class="itallic">
                                                                        {{ product.stock }} Existentes
                                                                    </span>
                                                                    <span v-else class="text-red-800 font-bold">Agotado</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{ product.description.substr(0, 60) }}...
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            ${{ product.shop_price }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <button class="bg-green-700 hover:bg-green-900 text-white rounded-full p-2 mx-1" title="Agregar Stock" @click="getProductData(product.id)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </button>

                                                        <button class="bg-red-700 hover:bg-red-900 text-white rounded-full p-2 mx-1" @click.prevent="deleteProduct(product.id)" title="Eliminar">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="productDetail != null" class="absolute right-3 top-2/4 w-98 h-60 shadow-2xl bg-white p-3 flex flex-col justify-between items-center">

                                            <h6 class="bg-emerald-700 text-white p-2 rounded font-bold flex justify-between items-center w-full">
                                                <span>
                                                    Agregar Stock
                                                </span>
                                                <button class="p-1 bg-red-700 text-white rounded-full" @click.prevent="productDetail = null">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </h6>

                                            <div class="flex flex-col space-y-1 items-center">
                                                <label for="" class="fw-bold text-black text-center w-full">Nuevas Entradas</label>
                                                <input type="text" class="form-input rounded-lg w-6/12" v-model="stock">
                                                <span class="italic text-zinc-500">{{ productDetail.stock }} Disponible(s)</span>
                                            </div>

                                            <button @click.prevent="addStock(productDetail.id)" class="bg-emerald-500 hover:bg-emerald-700 text-white p-2 text-center block">Agregar Nuevo Stock</button>
                                        </div>
                                        <paginator :links="products.links" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Paginator from '@/Components/Paginator.vue';
import SweetAlert from "sweetalert2";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        Paginator,
    },

    props: {
        products: Object
    },

    data(){
        return {
            q: '',
            productDetail: null,
            stock: null
        }
    },

    methods:{
        deleteProduct(id){
            this.$inertia.delete(this.route('products.destroy', id));
        },

        showSuccessAlert() {
            // Use sweetalert2
            this.$swal.fire({
                position: "center",
                icon: "success",
                title: "Eliminado con Exito",
                showConfirmButton: false,
                timer: 1500,
            });
        },

        getProductData(id){
            fetch(`/products/${id}`)
                .then( response => response.json() )
                .then( data => {
                    this.productDetail = data;
                });
        },

        addStock(id){
            this.$inertia.put(this.route('products.update', id), {stock: this.stock, type: 'add'});
        }
    },

    updated() {
        this.isEditable = false;
        if (this.$page.props.flash.status == "success") {
            this.showSuccessAlert();
        }
    },

    watch:{
        q( value ){
            this.$inertia.get(this.route('products.index', { q: value }), {}, { preserveState: true });
        }
    }
};
</script>

