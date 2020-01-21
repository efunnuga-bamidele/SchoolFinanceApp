 <style type="text/css">
        h4{
            text-align: center;
        }
    </style>
<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
// ADD to stock process
	if(isset($_GET["add"])){
    //Create variable and assign get value
    $term = $_GET["term"];
    $session = $_GET["session"];
		$item_name = $_GET["item_name"];
		$item_category = $_GET["item_category"];
		$item_price = $_GET["item_price"];
		$item_quantity = $_GET["item_quantity"];
		$item_code = $_GET["item_code"];
		$item_location = $_GET["item_location"];
		$item_unit = $_GET["item_unit"];
    $Request_Date = $_GET["request_date"];
    $Usage_Location = $_GET["location"];
    $Qty_Processed = $_GET["quantity"];
    $Qty_Cost = $_GET["qty_cost"];
    $Process_Type = 'ADD TO STOCK';
    $Precess_Code = $_GET["process_code"];
    $Usage_Detail = $_GET["description"] . '-Processed By: '. $_SESSION['name'];
    $Current_Qty = $_GET["quantity"] + $_GET["item_quantity"];

		// connect to database
		$database = "data/expenditures.db";
		$connect = new SQlite3($database);
		$register_query = $connect->prepare('INSERT INTO PROCESS (Term, Session, Item_Name, Item_Category, Item_Price, Item_Quantity, Stock_Code, Item_Location, Unit, Request_Date, Usage_Location, Qty_Processed, Qty_Cost, Process_Type, Precess_Code, Usage_Detail, Current_Qty) VALUES (:Term, :Session,:Item_Name,:Item_Category,:Item_Price,:Item_Quantity,:Stock_Code,:Item_Location,:Unit, :Request_Date,:Usage_Location,:Qty_Processed,:Qty_Cost,:Process_Type,:Precess_Code,:Usage_Detail, :Current_Qty)');

    $register_query->bindValue(':Term', $term, SQLITE3_TEXT);
    $register_query->bindValue(':Session', $session, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Name', $item_name, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Category', $item_category, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Price', $item_price, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Quantity', $item_quantity, SQLITE3_TEXT);
		$register_query->bindValue(':Stock_Code', $item_code, SQLITE3_TEXT);
		$register_query->bindValue(':Item_Location', $item_location, SQLITE3_TEXT);
		$register_query->bindValue(':Unit', $item_unit, SQLITE3_TEXT);
    $register_query->bindValue(':Request_Date', $Request_Date, SQLITE3_TEXT);
    $register_query->bindValue(':Usage_Location', $Usage_Location, SQLITE3_TEXT);
    $register_query->bindValue(':Qty_Processed', $Qty_Processed, SQLITE3_TEXT);
    $register_query->bindValue(':Qty_Cost', $Qty_Cost, SQLITE3_TEXT);
    $register_query->bindValue(':Process_Type', $Process_Type, SQLITE3_TEXT);
    $register_query->bindValue(':Precess_Code', $Precess_Code, SQLITE3_TEXT);
    $register_query->bindValue(':Usage_Detail', $Usage_Detail, SQLITE3_TEXT);
    $register_query->bindValue(':Current_Qty', $Current_Qty, SQLITE3_TEXT);


    ///Execute Update item query

  $database = "data/expenditures.db";
  $connectx = new SQlite3($database);
  $idn = $_GET['idx'];
  $Item_Quantity = $_GET["item_quantity"] + $_GET["quantity"] ;
  $Item_Name = $_GET['item_name'];
  $Item_Category = $_GET['item_category'];
  $Item_Price = $_GET['item_price'];
  $Stock_Code = $_GET['item_code'];
  $Item_Location = $_GET['item_location'];
  $Unit = $_GET['item_unit'];

   $stmtr = $connect->prepare("UPDATE ITEMS SET `Item_Name` =  '".$Item_Name."',  `Item_Category` =  '".$Item_Category."',`Item_Price` = '".$Item_Price."', `Item_Quantity` = '".$Item_Quantity."', `Stock_Code` = '".$Stock_Code."' ,`Item_Location` = '".$Item_Location."', `Unit` = '".$Unit."' WHERE `ID` = '$idn' ");

		if($register_query->execute()){
      $stmtr->execute();
                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                // die('Something went wrong, Please try again');
            }
            unset($register_query);
            unset($stmtr);

	}//end of if
	elseif(isset($_GET["deduct"])){
		if( $_GET["item_quantity"] >= $_GET["quantity"]){
      //Create variable and assign get value
    $term = $_GET["term"];
    $session = $_GET["session"];
    $item_name = $_GET["item_name"];
    $item_category = $_GET["item_category"];
    $item_price = $_GET["item_price"];
    $item_quantity = $_GET["item_quantity"];
    $item_code = $_GET["item_code"];
    $item_location = $_GET["item_location"];
    $item_unit = $_GET["item_unit"];
    $Request_Date = $_GET["request_date"];
    $Usage_Location = $_GET["location"];
    $Qty_Processed = $_GET["quantity"];
    $Qty_Cost = $_GET["qty_cost"];
    $Process_Type = 'DEDUCT STOCK';
    $Precess_Code = $_GET["process_code"];
    $Usage_Detail = $_GET["description"] . '-Processed By: '. $_SESSION['name'];
    $Current_Qty = $_GET["item_quantity"] - $_GET["quantity"];

    // connect to database
    $database = "data/expenditures.db";
    $connect = new SQlite3($database);
    $register_query = $connect->prepare('INSERT INTO PROCESS (Term, Session, Item_Name, Item_Category, Item_Price, Item_Quantity, Stock_Code, Item_Location, Unit, Request_Date, Usage_Location, Qty_Processed, Qty_Cost, Process_Type, Precess_Code, Usage_Detail, Current_Qty) VALUES (:Term, :Session,:Item_Name,:Item_Category,:Item_Price,:Item_Quantity,:Stock_Code,:Item_Location,:Unit, :Request_Date,:Usage_Location,:Qty_Processed,:Qty_Cost,:Process_Type,:Precess_Code,:Usage_Detail, :Current_Qty)');

    $register_query->bindValue(':Term', $term, SQLITE3_TEXT);
    $register_query->bindValue(':Session', $session, SQLITE3_TEXT);
    $register_query->bindValue(':Item_Name', $item_name, SQLITE3_TEXT);
    $register_query->bindValue(':Item_Category', $item_category, SQLITE3_TEXT);
    $register_query->bindValue(':Item_Price', $item_price, SQLITE3_TEXT);
    $register_query->bindValue(':Item_Quantity', $item_quantity, SQLITE3_TEXT);
    $register_query->bindValue(':Stock_Code', $item_code, SQLITE3_TEXT);
    $register_query->bindValue(':Item_Location', $item_location, SQLITE3_TEXT);
    $register_query->bindValue(':Unit', $item_unit, SQLITE3_TEXT);
    $register_query->bindValue(':Request_Date', $Request_Date, SQLITE3_TEXT);
    $register_query->bindValue(':Usage_Location', $Usage_Location, SQLITE3_TEXT);
    $register_query->bindValue(':Qty_Processed', $Qty_Processed, SQLITE3_TEXT);
    $register_query->bindValue(':Qty_Cost', $Qty_Cost, SQLITE3_TEXT);
    $register_query->bindValue(':Process_Type', $Process_Type, SQLITE3_TEXT);
    $register_query->bindValue(':Precess_Code', $Precess_Code, SQLITE3_TEXT);
    $register_query->bindValue(':Usage_Detail', $Usage_Detail, SQLITE3_TEXT);
    $register_query->bindValue(':Current_Qty', $Current_Qty, SQLITE3_TEXT);


    ///Execute Update item query

  $database = "data/expenditures.db";
  $connectx = new SQlite3($database);
  $idn = $_GET['idx'];
  $Item_Quantity = $_GET["item_quantity"] - $_GET["quantity"];
  $Item_Name = $_GET['item_name'];
  $Item_Category = $_GET['item_category'];
  $Item_Price = $_GET['item_price'];
  $Stock_Code = $_GET['item_code'];
  $Item_Location = $_GET['item_location'];
  $Unit = $_GET['item_unit'];

   $stmtr = $connect->prepare("UPDATE ITEMS SET `Item_Name` =  '".$Item_Name."',  `Item_Category` =  '".$Item_Category."',`Item_Price` = '".$Item_Price."', `Item_Quantity` = '".$Item_Quantity."', `Stock_Code` = '".$Stock_Code."' ,`Item_Location` = '".$Item_Location."', `Unit` = '".$Unit."' WHERE `ID` = '$idn' ");

    if($register_query->execute()){
      $stmtr->execute();
                //redirection on successful registration
                 echo("<script>location.href = '../expenditures.php';</script>");
            }else{
                // die('Something went wrong, Please try again');
            }
            unset($register_query);
            unset($stmtr);
          }else{
            echo("<script>alert('Error: Item in-stock is lower than quantity requested and will not be processed');</script>");
          }
	}//end of elseif
}


