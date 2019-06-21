<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__) . '/navbar.php'); ?>

<div class="container">
    <div class="row">
        <h1 class="col-12">Hello to very alpha version of streetfood search map</h1>

        <?php
        if(isset($_SESSION) && !empty($_SESSION)) {
            print"<pre>";
            print_r($_SESSION);
            print"</pre>";
        }
        ?>
        <div class="position">

        </div>
    </div>
</div>

</body>
</html>