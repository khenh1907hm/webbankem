<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';

class UserProductController
{
    private $productModel;

    public function __construct()
    {
        $db = (new Database())->getConnection();
        $this->productModel = new ProductModel($db);
    }

    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    // Xem chi tiết sản phẩm
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);

        if ($product) {
            include 'app/views/user/product/detail.php';
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    }
}
?>
