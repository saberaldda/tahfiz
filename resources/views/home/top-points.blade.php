<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>لوحة المتفوقين</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite('resources/css/app.css') --}}
  <style>
    @font-face {
      font-family: "Barada";
      src: url({{ asset('assets/117-Barada-Reqa.ttf') }});
    }

    body {
      font-family: "Barada";
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
      /* Firefox */
    }

    body::-webkit-scrollbar {
      display: none;
    }

    @keyframes rotateme {
      0% {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }

    .rotateme {
      animation-name: rotateme;
      animation-duration: 40s;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
    }
    @keyframes scroll {
      0% {
        transform: translateY(0);
      }
  
      100% {
        transform: translateY(-100%);
      }
    }
  
    .scrolling-div {
      animation-delay: 1000ms;
      animation-name: scroll;
      animation-duration: 100s;
      /* Adjust the duration as needed */
      animation-timing-function: linear;
      animation-iteration-count: infinite;
    }
  </style>
  @livewireStyles
</head>

<body>

  @php
    $backPatternUrl = asset('assets/back-pattern.png');
    $shape4Url = asset('assets/shape4.png');
  @endphp

  <div class="min-h-screen bg-emerald-400 relative removeScroll" style="background-image: url({{ $backPatternUrl }})">
    <div class="sticky top-0 left-0 right-0 z-50 bg-emerald-400 w-full" style="background-image: url({{ $backPatternUrl }})">
      <p class="text-4xl sm:text-5xl md:text-7xl font-bold text-center px-3 pt-5 sm:pt-10 sm:mb-7 mb-2">مركز تحفيظ مسجد عمر بن الخطاب</p>
      <p class="text-2xl sm:text-3xl font-bold text-center sm:mt-5 pb-3">لوحة المتفوقين</p>
    </div>
    <div class="container mx-auto px-7 flex flex-col justify-center sm:max-w-[75%] h-full relative z-10">
      <!-- items -->
        @livewire('home.top-points')
    </div>
    <div class="fixed bottom-0 left-0 opacity-40 rotateme">
      <img src="{{ $shape4Url }}" class="" alt="img" />
    </div>
    <div class="fixed top-0 right-0 opacity-40 rotateme">
      <img src="{{ $shape4Url }}" class="" alt="img" />
    </div>
  </div>
</body>
@livewireScripts
</html>
