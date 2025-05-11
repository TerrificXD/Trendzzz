<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>

<?php
include_once 'userheader.php';
?>

<div class="container">
    <div class="py-4">
        <h2 class="text-danger text-center">My Orders</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Sr no.</th>
                <th>Bill id</th>
                <th>Bill Date</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Grand Total</th>
                <th>Status</th>
                <th>View Detail</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $k = 0;
            $order = "SELECT * FROM `bill` where email='$email'";
            $result = mysqli_query($conn, $order);
            while ($bill = mysqli_fetch_array($result)) {
                $k++;
                ?>
                <tr>
                    <td><?php echo $k; ?></td>
                    <td><?php echo $bill["id"]; ?></td>
                    <td><?php echo $bill["datetime"]; ?></td>
                    <td><?php echo $bill["address"] . "   " . $bill["city"] . "   " . $bill["zipcode"]; ?></td>
                    <td><?php echo $bill["paymentmethod"]; ?></td>
                    <td><?php echo $bill["grandtotal"]; ?></td>
                    <td><?php echo $bill["status"]; ?></td>
                    <td>
                        <a href="billdetail.php?q=<?php echo $bill["id"]; ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
