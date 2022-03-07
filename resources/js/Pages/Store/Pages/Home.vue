<template>
    <div class="font-Montserrat">
        <nav></nav>
        <section class="w-full h-screen">
            <!-- Header -->
            <div id="home">
                <div class="w-full h-3/4">
                    <div
                        class="w-full h-full flex flex-col absolute space-y-96 py-4 items-center lg:space-y-0 lg:items-start lg:pt-32 lg:justify-start"
                    >
                        <input
                            type="search"
                            class="p-3 rounded-full shadow-md shadow-black transition duration-300 focus-within:shadow-md focus:ring-2 focus:w-11/12 lg:hidden"
                            placeholder="San Francisco"
                            id="search"
                        />
                        <div class="hidden lg:h-auto lg:w-2/5 lg:flex pb-6">
                          <p class="text-4xl ml-16 font-bold text-white">Encuentra los mejores productos para el hogar.</p>
                        </div>
                        <button
                            class="text-lg font-semibold shadow-sm text-primary p-4 w-48 rounded-full bg-white transition duration-500 ease-in-out hover:bg-primary hover:text-white transform hover:-translate-y-1 hover:scale-110 lg:ml-16"
                        >
                            Explorar
                        </button>
                    </div>
                    <div class="w-full h-full lg:h-96 lg:bg-sanFranciscoDesktop lg:bg-cover lg:bg-center">
                        <img class="lg:hidden" src="img/sanFrancisco.jpg" alt="san_francisco" />
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- recommended  -->
            <div id="recommended" class="p-6">
                <p class="text-3xl font-semibold text-primary">Recomendados</p>
                <!-- Scroll Container  -->
                <div
                    class="w-auto h-72 items-center px-4 mt-6 overflow-x-auto overscroll-x-contain flex space-x-4 overflow-y-hidden"
                >
                    <!-- Card  -->
                    <div class="card">
                        <div
                            class="w-full h-3/5 rounded-t-lg bg-cover bg-norway"
                        ></div>
                        <div
                            class="bg-secondary w-full h-2/5 px-4 py-2 rounded-b-lg"
                        >
                            <p class="text-white text-bold text-xl">Noruega</p>
                            <p class="text-white text-md">
                                Paisajes increibles
                            </p>
                        </div>
                    </div>
                    <!-- End Card  -->
                    <!-- Card  -->
                    <div class="card">
                        <div
                            class="w-full h-3/5 rounded-t-lg bg-cover bg-new_york"
                        ></div>
                        <div
                            class="bg-white w-full h-2/5 px-4 py-2 rounded-b-lg"
                        >
                            <p class="text-terciary text-bold text-xl">
                                Nueva York
                            </p>
                            <p class="text-terciary text-md">La gran manzana</p>
                        </div>
                    </div>
                    <!-- End Card  -->
                </div>
                <!--End Scroll Container  -->
            </div>
            <!-- End recommended  -->

            <!-- Popular Content  -->
            <div class="px-6 h-auto w-full" id="popular">
                <p class="text-3xl text-primary font-semibold pb-6 mt-6">
                    Rentas Destacadas
                </p>

                <div
                    class="w-full h-full flex flex-col space-y-6 items-center justify-center lg:px-6"
                >
                    <!-- card  -->
                    <div class="w-full h-96 bg-chicago bg-cover lg:bg-center rounded-xl">
                        <p class="card-title">Chicago</p>
                        <p class="text-md pl-8 text-zinc-700 mr-24">
                            2 Habitaciones, baño y cocina
                        </p>
                    </div>
                    <!--  End card  -->
                    <div class="lg:flex lg:h-full lg:space-x-4 lg:w-full space-y-4">
                      <!-- card  -->
                      <div class="w-full h-96 bg-chicago bg-cover rounded-xl lg:h-auto">
                          <p class="card-title">Chicago</p>
                          <p class="text-md pl-8 text-zinc-700 mr-24">
                              2 Habitaciones, baño y cocina
                          </p>
                      </div>
                      <!--  End card  -->
                      <div class="lg:w-3/6 flex flex-col space-y-4">
                        <!-- card  -->
                        <div class="w-full h-96 bg-chicago bg-cover rounded-xl">
                            <p class="card-title">Chicago</p>
                            <p class="text-md pl-8 text-zinc-700 mr-24">
                                2 Habitaciones, baño y cocina
                            </p>
                        </div>
                        <!--  End card  -->
                        <!-- card  -->
                        <div class="w-full h-96 bg-chicago bg-cover rounded-xl">
                            <p class="card-title">Chicago</p>
                            <p class="text-md pl-8 text-zinc-700 mr-24">
                                2 Habitaciones, baño y cocina
                            </p>
                        </div>
                        <!--  End card  -->
                      </div>
                    </div>

                </div>
            </div>
            <!-- End Popular Content  -->

            <!-- About -->
            <div id="about" class="w-full py-4 h-auto">
                <div class="w-full h-full px-6 flex flex-col space-y-4">
                    <p class="text-3xl text-primary font-semibold mt-6">
                        Preguntas Frecuentes
                    </p>
                    <div class="">
                        <p class="text-xl font-medium text-primary">
                            ¿Quienes somos?
                        </p>
                        <p class="text-md pt-2">...</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl font-medium text-primary">
                            ¿Que encuentras con nosotros?
                        </p>
                        <p class="text-md pt-2">...</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-xl font-medium text-primary">
                            ¿Necesitas contactarnos?
                        </p>
                        <p class="text-md pt-2">...</p>
                    </div>
                </div>
            </div>
            <!-- End About -->

            <!-- Footer -->
            <footer class="w-full h-64 bg-gray-50 p-6 space-y-2">
                <p class="text-lg">Acerca de</p>
                <p class="text-sm text-gray-300">Encuentranos en</p>
                <p class="text-sm text-gray-300">Inversionistas</p>
                <p class="text-sm text-gray-300">Terminos y Condiciones</p>
                <p class="text-sm text-gray-300">Contacto</p>
            </footer>
            <!-- End Footer -->
        </section>

        <!-- Tab Bar -->
        <div
            class="w-full h-16 bg-white fixed left-0 bottom-0 shadow-lg shadow-black flex space-x-8 items-center justify-center lg:hidden"
            id="tab_bar"
        >
            <a href="#home">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        class="fill-current text-gray-300 hover:text-gray-500"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
            </a>

            <a href="#recommended">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"
                    />
                    <path
                        class="fill-current text-gray-300 hover:text-gray-500"
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>

            <a href="#popular">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        class="fill-current text-gray-300 hover:text-gray-500"
                        fill-rule="evenodd"
                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>

            <a href="#about">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        class="fill-current text-gray-300 hover:text-gray-500"
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>

            <a href="">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        class="fill-current text-gray-300 hover:text-gray-500"
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                    />
                </svg>
            </a>
        </div>
        <!-- End Tab Bar -->
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
};
</script>
