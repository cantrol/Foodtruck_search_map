<!DOCTYPE html>
<html>
<div class="absolute">
    <div class="container">
        <div class="row">
            <ul>
                <li><a class="active" href="?page=index">Home</a></li>
                <li><a href="?page=map">Streetfood map</a></li>
                <?php if(isset($_SESSION) && !empty($_SESSION)): ?>
                <li><a href="?page=admin">User settings</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION) && !empty($_SESSION)): ?>
                <li><a href="?page=logout">Logout</a></li>
                <?php else: ?>
                <li><a href="?page=login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
</html>