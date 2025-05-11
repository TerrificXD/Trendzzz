<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php
        include_once 'headerfiles.html';
    ?>
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
</head>
<body>
<?php
include_once 'adminheader.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <h1>All Orders</h1>
    </div>

    <br>
    <div class="row mt-4 col-sm-12">
        <div id="accordion">
            <h3>Pending</h3>
            <!--            <div>-->
            <!--                <div class="" id="tab_pending">-->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                    <th class="text-center">Order Remarks</th>
                    <th class="text-center text-primary" colspan="2">Controls</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='pending'";
                $result = mysqli_query($conn, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-dark"><?php echo $order["remarks"]; ?></td>

                        <td class="text-center text-info"><a class="text-success"
                                                             href="vieworderdetail.php?q=<?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=<?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                        <td class="text-center text-success"><a class="text-info"
                                                                href="shiporder.php?q=<?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=<?php echo $order['mobile']; ?>">Ship
                                Order</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <!--                </div>-->
            <!--            </div>-->

            <h3>Shipped</h3>
            <!--            <div>-->
            <!--                <div class="" id="tab_shipped">-->
            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                    <th class="text-center text-primary" colspan="2">Controls</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='shipped'";
                $result = mysqli_query($conn, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td>
                            <strong class="btn btn-info"
                                    onclick="showmodal('<?php echo $order['id']; ?>')">Deliever Order</strong>

                        </td>
                        <td class="text-center text-info"><a
                                    href="vieworderdetail.php?q=<?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=<?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <!--                </div>-->
            <!--            </div>-->
            <h3>Delievered</h3>
            <!--            <div>-->
            <!--                <div class="" id="tab_delievered">-->
            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k = 0;
                $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='delievered'";
                $result = mysqli_query($conn, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-info"><a class="text-info"
                                                             href="vieworderdetail.php?q=
                                <?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=
                                <?php echo $order['mobile']; ?>">View
                                Detail</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <!--                </div>-->
            <!--            </div>-->
            <h3>Cancelled</h3>
            <!--            <div>-->
            <!--                <div class="" id="tab_cancelled">-->
            <table class="table table-bordered">
                <thead>
                <tr>

                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Date Time</th>
                    <th class="text-center">Grand Total</th>
                    <th class="text-center">Payment Mode</th>
                    <th class="text-center">User Detail</th>
                    <th class="text-center">Remarks</th>
                    <TH>Controls</TH>
                </tr>
                </thead>
                <tbody>
                <?php
                $fullname = "";
                $mobile = "";
                $k = 0;
                $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='cancelled'";
                $result = mysqli_query($conn, $sql1);
                while ($order = mysqli_fetch_array($result)) {
                    $k++;
                    ?>
                    <tr>
                        <td class="text-center text-dark"><?php echo $k; ?></td>
                        <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                        <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                        <td class="text-center text-dark">
                            <div class="row"><?php echo $order["email"]; ?></div>
                            <div class="row"><?php echo $order["fullname"]; ?></div>
                            <div class="row"><?php echo $order["mobile"]; ?></div>
                        </td>
                        <td class="text-center text-dark"><?php echo $order["returnremarks"]; ?></td>
                        <td class="text-center text-info"><a class="text-info"
                                                             href="vieworderdetail.php?q=
                                <?php echo $order['id']; ?>&r=<?php echo $order['fullname']; ?>&s=
                                <?php echo $order['mobile']; ?>">View Detail</a></td>
                    </tr>
                    <?php
                    $mobile = $order["mobile"];
                    $fullname = $order["fullname"];
                }
                ?>
                </tbody>
            </table>
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <!--        <div class="col-lg-12">-->
        <!--            <div class="product-review-info" id="tabs">-->
        <!--                <ul class="nav review-tab">-->
        <!--                    <li>-->
        <!--                        <a data-toggle="tab" class="" href="#tab_pending">Pending </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a data-toggle="tab" href="#tab_shipped">Shipped </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a data-toggle="tab" href="#tab_delievered">Delievered </a>-->
        <!--                    </li>-->
        <!--                    <li>-->
        <!--                        <a data-toggle="tab" href="#tab_cancelled">Cancelled </a>-->
        <!--                    </li>-->
        <!--                </ul>-->
        <!--                <div class="tab-content reviews-tab" id="">-->
        <!--                    <div class="tab-pane fade" id="tab_pending">-->
        <!--                        <table class="table table-bordered">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!--                                <th class="text-center">Sr No.</th>-->
        <!--                                <th class="text-center">Order No.</th>-->
        <!--                                <th class="text-center">Date Time</th>-->
        <!--                                <th class="text-center">Grand Total</th>-->
        <!--                                <th class="text-center">Payment Mode</th>-->
        <!--                                <th class="text-center">User Detail</th>-->
        <!--                                <th class="text-center text-primary" colspan="2">Controls</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            --><?php
        //                            $k = 0;
        //                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='pending'";
        //                            $result = mysqli_query($conn, $sql1);
        //                            while ($order = mysqli_fetch_array($result)) {
        //                                $k++;
        //                                ?>
        <!--                                <tr>-->
        <!--                                    <td class="text-center text-dark">--><?php //echo $k; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["id"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["datetime"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["grandtotal"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["paymentmethod"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <!--                                        <div class="row">--><?php //echo $order["email"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["fullname"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["mobile"]; ?><!--</div>-->
        <!--                                    </td>-->
        <!--                                    <td class="text-center text-info"><a-->
        <!--                                                href="vieworderdetail.php?q=-->
        <?php //echo $order['id']; ?><!--&r=--><?php //echo $order['fullname']; ?><!--&s=-->
        <?php //echo $order['mobile']; ?><!--">View-->
        <!--                                            Detail</a></td>-->
        <!--                                    <td class="text-center text-success"><a-->
        <!--                                                href="shiporder.php?q=-->
        <?php //echo $order['id']; ?><!--&r=--><?php //echo $order['fullname']; ?><!--&s=-->
        <?php //echo $order['mobile']; ?><!--">Ship-->
        <!--                                            Order</a>-->
        <!--                                    </td>-->
        <!--                                </tr>-->
        <!--                                --><?php
        //                            }
        //                            ?>
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                    <div class="tab-pane fade" id="tab_shipped">-->
        <!--                        <table class="table table-bordered">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!---->
        <!--                                <th class="text-center">Sr No.</th>-->
        <!--                                <th class="text-center">Order No.</th>-->
        <!--                                <th class="text-center">Date Time</th>-->
        <!--                                <th class="text-center">Grand Total</th>-->
        <!--                                <th class="text-center">Payment Mode</th>-->
        <!--                                <th class="text-center">User Detail</th>-->
        <!--                                <th class="text-center text-primary" colspan="2">Controls</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            --><?php
        //                            $k = 0;
        //                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='shipped'";
        //                            $result = mysqli_query($conn, $sql1);
        //                            while ($order = mysqli_fetch_array($result)) {
        //                                $k++;
        //                                ?>
        <!--                                <tr>-->
        <!--                                    <td class="text-center text-dark">--><?php //echo $k; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["id"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["datetime"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["grandtotal"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["paymentmethod"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <!--                                        <div class="row">--><?php //echo $order["email"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["fullname"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["mobile"]; ?><!--</div>-->
        <!--                                    </td>-->
        <!--                                    <td>-->
        <!--                                        <strong class="btn btn-info"-->
        <!--                                                onclick="showmodal('-->
        <?php //echo $order['id']; ?><!--')">Order Received</strong>-->
        <!---->
        <!--                                    </td>         -->
        <!--        <td class="text-center text-info"><a-->
        <!--                                               href="vieworderdetail.php?q=-->
        <?php ////echo $order['id']; ?><!--&r=--><?php ////echo $order['fullname']; ?><!--&s=-->
        <?php ////echo $order['mobile']; ?><!--">View-->
        <!--                                            Detail</a></td>-->
        <!--                                </tr>-->
        <!--                                --><?php
        //                            }
        //                            ?>
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                    <div class="tab-pane fade" id="tab_delievered">-->
        <!--                        <table class="table table-bordered">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!---->
        <!--                                <th class="text-center">Sr No.</th>-->
        <!--                                <th class="text-center">Order No.</th>-->
        <!--                                <th class="text-center">Date Time</th>-->
        <!--                                <th class="text-center">Grand Total</th>-->
        <!--                                <th class="text-center">Payment Mode</th>-->
        <!--                                <th class="text-center">User Detail</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            --><?php
        //                            $k = 0;
        //                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='delievered'";
        //                            $result = mysqli_query($conn, $sql1);
        //                            while ($order = mysqli_fetch_array($result)) {
        //                                $k++;
        //                                ?>
        <!--                                <tr>-->
        <!--                                    <td class="text-center text-dark">--><?php //echo $k; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["id"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["datetime"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["grandtotal"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["paymentmethod"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <!--                                        <div class="row">--><?php //echo $order["email"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["fullname"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["mobile"]; ?><!--</div>-->
        <!--                                    </td>-->
        <!--                                                                        <td class="text-center text-info"><a-->
        <!--                                                                                   href="vieworderdetail.php?q=-->
        <!--                                    --><?php ////echo $order['id'];?><!--&r=-->
        <?php ////echo $order['fullname'];?><!--&s=-->
        <!--                                    --><?php ////echo $order['mobile'];?><!--">View-->
        <!--                                                                                Detail</a></td>-->
        <!--                                </tr>-->
        <!--                                --><?php
        //                            }
        //                            ?>
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                    <div class="tab-pane fade" id="tab_cancelled">-->
        <!--                        <table class="table table-bordered">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!---->
        <!--                                <th class="text-center">Sr No.</th>-->
        <!--                                <th class="text-center">Order No.</th>-->
        <!--                                <th class="text-center">Date Time</th>-->
        <!--                                <th class="text-center">Grand Total</th>-->
        <!--                                <th class="text-center">Payment Mode</th>-->
        <!--                                <th class="text-center">User Detail</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody>-->
        <!--                            --><?php
        //                            $fullname ="";
        //                            $mobile ="";
        //                            $k = 0;
        //                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='cancelled'";
        //                            $result = mysqli_query($conn, $sql1);
        //                            while ($order = mysqli_fetch_array($result)) {
        //                                $k++;
        //                                ?>
        <!--                                <tr>-->
        <!--                                    <td class="text-center text-dark">--><?php //echo $k; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["id"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["datetime"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["grandtotal"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <?php //echo $order["paymentmethod"]; ?><!--</td>-->
        <!--                                    <td class="text-center text-dark">-->
        <!--                                        <div class="row">--><?php //echo $order["email"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["fullname"]; ?><!--</div>-->
        <!--                                        <div class="row">--><?php //echo $order["mobile"]; ?><!--</div>-->
        <!--                                    </td>-->
        <!--                                                                       <td class="text-center text-info"><a-->
        <!--                                                                                    href="vieworderdetail.php?q=-->
        <!--                                    --><?php ////echo $order['id'];?><!--&r=-->
        <?php ////echo $order['fullname'];?><!--&s=-->
        <!--                                    --><?php ////echo $order['mobile'];?><!--">View-->
        <!--                                                                                Detail</a></td>-->
        <!--                                </tr>-->
        <!--                                --><?php
        //                               $mobile =$order["mobile"];
        //                               $fullname =$order["fullname"];
        //                            }
        //                            ?>
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>

    <div class="modal" id="modaldetail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="row justify-content-center mt-4">
                        <h1>Order Received By: </h1>
                    </div>
                </div>
                <div class="modal-body justify-content-center">
                    <form action="orderreceivedaction.php" method="post">
                        <div class="row offset-3 col-sm-6 mt-4">
                            <input type="text" name="person" id="person" class="form-control">
                        </div>
                        <div class="row offset-3 col-sm-6 mt-4">
                            <input type="hidden" name="billid" value="" id="billid">
                            <input type="hidden" value="<?php echo $fullname; ?>" class="form-control" name="fullname"
                                   id="fullname">
                            <input type="hidden" value="<?php echo $mobile; ?>" class="form-control" name="mobile"
                                   id="mobile">

                            <input type="submit" name="" id="" value="Add"
                                   class="w-50 h-100 btn btn-success text-primary">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
        <script>
            function showmodal(bid) {
                document.getElementById("billid").value = bid;
                $("#modaldetail").modal("show");

            }
        </script>

    </div>
    <!--    <div id="datewiseorder" class="table-responsive"></div>-->

</div>
<?php
include_once 'adminfooter.php';
?>
</body>
</html>
<?php
