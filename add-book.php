<?php 
session_start();
  include "php/dp/conn.php";
  include "php/getcategory.php";
  include "php/getauthor.php";
  $categories= get_all_category($conn);
  $authors=get_all_authors($conn);
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
  <form method="POST" enctype="multipart/form-data" action="php/add-book.php" class="shadow p-4  rounded mt-5"
    style="width: 90%;max-width: 50rem;">
        <h1 class="text-center p-5 display-4 fs-3"> Add Book</h1>
        <div class="mb-3">
            <label for ="form-control">book title</label>
        <input type="text" class="form-control" required name="book_title">
      </div>
        <div class="mb-3">
            <label for ="form-control">book description</label>
        <input type="text" class="form-control" required name="book_description">
      </div>
      <div class="mb-3">
            <label for ="form-control">book author</label>
        <select class="form-control" required name="author_id">
          <option value="0">select author</option>
            <?php foreach($authors as $author){?>
            <option value="<?=$author['id']?>"><?=$author['name']?></option>
            <?php }?>
        </select>
      </div>
        <div class="mb-3">
            <label for ="form-control">book category</label>
        <select class="form-control" name="category_id" required>
          <option value="0">select catecory</option>
          <?php foreach($categories as $category){?>
          <option value="<?=$category['id']?>"><?=$category['name']?></option>
          <?php }?>
        </select>
      </div>
        <div class="mb-3">
            <label for ="form-control">book cover</label>
        <input type="file" class="form-control" name="cover">
      </div>
        <div class="mb-3">
            <label for ="form-control">book file</label>
        <input type="file" class="form-control" name="book_file" >
      </div>
        
        <input type="submit" value="add book" class="btn btn-primary" name="submit">
    </form>
</body>
</html>
