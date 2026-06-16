<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

// Khởi tạo danh sách sách mẫu
$books = [
    [
        "name" => "Đắc Nhân Tâm",
        "price" => 89000,
        "img" => "https://images.unsplash.com/photo-1544947950-fa07a98d237f"
    ],
    [
        "name" => "Nhà Giả Kim",
        "price" => 99000,
        "img" => "https://images.unsplash.com/photo-1512820790803-83ca734da794"
    ],
    [
        "name" => "Tuổi Trẻ Đáng Giá Bao Nhiêu",
        "price" => 120000,
        "img" => "https://images.unsplash.com/photo-1521587760476-6c12a4b040da"
    ],
    [
        "name" => "Muôn Kiếp Nhân Sinh",
        "price" => 150000,
        "img" => "https://images.unsplash.com/photo-1516979187457-637abb4f9353"
    ]
];

// Nếu chưa có giỏ hàng thì tạo mảng rỗng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sách vào giỏ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';

    if (!empty($name)) {
        $_SESSION['cart'][] = $name;
    }
}

// Trả dữ liệu JSON
echo json_encode([
    "books" => $books,
    "cart_count" => count($_SESSION['cart'])
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
