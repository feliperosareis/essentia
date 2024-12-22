<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased bg-black">
        
        
        <div class="flex flex-col justify-center items-center gap-3 min-h-screen max-w-6xl mx-auto">
            <div class="w-full mb-12">
                <img src="/images/logo_essentia.png" alt="Essentia Group" class="mx-auto mt-12">
            </div>
            <div class="w-full flex flex-row gap-3 justify-center">
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                >
                    <div class="flex items-center w-[300px] h-[200px] bg-[#BA9B58] hover:bg-[#967734] transition rounded-lg justify-center">
                        <p class="text-2xl font-bold text-white">
                            {{ Auth::user() ? 'Entrar' : 'Login' }}
                        </p>
                    </div>
                </a>
    
                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
                    >
                        <div class="flex items-center w-[300px] h-[200px] bg-[#BA9B58] hover:bg-[#967734] transition rounded-lg justify-center">
                            <p class="text-2xl font-bold text-white">
                                Registrar-se
                            </p>
                        </div>
                    </a>
                @endif
            </div>
        </div>

        </body>
</html>
