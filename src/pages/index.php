<?php include_once('../components/header.php');
$_COOKIE['connected'] = false;
$connected = $_COOKIE['connected'];
if(!$connected){
  include_once("../pages/auth/login.php");
}elseif($connected){ 
?>



<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <?php include_once("../components/aside.php") ?>
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">

            <template x-if="isPagesMenuOpen">
                <ul x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu">
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="pages/login.html">Connexion</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="pages/create-account.html">
                            Créer un compte
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="pages/forgot-password.html">
                            Mot de passe oublié
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="pages/404.html">404</a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="w-full" href="pages/blank.html">Blanc</a>
                    </li>
                </ul>
            </template>
            </li>
            </ul>
            <div class="px-6 my-6">

            </div>
    </aside>
    <div class="flex flex-col flex-1 w-full">
        <?php include_once("../components/navbar.php") ?>
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Tableau de bord
                </h2>
                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total des prospects
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                0
                            </p>
                        </div>
                    </div>



                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Discussion en attente
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                0
                            </p>
                        </div>
                    </div>
                </div>

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nom prospect</th>
                                    <th class="px-4 py-3">Contact prospect</th>
                                    <th class="px-4 py-3">Adresse mail</th>
                                    <th class="px-4 py-3">Programme</th>
                                    <th class="px-4 py-3">Date d'ajout</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-700" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">

                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-700" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>

                                <tr class="text-gray-700 dark:text-gray-400" style="height: 50px;">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->

                                            <div>
                                                <p class="font-semibold"></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                    <td class="px-4 py-3 text-sm">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3">
                            Vue 1-9 sur 100
                        </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                <ul class="inline-flex items-center">
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            1
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            2
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            3
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            4
                                        </button>
                                    </li>
                                    <li>
                                        <span class="px-3 py-1">...</span>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            8
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            9
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </span>
                    </div>
                </div>

                <!-- Charts -->

            </div>
    </div>
</div>
</div>
</div>
</main>
</div>
</div>

<?php } ?>

<?php include_once('../components/footer.php') ?>