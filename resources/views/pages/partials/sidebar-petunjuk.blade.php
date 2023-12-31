<div class="col-sm-12 col-md-12 col-lg-3">
    <div class="card d-flex justify-content-between align-content-center py-3 position-relativen mb-2">
        <div class="ps-2">
            <h6 class="m-0 title-sidebar-petunjuk">Sidebar Petunjuk</h6>
        </div>
        <div class="card-header-action" style="position: absolute; right: 10px; top: 7.5px;">
            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info text-white" href="#"><i
                    class="bi bi-dash-circle"></i></a>
        </div>
    </div>
    <div class="collapse show card-body bg-light sidebar-petunjuk" id="mycard-collapse">
        <ul class="nav nav-pills flex-column">
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis">
                <h6 class="{{ $active == 'petunjuk-teknis' ? 'active' : '' }}">Selamat Datang</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="#rekomendasi" data-bs-target="#rekomendasi"><i
                        class="bi bi-laptop me-2"></i>
                    Rekomendasi
                    Device</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="1" href="#browser" data-bs-target="#browser"><i
                        class="bi bi-browser-chrome me-2"></i>
                    Rekomendasi
                    Browser</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="2" href="#alamat" data-bs-target="#alamat"><i
                        class="bi bi-globe2 me-2"></i>
                    Alamat
                    Web</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/registrasi">
                <h6 class="{{ $active == 'petunjuk-registrasi' ? 'active' : '' }}">Akun</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-registrasi#registrasi"
                    data-bs-target="petunjuk-registrasi#registrasi"><i class="bi bi-lock-fill me-2"></i>
                    registrasi</a>
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-registrasi#login"
                    data-bs-target="petunjuk-registrasi#login"><i class="bi bi-unlock-fill me-2"></i>
                    login</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/dashboard">
                <h6 class="">Role</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-dashboard#akun"
                    data-bs-target="petunjuk-dashboard#akun"><i class="bi bi-person-badge-fill me-2"></i>
                    Admin</a>
            </li>
            <a class="title-petunjuk mt-2" href="/petunjuk-teknis/user">
                <h6 class="">User</h6>
            </a>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="0" href="/petunjuk-user#user"
                    data-bs-target="petunjuk-user#user"><i class="bi bi-person-fill me-2"></i>
                    User</a>
            </li>
        </ul>
    </div>
</div>

@section('script')
    <script>
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
    </script>
@endsection
