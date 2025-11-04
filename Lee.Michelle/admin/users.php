<?php

include "../lib/php/functions.php";

$filename = "../data/users.json";
$users = file_get_json($filename);

$empty_user = (object)[
    "name" => "",
    "type" => "",
    "email" => "",
    "phone" => "",
    "classes" => []
];

// Crud
if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        //  Update User
        case "update":
            $id = $_GET['id'];
            if (isset($users[$id])) {
                $users[$id]->name = $_POST['user-name'];
                $users[$id]->type = $_POST['user-type'];
                $users[$id]->email = $_POST['user-email'];
                $users[$id]->phone = $_POST['user-phone'];
                $users[$id]->classes = explode(", ", $_POST['user-classes']);
            }

            file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));
            header("Location: {$_SERVER['PHP_SELF']}?id={$id}");
            exit;
            break;


        // Add User
        case "create":
            $empty_user->name = $_POST['user-name'];
            $empty_user->type = $_POST['user-type'];
            $empty_user->email = $_POST['user-email'];
            $empty_user->phone = $_POST['user-phone'];
            $empty_user->classes = explode(", ", $_POST['user-classes']);

            $users[] = $empty_user;
            file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));

            $id = count($users) - 1;
            header("Location: {$_SERVER['PHP_SELF']}?id={$id}");
            exit;
            break;

        // - Delete User
        case "delete":
            $id = $_GET['id'];
            if (isset($users[$id])) {
                array_splice($users, $id, 1);
                file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));
            }
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
            break;
    }
}

//  User Page Function
function showUserPage($user) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $is_new = $id == "new";
    $action = $is_new ? "create" : "update";
    $button_text = $is_new ? "Add User" : "Save Changes";
    $delete_button = $is_new ? "" : "<a href='{$_SERVER['PHP_SELF']}?action=delete&id={$id}' class='pill-button' style='background:red;'>Delete</a>";
    $title = $is_new ? "Add New User" : "Edit User";
    $classes = implode(", ", $user->classes);

    // --- Display (Left Side) ---
    $display = $is_new ? "" : <<<HTML
        <h2>{$user->name}</h2>
        <div><strong>Type:</strong> {$user->type}</div>
        <div><strong>Email:</strong> {$user->email}</div>
        <div><strong>Phone:</strong> {$user->phone}</div>
        <div><strong>Classes:</strong> {$classes}</div>
    HTML;

    // --- Form (Right Side) ---
    $form = <<<HTML
        <h2>$title</h2>
        <form method="post" action="{$_SERVER['PHP_SELF']}?action={$action}&id={$id}">
          <div class="form-control">
            <label class="form-label">Name</label>
            <input type="text" name="user-name" value="{$user->name}" class="form-input" placeholder="Full Name">
          </div>

          <div class="form-control">
            <label class="form-label">Type</label>
            <input type="text" name="user-type" value="{$user->type}" class="form-input" placeholder="Role (Admin, Student, etc.)">
          </div>

          <div class="form-control">
            <label class="form-label">Email</label>
            <input type="email" name="user-email" value="{$user->email}" class="form-input" placeholder="example@domain.com">
          </div>

          <div class="form-control">
            <label class="form-label">Phone Number</label>
            <input type="text" name="user-phone" value="{$user->phone}" class="form-input" placeholder="(123) 456-7890">
          </div>

          <div class="form-control">
            <label class="form-label">Classes</label>
            <input type="text" name="user-classes" value="{$classes}" class="form-input" placeholder="608, 617, 620">
          </div>

          <div class="pill-button-container">
            <a href="#" class="pill-button" onclick="this.closest('form').submit(); return false;">$button_text</a>
            $delete_button
          </div>
        </form>
    HTML;

    $output = $id == "new" ? $form :
    "<div class='grid gap'>
        <div class='col-xs-12 col-md-7'>$display</div>
        <div class='col-xs-12 col-md-5'>$form</div>
    </div>";

    echo <<<HTML
    $output
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
        <li><a href="<?=$_SERVER['PHP_SELF']?>?id=new" class="pill-button">Add New User</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="container">
  <div class="back-button-container">
    <?php if (isset($_GET['id'])) { ?>
      <a href="<?=$_SERVER['PHP_SELF']?>" class="pill-button back-button">← Go back</a>
    <?php } ?>

    <div class="card soft">
      <?php
      if (isset($_GET['id'])) {
          $id = $_GET['id'];
          showUserPage($id == "new" ? $GLOBALS['empty_user'] : $GLOBALS['users'][$id]);
      } else {
      ?>
        <h2>User List</h2>
        <nav class="nav">
          <ul>
            <?php
            for ($i = 0; $i < count($GLOBALS['users']); $i++) {
              $url = $_SERVER['PHP_SELF'] . "?id=$i";
              echo "<li><a href='$url'>{$GLOBALS['users'][$i]->name}</a></li>";
            }
            ?>
          </ul>
        </nav>
      <?php } ?>
    </div>
  </div>
</div>

</body>
</html>