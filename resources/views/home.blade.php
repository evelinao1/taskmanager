<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-purple-300">

    <div class="grid grid-cols-12 gap-4 mt-20">
        <div class="col-start-5 col-span-3 mt-20">
            <h1 class="font-semibold text-3xl text-center">Task Manager</h1>
        </div>
        <div class="col-start-6 col-span-2">
        @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/tasks') }}" class="text-sm text-gray-700 underline">Tasks</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
            </div>
    </div>

</body>
</html>