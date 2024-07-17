<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

include "php/dp/conn.php";
include "php/getcategory.php";
include "php/getauthor.php";
include "php/getBook.php";
$id=$_GET['id'];
$book=get_bookBy_id($conn,$id);
$authors=get_all_authors($conn);
$categories=get_all_category($conn)
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
    <a class="navbar-brand" href="#">admain</a>
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
  <form method="POST" enctype="multipart/form-data" action="php/edite-book.php" class="shadow p-4  rounded mt-5"
    style="width: 90%;max-width: 50rem;">
        <h1 class="text-center p-5 display-4 fs-3"> Edite Book</h1>
        <div class="mb-3">
            <label for ="form-control">book title</label>
        <input type="text" class="form-control" required value="<?=$book['title']?>" name="book_title">
      </div>
        <div class="mb-3">
            <label for ="form-control">book description</label>
        <input type="text" class="form-control" required value="<?=$book['description']?>" name="book_description">
      </div>
      <div class="mb-3">
            <label for ="form-control">book author</label>
        <select class="form-control" required name="author_id">
          <option value="0">select author</option>
            <?php foreach($authors as $author){
            	if($book['author_id']==$author['id']){?>
            	<option selected value="<?=$author['id']?>"><?=$author['name']?></option>
            <?php }else{?>
            <option value="<?=$author['id']?>"><?=$author['name']?></option>
            <?php }}?>
        </select>
      </div>
        <div class="mb-3">
            <label for ="form-control">book category</label>
        <select class="form-control" name="category_id" required>
          <?php foreach($categories as $category){
          	if($book['catogray_id']==$category['id']){?>
          <option selected value="<?=$category['name']?></option>
          <?php }else{?>
          <option value="<?=$category['id']?>"><?=$category['name']?></option>
          <?php }}?>
        </select>
      </div>
        <div class="mb-3">
            <label for ="form-control">book cover</label>
            <input type="text" class="form-control" value="<?=$book['cover']?>" hidden name="current_cover">
        <input type="file" class="form-control" value="<?=$book['cover']?>" name="cover">
         <a href="uploads/icons/<?=$book['cover']?>" 
         	class="link-dark">current cover</a>
      </div>
        <div class="mb-3">
            <label for ="form-control">book file</label>
             <input type="text" class="form-control" value="<?=$book['file']?>" hidden name="current_file" >
        <input type="file" class="form-control" value="<?=$book['file']?>" name="book_file" >
        <a href="uploads/files/<?=$book['file']?>"
        	class="link-dark">current file</a>
      </div>
        <input hidden name="book_id" value="<?=$book['id']?>">
        <input type="submit" value="edite Book" class="btn btn-primary" name="submit">
    </form>
</body>
</html>
<?php }else{
  header("Location: login.php");
  exit;
} ?>