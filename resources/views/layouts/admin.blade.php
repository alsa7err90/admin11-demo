<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/css/tailwind.output.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('font6/css/all.min.css') }}">
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" />
</head>

<body dir="{{ isRtl() ? 'rtl' : 'ltr' }}">
    <div id="overlay" class="fixed inset-0 hidden bg-black bg-opacity-50"></div>

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.admin.sidebar')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.admin.sidebar_mobile')

        {{-- header --}}
        <div class="flex flex-col flex-1">
            @include('layouts.admin.header')
            <main class="h-full pb-16 overflow-y-auto">

                <div class="container grid px-6 mx-auto ">

                    <div class="flex items-center justify-between">

                        @isset($header)
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $header }}
                            </h2>
                        @endisset

                        @isset($button)
                            {{ $button }}
                        @endisset
                    </div>

                    <!-- ALERT -->
                    @if (session('success'))
                        <div
                            class="p-4 mb-4 text-green-800 bg-green-100 border border-green-400 rounded-md alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <div class="px-4 py-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        @isset($subheader)
                            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                                {{ $subheader }}
                            </h4>
                        @endisset

                        {{ $slot }}
                    </div>

                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/posts.js') }}"></script>
    @stack('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
</body>

</html>
