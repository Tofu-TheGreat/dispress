<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@include('admin.partials.head')

<body>
    <div id="app">
        <!-- Preloader Start -->
        <div class="preloader">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <!-- Preloader End -->

        {{-- Alert --}}
        @include('sweetalert::alert')
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- Navbar --}}
            @include('admin.partials.navbar')
            {{-- Sidebar --}}
            @include('admin.partials.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            {{-- Footer --}}
            @include('admin.partials.footer')
        </div>
    </div>
    {{-- Script --}}
    @include('admin.partials.script')
</body>

</html>
