<?php

include "../lib/php/functions.php";
$users = file_get_json("../data/users.json");


// Create User(s)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'create') {
    $new_user = (object)[
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "type" => $_POST['type'],
        "classes" => array_map('trim', explode(',', $_POST['classes']))
    ];

    $users[] = $new_user;
    file_put_contents("data/users.json", json_encode($users, JSON_PRETTY_PRINT));

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Update User(s)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id']) && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_GET['id'];
    if (isset($users[$id])) {
        $users[$id]->email = $_POST['email'];
        $users[$id]->phone = $_POST['phone'];
        $users[$id]->type = $_POST['type'];
        $users[$id]->classes = array_map('trim', explode(',', $_POST['classes']));
        file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT));
    }
    header("Location: {$_SERVER['PHP_SELF']}?id=$id");
    exit;
}


// Delete User(s)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (isset($users[$id])) {
        array_splice($users, $id, 1);
        file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT));
    }
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}


// User(s) Page
function showUserPage($user) {
    $classes = implode(", ", $user->classes);
    $id = $_GET['id'];

    echo <<<HTML
  <h2>{$user->name}</h2>
  <div><strong>Type:</strong> {$user->type}</div>
  <div><strong>Email:</strong> {$user->email}</div>
  <div><strong>Phone:</strong> {$user->phone}</div>
  <div><strong>Classes:</strong> {$classes}</div>

  <form method="post" action="{$_SERVER['PHP_SELF']}?id={$id}">
    <input type="hidden" name="action" value="update">

    <div class="form-control">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{$user->email}" class="form-input">
    </div>

    <div class="form-control">
      <label class="form-label">Phone Number</label>
      <input type="text" name="phone" value="{$user->phone}" class="form-input">
    </div>

    <div class="form-control">
      <label class="form-label">Type</label>
      <input type="text" name="type" value="{$user->type}" class="form-input">
    </div>

    <div class="form-control">
      <label class="form-label">Classes</label>
      <input type="text" name="classes" value="{$classes}" class="form-input">
    </div>

    <div class="pill-button-container">
      <a href="#" class="pill-button" onclick="this.closest('form').submit(); return false;">Save</a>
      <a href="{$_SERVER['PHP_SELF']}?delete={$id}" class="pill-button" style="background:red;">Delete</a>
    </div>
  </form>
HTML;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Admin Page</title>
  <?php include "../parts/meta.php"; ?>
</head>

<body>

<header class="navbar">
  <div class="container display-flex flex-align-center" style="justify-content: space-between;">
    <h1 class="site-title">User Admin</h1>
    <nav class="nav nav-flex flex-none">
      <ul class="display-flex">
        <li><a href="<?=$_SERVER['PHP_SELF']?>" class="pill-button">User List</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="container">
<div class="back-button-container">
  <?php if (isset($_GET['id']) && isset($users[$_GET['id']])) { ?>
    <a href="<?=$_SERVER['PHP_SELF']?>" class="pill-button back-button">← Go back</a>
  <?php } ?>
  
  <div class="card soft">
      <?php
      if (isset($_GET['id']) && isset($users[$_GET['id']])) {
        showUserPage($users[$_GET['id']]);
      } else {
      ?>
        <h2>User List</h2>
        <nav class="nav">
          <ul>
            <?php
            for ($i = 0; $i < count($users); $i++) {
              $url = $_SERVER['PHP_SELF'] . "?id=$i";
              echo "
                <li>
                  <a href='$url'>{$users[$i]->name}</a>
                </li>
              ";
            }
            ?>
          </ul>
        </nav>

        <hr>
        <h3>Add New User</h3>
        <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
          <input type="hidden" name="action" value="create">

          <div class="form-control">
            <label class="form-label">Name</label>
            <input type="text" name="name" required class="form-input" placeholder="Full Name">
          </div>

          <div class="form-control">
            <label class="form-label">Email</label>
            <input type="email" name="email" required class="form-input" placeholder="example@domain.com">
          </div>

          <div class="form-control">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-input" placeholder="(123) 456-7890">
          </div>

          <div class="form-control">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-input" placeholder="Role (Admin, Student, etc.)">
          </div>

          <div class="form-control">
            <label class="form-label">Classes</label>
            <input type="text" name="classes" class="form-input" placeholder="608, 617, 620">
          </div>

          <div class="pill-button-container">
            <a href="#" class="pill-button" onclick="this.closest('form').submit(); return false;">Add User</a>
          </div>
        </form>
      <?php } ?>
    </div>
  </div>
</div>

</body>
</html>
