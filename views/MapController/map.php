<!DOCTYPE html>
<html>
<head>
    <title>Foodtruck search map</title>
    <link rel="stylesheet" href="/./public/css/style.css">
    <script type="text/javascript" src="/./public/js/googlemap.js"></script>
    <style type="text/css">
        .container
        {
            height: 450px;
        }
        #map
        {
            width: 100%;
            height: 100%;
            border: 1px solid blue;
        }
    </style>
</head>
<body>

<?php include(dirname(__DIR__).'/head.html') ?>
<?php include(dirname(__DIR__) . '/navbar.php'); ?>


<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="container">
    <center><h1>Foodtruck search map</h1></center>
    <div id ="map"</div>
</div>
<p>
    <?php if(isset($_SESSION) && !empty($_SESSION)): ?>
    Add place? <a href="?page=add_location">Add Location</a> <br/>
    <?php endif; ?>
</p>

    <?php
        $plc = new PlaceMapper;
        $coll = $plc->get_places();
        print"<pre>";
        print_r($coll);
        print"</pre>";
    ?>

</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClgfQbPyK1A6HoUhIqVA0AJUF2IB0cAZc&callback=myMap">
    </script>
</html>