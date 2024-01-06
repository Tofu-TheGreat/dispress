<div class="col-sm-12 col-md-12 col-lg-3 p-0">
    <div
        class="card petunjuk-wrapper d-flex justify-content-between align-content-center py-3 px-2 position-relativen mb-2">
        <div class="ps-2">
            <h6 class="m-0 title-sidebar-petunjuk">Sidebar Petunjuk</h6>
        </div>
        <div class="card-header-action" style="position: absolute; right: 10px; top: 7.5px;">
            <span data-bs-toggle="tooltip" data-bs-title="Show/Hide Sidebar Petunjuk">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info text-white" href="#"><i
                        class="bi bi-dash-circle"></i></a>
            </span>
        </div>
    </div>
    <div class="collapse show card-body sidebar-petunjuk petunjuk-wrapper p-3" id="mycard-collapse">
        <ul class="nav nav-pills flex-column">
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis">
                <h6 class="{{ $active == 'petunjuk-teknis' ? 'active' : '' }}">Selamat Datang</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis#rekomendasi" data-bs-target="#rekomendasi"><i
                        class="bi bi-laptop me-2"></i>
                    Rekomendasi
                    Device</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis#browser" data-bs-target="#browser"><i
                        class="bi bi-browser-chrome me-2"></i>
                    Rekomendasi
                    Browser</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis#alamat" data-bs-target="#alamat"><i
                        class="bi bi-globe2 me-2"></i>
                    Alamat
                    Web</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/registrasi">
                <h6 class="{{ $active == 'petunjuk-registrasi' ? 'active' : '' }}">Akun</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/registrasi#registrasi" data-bs-target="#registrasi"><i
                        class="bi bi-lock-fill me-2"></i>
                    Registrasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/registrasi#login" data-bs-target="#login"><i
                        class="bi bi-unlock-fill me-2"></i>
                    Login</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/role">
                <h6 class="{{ $active == 'petunjuk-role' ? 'active' : '' }}">Role</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/role#admin" data-bs-target="#admin"><i <i
                        class="bi bi-person-fill-gear me-2"></i>
                    Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/role#officer" data-bs-target="#officer"><i <i
                        class="bi bi-person-fill-lock me-2"></i>
                    Officer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/role#staff" data-bs-target="#staff"><i <i
                        class="bi bi-person-fill me-2"></i>
                    Staff</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/penggunaan">
                <h6 class="">Cara Penggunaan</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#posjab"
                    data-bs-target="petunjuk-teknis/penggunaan#posjab"><i class="bi bi-person-badge me-2"></i>
                    Posisi Jabatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#users"
                    data-bs-target="petunjuk-teknis/penggunaan#users"><i class="bi bi-person-circle me-2"></i>
                    Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#instansi"
                    data-bs-target="petunjuk-teknis/penggunaan#instansi"><i class="bi bi-building me-2"></i>
                    Instansi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#noklaf"
                    data-bs-target="petunjuk-teknis/penggunaan#noklaf"><i class="bi bi-hash me-2"></i>
                    Nomor Klasifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#surmas"
                    data-bs-target="petunjuk-teknis/penggunaan#surmas"><i class="bi bi-envelope me-2"></i>
                    Surat Masuk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#pengajuan"
                    data-bs-target="petunjuk-teknis/penggunaan#pengajuan"><i
                        class="bi bi-envelope-arrow-up-fill me-2"></i>
                    Pengajuan Disposisi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#disposisi"
                    data-bs-target="petunjuk-teknis/penggunaan#disposisi"><i
                        class="bi bi-envelope-open-fill me-2"></i>
                    Disposisi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#surkel"
                    data-bs-target="petunjuk-teknis/penggunaan#surkel"><i class="bi bi-envelope-plus-fill me-2"></i>
                    Surat Keluar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-teknis/penggunaan#surtugas"
                    data-bs-target="petunjuk-teknis/penggunaan#surtugas"><i
                        class="bi bi-envelope-check-fill me-2"></i>
                    Surat Tugas</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/setting">
                <h6 class="{{ $active == 'petunjuk-setting' ? 'active' : '' }}">Setting</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/setting#profile" data-bs-target="#profile"><i <i
                        class="bi bi-person-fill-gear me-2"></i>
                    Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/petunjuk-teknis/setting#webset" data-bs-target="#webset"><i <i
                        class="bi bi-gear-wide-connected me-2"></i>
                    Web Setting</a>
            </li>
        </ul>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            // Collapsable
            $("[data-collapse]").each(function() {
                var me = $(this),
                    target = me.data("collapse");

                me.click(function() {
                    $(target).collapse("toggle");
                    $(target).on("shown.bs.collapse", function() {
                        me.html('<i class="bi bi-dash-circle"></i>');
                    });
                    $(target).on("hidden.bs.collapse", function() {
                        me.html('<i class="bi bi-arrow-down"></i>');
                    });
                    return false;
                });
            });
        });

        $(document).ready(function() {

            $(".nav-link").on("click", function(event) {
                event.preventDefault();
                var targetUrl = $(this).attr("href");
                window.location.href = targetUrl;
            });

            // Handler for when a nav-link is clicked
            $(".nav-link").on("click", function(event) {
                event.preventDefault();

                // Remove the 'active' class from all nav-links
                $(".nav-link").removeClass("active");

                // Add the 'active' class to the clicked nav-link
                $(this).addClass("active");

                // Scroll to the target section with an offset
                var targetId = $(this).attr("data-bs-target");
                var topOffset = -100;

                var $targetElement = $(targetId);
                if ($targetElement.length) {
                    $("html, body").animate({
                        scrollTop: $targetElement.offset().top + topOffset
                    }, 500, "linear");
                }
            });
        });
    </script>
@endsection
