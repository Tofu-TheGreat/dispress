<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@include('pages.partials.header-landing')

<body>
    @include('pages.partials.preloader-landing')
    @include('pages.partials.togle-theme-landing')
    @include('pages.partials.togle-too-top-landing')

    {{-- Navbar --}}
    @include('pages.partials.navbar-landing')

    {{-- main --}}
    <div class="main">
        @yield('content')
    </div>

    {{-- footer --}}
    @include('pages.partials.footer-landing')

    {{-- script --}}
    @include('pages.partials.script-landing')
</body>

</html>
