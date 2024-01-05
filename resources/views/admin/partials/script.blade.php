<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>

<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
@yield('script')
<script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('assets/modules/prism/prism.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- Format Phone Number --}}

<script>
    $(document).ready(function() {
        $(".phone").val(function(index, value) {
            // Gunakan ekspresi reguler untuk memisahkan nomor telepon ke dalam format yang diinginkan
            return value.replace(/(\d{4})(\d{4})(\d{4})/, '$1-$2-$3');
        });

        $(window).on("load", function() {
            /*----- Preloader -----*/
            $(".preloader").fadeOut("slow");
        });
    });
</script>

<script>
    document.body.addEventListener("click", function(event) {
        const element = event.target;

        if (element.classList.contains("submit-btn")) {
            document.getElementById("logout").submit();
        }
    })
</script>
