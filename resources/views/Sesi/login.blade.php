<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
    @if(Auth::check())
        <script>window.location = "{{ route('home') }}";</script>
    @endif
    <div class="container bg-white p-6 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl mb-6 text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" class="input-field border border-gray-300 rounded w-full py-2 px-3 mb-4" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror

            <input type="password" name="password" class="input-field border border-gray-300 rounded w-full py-2 px-3 mb-4" id="password" placeholder="Password" required>
            @error('password')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror
            @if(session('error'))
                <div class="text-red-500 text-sm mb-2">{{ session('error') }}</div>
            @endif

            <div class="mt-6">
                <button type="submit" class="button bg-blue-500 text-white w-full py-2 px-4 rounded hover:bg-blue-700">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
