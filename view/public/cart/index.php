<?php
include_once("../../inc/header.php");
session_start();

$grandTotal = 0;
$quantity = 1;

?>

<section class="cart container">

    <?php if (!empty($_SESSION['cart'])) : ?>
        <form action="../transaction/insert_transaction.php" method="post">
            <?php foreach ($_SESSION['cart'] as $cart => $value) : ?>

                <?php $subTotal = $value['harga'] * $value['jumlah'] ?>
                <div class="cart-body">
                    <?php $inputId = 'total-count' . $quantity; ?>
                    <img src="<?= $value['gambar'] ?>" alt="" width="300">
                    <h2><?= $value['nama_produk'] ?></h2>
                    <p><?= moneyFormat($value['harga']) ?></p>
                    <div class="quantity-button">
                        <button type="button" onclick="decrement('<?= $inputId ?>')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12.998H5V10.998H19V12.998Z" fill="black" />
                            </svg>
                        </button>
                        <input type="number" value="<?= $value['jumlah'] ?>" id="total-count<?= $quantity++ ?>" name="quantity[]" />
                        <button type="button" onclick="increment('<?= $inputId ?>')">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 12.998H13V18.998H11V12.998H5V10.998H11V4.99799H13V10.998H19V12.998Z" fill="black" />
                            </svg>
                        </button>
                    </div>
                    <a class="remove-button" href="delete_cart.php?id=<?= $cart ?>">
                        <svg width="25" height="25" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 6.1875H22V5.15625C22 4.33574 21.6839 3.54883 21.1213 2.96864C20.5587 2.38845 19.7956 2.0625 19 2.0625H13C12.2044 2.0625 11.4413 2.38845 10.8787 2.96864C10.3161 3.54883 10 4.33574 10 5.15625V6.1875H5C4.73478 6.1875 4.48043 6.29615 4.29289 6.48955C4.10536 6.68294 4 6.94525 4 7.21875C4 7.49225 4.10536 7.75456 4.29289 7.94795C4.48043 8.14135 4.73478 8.25 5 8.25H6V26.8125C6 27.3595 6.21071 27.8841 6.58579 28.2709C6.96086 28.6577 7.46957 28.875 8 28.875H24C24.5304 28.875 25.0391 28.6577 25.4142 28.2709C25.7893 27.8841 26 27.3595 26 26.8125V8.25H27C27.2652 8.25 27.5196 8.14135 27.7071 7.94795C27.8946 7.75456 28 7.49225 28 7.21875C28 6.94525 27.8946 6.68294 27.7071 6.48955C27.5196 6.29615 27.2652 6.1875 27 6.1875ZM12 5.15625C12 4.88275 12.1054 4.62044 12.2929 4.42705C12.4804 4.23365 12.7348 4.125 13 4.125H19C19.2652 4.125 19.5196 4.23365 19.7071 4.42705C19.8946 4.62044 20 4.88275 20 5.15625V6.1875H12V5.15625ZM24 26.8125H8V8.25H24V26.8125ZM14 13.4062V21.6562C14 21.9298 13.8946 22.1921 13.7071 22.3855C13.5196 22.5789 13.2652 22.6875 13 22.6875C12.7348 22.6875 12.4804 22.5789 12.2929 22.3855C12.1054 22.1921 12 21.9298 12 21.6562V13.4062C12 13.1327 12.1054 12.8704 12.2929 12.677C12.4804 12.4836 12.7348 12.375 13 12.375C13.2652 12.375 13.5196 12.4836 13.7071 12.677C13.8946 12.8704 14 13.1327 14 13.4062ZM20 13.4062V21.6562C20 21.9298 19.8946 22.1921 19.7071 22.3855C19.5196 22.5789 19.2652 22.6875 19 22.6875C18.7348 22.6875 18.4804 22.5789 18.2929 22.3855C18.1054 22.1921 18 21.9298 18 21.6562V13.4062C18 13.1327 18.1054 12.8704 18.2929 12.677C18.4804 12.4836 18.7348 12.375 19 12.375C19.2652 12.375 19.5196 12.4836 19.7071 12.677C19.8946 12.8704 20 13.1327 20 13.4062Z" fill="white" />
                        </svg>

                        Remove</a>
                </div>
                <?php $grandTotal += $subTotal ?>
            <?php endforeach; ?>
            <div class="cart-footer">
                <p>Total Price : <?= $grandTotal ?></p>
                <div class="cart-checkout">
                    <button type="submit">
                        <svg width="25" height="25" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.6668 24C23.3741 24 24.0523 24.2809 24.5524 24.781C25.0525 25.2811 25.3335 25.9594 25.3335 26.6667C25.3335 27.3739 25.0525 28.0522 24.5524 28.5523C24.0523 29.0524 23.3741 29.3333 22.6668 29.3333C21.9596 29.3333 21.2813 29.0524 20.7812 28.5523C20.2811 28.0522 20.0002 27.3739 20.0002 26.6667C20.0002 25.1867 21.1868 24 22.6668 24ZM1.3335 2.66666H5.6935L6.94683 5.33332H26.6668C27.0204 5.33332 27.3596 5.4738 27.6096 5.72385C27.8597 5.9739 28.0002 6.31303 28.0002 6.66666C28.0002 6.89332 27.9335 7.11999 27.8402 7.33332L23.0668 15.96C22.6135 16.7733 21.7335 17.3333 20.7335 17.3333H10.8002L9.60016 19.5067L9.56016 19.6667C9.56016 19.7551 9.59528 19.8398 9.65779 19.9024C9.72031 19.9649 9.80509 20 9.8935 20H25.3335V22.6667H9.3335C8.62625 22.6667 7.94797 22.3857 7.44788 21.8856C6.94778 21.3855 6.66683 20.7072 6.66683 20C6.66683 19.5333 6.78683 19.0933 6.98683 18.72L8.80016 15.4533L4.00016 5.33332H1.3335V2.66666ZM9.3335 24C10.0407 24 10.719 24.2809 11.2191 24.781C11.7192 25.2811 12.0002 25.9594 12.0002 26.6667C12.0002 27.3739 11.7192 28.0522 11.2191 28.5523C10.719 29.0524 10.0407 29.3333 9.3335 29.3333C8.62625 29.3333 7.94797 29.0524 7.44788 28.5523C6.94778 28.0522 6.66683 27.3739 6.66683 26.6667C6.66683 25.1867 7.8535 24 9.3335 24ZM21.3335 14.6667L25.0402 7.99999H8.18683L11.3335 14.6667H21.3335Z" fill="#5200FF" />
                        </svg>

                        <span>Checkout</span>
                    </button>
                </div>
            </div>
        <?php else :  ?>
            <div class="empty-cart">
                <h1>
                    Your Carts Is Empty
                </h1>
            </div>
        <?php endif; ?>
        </form>

</section>

<script>

</script>





<?php
include_once("../../inc/footer.php");
?>