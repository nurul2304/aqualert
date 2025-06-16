<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aqualert')</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css') <!-- atau <link href="..." rel="stylesheet"> kalau kamu belum pakai Vite -->
    <script src="https://kit.fontawesome.com/your-fontawesome-id.js" crossorigin="anonymous"></script> <!-- optional -->
    
</head>
<body class="bg-gray-100">

    @yield('content')

</body>
</html>
