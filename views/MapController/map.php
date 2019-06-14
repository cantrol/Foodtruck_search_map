<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>
<?php include(dirname(__DIR__) . '/navbar.php'); ?>
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