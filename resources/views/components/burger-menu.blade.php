<div class="z-50 sm:hidden" x-data="{ openMenu: false }" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <header class="flex justify-between items-center bg-white drop-shadow-sm py-4">
        <button class="flex md:hidden flex-col items-center align-middle" @click="openMenu = !openMenu">
            <img src="images/menu-3-line.svg" />
        </button>

        <!-- Main Navigations -->
        <nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10" x-data="{ openMenu: false }"
            :class="openMenu ? 'visible' : 'invisible'" x-cloak>
            <!-- UL Links -->
            <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all"
                :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
                <li class="border-b border-inherit">
                    <a href="#" class="block p-4" aria-current="true">Home</a>
                </li>
                <li class="border-b border-inherit" @click="openMenu = false">
                    <a href="#" class="block p-4">About</a>
                </li>
                <li class="border-b border-inherit">
                    <a href="#" class="block p-4">Articles</a>
                </li>
                <li class="border-b border-inherit">
                    <a href="#" class="block p-4">Contact</a>
                </li>
            </ul>
            <!-- Close Button -->
            <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>
    </header>
    <!-- Pop Out Navigation -->
    <nav class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10" :class="openMenu ? 'visible' : 'invisible'"
        x-cloak>

        <!-- UL Links -->
        <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all"
            :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

            <li class="border-b border-inherit">
                <a href="#" class="block p-4" aria-current="true" @click="openMenu = false">Home</a>
            </li>
            <li class="border-b border-inherit">
                <a href="#" class="block p-4" @click="openMenu = false">About</a>
            </li>
        </ul>
        <!-- Close Button -->
        <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>
</div>
