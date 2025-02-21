<?php include 'app/admin/shares/header.php'; ?>

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">Quản lý sản phẩm</h1>
        <a href="/webbanhang/Product/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm sản phẩm mới
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i> Danh sách sản phẩm
                </div>
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'app/admin/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const token = localStorage.getItem('jwtToken');
    const role = localStorage.getItem('role');
    
    // Kiểm tra đăng nhập và role
    if (!token) {
        alert('Vui lòng đăng nhập để tiếp tục');
        location.href = '/webbanhang/account/login';
        return;
    }

    // Kiểm tra quyền admin
    if (role !== 'admin') {
        alert('Bạn không có quyền truy cập trang này');
        location.href = '/webbanhang/home';
        return;
    }
    
    loadProducts();

    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        filterProducts(searchText);
    });
});

// Thêm hàm kiểm tra token hết hạn
function checkTokenExpiration(response) {
    if (response.status === 401) {
        alert('Phiên làm việc đã hết hạn. Vui lòng đăng nhập lại');
        localStorage.removeItem('jwtToken');
        localStorage.removeItem('role');
        location.href = '/webbanhang/account/login';
        return false;
    }
    return true;
}

// Cập nhật hàm loadProducts để xử lý token hết hạn
function loadProducts() {
    const token = localStorage.getItem('jwtToken');
    fetch('/webbanhang/api/product', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => {
        if (!checkTokenExpiration(response)) return;
        return response.json();
    })
    .then(data => {
        if (!data) return;
        const productList = document.getElementById('product-list');
        productList.innerHTML = '';
        data.forEach(product => {
            productList.innerHTML += `
                <tr>
                    <td>${product.id}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${product.image || '/webbanhang/public/images/no-image.jpg'}" 
                                 class="rounded-circle" 
                                 style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                            <div>
                                <strong>${product.name}</strong>
                                <div class="small text-muted">${product.description}</div>
                            </div>
                        </div>
                    </td>
                    <td>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price)}</td>
                    <td><span class="badge bg-info">${product.category_name}</span></td>
                    <td><span class="badge bg-success">Còn hàng</span></td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/webbanhang/Product/edit/${product.id}" 
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteProduct(${product.id})" 
                                    class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="/webbanhang/Product/show/${product.id}" 
                               class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `;
        });
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi tải danh sách sản phẩm');
    });
}

function filterProducts(searchText) {
    const rows = document.querySelectorAll('#product-list tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchText) ? '' : 'none';
    });
}

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        const token = localStorage.getItem('jwtToken');
        fetch(`/webbanhang/api/product/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + token
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product deleted successfully') {
                loadProducts(); // Reload the product list
                alert('Xóa sản phẩm thành công');
            } else {
                alert('Xóa sản phẩm thất bại');
            }
        });
    }
}
</script>
