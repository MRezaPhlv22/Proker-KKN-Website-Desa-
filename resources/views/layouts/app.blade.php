<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>Dashboard Admin Desa</title>
        <link rel="icon" href="{{ asset('images/logo-garut.png') }}" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Custom CSS untuk warna hijau --}}
        <style>
            :root {
                --primary-color: #28a745; /* Hijau utama dari dashboard admin */
                --secondary-color: #198754; /* Hijau sekunder dari dashboard admin */
            }

            /* Mengubah warna latar belakang body utama */
            body {
                background-color: #f8f9fa; /* Warna latar belakang dashboard admin */
            }

            /* Mengubah warna latar belakang navbar */
            .bg-white { /* Ini adalah class yang digunakan di <header> dan navigation */
                background-color: var(--primary-color) !important; /* Gunakan warna primer */
            }

            .dark\\:bg-gray-800 { /* Untuk mode gelap jika ada, sesuaikan juga */
                background-color: var(--secondary-color) !important; /* Gunakan warna sekunder untuk dark mode */
            }

            /* Mengubah warna teks link di navbar */
            .dark\\:text-gray-200 { /* Contoh: teks "Dashboard" di navigasi */
                color: white !important;
            }

            /* Mengubah warna dropdown button di navbar */
            .text-gray-500 { /* Contoh: "Admin" di dropdown */
                color: rgba(255,255,255,0.8) !important;
            }

            .hover\\:text-gray-700:hover { /* Hover untuk teks link di navbar */
                color: white !important;
            }

            .border-gray-300 { /* Border untuk dropdown, dll */
                border-color: rgba(255,255,255,0.1) !important;
            }

            .focus\\:border-indigo-700:focus { /* Fokus border */
                border-color: var(--secondary-color) !important;
            }

            .active-nav-link { /* Asumsi ini adalah class untuk link navigasi aktif */
                border-color: white !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        {{-- Mengubah warna latar belakang div utama --}}
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900" style="background-color: #f8f9fa;">
            {{-- Perubahan Logo Laravel ada di layouts/navigation.blade.php --}}
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-white leading-tight"> {{-- Mengubah warna teks header --}}
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>