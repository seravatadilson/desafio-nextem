<!DOCTYPE html>
<html lang="en">
 <head>
   @include('layouts.partials.head')
 </head>
 <body>

  {{-- @include('layout.partials.nav') --}}

  {{-- @include('layout.partials.header') --}}

    @yield('content')

  {{-- @include('layout.partials.footer') --}}
  
  @include('layouts.partials.footer-scripts')
  
</body>
</html>