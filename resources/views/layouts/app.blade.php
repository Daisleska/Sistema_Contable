<!DOCTYPE html>
<html lang="en">
<head>
     @include('layouts.partials.css')
</head>
<body >
    <div id="wrapper">
        
         @include('layouts.partials.header')
         @include('layouts.partials.sidebar')

         <div class="content-page">
            <div class="content">

        <!-- Content Header (Page header) -->
               @yield('content')
            </div>
          @include('layouts.partials.footer')
        </div>
        
    </div> 

    @include('layouts.partials.js')
</body>
</html>

