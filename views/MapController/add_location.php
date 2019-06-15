<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>
<?php include(dirname(__DIR__) . '/navbar.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="panel-header">ADD LOCATION</h1>
            <hr>

            <form action="?page=add_location" method="POST">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">email</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="name" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="address" type="text" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLat" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="number" name="latitude" class="form-control" id="inputLat" placeholder="latitude" type="number" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLng" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="number" name="longtitude" class="form-control" id="inputLng" placeholder="longtitude" type="number" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email" type="text"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputWebpage" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">person</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="url" name="url" class="form-control" id="inputWebpage" placeholder="url" type="url"/>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary btn-lg float-right" />
                <p>
                    <a href="?page=index"> Return to main page</a>
                </p>
            </form>
        </div>
    </div>
</div>