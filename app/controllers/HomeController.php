<?php
class HomeController {
    private $db;
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index() {
        // Lấy dữ liệu cho trang chủ
        $featuredProducts = $this->productModel->getProducts();
        $categories = $this->categoryModel->getCategories();
        
        // Load view trang chủ
        include_once 'app/views/home/index.php';
    }
}