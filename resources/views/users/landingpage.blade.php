@include('layout.navbar_users')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOT Yogya</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">
    {{-- Tambahkan padding-top agar tidak ketutup navbar --}}
    <main class="px-8 pt-[100px]">
        <h1 class="text-3xl font-bold text-align center"> ABOUT UTS</h1>
    </main>
</body>
</html>
