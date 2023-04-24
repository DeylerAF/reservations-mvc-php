<!DOCTYPE html>
<html>
<head>
    <title>User CRUD</title>
</head>
<body>
    <h1>User CRUD</h1>

    <h2>Add User</h2>
    <form method="post" action="controller.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="add_user" value="Add User">
    </form>

    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td>
                        <form method="post" action="controller.php">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="submit" name="update_user" value="Edit">
                            <input type="submit" name="delete_user" value="Delete" onclick="return confirm('Are you sure?')">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
