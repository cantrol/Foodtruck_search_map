<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<div class="container">
    <div class="row">
        <h1 class="col-12 pl-0">ADMIN PANEL</h1>

        <h4 class="mt-4">Your data:</h4>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $user->getName(); ?></td>
                <td><?= $user->getSurname(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getRole(); ?></td>
                <td>-</td>
            </tr>
            </tbody>
            <tbody class="users-list">
            </tbody>
        </table>

        <?php if(isset($_SESSION) && ($_SESSION['role'] == "ROLE_ADMIN")): ?>
        <button class="btn btn-dark btn-lg" type="button" onclick="getUsers()">Get all users</button>
        <?php endif; ?>

        <button class="btn btn-dark btn-lg" type="button" onclick="window.location = '?page=index'">Exit</button>
    </div>
</div>

</body>
</html>

