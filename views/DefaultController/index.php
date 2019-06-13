<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__).'/navbar.html'); ?>

<div class="container">
    <div class="row">
        <h1 class="col-12">HOMEPAGE</h1>
        <p>
            <?= $text ?>
            <html>
            <body>

            <h1>My First Google Map</h1>

            <div id="googleMap" style="width:100%;height:400px;"></div>

            <script>
                function myMap() {
                    var mapProp= {
                        center:new google.maps.LatLng(51.508742,-0.120850),
                        zoom:5,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClgfQbPyK1A6HoUhIqVA0AJUF2IB0cAZc&callback=myMap"></script>

            </body>
            </html>
        </p>


        <?php
        if(isset($_SESSION) && !empty($_SESSION)) {
            print_r($_SESSION);
        }
        ?>

        <div class="position">
            <div id="turquise" class="static">Static</div>
            <div id="blue" class="static">Static</div>
            <div id="violet" class="relative">Relative</div>

            <div id="red" class="fixed">Fixed</div>
            <div id="yellow">Default</div>
        </div>
    </div>
</div>

</body>
</html>