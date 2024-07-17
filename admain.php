<?php 
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "php/dp/conn.php";
	include "php/getBook.php";
	include "php/getauthor.php";
	include "php/getcategory.php";
	$books=get_all_books($conn);
	$authors=get_all_authors($conn);
	$categores=get_all_category($conn);
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
<h10 class="container-fluid">
	 <script >
        let msg = document.querySelector('.container-fluid');
          msg.innerHTML = '<?php echo $_GET['x'];?>';
        setTimeout(() => msg.innerHTML = '', 5000);
        
    </script>
	</h10>
	<form action="search.php" 
	method="get" 
		style="width: 100%; max-width:30rem;">
		<div class="input-group my-5">
  <input type="text" class="form-control"
   placeholder="search Book...."
    aria-label="search Book...."
    aria-describedby="basic-addon2"
    name="key">
  <button class="input-group-text btn btn-primary"
   id="basic-addon2"> <img src="img/search-6380865_640.webp" width="20">
 </button>
</div>
	</form>
	<h4>All Books</h4>
	<table class="table table-bordered shadow">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Author</th>
				<th>Description</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if($books==0){
       ?>
       <div class="alert alert-warning text-center p-5" role="alert">
				<img src="img/OIP.jpg" width="100">
				<br>
       there is no books</div>
       <?php
			}else{
			$i=0;
			foreach ($books as $book) {
			$i++;
			?>
			<tr>
			<td><?=$i?></td>
			<td>
				<img width=100 src="uploads/icons/<?=$book['cover'];?>">
				<a class="link-dark  text-center"
				 href="uploads/files/<?=$book['file']?>"><?=$book['title']?></a>
				</td>
			<td>
				<?php if($authors==0){
				echo "undefined";
					}else{
						foreach($authors as $author){
					if($author['id']==$book['author_id']){
						echo $author['name'];
					}
				}
				} ?>
				
				
			</td>
			<td><?=$book['description']?></td>
			<td><?php
				if($categores==0){
					echo "undefined";
				}else{
					foreach($categores as $category){
						if($category['id']==$book['catogray_id']){
							echo $category['name'];
						}else{
							echo "undefined";	
						}
					}
				}
			?>
			</td>
			<td>
				<a href="php/delet-book.php?id=<?=$book['id']?>" class="btn btn-danger">Delete</a>
				<a href="edite-book.php?id=<?=$book['id']?>" class="btn btn-warning">Edite</a>
			</td>
		</tr>
	<?php }}?>
		</tbody>
	</table>
	<h4>All Categories</h4>
	<table class="table table-bordered shadow">
		<thead>
			<tr>
				<th>#</th>
				<th>category name</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$k=0;
				if($categores==0){
					?>
					    <div class="alert alert-warning text-center p-5" role="alert">
				<img src="img/OIP.jpg" width="100">
				<br>
       there is no categores</div>
       <?php 
				}else{
				foreach ($categores as $category) {
					$k++;
					 ?>
				<td><?=$k?></td>
				<td><?=$category['name']?></td>
				<td><a href="php/delete-category.php?id=<?=$category['id']?>" class="btn btn-danger">Delete</a>
				<a href="edite-category.php?id=<?=$category['id']?>" class="btn btn-warning">Edite</a></td>
			</tr>
		<?php }}?>
		</tbody>
	</table>
	<h4>All authors</h4>
	<table class="table table-bordered shadow">
		<thead>
			<tr>
				<th>#</th>
				<th>author name</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$k=0;
					if($authors==0){
					?>
					    <div class="alert alert-warning text-center p-5" role="alert">
				<img src="img/OIP.jpg" width="100">
				<br>
       there is no authors</div>
       <?php 
				}else{
				foreach ($authors as $author) {
					$k++;
					 ?>
				<td><?=$k?></td>
				<td><?=$author['name']?></td>
				<td><a href="php/delete-author.php?id=<?=$author['id']?>" class="btn btn-danger">Delete</a>
				<a href="edite-author.php?id=<?=$author['id']?>" class="btn btn-warning">Edite</a></td>
			</tr>
		<?php }}?>
		</tbody>
	</table>
</body>

</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>