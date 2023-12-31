    <!-- jquery js -->
    <script src="{{ asset('assets-landing-page/js/jquery.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets-landing-page/js/main.js') }}"></script>
    <!-- bootstrap bundle with popper -->
    <script src="{{ asset('/assets-landing-page/js/bootstrap.bundle.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('/assets-landing-page/js/owl.carousel.min.js') }}"></script>
    <!-- scrollit js -->
    <script src="{{ asset('/assets-landing-page/js/scrollIt.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ asset('/assets-landing-page/js/aos.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('/assets-landing-page/js/popper.min.js') }}"></script>

    @yield('script')

    <script>
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
