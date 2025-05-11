<?php
include "cart.php";
@session_start();

$ar = array();
if (isset($_SESSION["email"])) {
    if (isset($_SESSION['products'])) {
        $ar = $_SESSION['products'];
        if (count($ar) == 0) {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}

//if (isset($_SESSION['products'])) {
//    $ar = $_SESSION['products'];
//    if (count($ar) == 0 and empty($_SESSION["email"])) {
//        header("Location:index.php");
//    }
//} else {
//    header("Location:checkout.php");
//}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Shopping Cart</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8"/>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<?php

if (isset($_SESSION["email"])) {
    include "userheader.php";
} else {
    include_once 'connection.php';
    include "publicheader.php";
}

?>
<?php
//@session_start();
$cart = $_SESSION['products'];
//var_dump($cart);
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $user = "select * from signup where email='$email'";
    $user_result = mysqli_query($conn, $user);
    $user_row = mysqli_fetch_array($user_result);
}
?>
<!-- banner-2 -->
<div class="page-head_agile_info_w3l"></div>
<!-- //banner-2 -->

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Home</a>
                    <i>|</i>
                </li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                <span> <?php echo count($ar); ?> Products</span>
            </h4>
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Price</th>

                        <th>Quanity</th>
                        <th>Discount</th>
                        <th>Net Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $k = 0;
                    $grandTotal = 0;
                    foreach ($ar as $item) {
                        $k++;
                        $discountedPrice = round($item->price - (($item->price * $item->discount) / 100), 2);
                        $netprice = $discountedPrice * $item->qty;
                        $grandTotal += $netprice;
                        ?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $k; ?></td>
                            <td class="invert-image">
                                <a href="productdetail.php">
                                    <img src="<?php echo $item->photo; ?>" alt=" " style="width: 100px;height: 100px"
                                         class="img-responsive">
                                </a>
                            </td>

                            <td class="invert"><?php echo $item->productname; ?></td>
                            <td class="invert">&#8377;<?php echo $item->price; ?></td>

                            <td class="invert">
                                <div class="quantity d-inline-flex">
                                    <button type="button" data-toggle="tooltip" title="Remove"
                                            class="text-dark entry value-minus"
                                            onclick="changeQty(<?php echo $item->id; ?>,'minus',<?php echo $item->stock ?>)">
                                        <i id="minusicon-<?php echo $item->id; ?>"
                                           class="fa fa-minus <?php if ($item->qty <= 1) {
                                               echo "disabled";
                                           } ?>">

                                        </i>
                                    </button>

                                    <input type="text" name="quantity-<?php echo $item->id; ?>"
                                           style="max-width: 50px;margin: 0px;padding: 0px;"
                                           data-rule-required="true" data-rule-min="1"
                                           data-rule-max="<?php echo $item->stock ?>"
                                           id="quantity-<?php echo $item->id; ?>"
                                           value="<?php echo $item->qty; ?>" readonly=""
                                           class="form-control text-center mr-1 ml-0">

                                    <button type="button"
                                            onclick="changeQty(<?php echo $item->id; ?>,'plus',<?php echo $item->stock ?>)"
                                            data-toggle="tooltip"
                                            title="Update" class="text-dark entry value-plus"><i
                                                id="plusicon-<?php echo $item->id; ?>"
                                                class="fa fa-plus <?php if ($item->qty >= $item->stock) {
                                                    echo "disabled";
                                                } ?>">

                                        </i>
                                    </button>
                                </div>
                            </td>

                            <td class="invert"><?php echo $item->discount; ?>%</td>
                            <td class="invert">&#8377;<?php echo $discountedPrice; ?></td>
                            <td class="invert" id="netprice-<?php echo $item->id; ?>">
                                &#8377;<?php echo $netprice; ?></td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1">
                                        <a
                                                onclick="return confirm('Are you sure you want to Delete?')"
                                                href="deleteCart.php?q=<?php echo $item->id; ?>"><i
                                                    class="fas fa-trash-alt text-danger"></i></a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card w-25 float-right mt-3">
            <div class="card-header bg-warning text-muted">
                Grand Total
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        Total
                    </div>
                    <div class="col-sm-6 border border-right">&#8377;<span
                                id="grandTotal"><?php echo $grandTotal; ?></span></div>
                    <input type="hidden" id="grandTotalwer" value="<?php echo $grandTotal; ?>">
                    <input type="hidden" id="emailid" value="<?php echo $user_row["email"]; ?>">
                    <input type="hidden" id="mobile" value="<?php echo $user_row["mobile"]; ?>">
                </div>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Add a new Details</h4>
                <form action="insertPayment.php" method="post" id="checkoutForm"
                      class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                        <div class="controls">
                                            <textarea id="address" data-rule-required="true" class="form-control"
                                                      data-msg-required="Enter a valid address so that we can reach you"
                                                      cols="10" rows="5" name="address" placeholder="Enter full address"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_right form-group">

                                    <div class="controls">
                                        <select name="city" data-rule-required="true" class="option-w3ls"
                                                data-msg-required="City must be selected" id="town">
                                            <option value="">--Choose City--</option>
                                            <option value="Ajnala">Ajnala</option>
                                            <option value="Amritsar">Amritsar</option>
                                            <option value="Bathinda">Bathinda</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Hoshiarpur">Hoshiarpur</option>
                                            <option value="Jalandhar">Jalandhar</option>
                                            <option value="Jandiala">Jandiala</option>
                                            <option value="Kapurthala">Kapurthala</option>
                                            <option value="Kharar">Kharar</option>
                                            <option value="Ludhiana">Ludhiana</option>
                                            <option value="Nawanshahr">Nawanshahr</option>
                                            <option value="Panchkula">Panchkula</option>
                                            <option value="Pathankot">Pathankot</option>
                                            <option value="Rajpura">Rajpura</option>
                                            <option value="Roorkee">Roorkee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_right form-group">
                                    <div class="controls">
                                        <input type="text" id="zipcode" class="form-control" name="zipcode"
                                               data-rule-required="true"
                                               data-msg-required="Please enter a valid zip code or postal code"
                                               placeholder="Postcode / ZIP" minlength="6" maxlength="6"
                                               data-rule-number="true">
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls">
                                        <textarea name="remarks" class="form-control" id="remarks" cols="10" rows="5"
                                                  placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                   class="custom-control-input" checked/>
                                            <label class="custom-control-label" for="cashon">
                                                Cash On Delivery
                                            </label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="Online"
                                                   class="custom-control-input"/>
                                            <label class="custom-control-label" for="directbank">Online</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Make your payment directly into our bank account. Please use your Order
                                            ID as the payment reference. Your order will not be shipped until the
                                            funds have cleared in our account..</p>
                                    </div>
                                </div>

                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" checked class="custom-control-input"
                                               id="terms"/>
                                        <label class="custom-control-label" for="terms">I have read and agree to
                                            the website <a href="index.php">terms and conditions.</a></label>
                                    </div>
                                    <!--                                        <button type="submit" id="placeOrder" class="btn btn-sqr">Place Order</button>-->
                                    <button class="submit check_out btn" type="submit" id="placeOrder">
                                        Proceed To Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //checkout page -->

<?php include_once 'footer.php'; ?>

</body>
</html>
