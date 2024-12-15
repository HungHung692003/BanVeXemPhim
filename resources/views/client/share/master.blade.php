<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('client.share.css')
    </head>
    <body>

        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>



        @include('client.share.header')


        <main>

            @yield('noi_dung')

        </main>


        @include('client.share.footer')

		@include('client.share.js')
        @yield('js')

    </body>
</html>
