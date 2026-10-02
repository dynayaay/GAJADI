<?php
$katalog = [
    [
        "nama" => "Smartphone 5G 8/256GB", "kategori" => "Handphone", "harga" => 3499000, "stok" => 5, "gambar" => "📱"
    ],
    [
        "nama" => "Tablet Android 10.5 Inch", "kategori" => "Tablet", "harga" => 2850000, "stok" => 2, "gambar" => "📲"
    ],
    [
        "nama" => "Smartband Tracker", "kategori" => "Wearable", "harga" => 499000, "stok" => 12, "gambar" => "⌚"
    ],
    [
        "nama" => "Powerbank Fast Charge 20000mAh", "kategori" => "Aksesoris", "harga" => 299000, "stok" => 8, "gambar" => "🔋"
    ],
    [
        "nama" => "Charger GaN 65W Dual Port", "kategori" => "Aksesoris", "harga" => 220000, "stok" => 0, "gambar" => "🔌"
    ],
    [
        "nama" => "Stylus Pen", "kategori" => "Aks.esoris", "harga" => 180000, "stok" => 0, "gambar" => "✏️"
    ]
];

$total = count($katalog);
?>

<!DOCTYPE html>
<html lang="id">
<head>/
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="J1.css">
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="brand">Cia Store</div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#products">Katalog</a></li>
                <li><a href="#">Tentang Kami</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero-wrapper">
        <div class="hero-box">
            <span>CIA STORE</span>
            <h1>Pusat Gadget & Aksesoris</h1>
            <p>Pilihan smartphone, tablet, dan aksesoris harian lengkap untuk kebutuhanmu.</p>
            <a href="#products" class="btn-lihat">Lihat Katalog</a>
        </div>
    </section>

    <div class="section-head" id="products">
        <div>
            <p style="font-size: 0.75rem; color: #6b7280; font-weight: 700;">KATALOG GADGET</p>
            <h2>Daftar Produk</h2>
        </div>
        <div class="badge-total">
            Total Item: <strong><?= $total; ?></strong>
        </div>
    </div>

    <main class="grid-katalog">
        <?php foreach ($katalog as $item): 
            $hrg = $item['harga'];
            $stok = $item['stok'];
            
            // Diskon berlaku untuk produk di atas 1 Juta
            $is_diskon = $hrg >= 1000000;
            if ($is_diskon) {
                $hrg_akhir = $hrg - ($hrg * 0.1);
            } else {
                $hrg_akhir = $hrg;
            }

            $stok_ada = $stok > 0;
        ?>
            <article class="card">
                <?php if ($is_diskon): ?>
                    <span class="tag-diskon">PROMO 10%</span>
                <?php endif; ?>

                <div>
                    <div class="img-box"><?= $item['gambar']; ?></div>
                    <div class="kat-label"><?= $item['kategori']; ?></div>
                    <h3 class="nama-produk"><?= $item['nama']; ?></h3>
                </div>

                <div>
                    <div class="area-harga">
                        <?php if ($is_diskon): ?>
                            <div class="harga-lama">Rp<?= number_format($hrg, 0, ',', '.'); ?></div>
                            <div class="harga-baru">Rp<?= number_format($hrg_akhir, 0, ',', '.'); ?></div>
                        <?php else: ?>
                            <div class="harga-baru">Rp<?= number_format($hrg, 0, ',', '.'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="info-stok">
                        <span>Stok: <?= $stok; ?></span>
                        <span class="status <?= $stok_ada ? 'ada' : 'habis'; ?>">
                            <?= $stok_ada ? 'Tersedia' : 'Habis'; ?>
                        </span>
                    </div>

                    <button class="btn-beli" <?= !$stok_ada ? 'disabled' : ''; ?>>
                        <?= $stok_ada ? 'Beli Sekarang' : 'Stok Habis'; ?>
                    </button>
                </div>
            </article>
        <?php endforeach; ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Cia Gadget Store. All rights reserved.</p>
    </footer>

</body>
</html>