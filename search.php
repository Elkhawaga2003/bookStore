<?php
session_start();
if(!isset($_GET['key'])){
  header("location:index.php");
  exit;
}
$key=$_GET['key'];
  include "php/dp/conn.php";
  include "php/getBook.php";
  include "php/getauthor.php";
  include "php/getcategory.php";
  $books=search_book($conn,$key);
  $authors=get_all_authors($conn);
  $categores=get_all_category($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookStore</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">bookStore</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admain.php">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">about</a>
        </li>
          <?php if(isset($_SESSION['user_id'])){?>
            <li class="nav-item">
          <a class="nav-link " href="admain.php">Admain</a>
          </li>
        <?php }else{?>
           <li class="nav-item">
          <a class="nav-link " href="login.php">login</a>
          </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>
<br>
        Search result for <b><?php echo $key?></b>
        <div class="d-flex">
          <?php if($books==0){?>
              <div class="alert alert-warning text-center p-5" role="alert">
        <img src="img/empty-search.jpg" width="200">
        <br>
       there is no Books</div>
          <?php }else{ ?>
          <div class="pdf-list d-flex flex-warp ">
            <?php foreach($books as $book){?>
            <div class="card m-1">
              <img src="uploads/icons/<?=$book['cover']?>"
              class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?=$book['title']?></h5>
                <p class="card-text">
                  <i>
                    <b>By:
                      <?php foreach ($authors as $author) {
                        if($author['id']==$book['author_id'])
                          echo $author['name'];
                        break;
                      }?>
                    </b>
                  </i>
                  <br>
                  <?=$book['description']?></p>
                  <i>
                    <b>category:
                      <?php foreach ($categores as $category) {
                        if($category['id']==$book['catogray_id'])
                          echo $category['name'];
                        break;
                      }?>
                    </b>
                  </i>
                  <br>
                <a href="uploads/files/1984.pdf"class="btn btn-success">open</a>
                <a href="uploads/files/1984.pdf"class="btn btn-danger" download="The title">Download</a> 
              </div>
            </div>
          <?php }?>
          </div>
        <?php }?>
        </div>
    </header>
</body>

</html>