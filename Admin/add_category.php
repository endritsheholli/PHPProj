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
					<a href="index.php"><img src="images/logo.png" alt="" style="height:100px; width: 200px" /></a>
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
				
            </nav>

	</section>
	   	
<aside id="sidebar" class="column">
				<div id="search">
					<form action="searchcat.php" method="post" accept-charset="utf-8">
						<input type="text"  title="Search..." class="blink field"  placeholder="Search Category"   name='search' size=60 maxlength=100 />
						<input class="search-button" type="submit" value="Submit" />
						<div class="cl">&nbsp;</div>
					</form>
					
				</div>
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
	<h4 class="alert_info">Welcome To <strong>"Buki"</strong>:<?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["addCategory"]["categoryName"].value;
if (a==null || a=="")
  {
  window.alert("Pls. Enter The Category Name !!!");

  return false;
  }
var b=document.forms["addCategory"]["description"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter The Description !!!");
  return false;
  }
var a=document.forms["addCategory"]["file"].value;
if (a==null || a=="")
  {
  alert("Pls. You Have Been Missing Employee Full Name !!!");
  return false;
  }

}
</script>

	

    <script type="text/javascript">
        $(function() {
            $('#empValid').keyup(function() {
			
                if (this.value.match(/[^a-zA-Z]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z ]/g, '');
					
                }
				Alert("Numbers IS NOT Allowed Sir!!!!!! !!!");
            });
        });
		

    </script>
	
			
	<div id="form_wrapper" class="form_wrapper">

		 <table>
<form class="register active" id="myForm" action="insertCategory.php" method="POST" enctype="multipart/form-data" name="addEmployee" >

					<th colspan="3"><h2>  Add Category</h2> </th> 
						

   <tr>
    <td>  

	  <label>Category Name:</label>
		
		<input type="text" id="empValid" name="categoryName" placeholder="Category Name" required>
		<span class="error">This is an error</span>
	</td>
   <td>   

	<label>Description:</label>

		<input type="text" id="empValid" name="description" placeholder="Description" required>
		<span class="error">This is an error</span>
		

   </td>
       <td>  

		<label> Select Image:</label>
		
		<input type="file" name="picture" id="picture"  required>
		<span id="pass-info"> </span>
                               
	</td>

   </tr>



   
   <tr>
						<div class="bottom">

						<td colspan="3">	
						
						<button name="submit" id="save" title="Click to Save"  class="a-btn"> <span class="a-btn-text">Add Category</span></button>
						
						</td>
							
							<div class="clear"></div>
						</div>
						
		
	</tr>
	</form>
					
	</table>
	</div>


						<script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#save").click(function() { 
     
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'insertCategory.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
		

		<div class="tab_container">



<?php
$result = mysqli_query($mysqli,"SELECT * FROM category");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 


			<thead><th colspan="6"> Category Data Table And Information</th></thead>
		<thead>
			</tr>
   		    <th>Check</th> 
    	      <th> ID</th>
              <th> Category</th>			  
    		<th>Discription</th>
		    <th>Picture</th>				
    		<th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php while($row = mysqli_fetch_array($result))
  {?>


    <tr>
    <td><input type="checkbox"></td>
    <td><?php echo $row['Category_ID']; ?></td>
    <td><?php echo $row['Category_Name']; ?></td>
   <td><?php echo $row['Discription']; ?></td>
	<td><img src="../images/<?php echo $row['Picture']; ?>" width="40" height="40"></td>
    <td> <a href="catViewUpdate.php?update=<?php echo $row['Category_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="catDelete.php?delete=<?php echo $row['Category_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
    </tr>

  <?php }mysqli_close($mysqli);?>
</tbody>
</table>
	  
 </div> 

</div>

		
	</section>
          </div>
   </div>
    
</body>

</html>