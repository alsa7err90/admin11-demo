<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="text-lg font-bold text-gray-800 dark:text-gray-200 {{ isRtl() ? 'mr-6' : 'ml-6' }}" href="#">
            {{ env('APP_NAME') }}
        </a>
        <ul class="mt-6">
            <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :label="__('Dashboard')">
                <i class="fas fa-tachometer-alt"></i>
            </x-admin.nav-link>
        </ul>
        <ul>
            <x-admin.nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" :label="__('Users')">
                <i class="fas fa-users"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')" :label="__('Roles')">
                <i class="fas fa-user-shield"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.index')" :label="__('Permissions')">
                <i class="fas fa-lock"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.index')" :label="__('Settings')">
                <i class="fas fa-cog"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.index')" :label="__('Posts')">
                <i class="fas fa-file-alt"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.languages.index')" :active="request()->routeIs('admin.languages.index')" :label="__('Languages')">
                <i class="fas fa-language"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.components.index')" :active="request()->routeIs('admin.components.index')" :label="__('Components')">
                <i class="fas fa-th"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.help-funcs.index')" :active="request()->routeIs('admin.help-funcs.index')" :label="__('Helper Funcs')">
                <i class="fas fa-question-circle"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.archive.create')" :active="request()->routeIs('admin.archive.create')" :label="__('Archive Table')">
                <i class="fas fa-archive"></i>
            </x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.heroes.index')" :active="request()->routeIs('admin.heroes.index')" :label="__('Hero')">
                <i class="fas fa-photo-video"></i>
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.tickets.index')" :active="request()->routeIs('admin.tickets.index')" :label="__('tickets / support')">
                <i class="fa-solid fa-headset"></i>
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.relationships.index')" :active="request()->routeIs('admin.relationships.index')" :label="__('Relationships')">
                <i class="fas fa-link"></i>
            </x-admin.nav-link>

            <x-admin.nav-link :href="route('admin.builder.create')" :active="request()->routeIs('admin.builder.create')" :label="__('Builder')">
                <i class="fas fa-tools"></i>
            </x-admin.nav-link>

            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <i class="fas fa-file"></i>
                        <span class="ml-4">Pages</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="./login.html">Login</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="./create-account.html">Create account</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="./forgot-password.html">Forgot password</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="./404.html">404</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="./blank.html">Blank</a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
        <div class="px-6 my-6">
            <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>
</aside>
