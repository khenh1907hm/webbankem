<?php include 'app/admin/shares/header.php'; ?>

<h1>Thông tin sản phẩm</h1>

<div class="product-details">
    <h2><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>
    <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image" style="max-width: 200px;">
    <p>Mô tả: <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
    <p>Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
</div>

<a href="/webbanhang/Product" class="btn btn-primary">Quay lại</a>

<?php include 'app/admin/shares/footer.php'; ?>
