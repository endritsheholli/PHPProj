	
	<?php 
include("../session.php");
	include("../config.php");
	?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title> Admin </title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	$(".tab_content").hide(); 
	$("ul.tabs li:first").addClass("active").show(); 
	$(".tab_content:first").show(); 
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); 
		$(this).addClass("active"); 
		$(".tab_content").hide(); 

		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

<div id="container">

	  
	  
	   <div id="header">
 
         
		<div id="logo-banner">
		   
				<div id="logo">
					<a href="index.php"><img src="images/logo.png" alt="" style="height:100px; width: 200px"/></a>
				</div>
				
				<div id="banner">
                
				</div>
		
		</div>
		</div> 
		
	
	<div id="content-wrap">	
	
	<section id="secondary_bar">

             <nav>
                <ul>
                    <li class="selected"><a href="index.php">Home</a></li>
                    <li><a href="add_warehouse.php">Add warehouse</a></li>
                    <li><a href="add_product.php">Add product</a></li>
                    <li><a href="Employee.php">Add employee</a></li>
                    <li><a href="add_category.php">Categories</a></li>
                    <li class="logout"> <span class="check"> <?php echo "Welcome Mr/Miss:   ". "<font color='##fa5400'><i><b>".$login_session."</b></i></font>" ;?> </span></li>
					
                </ul>
				
            </nav>

	</section>
	   	
<aside id="sidebar" class="column">
		
		<hr/>
	

		
		<h3>Administrator:</h3>
		<ul class="toggle">
		    <li class="icn_add_user"><a href="Employee.php">Add Employee</a></li>
			<li class="icn_photo"><a href="add_product.php">Add Product</a></li>
			<li class="icn_tags"><a href="add_warehouse.php">Add Warehouse</a></li>
			<li class="icn_new_article"><a href="add_category.php">Add Category</a></li>
		
		</ul>
		
        <h3>Tables:</h3>
		<ul class="toggle">
		    <li class="icn_categories"><a href="order.php">Order Detial</a></li>
     		<li class="icn_categories"><a href="customerTable.php">Customer Detail</a></li>
		</ul>

		<h3>Admin</h3>
		<ul class="toggle">

			<li class="icn_jump_back"><a href="../logout.php">Logout</a></li>
		</ul>
	
	</aside>
	
	<section id="main" class="column">
	

<?php
$update=$_GET['update'];
$result = mysqli_query($mysqli,"SELECT * FROM product  where Product_ID ='$update'");
?>
<?php if($row = mysqli_fetch_array($result))
  {?> 
  
	
	<div id="form_wrapper" class="form_wrapper">
	
		 <table>
					<form class="register active" action="prodUpdate.php" method="POST" autocomplete="off">

					<th colspan="3"><h2>Update Product Data :</h2> </th> 
						
		<input type="hidden" id="ID" name="ID" value="<?php echo $row['Product_ID'];?>"  placeholder="ID" required>
		<span class="error">This is an error</span>
	
   <tr>

    <td>  

	  <label>Full Name:</label>
		
		<input type="text" id="fname" name="fname" value="<?php echo $row['productName'];?>"  placeholder="Full name" required>
		<span class="error">This is an error</span>
	</td>
    <td>   

	<label>Category Name:</label>

		<input type="text" id="cname" name="cname" value="<?php echo $row['Category_ID'];?>" placeholder="User name" required>
		<span class="error">This is an error</span>
	</td>
	
    <td>   

	<label>Model:</label>

		<input type="text" id="model" name="model" value="<?php echo $row['Model'];?>" placeholder="User name" required>
		<span class="error">This is an error</span>
   </td>

   </tr>
   
   <tr>
      <td>  

	  <label>Type:</label>
		
		<input type="text" id="type" name="type" value="<?php echo $row['Type'];?>"  placeholder="Full name" required>
		<span class="error">This is an error</span>
	</td>
   <td>   

	<label>Warehouse:</label>

		<input type="text" id="whouse" name="whouse" value="<?php echo $row['Warehouse_ID'];?>" placeholder="User name" required>
		<span class="error">This is an error</span>
		

   </td>
     <td>   

	<label>Description:</label>

	<input type="text" id="desp" name="desp" value="<?php echo $row['Description'];?>" placeholder="User name" required>
	<span class="error">This is an error</span>
		

   </td>

   </tr>
   
   
      <tr>
      <td>  

	  <label>Price:</label>
		
		<input type="text" id="price" name="price" value="<?php echo $row['Price'];?>"  placeholder="Full name" required>
		<span class="error">This is an error</span>
	</td>
   <td>   

		<label> Picture:</label>
		<input type="file" name="picture" id="picture"  value="<?php echo $row['Picture'];?>" placeholder="Full name" required>
		<span class="error">This is an error</span>

   </td>


   </tr>


			<div class="bottom">

						<td colspan="3">	
						
							<td colspan="3">	
						
						<button type="submit"  name="submit" value="Update" class="a-btn"> <span class="a-btn-text">Update Product</span></button>
						
						</td>
						
						</td>
							
							<div class="clear"></div>
						</div>

	</form>
					
	</table>
	</div>
         <?php }?>

	
		
		<article class="module width_3_quarter">
		
		
	    </article>
	</section>
          </div>
   </div>
    
</body>

</html>