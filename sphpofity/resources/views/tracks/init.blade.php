<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sphpotify</title>
    @vite(['resources/js/app.js','resources/css/app.css'])

</head>
<body class="bg-cover bg-no-repeat h-screen " style="background-image: url('images/escenario.png')">
    <header>
        <div class="container mx-auto">
            <nav class="flex items-right justify-end flex-wrap p-2">
                <div class="w-full block flex-grow lg:flex lg:items-right lg:w-auto">
                    <div>
                        @auth
                            <a href="{{ url('index') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-800 hover:bg-white mt-4 lg:mt-0 ml-2">Go</a>
                        @else
                            <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-black border-black hover:border-transparent hover:text-gray-800 hover:bg-white mt-4 lg:mt-0 ml-2">Register</a>
                            <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-black border-black hover:border-transparent hover:text-gray-800 hover:bg-white mt-4 lg:mt-0 ml-2">login</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>
</body>
</html>    
