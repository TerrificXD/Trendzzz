<footer>
    <div class="footer-top-first">
        <div class="container py-md-5 py-sm-4 py-3">
            <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                <div class="col-md-6 offer-footer">
                    <div class="row">
                        <div class="col-4 icon-fot">
                            <i class="fas fa-dolly"></i>
                        </div>
                        <div class="col-8 text-form-footer">
                            <h3>Free Shipping</h3>
                            <p>on orders over $100</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offer-footer">
                    <div class="row">
                        <div class="col-4 icon-fot">
                            <i class="far fa-thumbs-up"></i>
                        </div>
                        <div class="col-8 text-form-footer">
                            <h3>Big Choice</h3>
                            <p>of Products</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //footer second section -->
        </div>
    </div>
    <!-- footer third section -->
    <div class="w3l-middlefooter-sec">
    </div>
    <!-- //footer third section -->
</footer>

<div class="copy-right py-3">
    <div class="container">
        <p class="text-center text-white">© 2021 Trendezz. </p>
    </div>
</div>

<script src="templatefiles/js/jquery.min.js"></script>
<script src="templatefiles/js/bootstrap.js"></script>
<script src="templatefiles/js/popper.js"></script>
<script src="templatefiles/dist/jquery.validate.js"></script>
<script src="templatefiles/dist/additional-methods.js"></script>
<script src="templatefiles/myjs/myjsforshowpassword.js"></script>
<script src="templatefiles/myjs/myscript.js"></script>
<script src="templatefiles/myjs/myjsforformvalidator.js"></script>
<script src="templatefiles/myjs/imageswaping.js"></script>
<script src="templatefiles/js/myscript.js"></script>
<link rel="stylesheet" href="templatefiles/UI/jquery-ui.css">
<script src="templatefiles/UI/jquery-ui.js"></script>
<!--<script src="templatefiles/js/jquery-2.2.3.min.js"></script>-->

<!-- nav smooth scroll -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="templatefiles/js/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- //popup modal (for location)-->

<!-- cart-js -->
<script src="templatefiles/js/minicart.js"></script>
<script>
    paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

    paypals.minicarts.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>
<!-- //cart-js -->

<!-- scroll seller -->
<script src="templatefiles/js/scroll.js"></script>
<!-- //scroll seller -->

<!-- smoothscroll -->
<script src="templatefiles/js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="templatefiles/js/move-top.js"></script>
<script src="templatefiles/js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="templatefiles/js/bootstrap.js"></script>
<!-- //for bootstrap working -->

