<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Task Manager</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-purple-300">
           

            <!-- Page Heading -->
            <header class="bg-purple-100 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{Auth::User()->name}}
                </div>
            </header>

            <!-- Page Content -->
            <main>
          
        {{ __('Profile Information') }}
    

    
        {{ __('Update your account\'s profile information and email address.') }}
    
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="col-span-6 sm:col-span-4">
                        
                            
                            <form action="{{route('user.update',Auth::User()->id)}}" method="post" enctype="multipart/form-data">
        <input type="file" name="logo" >
        <button type="submit">prideti</button>
        @csrf
    </form>
            
            </div>
            </div>
            <x-jet-section-border />
                {{ $slot }}
                
            </main>
        </div>

        @stack('modals')

    </body>
</html>
