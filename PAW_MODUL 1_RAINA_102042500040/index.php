<?php

$products = [

    [
        "nama" => "iPhone 18 Pro",
        "kategori" => "iPhone",
        "harga" => 32000000,
        "stok" => 3,
        "gambar" => "iphone 18 pro.webp"
    ],

    [
        "nama" => "iPhone 17 Pro ",
        "kategori" => "iPhone",
        "harga" => 25999000,
        "stok" => 4,
        "gambar" => "iphone 17  pro.jpg"
    ],

    [
        "nama" => "iPhone Air",
        "kategori" => "iPhone",
        "harga" => 22999000,
        "stok" => 2,
        "gambar" => "Iphone Air.webp"
    ],

    [
        "nama" => "iPhone 16 Pro",
        "kategori" => "iPhone",
        "harga" => 19999000,
        "stok" => 3,
        "gambar" => "iphone 16.webp"
    ],

    [
        "nama" => "iPhone 15 pro",
        "kategori" => "iPhone",
        "harga" => 15999000,
        "stok" => 5,
        "gambar" => "ip 15.png"
    ],

    [
        "nama" => "iPhone 14",
        "kategori" => "iPhone",
        "harga" => 13999000,
        "stok" => 4,
        "gambar" => "ip 14.png"
    ],

    [
        "nama" => "iPhone 13",
        "kategori" => "iPhone",
        "harga" => 11999000,
        "stok" => 3,
        "gambar" => "ip 13.png"
    ],

    [
        "nama" => "iPhone 12",
        "kategori" => "iPhone",
        "harga" => 9999000,
        "stok" => 0,
        "gambar" => "ip 12.jpg"
    ]

];

// Total stok
$totalStok = 0;

foreach ($products as $product) {
    $totalStok += $product["stok"];
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Raina Store - iPhone</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">
        Raina Store
    </div>

    <div class="nav-menu">

        <a href="#home">Home</a>

        <a href="#products">Products</a>

        <a href="#about">About</a>

    </div>

</nav>


<!-- HERO -->

<section class="hero" id="home">

    <div class="hero-content">

        <p class="small-title">
            RAINA STORE
        </p>

        <h1>
            Your iPhone.<br>
            Your Style.
        </h1>

        <p>
            Discover the latest iPhone collection
            with premium design, powerful performance,
            and innovative technology.
        </p>

        <a href="#products" class="hero-button">
            Explore iPhone
        </a>

    </div>

</section>


<!-- PRODUCT INFORMATION -->

<section class="product-info" id="products">

    <div>

        <p class="section-label">
            OUR COLLECTION
        </p>

        <h2>
            iPhone Collection
        </h2>

    </div>

    <div class="total-product">

        Total Stok:

        <strong>
            <?= $totalStok ?>
        </strong>

        unit

    </div>

</section>


<!-- PRODUCT LIST -->

<main class="product-container">


<?php foreach ($products as $product): ?>


    <?php

    // Diskon 10% jika harga 15 juta atau lebih
    if ($product["harga"] >= 15000000) {

        $diskon = 10;

        $potongan =
            $product["harga"] * ($diskon / 100);

        $hargaSetelahDiskon =
            $product["harga"] - $potongan;

    } else {

        $diskon = 0;

        $hargaSetelahDiskon =
            $product["harga"];

    }


    // Status stok
    if ($product["stok"] > 0) {

        $status = "Tersedia";

        $statusClass = "available";

    } else {

        $status = "Stok Habis";

        $statusClass = "empty";

    }

    ?>


    <!-- PRODUCT CARD -->

    <div class="product-card">
        <div class="product-image">

            <img
                src="<?= $product["gambar"] ?>"
                alt="<?= $product["nama"] ?>"
            >

        </div>
        <div class="product-content">

            <span class="category">

                <?= $product["kategori"] ?>

            </span>
            <h3>

                <?= $product["nama"] ?>

            </h3>
            <?php if ($diskon > 0): ?>

                <p class="normal-price">

                    Rp
                    <?= number_format(
                        $product["harga"],
                        0,
                        ',',
                        '.'
                    ) ?>

                </p>
                <span class="discount">

                    DISKON <?= $diskon ?>%

                </span>
                <p class="price">

                    Rp
                    <?= number_format(
                        $hargaSetelahDiskon,
                        0,
                        ',',
                        '.'
                    ) ?>

                </p>
            <?php else: ?>

                <p class="price">

                    Rp
                    <?= number_format(
                        $product["harga"],
                        0,
                        ',',
                        '.'
                    ) ?>

                </p>

            <?php endif; ?>

            <div class="stock">

                <span>
                    Stok: <?= $product["stok"] ?>
                </span>

                <span class="<?= $statusClass ?>">
                    <?= $status ?>
                </span>

            </div>

            <?php if ($product["stok"] > 0): ?>

                <button class="buy-button">
                    Beli Sekarang
                </button>

            <?php else: ?>

                <button
                    class="buy-button disabled"
                    disabled
                >
                    Stok Habis
                </button>

            <?php endif; ?>


        </div>

    </div>


<?php endforeach; ?>


</main>


<!-- ABOUT -->

<section class="about" id="about">

    <p class="section-label">
        RAINA STORE
    </p>

    <h2>
        Premium iPhone Collection
    </h2>

    <p>

        Raina Store menyediakan berbagai pilihan
        iPhone dengan desain premium dan teknologi
        terkini untuk kebutuhan sehari-hari.

    </p>

</section>

<!-- FOOTER -->

<footer>

    <p>
        © 2026 Raina Store. All Rights Reserved.
    </p>

</footer>


</body>

</html>

