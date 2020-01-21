<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){

	if(isset($_GET["register"])){
		$item_name = strtoupper($_GET["item_name"]);
		$item_category = strtoupper($_GET["item_category"]);
		$item_price = $_GET["item_price"];
		$item_quantity = $_GET["item_quantity"];
		$item_code = strtoupper($_GET["item_code"]);
		$item_location = strtoupper($_GET["item_location"]);
		$item_unit = $_GET["item_unit"];

		// connect to database
		$database = "data/expenditures.db";
		$connect = new SQlite3($database);
		$register_query = $connect->prepare('INSERT INTO ITEMS (Item_Name, Item_Category, Item_Price, Item_Quantity, Stock_Code, Item_Location, Unit) VALUES (:Item_Name,:Item_Category,:Item_Price,:Item_Quantity,:Stock_Code,:Item_Location,:Unit)');

		$register_query->bindValue(':Item_Name', $item_name, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Category', $item_category, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Price', $item_price, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Quantity', $item_quantity, SQLITE3_TEXT);
		$register_query->bindValue(':Stock_Code', $item_code, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Location', $item_location, SQLITE3_TEXT);
		$register_query->bindValue(':Unit', $item_unit, SQLITE3_TEXT);
		if($register_query->execute()){
                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($register_query);

	}
	elseif(isset($_GET["edit"])){
		
	}
}


?>

<style type="text/css">
	#getter {
    float: right;
}
</style>


<div class="row">
<div class="col-sm-4" style="height:280px; overflow: scroll;">
  <ul class="list-group" style="font-size:12px;font-weight: bold;">
  	<h5 class="text-secondary">LIST OF ITEMS</h5>
  	   <?php
// Display all sqlite tables
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM ITEMS";
  $tablesquery = $connect->query($sql);
    ?>
    <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <li class="list-group-item list-group-item-primary"><?php echo $row['ID'],'. ', $row['Item_Name'] ;?>
    <button id="getter" class="btn btn-danger btn-sm" name="move_id" value="<?php echo $row['ID'];?>"><i class="icon ion-android-send"></i>
	</button>
	</li>
	</form>
    <?php endwhile; ?>
  </ul>
<!-- get value from list to input field -->
<?php
    $Item_Name = $Item_Category = $Item_Price = $Item_Quantity = $Stock_Code = $Item_Location = $Item_Location = $Unit ='';
    if($_GET){
    if(isset($_GET['move_id'])){
  $bid = $_GET['move_id'];

  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM ITEMS WHERE ID = $bid";
  $tablesquery = $connect->query($sql);
  while ($record = $tablesquery->fetchArray(SQLITE3_ASSOC)){
  $ID = $record['ID'];
  $Item_Name = $record['Item_Name'];
  $Item_Category = $record['Item_Category'];
  $Item_Price = $record['Item_Price'];
  $Item_Quantity = $record['Item_Quantity'];
  $Stock_Code = $record['Stock_Code'];
  $Item_Location = $record['Item_Location'];
  $Unit = $record['Unit'];

  }
}if(isset($_GET['edit'])){
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $idx = $_GET['idx'];
  $Item_Name = strtoupper($_GET['item_name']);
  $Item_Category = strtoupper($_GET['item_category']);
  $Item_Price = $_GET['item_price'];
  $Item_Quantity = $_GET['item_quantity'];
  $Stock_Code = strtoupper($_GET['item_code']);
  $Item_Location = strtoupper($_GET['item_location']);
  $Unit = $_GET['item_unit'];

  $stmtr = $connect->prepare("UPDATE ITEMS SET `Item_Name` =  '".$Item_Name."',  `Item_Category` =  '".$Item_Category."',`Item_Price` = '".$Item_Price."', `Item_Quantity` = '".$Item_Quantity."', `Stock_Code` = '".$Stock_Code."' ,`Item_Location` = '".$Item_Location."', `Unit` = '".$Unit."' WHERE `ID` = '$idx' ");

             if($stmtr->execute()){
               echo("<script>location.href = 'expenditures.php';</script>");
            }else{
                die('Something went wrong, Please try again');
            }
            unset($stmtr);
			unset($connect);

}
if(isset($_GET['delete'])){

	  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $idx = $_GET['idx'];
		//delete query
 $query = "DELETE FROM ITEMS WHERE rowid=$idx";
	// Run the query to delete record
	if( $connect->query($query) ){
		echo("<script>location.href = 'expenditures.php';</script>");
	}else{
		echo("<script>location.href = 'expenditures.php';</script>");
	}
}
}
?>

<!-- end of code -->
</div>
<div class="col-sm-8">
<div class="container mt-3">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="form-sample">
  	<div class="row">
  		<!-- begin -->
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Item Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item name" id="item_name" name="item_name" onkeypress="myCode()" value="<?php echo $Item_Name; ?>">
			
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Enter item category" id="item_category" name="item_category" value="<?php echo $Item_Category; ?>">
      <div class="input-group-append">
        <span class="input-group-text">Item Category</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Item Price &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item price" id="item_price" name="item_price" value="<?php echo $Item_Price; ?>">
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="number" class="form-control" placeholder="Enter item quantity" id="item_quantity" name="item_quantity" value="<?php echo $Item_Quantity; ?>">
      <div class="input-group-append">
        <span class="input-group-text">Item Quantity</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text">Stock Code</span>
      </div>
      <input type="text" readonly class="form-control" placeholder="Auto Generated Stock Code" id="item_code" name="item_code" value="<?php echo $Stock_Code; ?>">
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Enter item location" id="item_location" name="item_location" value="<?php echo $Item_Location; ?>">
      <div class="input-group-append">
        <span class="input-group-text">Item Location</span>
      </div>
    </div>
     <div class="input-group mb-3 col-sm-6">
     <div class="input-group-append">
        <span class="input-group-text">Unit of Measurement</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item unit of measurement" id="item_unit" name="item_unit" value="<?php echo $Unit; ?>">
      
    </div>
   
      <input type="text" hidden class="form-control" id="item_unit" name="idx" value="<?php echo $ID; ?>">
    
    <!-- end -->
    </div>
    <button type="submit" name="register" class="btn btn-success">Register</button>
    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
    <button type="submit" name="clear" class="btn btn-warning">Clear</button>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
			function myCode() {
			    var x = document.getElementById("item_name");
			    var y = document.getElementById("item_code");
			    y.value = x.value.slice(-2)+'-'+Math.floor(Math.random() * 100000);
			}
</script>
<script>
function myFunction() {
    document.getElementById("form-sample").reset();
}
</script>
 <!-- <script src="js/jquery.maskMoney.js" type="text/javascript"></script> -->
<!-- Decimals in number -->
<script type="text/javascript">
 $('#item_price').blur(function() {
        $('#item_price').html(null);
        // $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
        $("#item_price").maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});

      })
        .keypress(function(e) {
        var e = window.event || e;
        var keyUnicode = e.charCode || e.keyCode;
        if (e !== undefined) {
          switch (keyUnicode) {
            case 16: break; // Shift
            case 17: break; // Ctrl
            case 18: break; // Alt
            case 27: this.value = ''; break; // Esc: clear entry
            case 35: break; // End
            case 36: break; // Home
            case 37: break; // cursor left
            case 38: break; // cursor up
            case 39: break; // cursor right
            case 40: break; // cursor down
            case 78: break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
            case 110: break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
            case 190: break; // .
            default: $(this).maskMoney({prefix:'', allowNegative: true, thousands:',',decimal:'.', affixesStay: false});
          }
        }
      });
      </script>

