<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
include "php/dp/conn.php";
include "php/getauthor.php";
$id=$_GET['id'];
$author=get_authorBy_id($conn,$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="admain.php">admain</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="add-book.php">add Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add-category.php">addCategory</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add-author.php">add Author</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="logout.php">log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <form method="POST" action="php/edite-author.php" class="shadow p-4 rounded mt-5"
    style="width: 90%;max-width: 50rem;">
        <h1 class="text-center p-5 display-4 fs-3"> Edite author</h1>
        <div class="mb-3">
            <label for ="form-control">authorName</label>
        <input type="text" class="form-control" hidden name="author_id" value="<?=$author['id']?>">
        <input type="text" class="form-control" required name="author_name" value="<?=$author['name']?>">
        </div>
        <input type="submit" value="edite Author" class="btn btn-primary" name="submit">
    </form>
</body>
</html>
<?php }else{
  header("Location: login.php");
  exit;
} ?>