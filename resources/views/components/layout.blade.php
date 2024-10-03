<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(["resources/css/app.css", "resources/js/app.js"])

    <title>{{ __('layout.titre') }}</title>
</head>
<body class="h-dvh bg-gray-100">
<x-navbar>

</x-navbar>

<main class="px-8 min-h-screen max-sm:px-0 pt-2 mb-2">
    @isset($titre)
        <h1 class="text-3xl p-4 text-bold font-extrabold text-center text-black md:text-5xl lg:text-5xl">{{ $titre }}</h1>
    @endisset
    {{ $slot }}

</main>

<x-footer>
</x-footer>
</body>
</html>
