<!DOCTYPE html>
<html>
<body>

<?php include(dirname(__DIR__).'/head.html') ?>
<?php include(dirname(__DIR__) . '/navbar.php'); ?>


<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

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

<p>
    Add place? <a href="?page=add_location">Add Location</a> <br/>
</p>

</body>
</html>