?>

<style type="text/css">
	#getter {
    float: right;
}
#p_id{
   float: right;
}
h6{
  font-weight: bold;
  text-align: center;
  padding-left: 18px;
}
textarea {
   resize: none;
}
</style>


<div class="row">
<div class="col-sm-4" style="height:700px; overflow: scroll;">
  <div class="row">
     <h6 class="text-success">LIST OF ITEMS</h6>
    <div class="col-12" style="height:300px; overflow: scroll;">

  <ul class="list-group" style="font-size:14px;font-weight: bold;">
  	
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
</div>
    <h6 class="text-success">PROCESS HISTORY</h6>
<div class="col-12" style="height:300px; overflow: scroll;">
  <ul class="list-group" style="font-size:12px;font-weight: bold;">

       <?php
// Display all sqlite tables
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM PROCESS";
  $tablesquery = $connect->query($sql);
    ?>
    <?php while ($row = $tablesquery->fetchArray(SQLITE3_ASSOC)): ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <li class="list-group-item list-group-item-primary"><?php echo $row['ID'],'. ', $row['Item_Name'] ;?>
    <button id="p_id" class="btn btn-danger btn-sm" name="p_id" value="<?php echo $row['ID'];?>"><i class="icon ion-android-send"></i>
  </button>
  </li>
  </form>
    <?php endwhile; ?>
  </ul>
