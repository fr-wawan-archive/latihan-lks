<?php
include_once("../../../config/database.php");


$sql = "SELECT * FROM produk";
$products = $pdo->query($sql);

function moneyFormat($str)
{
    return 'Rp. ' . number_format($str, '0', '', '.');
}

?>

<?php
include_once("../../inc/header.php");
?>

<section class="hero">
    <div class="hero-text">
        <h1>Best Product And Best Sales</h1>
        <p>Lorem ipsum dolor sit amet.</p>
    </div>
</section>

<section class="category container">
    <h1>CATEGORY <span>PRODUCTS</span></h1>

    <div class="card-wrapper">

        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
        <div class="card-category">
            <img src="images/category-image1.png" alt="" />
            <p>Clothes</p>
        </div>
    </div>
</section>

<section class="popular-products container">
    <div class="popular-products-title">
        <h1>POPULAR <span>PRODUCTS</span></h1>
        <h5>Show All</h5>
    </div>
    <div class="card-wrapper">
        <?php foreach ($products as $product) : ?>
            <div class="card-products">
                <div class="card-header">
                    <img src="<?= $product['gambar'] ?>" alt="" />
                </div>


                <div class="card-body">
                    <h3><?= $product['nama_produk'] ?></h3>
                    <p><?= moneyFormat($product['harga']) ?></p>
                    <div class="quantity-button">
                        <button>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                            </svg>
                        </button>
                        <input type="number" value="1" />
                        <button>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                            </svg>
                        </button>
                    </div>
                    <div class="button-products">
                        <a href="" class="button-details">Details</a>
                        <a href="" class="button-order">Order</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="popular-products container">
    <div class="popular-products-title">
        <h1>NEWEST <span>PRODUCTS</span></h1>
        <h5>Show All</h5>
    </div>
    <div class="card-wrapper">
        <div class="card-products">
            <div class="card-header">
                <img src="images/product-images.png" alt="" />
            </div>
            <div class="card-body">
                <h3>Title Products</h3>
                <p>Rp. 500.000</p>
                <div class="quantity-button">
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                    <input type="number" value="1" />
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                </div>
                <div class="button-products">
                    <a href="" class="button-details">Details</a>
                    <a href="" class="button-order">Order</a>
                </div>
            </div>
        </div>
        <div class="card-products">
            <div class="card-header">
                <img src="images/product-images.png" alt="" />
            </div>
            <div class="card-body">
                <h3>Title Products</h3>
                <p>Rp. 500.000</p>
                <div class="quantity-button">
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                    <input type="number" value="1" />
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                </div>
                <div class="button-products">
                    <a href="" class="button-details">Details</a>
                    <a href="" class="button-order">Order</a>
                </div>
            </div>
        </div>
        <div class="card-products">
            <div class="card-header">
                <img src="images/product-images.png" alt="" />
            </div>
            <div class="card-body">
                <h3>Title Products</h3>
                <p>Rp. 500.000</p>
                <div class="quantity-button">
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                    <input type="number" value="1" />
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                </div>
                <div class="button-products">
                    <a href="" class="button-details">Details</a>
                    <a href="" class="button-order">Order</a>
                </div>
            </div>
        </div>
        <div class="card-products">
            <div class="card-header">
                <img src="images/product-images.png" alt="" />
            </div>
            <div class="card-body">
                <h3>Title Products</h3>
                <p>Rp. 500.000</p>
                <div class="quantity-button">
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                    <input type="number" value="1" />
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                        </svg>
                    </button>
                </div>
                <div class="button-products">
                    <a href="" class="button-details">Details</a>
                    <a href="" class="button-order">Order</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="ads"></div>