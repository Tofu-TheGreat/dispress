<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@include('admin.partials.head')

<body>
    <div id="app">
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
    <x-notify::notify />
    @notifyJs
    @include('admin.partials.script')
</body>

</html>
