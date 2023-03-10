<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/js/app.js','resources/css/app.css'])

    <!-- Styles -->
    <title>Document</title>
</head>
<body class="containerHome bg-cover bg-no-repeat h-screen " style="background-image: url('images/fondoFocos.png')">
    <div class="flex sm:items-center ml-6">
      <x-dropdown align="left" class="w-full" width="48">
          <x-slot name="trigger">
              <button class="inline-flex items-center px-3 py-2 mt-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                  <div>{{ Auth::user()->name }}</div>
                  <div class="ml-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                  </div>
              </button>
          </x-slot>
          <x-slot name="content">
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
              </form>
          </x-slot>
      </x-dropdown>
  </div>
  <div class="container mx-auto px-0 py-3 relative filter drop-shadow-md opacity-80">
    <div class="flex justify-center items-center h-1/2">
      <img class="w-1/5" alt="logo micro con fondo negro" src="/images/logo/para-fondo-negro.png" />
    </div>
    <div class="flex justify-center items-center mt-1">
      <a href="{{ url('/listView') }}">
        <button class="btn1 bg-white text-black hover:bg-black hover:text-white transition duration-300 rounded-md py-4 px-6 text-sm font-medium mr-4">Coder</button>
      </a>
      <a href="{{ url('/listViewTrainer') }}">
        <button class="btn2 bg-white text-black hover:bg-black hover:text-white transition duration-300 rounded-md py-4 px-6 text-sm font-medium">Trainer</button>
      </a>
    </div>
  </div>
</body>
</html>