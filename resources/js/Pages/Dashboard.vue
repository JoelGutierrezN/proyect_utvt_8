<template>
    <Head title="Tablero" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tablero
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Content -->

                        <div class="p-3 w-full flex justify-between mb-5">
                            <!-- Button New Sale  -->
                            <Link :href="route('sales.index')" class="w-2/12 rounded-md bg-emerald-400 hover:bg-emerald-700 font-bold text-white p-2 flex justify-center lg:space-x-4 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>
                                    Nueva Venta
                                </span>
                            </Link>
                            <!-- Button New Sale END -->

                            <!-- Date -->
                            <span class="font-bold italic text-green-900 text-lg">
                                {{ today }}
                            </span>
                            <!-- Date END -->
                        </div>

                        <hr>

                        <div class="flex flex-col items-center justify-center ">

                            <!-- Today Sale Data  -->
                            <div class="flex justify-evenly w-full my-6">
                                <div class="flex flex-col items-center justify-center">
                                    <p class="bg-emerald-700 rounded-lg text-white font-bold italic text-center p-2">Venta Total</p>
                                    <span class="font-bold text-xl text-emerald-900">$12500</span>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p class="bg-emerald-700 rounded-lg text-white font-bold italic text-center p-2">Venta Total Personal</p>
                                    <span class="font-bold text-xl text-emerald-900">$3000</span>
                                </div>
                            </div>
                            <!-- Today Sale Data  END -->

                            <!-- Sales -->
                            <div class="flex flex-col justify-center items-center w-full border-b border-emerald-900">
                                <h6 class="w-full rounded bg-emerald-900 text-emerald-300 text-center font-bold p-1 my-4">Ultimas Ventas</h6>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-center font-bold px-2 text-emerald-900 mb-4">Productos</p>
                                    <p class="w-3/12 text-center font-bold px-2 text-emerald-900 mb-4">Monto</p>
                                    <p class="w-3/12 text-center font-bold px-2 text-emerald-900 mb-4">Hora</p>
                                </div>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">Sal, Pimiento, Corrector</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">$500</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">3:55 pm</p>
                                </div>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">Sal, Pimiento, Corrector</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">$500</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">3:55 pm</p>
                                </div>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">Sal, Pimiento, Corrector</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">$500</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">3:55 pm</p>
                                </div>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">Sal, Pimiento, Corrector</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">$500</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">3:55 pm</p>
                                </div>
                                <div class="flex w-full justify-around">
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">Sal, Pimiento, Corrector</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">$500</p>
                                    <p class="w-3/12 text-start px-2 py-1 mb-1 shadow-sm shadow-green-900 italic">3:55 pm</p>
                                </div>
                                <div class="flex w-full justify-center my-4">
                                    <Link :href="route('sales.index')" class="transition-all duration-300 text-emerald-500 hover:text-emerald-900 font-bold my-2 text-lg border-b-4 border-t-2 border-emerald-500 hover:border-emerald-900 w-2/12 text-center">Ver Todas</Link>
                                </div>
                            </div>
                            <!-- Sales END -->

                            <div class="flex flex-col justify-center items-center w-full border-b border-emerald-900">
                                <h6 class="w-full rounded bg-emerald-900 text-emerald-300 text-center font-bold p-1 my-4">Comportamiento de Ventas en los ultimos dias</h6>
                                <!-- Graphic  -->
                                <column-chart loading="Loading..." empty="No data" thousands="," decimal="." prefix="$" :data="{'2021-01-01': 1500, '2021-01-02': 900, '2021-01-03': 150, '2021-01-04': 300, '2021-01-05': 2600, '2021-01-06': 550, '2021-01-07': 250}" :colors="['#10b981', '#059669', '#34d399']" :stacked="true"></column-chart>
                                <!-- Graphic END -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default{

        components:{
            Head,
            Link,
            BreezeAuthenticatedLayout
        },

        data(){
            return{
                today: new Date().toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })
            }
        },
    }
</script>
