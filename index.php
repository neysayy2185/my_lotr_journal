<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LOTR Journal</title>
    <link rel="icon" href="img/logo.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">lotr.com</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login</a>
            </li>
            <div class="container">
              <button id="darkswitch">
                <i class="bi bi-moon-stars-fill h2 p-2 ms-auto text-dark"></i>
              </button>
              <button id="lightswitch">
                <i class="bi bi-lightbulb-fill h2 p-2 ms-auto text-dark"></i>
              </button>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav end -->

    <!-- hero start -->
    <section id="hero" class="text-center p-5 bg-success-subtle text-sm-start">
      <div class="container">
        <div class="d-sm-flex flex-sm-row-reverse align-items-center">
          <img
            src="img/565506-1536x2732-iphone-hd-the-fellowship-of-the-ring-wallpaper-photo.jpg"
            class="img-fluid"
            width="300"
          />
          <div>
            <h1 class="fw-bold display-4">The Lord of The Rings</h1>
            <h4 class="lead display-8">
              The story begins when Frodo Baggins, a hobbit, inherits the One
              Ring from his uncle Bilbo Baggins. Gandalf, a wizard, informs
              Frodo that the Ring is inherently evil and that Sauron seeks to
              reclaim it to conquer Middle-earth. To prevent this, Frodo sets
              out on a perilous journey to destroy the Ring in the fires of
              Mount Doom, where it was forged. He is joined by a diverse
              Fellowship, including his loyal friend Samwise Gamgee, the ranger
              Aragorn, the elf Legolas, the dwarf Gimli, and others. As they
              travel through treacherous lands, they face numerous challenges,
              including attacks from Sauron's minions, known as the Nazgûl. The
              Fellowship is tested through battles and personal sacrifices,
              highlighting themes of friendship, bravery, and redemption.
            </h4>
            <h6>
              <span id="tanggal"></span>
              <span id="jam"></span>
            </h6>
          </div>
        </div>
      </div>
    </section>
    <!-- hero end -->


    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Fellowship of The Ring</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- gallery start -->
    <section id="gallery" class="text-center p-5 bg-success-subtle">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">gallery</h1>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <?php
        $sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
        $hasil2 = $conn->query($sql2);
        $isActive = true; // Flag untuk menentukan item aktif

        while($row = $hasil2->fetch_assoc()){
        ?>
        <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
          <img src="img/<?= $row["gambar"] ?>" class="d-block w-100" alt="..." />
        </div>
        <?php
          $isActive = false; // Set flag ke false setelah item pertama
        }
        ?>
      </div>

      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

    <!-- gallery end -->


    <!-- article start -->
    <!-- <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Fellowship of The Ring</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <div class="col">
            <div class="card">
              <img
                src="/img/f9aad8debdc9ccbd5997fa9ea40922cc.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Frodo Baggins</h5>
                <p class="card-text">
                  Frodo is a hobbit from the Shire, specifically from Bag End,
                  which he inherited from his uncle, Bilbo Baggins. He was
                  raised by Bilbo after being adopted and grew up listening to
                  tales of adventure, which instilled in him a sense of
                  curiosity about the world beyond the Shire. His life changes
                  dramatically when he inherits the One Ring, a powerful
                  artifact sought by the Dark Lord Sauron.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/6286cdbacafc7c1d2a57a7f204e95872.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Samwise Gamgee</h5>
                <p class="card-text">
                  Samwise Gamgee, often referred to simply as Sam, is a key
                  character in J.R.R. Tolkien's The Lord of the Rings. He serves
                  as the loyal companion and gardener to Frodo Baggins, the
                  story's protagonist and Ring-bearer. He joins the Fellowship
                  of the Ring at Rivendell and remains steadfastly by Frodo's
                  side as they navigate treacherous landscapes toward Mordor.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/5c094a458a74557c3578ee54b7bc729e.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Meriadoc Brandybuck</h5>
                <p class="card-text">
                  Meriadoc Brandybuck, commonly known as Merry, is a prominent
                  character in J.R.R. Tolkien's The Lord of the Rings. He is a
                  hobbit from the Brandybuck family, residing in Buckland, which
                  is located on the eastern edge of the Shire.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/f184b16f7aa07514d84d3cfefcd04674.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Peregrin Took</h5>
                <p class="card-text">
                  Peregrin Took, commonly known as Pippin, is a significant
                  character in J.R.R. Tolkien's The Lord of the Rings. He is a
                  hobbit from the esteemed Took family and is closely associated
                  with his cousin Meriadoc "Merry" Brandybuck.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/5fb036ecc31d706b3c03e1dbf3dc9945.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Aragorn</h5>
                <p class="card-text">
                  Aragorn, also known as Strider, is a central character in
                  J.R.R. Tolkien's The Lord of the Rings. He is the heir to the
                  thrones of Gondor and Arnor, descending from Isildur, and
                  plays a crucial role in the quest to destroy the One Ring.
                  Born as Aragorn II, he is the son of Arathorn and a descendant
                  of the ancient kings of Men. After his father's death when
                  Aragorn was just two years old, he was raised in Rivendell by
                  Elrond, who kept his lineage a secret until Aragorn turned 20.
                  This revelation set him on a path toward embracing his destiny
                  as king
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/9c9ad4c2885df2a383b9b1e017adbd92.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Legolas</h5>
                <p class="card-text">
                  Legolas is a key character in J.R.R. Tolkien's The Lord of the
                  Rings. He is a Sindarin Elf from the Woodland Realm of
                  Mirkwood and the son of Thranduil, the Elvenking. Legolas is
                  introduced at the Council of Elrond, where he is sent as a
                  messenger to report on Gollum's escape. He is chosen to join
                  the Fellowship of the Ring, tasked with helping Frodo Baggins
                  in his quest to destroy the One Ring.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/70432de9b47fead7f76a2a0e6f5affad.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Gimli</h5>
                <p class="card-text">
                  Gimli is a prominent character in J.R.R. Tolkien's The Lord of
                  the Rings. He is a Dwarf warrior, the son of Glóin, and
                  represents the Dwarven race in the Fellowship of the Ring.
                  Gimli hails from the line of Durin, one of the most notable
                  Dwarven families. His father, Glóin, was one of the dwarves
                  who accompanied Bilbo Baggins on the quest to reclaim Erebor
                  in The Hobbit.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/4337b0de83726e81eb5a6a37c1e6b309.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Gandalf</h5>
                <p class="card-text">
                  Gandalf is a central character in J.R.R. Tolkien's The Lord of
                  the Rings and The Hobbit. He is a wizard of great power and
                  wisdom, originally known as Gandalf the Grey before his
                  transformation into Gandalf the White. Gandalf is
                  characterized by his deep wisdom, compassion, and
                  understanding of others. He often acts as a mentor to
                  characters like Frodo, Aragorn, and others, encouraging them
                  to rise to their potential.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img
                src="/img/c2ac3860105ccba12004d81fe0323751.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Boromir</h5>
                <p class="card-text">
                  Boromir is a significant character in J.R.R. Tolkien's The
                  Lord of the Rings, particularly in The Fellowship of the Ring.
                  He is the eldest son of Denethor II, the Steward of Gondor,
                  and serves as a brave warrior and protector of his people.His
                  character embodies the theme of the corrupting influence of
                  power. While he initially seeks to use the Ring as a weapon
                  against Sauron, his ambition leads him to attempt to take it
                  from Frodo, showcasing his internal struggle with temptation.
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"
                  >Last updated 3 mins ago</small
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- article end -->


    <!-- gallery start -->
    <!-- <section id="gallery" class="text-center p-5 bg-success-subtle">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">gallery</h1>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="/img/51759a11460a84539925781b392d2930.jpg"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="/img/nature-mountains-the-city-waterfall-the-lord-of-the-rings-hd-wallpaper-preview.jpg"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img src="/img/1341554.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img
                src="/img/the-lord-of-the-rings-gandalf-minas-tirith-movies-wallpaper-preview.jpg"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="/img/lord-of-the-rings-mordor-mount-doom-eye-of-sauron-wallpaper-preview.jpg"
                class="d-block w-100"
                alt="..."
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section> -->
    <!-- gallery end -->

    <!-- Schedule Start -->
    <section id="schedule" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Schedule</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4">
          <div class="col">
            <div class="card">
              <div class="card-header bg-success">Selasa</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  12.30-14.10 <br />Basis Data Praktek
                </li>
                <li class="list-group-item">
                  14.10-15.50 <br />Pendidikan Kewarganegaraan
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-success">Rabu</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  07.00-09.30 <br />Rekayasa perangkat Lunak
                </li>
                <li class="list-group-item">
                  10.20-12.00 <br />Pemrograman Berbasis Web
                </li>
                <li class="list-group-item">
                  12.30-15.00 <br />Kecerdasan Buatan
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-success">Kamis</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  07.00-08.40 <br />Basis Data Teori
                </li>
                <li class="list-group-item">
                  09.30-12.00 <br />Logika Informatika
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-success">Jumat</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  09.30-12.00 <br />Sistem Operasi
                </li>
                <li class="list-group-item">
                  12.30-15.00 <br />Probabilitas dan Statistik
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Schedule End -->

    <!-- About Me Start -->
    <section id="about" class="text-center p-5 bg-success-subtle">
      <div class="container">
        <div class="d-sm-flex flex-sm-row align-items-center">
          <img
            src="https://64.media.tumblr.com/0f3f0dd856b06883a924b9884e9c52e1/51b11624fed4e166-5e/s400x600/5bed96197da056dfb5e1fbb3ea1083550ae352c2.pnj"
            class="img-fluid rounded-circle"
            width="300"
          />
          <div class="text-sm-start align-items-center">
            <h4 class="lead display-8">A11.2023.15188</h4>
            <h1 class="fw-bold display-4">Neysavita Almira H.</h1>
            <h4 class="lead display-8">Program Studi Teknik Informatika</h4>
            <a href="https://dinus.ac.id/">
              <h4 class="fw-bold text-dark" style="text-decoration: none">
                Universitas Dian Nuswantoro
              </h4>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- About Me End -->

    <!-- footer start -->
    <footer class="text-center p-5">
      <div>
        <a href=""><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href=""><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
        <a href=""><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
      </div>
      <div class="text-dark">neysavita &copy; 2024</div>
    </footer>
    <!-- footer end -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      window.setTimeout("tampilWaktu()", 1000);

      function tampilWaktu() {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;

        setTimeout("tampilWaktu()", 1000);
        document.getElementById("tanggal").innerHTML =
          waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML =
          waktu.getHours() +
          ":" +
          waktu.getMinutes() +
          ":" +
          waktu.getSeconds();
      }

      // dark mode switcher
      document.getElementById("darkswitch").onclick = function () {
        document.body.style.backgroundColor = "#060f1f";

        document.getElementById("hero").classList.remove("bg-success-subtle");
        document.getElementById("hero").classList.add("bg-dark");
        document.getElementById("hero").classList.remove("text-dark");
        document.getElementById("hero").classList.add("text-white");

        document
          .getElementById("gallery")
          .classList.remove("bg-success-subtle");
        document.getElementById("gallery").classList.add("bg-dark");
        document.getElementById("gallery").classList.remove("text-dark");
        document.getElementById("gallery").classList.add("text-white");

        document.getElementById("article").classList.remove("text-dark");
        document.getElementById("article").classList.add("text-white");

        document.getElementById("schedule").classList.remove("text-dark");
        document.getElementById("schedule").classList.add("text-white");

        document.getElementById("about").classList.remove("bg-success-subtle");
        document.getElementById("about").classList.add("bg-dark");
        document.getElementById("about").classList.remove("text-dark");
        document.getElementById("about").classList.add("text-white");

        document.getElementById("footer").classList.remove("text-dark");
        document.getElementById("footer").classList.add("text-white");

        const collection = document.getElementsByClassName("card");
        for (let i = 0; i < collection.length; i++) {
          collection[i].classList.add("bg-primary");
          collection[i].classList.add("text-white");
        }
      };

      document.getElementById("lightswitch").onclick = function () {
        document.body.style.backgroundColor = "white";

        document.getElementById("hero").classList.remove("bg-dark");
        document.getElementById("hero").classList.add("bg-success-subtle");
        document.getElementById("hero").classList.remove("text-white");
        document.getElementById("hero").classList.add("text-dark");

        document.getElementById("gallery").classList.remove("bg-dark");
        document.getElementById("gallery").classList.add("bg-success-subtle");
        document.getElementById("gallery").classList.remove("text-white");
        document.getElementById("gallery").classList.add("text-dark");

        document.getElementById("article").classList.remove("text-white");
        document.getElementById("article").classList.add("text-dark");

        document.getElementById("about").classList.remove("bg-dark");
        document.getElementById("about").classList.add("bg-success-subtle");
        document.getElementById("about").classList.remove("text-white");
        document.getElementById("about").classList.add("text-dark");

        document.getElementById("footer").classList.add("text-dark");

        const collection = document.getElementsByClassName("card");
        for (let i = 0; i < collection.length; i++) {
          collection[i].classList.add("bg-primary");
          collection[i].classList.add("text-white");
        }
      };
    </script>
  </body>
</html>