</div>
</div>
<!-- get value from list to input field -->

<?php
    $Item_Name = $Item_Category = $Item_Price = $Item_Quantity = $Stock_Code = $Item_Location = $Item_Location = $Unit = $Request_Date = $Usage_Location = $Qty_Processed = $Qty_Cost = $Process_Type = $Precess_Code = $Usage_Detail ='';
    if($_GET){
    if(isset($_GET['move_id'])){
  $bid = $_GET['move_id'];
// Get Item Value to field
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
}if(isset($_GET['p_id'])){
  // GET PROCESS HISTORY
  $bid = $_GET['p_id'];
  $database = "data/expenditures.db";
  $connect = new SQlite3($database);
  $sql = "SELECT * FROM PROCESS WHERE ID = $bid";
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
  $Request_Date = $record['Request_Date'];
  $Usage_Location = $record['Usage_Location'];
  $Qty_Processed = $record['Qty_Processed'];
  $Qty_Cost = $record['Qty_Cost'];
  $Process_Type = $record['Process_Type'];
  $Precess_Code = $record['Precess_Code'];
  $Usage_Detail = $record['Usage_Detail'];

}
}
}
?>

<!-- end of code -->
</div>
<div class="col-sm-8">
<div class="container mt-3">
<form id="form-sample">
  	<div class="row">
  		<!-- begin -->
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-primary" >Item Name</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item name" id="item_name" name="item_name" value="<?php echo $Item_Name; ?>" readonly>
			
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Enter item category" id="item_category" name="item_category" value="<?php echo $Item_Category; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text text-primary">Item Category</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-primary">Item Price &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item price" id="item_price" name="item_price" value="<?php echo $Item_Price; ?>" readonly>
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="number" class="form-control" placeholder="Enter item quantity" id="item_quantity" name="item_quantity" value="<?php echo $Item_Quantity; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text text-primary">Item Quantity</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-primary">Stock Code</span>
      </div>
      <input type="text" class="form-control" placeholder="Auto Generated Stock Code" id="item_code" name="item_code" value="<?php echo $Stock_Code; ?>" readonly>
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Enter item location" id="item_location" name="item_location" value="<?php echo $Item_Location; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text text-primary">Item Location</span>
      </div>
    </div>
     <div class="input-group mb-3 col-sm-6">
     <div class="input-group-append">
        <span class="input-group-text text-primary">Unit of Measurement</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item unit of measurement" id="item_unit" name="item_unit" value="<?php echo $Unit; ?>" readonly>
      
    </div>
   
      <input type="text" hidden class="form-control" name="idx" value="<?php echo $ID; ?>">
    
    <!-- end -->
    </div>
 
  
  <hr>
