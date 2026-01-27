<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    @include('layouts.nav')
    @if (session('success'))
      <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
    @endif
    @if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @yield('content')
</body>
</html>