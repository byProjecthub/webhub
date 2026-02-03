<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Banquet Booking System | Book Services</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- //font -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
</head>
<body>
<!-- banner -->
<div class="banner jarallax">
    <div class="agileinfo-dot">
        <?php include_once('includes/header.php');?>
        <div class="wthree-heading">
            <h2>Book Services</h2>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- contact -->
<div class="contact">
    <div class="container">
        <div class="agile-contact-form">
            <div class="col-md-6 contact-form-right">
                <div class="contact-form-top">
                    <h3>Book Services</h3>
                </div>
                <div class="agileinfo-contact-form-grid">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Booking From:</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" style="font-size: 20px" required="true" name="bookingfrom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Booking To:</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" style="font-size: 20px" required="true" name="bookingto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Type of Event:</label>
                            <div class="col-md-10">
                                <select type="text" class="form-control" name="eventtype" required="true" id="eventtype">
                                    <option value="">Choose Event Type</option>
                                    <?php
                                    $sql2 = "SELECT * from tbleventtype ";
                                    $query2 = $dbh->prepare($sql2);
                                    $query2->execute();
                                    $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result2 as $row) {
                                        ?>
                                        <option value="<?php echo htmlentities($row->EventType); ?>"><?php echo htmlentities($row->EventType); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Number of Guests:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" style="font-size: 20px" required="true" name="nop" id="nop">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4">Message(if any)</label>
                            <div class="col-md-10">
                                <textarea class="form-control" required="true" name="message" style="font-size: 20px"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="tp">
                            <button type="submit" class="btn btn-primary" name="submit">Book</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //contact -->
<?php include_once('includes/footer.php');?>
<!-- jarallax -->
<script src="js/jarallax.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript">
    /* init Jarallax */
    $('.jarallax').jarallax({
        speed: 0.5,
        imgWidth: 1366,
        imgHeight: 768
    })
</script>
<!-- //jarallax -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<!-- //here ends scrolling icon -->
<script src="js/modernizr.custom.js"></script>

<script type="text/javascript">
    // JavaScript to update activity price based on the event type
    document.getElementById('eventtype').addEventListener('change', function() {
        const eventPriceMap = {
            'EventType1': 100, // Replace with actual event types and prices
            'EventType2': 150,
            'EventType3': 200,
        };
        const selectedEvent = this.value;
        const activityPriceInput = document.getElementById('activityPrice');

        if (eventPriceMap[selectedEvent]) {
            activityPriceInput.value = eventPriceMap[selectedEvent];
        } else {
            activityPriceInput.value = '';
        }
    });

    // JavaScript to calculate total price based on the number of guests
    document.getElementById('nop').addEventListener('change', function() {
        const activityPrice = parseFloat(document.getElementById('activityPrice').value);
        const numberOfGuests = parseInt(this.value);
        const totalPriceInput = document.getElementById('totalPrice');
        const total = activityPrice * numberOfGuests;

        if (!isNaN(total)) {
            totalPriceInput.value = total;
        } else {
            totalPriceInput.value = '';
        }
    });
</script>
</body>
</html>
