<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Buku Gramedia')</title>
    <!-- Masukkan CDN Tailwind CSS jika belum terpasang via Vite -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Tempat di mana konten dari halaman lain (seperti katalog.index) akan dimasukkan -->
    @yield('content')

</body>
</html>