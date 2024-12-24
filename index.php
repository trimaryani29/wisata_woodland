<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woodland Kuningan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!--- Beranda --->
        <div class="logo">
            <div class="logo">
                <img src="images/logo.png">
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#beranda" class="active">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#destinasi">Destinasi</a></li>
                <li><a href="#paket">Paket Wisata</a></li>
                <li><a href="daftar_pesanan.php">Daftar Pesanan</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="beranda" class="hero">
            <div class="overlay">
            <div class="hero-section">
                <div class="button-container">
                  <button class="btn eksplor" onclick="window.location.href='https://www.instagram.com/woodlandkuningan';">Eksplor</button>
                  <button class="btn paket" onclick="window.location.href='http://localhost/wisata/pesan.php';">Paket</button>
                </div>
            </div>
            </div>      
        </div>
    </main>

    <!--- Tentang --->
    <section id="tentang" class="tentang-wisata">
        <h1>Tentang <span class="highlight">Wisata</span></h1>
        <div class="main-content">
          <div class="featured">
            <img src="images/tentang1.png" alt="Woodland Kuningan">
            <div class="info">
              <h2>Woodland Kuningan Merupakan Salah Satu Destinasi Wisata Di Kabupaten Kuningan.</h2>
              <p>Tempat Wisata Ini Menawarkan Rekreasi Alam Yang Menyegarkan. Harga Tiket Masuk :</p>
              <ul>
                <li>Weekdays (Senin–Jumat): Rp. 15.000</li>
                <li>Weekend (Sabtu–Minggu): Rp. 20.000</li>
              </ul>
              <a href="https://travel.kompas.com/read/2023/07/03/084047727/woodland-kuningan-harga-tiket-dan-aktivitasnya" target="_blank" class="read-more">Baca Selengkapnya</a>

            </div>
          </div>
          <div class="video-cards">
            <!-- Card 1 -->
            <div class="video-card">
              <a href="https://www.youtube.com/watch?v=kz9JiOYp8P8" target="_blank">
                <img src="images/Video1.png" alt="Thumbnail Video 1">
              </a>
              <div class="video-content">
                <a href="https://www.youtube.com/watch?v=kz9JiOYp8P8" target="_blank">Yuk, Menikmati Akhir Pekan Di Wisata Alam Woodland Kuningan</a>
                <p>02 Juli, 2023</p>
              </div>
            </div>
          
            <!-- Card 2 -->
            <div class="video-card">
              <a href="https://www.youtube.com/watch?v=eG2IJUIJ2L4" target="_blank">
                <img src="images/video2.png" alt="Thumbnail Video 2">
              </a>
              <div class="video-content">
                <a href="https://www.youtube.com/watch?v=eG2IJUIJ2L4" target="_blank">Menjelajahi Keindahan Alam Woodland Kuningan Jawa Barat</a>
                <p>27 April, 2024</p>
              </div>
            </div>
          
            <!-- Card 3 -->
            <div class="video-card">
              <a href="https://youtu.be/oiUWd4z_yrE?si=zy-xh2TB6R7r6QK7" target="_blank">
                <img src="images/video3.png" alt="Thumbnail Video 3">
              </a>
              <div class="video-content">
                <a href="https://youtu.be/oiUWd4z_yrE?si=zy-xh2TB6R7r6QK7" target="_blank">Woodland Destinasi Wisata Kuningan Jawa Barat</a>
                <p>24 Juli, 2023</p>
              </div>
            </div>
          </div>
        </div>
    </section>

  <!--- Destinasi Wisata --->  
    <div id="destinasi" class="container">
        <h1>Destinasi Wisata</h1>
        <h2 class="woodland">Woodland</h2>
        <div class="cards">
            <div class="card">
                <img src="images/destinasi1.png" alt="Rainbow Slide">
                <div class="info">
                <h3>Rainbow Slide</h3>
                <p>Seluncuran Sepanjang Sekitar 70 Meter, Dengan Ketinggian Sekitar 10 Meter.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/destinasi2.png" alt="Flying Fox">
                <div class="info">
                <h3>Flying Fox</h3>
                <p>Rasakan Sensasi Melayang Di Udara Dengan Tali Baja Di Tengah Pemandangan Alam Terbuka.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/destinasi3.png" alt="Berkuda">
                <div class="info">
                <h3>Berkuda</h3>
                <p>Berkuda Mengelilingi Area Woodland Kuningan, Seru Dan Menantang.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/destinasi4.png" alt="Jeep Adventure">
                <div class="info">
                <h3>Jeep Adventure</h3>
                <p>Woodland Menawarkan Paket Jeep Offroad Dan Sunrise Adventure.</p>
                </div>
                </div>
            </div>
        </div>
    </div>

  <!--- Paket Wahana ---> 
    <div id="paket" class="wahana-packages">
      <h1 class="title">Paket <span class="highlight">Wahana</span></h1>
      <div class="packages">
        <!-- Rainbow Slide -->
        <div class="package">
          <img src="images/wahana1.png" alt="Rainbow Slide">
          <h2>Rainbow Slide</h2>
          <ul>
            <li>Weekday: Rp. 15.000</li>
            <li>Weekend: Rp. 20.000</li>
          </ul>
        </div>

        <!-- Flying Fox -->
        <div class="package">
          <img src="images/wahana2.png" alt="Flying Fox">
          <h2>Flying Fox</h2>
          <ul>
            <li>Weekday: Rp. 15.000</li>
            <li>Weekend: Rp. 15.000</li>
          </ul>
        </div>

        <!-- Jeep Adventure -->
        <div class="package">
          <img src="images/wahana3.png" alt="Jeep Adventure">
          <h2>Jeep Adventure</h2>
          <ul>
            <li>Jeep Offroad Dan Sunrise Adventure: Rp. 400.000/Mobil Untuk 4 Orang</li>
            <li>Paket Fun Offroad Dan Hiking: Rp. 600.000</li>
          </ul>
        </div>
      </div>
    </div>

  <!--- Kontak --->
    <footer id="kontak" class="footer">
      <div class="footer-content">
        <div class="left-section">
          <img src="images/footer.png">
          <p class="description">
            Jangan Tunda, Saatnya Berkeliling Ke Tempat Wisata
          </p>
          <p class="description">
            Dan Menemukan Hal-Hal Baru Dan Menarik 
          </p>
          <p class="description">Lainnya</p>
        </div>
        <div class="right-section">
          <h3 class="update-title">Dapatkan Update Terbaru</h3>
          <form action="proses_email.php" method="POST" class="subscription-form">
            <input
              type="email"
              name="email"
              placeholder="Masukkan Alamat Email Anda"
              class="email-input"
              required
            />
            <button type="submit" class="submit-button">Daftar</button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        <p>Dibuat Oleh <strong>Tri Maryani</strong>, Bersama Membangun Masa Depan &copy;2024</p>
      </div>
    </footer>
</body>
</html>