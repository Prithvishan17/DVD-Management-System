
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Buntong DVD Shop : DVD Movies</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
</head>
<body>

  <?php include_once 'nav_bar.php'; ?>
 
  <div class="container-fluid">
   

    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
       <input name="pid" type="text" class="form-control" id="productid" placeholder="DVD ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required> 
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
      <input name="name" type="text" class="form-control" id="productname" placeholder="DVD Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required> 
      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
      <input name="price" type="text" class="form-control" id="productprice" placeholder="DVD Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required> 
      </div>
        </div>
        
      <div class="form-group">
          <label for="productgenre" class="col-sm-3 control-label">Genre</label>
          <div class="col-sm-9">
      <select name="genre" class="form-control" id="productgenre" required>
        <option value="">Please select</option>
        <option value="Action" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Action") echo "selected"; ?>>Action</option>
        <option value="Animation" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Animation") echo "selected"; ?>>Animation</option>
        <option value="Comedy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Comedy") echo "selected"; ?>>Comedy</option>

        <option value="Crime" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Crime") echo "selected"; ?>>Crime</option>

        <option value="Drama" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Drama") echo "selected"; ?>>Drama</option>

        <option value="Fantasy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Fantasy") echo "selected"; ?>>Fantasy</option>

        <option value="Horror" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Horror") echo "selected"; ?>>Horror</option>

        <option value="Mystery" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Mystery") echo "selected"; ?>>Mystery</option>

        <option value="Romance" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Romance") echo "selected"; ?>>Romance</option>

        <option value="Science-Fiction" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Science-Fiction") echo "selected"; ?>>Science-Fiction</option>

        <option value="Thriller" <?php if(isset($_GET['edit'])) if($editrow['fld_product_genre']=="Thriller") echo "selected"; ?>>Thriller</option>
      </select> 
       </div>
      </div>
        <div class="form-group">
          <label for="productrating" class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-9">
      <select name="rating" class="form-control" id="productrating" required>
        <option value="">Please select</option>
        <option value="IMDB 1" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 1") echo "selected"; ?>>IMDB 1</option>
        
        <option value="IMDB 2" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 2") echo "selected"; ?>>IMDB 2</option>
        
        <option value="IMDB 3" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 3") echo "selected"; ?>>IMDB 3</option>

        <option value="IMDB 4" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 4") echo "selected"; ?>>IMDB 4</option>

        <option value="IMDB 5" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 5") echo "selected"; ?>>IMDB 5</option>

        <option value="IMDB 6" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 6") echo "selected"; ?>>IMDB 6</option>

        <option value="IMDB 7" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 7") echo "selected"; ?>>IMDB 7</option>

        <option value="IMDB 8" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 8") echo "selected"; ?>>IMDB 8</option>

        <option value="IMDB 9" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 9") echo "selected"; ?>>IMDB 9</option>

        <option value="IMDB 10" <?php if(isset($_GET['edit'])) if($editrow['fld_product_rating']=="IMDB 10") echo "selected"; ?>>IMDB 10</option>

      </select> 
       </div>
      </div>
        <div class="form-group">
          <label for="productyear" class="col-sm-3 control-label">Release Year</label>
          <div class="col-sm-9">
      <input name="year" type="text" class="form-control" id="productyear" placeholder="2001" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_release_date']; ?>" min="0.0" step="0.01" required> 
      </div>
        </div>  
      <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
      <input name="quantity" type="text" class="form-control" id="productq" placeholder="Insert an integer" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" min="0.0" step="0.01" required> 
       </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
     
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      </div>
      </div>
    </form>
    </div>
  </div>
<?php } ?>
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table id="example" class="table table-striped table-bordered">
        <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Genre</th>
        <th>Release Year</th>
        <th>Quantity</th>
        <th>IMDB Rating</th>
        <th>Actions</th>
    
      </tr>
      </thead>
      <tbody>

     <?php
      // Read

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a181068_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_genre']; ?></td>
        <td><?php echo $readrow['fld_product_release_date']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td>
        <td><?php echo $readrow['fld_product_rating']; ?></td>
        
        <td>
           <button type="button" role="button" class="btn btn-warning btn-xs modalbtn" data-toggle="modal" data-target="#myModal" data-href="products_details.php?pid=<?php echo $readrow['fld_product_id'];?>">Details</button> 

           <!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product Details</h4>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div> 

          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>

          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

       
      <?php
        }
          ?>
        </td>
      </tr>
       <?php
      $conn = null;
      ?>
 </tbody>
    </table>
     </div>
  </div>

  
<script type="text/javascript">
  $(document).ready(function () {
    $('#example').DataTable({
          pageLength : 5,
    lengthMenu: [[5, 10, 20, 30, -1],[5, 10, 20, 30,'All']]
    });

});
</script>
 </body>
<script>  
     $(document).ready(function(){
    $("body").on("click", ".modalbtn", function(event){
     var dataURL = $(this).attr( "data-href" )
     $('.modal-body').load(dataURL,function(){
      $('#myModal').modal({show:true});
      $('#myModal').on('hidden.bs.modal', function () {
        location.reload(); // location.reload();
      })
    });
   });
  });

    </script>

</html> 