<h4 class="text-secondary">Precess Register Section</h4>
  <hr>
  
    <div class="row">
      <!-- begin -->
      <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-danger" >Term</span>
      </div>
     <select class="form-control" name='term' type="option" required autofocus>
                              <option>First Term</option>
                              <option>Second Term</option>
                              <option>Third Term</option>
     </select>
      
    </div>

    <div class="input-group mb-3 col-sm-6">
      <select class="form-control" name='session' id="session" type="option" required>
                             
                            </select>
                            <!-- using jquery to pull data from json into select options -->
                               <script type="text/javascript">
                              $.getJSON("../settings/session/table.json", function(json){
                                  $('#session').empty();
                                  $('#session').append($('<option>').text("Select a Session"));
                                  $.each(json, function(i, obj){
                                    $('#session').append($('<option>').text(obj.item_name));
                                  });
                              });
                            </script>
      <div class="input-group-append">
        <span class="input-group-text text-danger">Session</span>
      </div>
    </div>

    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-danger" >Request Date</span>
      </div>
      <input type="text" class="form-control" value="<?php if($Request_Date ===''){echo date('d-m-Y');}
      else{echo $Request_Date;}?>" id="request_date" name="request_date" required>
      
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Enter item usage location" id="location" name="location"  required value="<?php echo $Usage_Location; ?>" onkeypress="myGen()">
      <div class="input-group-append">
        <span class="input-group-text text-danger">Location of Use</span>
      </div>
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-danger">Quantity to Add / Take</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter quantity" id="quantity" name="quantity" required value="<?php echo $Qty_Processed; ?>" onkeyup="myFunctionk()">
    </div>

    <div class="input-group mb-3 col-sm-6">
       <div class="input-group-append">
        <span class="input-group-text text-danger">Quantity Cost &#8358</span>
      </div>
      <input type="text" class="form-control" placeholder="Enter item quantity" id="qty_cost" name="qty_cost" readonly required value="<?php echo $Qty_Cost; ?>">
     
    </div>
    <div class="input-group mb-3 col-sm-6">
      <div class="input-group-prepend">
        <span class="input-group-text text-danger">Process Type</span>
      </div>
      <input type="text" class="form-control" placeholder="Auto Generated" id="process_type" name="process_type" readonly value="<?php echo $Process_Type; ?>">
    </div>

    <div class="input-group mb-3 col-sm-6">
      <input type="text" class="form-control" placeholder="Auto Generated" id="process_code" name="process_code" readonly required value="<?php echo $Precess_Code; ?>">
      <div class="input-group-append">
        <span class="input-group-text text-danger">Process Code</span>
      </div>
    </div>
     <div class="input-group mb-3 col-sm-12">
     <div class="input-group-append">
        <span class="input-group-text text-danger">Usage Description</span>
      </div>
      <textarea type="text" class="form-control" rows="4" warp="soft" placeholder="Enter usage description" id="description" name="description" ><?php echo $Usage_Detail; ?></textarea>
      
    </div>
   
      <input type="text" hidden class="form-control" id="item_unit" name="idx" value="<?php echo $ID; ?>">
    
    <!-- end -->
    </div>
    <hr>
    <button type="submit" name="add" class="btn btn-success">Add to Stock</button>
    <button type="submit" name="deduct" class="btn btn-primary">Deduct from Stock</button>
    <button type="submit" name="clear" class="btn btn-warning" onclick="myFunctionx()">Clear</button>
  </form>
  <br><br>
</div>

</div>
</div>
<script type="text/javascript">
    function myFunctionk() {
          var x = document.getElementById("item_price").value; 
          x = x.replace(/[,\s?₦]/g, "");
          var y = document.getElementById("quantity");
          var z = document.getElementById("qty_cost");
           z.value = x * y.value ;
           //Verify stock
          if(document.getElementById("item_quantity").value < document.getElementById("quantity").value){
            console.log('Error: Item in-stock is lower than quantity requested and will not be processed if you want to Deduct from Stock');
          }
  }
</script>
<script type="text/javascript">
      function myGen() {
       
           // process code generation
           var u = document.getElementById("process_code");
           var v = document.getElementById("location");
          u.value = v.value.substr(0, 2)+'-'+Math.floor(Math.random() * 100000);
         
      }
</script>


<script>
function myFunctionx() {
    document.getElementById("form-sample").reset();
}

</script>

