<h1 align="center">Selamat datang di Dispress! 👋</h1>

[![All Contributors](https://img.shields.io/github/contributors/Tofu-TheGreat/dispress)](https://github.com/Tofu-TheGreat/dispress/graphs/contributors)
![GitHub last commit](https://img.shields.io/github/last-commit/Tofu-TheGreat/dispress)

---

<h2 id="tentang">Mengenal Dispress 🤓</h2>

Dispress adalah aplikasi yang digunakan untuk melakukan disposisi surat dan pembuatan SPPD (Surat Perintah Perjalanan Dinas) yang praktis.

<h2 id="fitur">🤔 Fitur apa saja yang tersedia di Dispress?</h2>

-   [Stisla Bootstrap Template](https://github.com/stisla/stisla)
    -   <i>Dashboard UI</i>
-   Landing Page
    -   Beranda
    -   Fitur
    -   Keunggulan
    -   Petunjuk Teknis
-   Authentication
    -   <i>Login</i>
-   Multi User
    -   <i>Admin</i>
        -   Statistik Status Disposisi
        -   Mengelola Surat
        -   <i>Account</i>
    -   <i>Officer</i>
        -   Mengelola Surat Masuk
        -   <i>Account</i>
    -   <i>Staff</i>
        -   Menanggapi Perintah Disposisi
        -   <i>Account</i>
-   Account
    -   <i>Profile</i>
    -   <i>Setting</i>
    -   <i>Change Password</i>
-   CRUD (Create, Read, Update, and Delete)
    -   <i>User</i>
    -   <i>Disposisi</i>
    -   <i>Rekapitulasi</i>
    -   SPPD
    -   Pegawai
    -   Tempat Dinas

<h2 id="testing-account">🔏 Default Account for Testing</h2>

#### Admin

-   Username: pasya.nada
-   Password: password

#### Officer

-   Username: fadli.god
-   Password: password

#### Staff

-   Username: naka
-   Password: password

<h2 id="demo">😈 Demo Page</h2>

<p>Halaman demo saat ini tidak tersedia. Oleh karenanya, lebih baik kamu mencoba di <i>local</i> dengan mengikuti tahapan instalasi di bawah ini.</p>

<h2 id="syarat">💾 Pre-requisite</h2>

<p>Berikut adalah <i>pre-requisite</i> yang diperlukan ketika melakukan instalasi dan <i>running</i> aplikasi.</p>

-   PHP ^8.0 & Web Server (XAMPP, LAMPP, MAMPP, atau Laragon)
-   Web Browser (Chrome, Firefox, Safari, Opera, atau Brave)

<h2 id="download">🔽 Install</h2>

1. Clone repository

```bash
git clone https://github.com/Tofu-TheGreat/dispress.git
cd dispress
composer install
copy .env.example .env
# OR
cp .env.example .env
```

2. Konfigurasi database melalui `.env`

```
DB_PORT=3306
DB_DATABASE=db_dispress
DB_USERNAME=root
DB_PASSWORD=
```

3. Migrasi dan symlinks

```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

4. Jalankan website

```bash
php artisan serve
```

<h2 id="download">💻 Start Coding</h2>

1. Membuat branch baru

```bash
git branch nama_branch
git checkout nama_branch

Note : `nama_branch` disini biasanya adalah nama fitur yang ingin dibuat
```

2. Push ke github

```bash
git add .
git commit -m "message_commit"
git push -u origin nama_branch

Melakukan/Membuat Pull Request di GitHub
```

<h2 id="lisensi">📝 License</h2>

<p>dispress is open-sourced software licensed under the [MIT License](./LICENSE).</p>

<h2 id="pembuat">👯‍♂️ Author</h2>

<p>Dispress dibuat oleh <a href="https://instagram.com/fadli.890">Fadli</a>, <a href="https://instagram.com/syapsya_">Pasya</a> dan <a href="https://instagram.com/valdss._">Yudis Naka</a>.</p>
