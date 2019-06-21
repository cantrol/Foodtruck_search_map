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
        #allData{
            display:none;
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
    <?php
    $plc = new PlaceMapper;
    $allData = $plc->get_all_places();
    $allData = json_encode($allData,true);
    ?>
    <div id ="map"</div>
</div>
<p>
    <?php if(isset($_SESSION) && !empty($_SESSION)): ?>
    Add place? <a href="?page=add_location">Add Location</a> <br/>
    <?php endif; ?>
</p>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Type</th>
        <th>Datetime added</th>
        <th>Email address</th>
        <th>Webpage</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>

    </tr>
    </tbody>
    <tbody class="places-list">
    </tbody>
</table>

<?php if(isset($_SESSION) && ($_SESSION['role'] == "ROLE_ADMIN")): ?>
    <button class="btn btn-dark btn-lg" type="button" onclick="get_all_places()">Get all places</button>
<?php endif; ?>

</body>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClgfQbPyK1A6HoUhIqVA0AJUF2IB0cAZc&callback=LoadMap">
    </script>
</html>