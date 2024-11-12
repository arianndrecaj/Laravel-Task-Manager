<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body,
        h1,
        h4,
        p {
            color: white !important;
        }

        .table,
        .table-bordered {
            background-color: #333;
            color: white;
        }

        .table-light {
            background-color: #444;
        }

        .table-dark {
            background-color: #222;
        }

        .table th,
        .table td {
            border: 1px solid #555;
        }

        .table-hover tbody tr:hover {
            background-color: #555;
        }

        .text-light {
            color: white;

            .btn-light {
                background-color: #f8f9fa;
                color: #333;
            }

            .btn-light:hover {
                background-color: #ddd;
            }

            .btn-warning {
                background-color: #f0ad4e;
                border-color: #f0ad4e;
            }

            .btn-danger {
                background-color: #dc3545;
                border-color: #dc3545;
            }

            .btn-success {
                background-color: #28a745;
                border-color: #28a745;
            }

            .btn-info {
                background-color: #17a2b8;
                border-color: #17a2b8;
            }

            .badge-success {
                background-color: #28a745;
            }

            .badge-warning {
                background-color: #ffc107;
            }

            .badge-danger {
                background-color: #dc3545;
            }

            .badge-info {
                background-color: #17a2b8;
            }

            .badge-secondary {
                background-color: #6c757d;
            }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-dark text-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>