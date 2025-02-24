<?php include 'app/views/share/headerClient.php' ?>

<style>
    .container { display: flex;width: 1180px; margin-top: 58px; max-width: calc(100% - 48px); gap: 44px; margin-left: auto; margin-right: auto; }
    .filter-sidebar { width: 25%; padding: 10px; }
    .filter-category { margin-bottom: 20px; border: 1px solid #ddd; }
    .filter-category ul { list-style: none; padding: 0; text-align: center; }
    .filter-category ul li { margin-bottom: 10px; }
    .product-list { width: 75%; display: flex; flex-wrap: wrap; gap: 20px; padding: 10px; }
    .product-item { width: calc(33.333% - 20px); background: #fff; padding: 10px; border: 1px solid #ddd; text-align: center; }
    .filter_title { padding: 10px; text-align: center; background: #E6F0FF; color: #4F5361; margin-bottom: 16px; }
    .filter-options { border: 1px solid #ddd; padding: 10px; }
    .filter-options input[type="text"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; }
    .price-range { display: flex; align-items: center; gap: 10px; }
    .price-range input[type="range"] { flex: 1; }
    .price-values { display: flex; justify-content: space-between; font-size: 14px; }
    .search_block{ position: relative; }
    .search_block i { position: absolute;color:#6093de;top: 9px;right:12px }
</style>

<div class="container">
    <!-- Bộ lọc bên trái -->
    <aside class="filter-sidebar">
        <div class="filter-category">
            <h3 class="filter_title">Danh mục sản phẩm</h3>
            <ul>
                <li><a href="#">Danh mục 1</a></li>
                <li><a href="#">Danh mục 2</a></li>
                <li><a href="#">Danh mục 3</a></li>
            </ul>
        </div>
        <div class="filter-options">
            <h3 class="filter_title">Bộ lọc</h3>
            <div class="search_block">
                <input style="border-radius:999px;" type="text" placeholder="Tìm kiếm sản phẩm ">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="price-range">
                <input type="range" id="priceRange" min="40000" max="300000" step="1000" value="40000">
            </div>
            <div class="price-values">
                <span id="minPrice">40.000đ</span>
                <span id="currentPrice">40.000đ</span>
                <span id="maxPrice">300.000đ</span>
            </div>
        </div>
    </aside>

    <!-- Danh sách sản phẩm -->
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="<?= $product->image ?>" alt="<?= $product->name ?>">
                <h3><?= $product->name ?></h3>
                <p><?= number_format($product->price) ?> VNĐ</p>
                <a href="/UserProduct/show/<?= $product->id ?>">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const priceRange = document.getElementById("priceRange");
    const currentPrice = document.getElementById("currentPrice");
    
    priceRange.addEventListener("input", function() {
        currentPrice.textContent = new Intl.NumberFormat("vi-VN").format(priceRange.value) + "đ";
    });
</script>

<?php include 'app/views/share/footerClient.php' ?>
