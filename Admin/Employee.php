<?php
include("../session.php");
include("../config.php");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Suncart I Admin </title>
	
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
				
            </nav>

	</section>
	   	
<aside id="sidebar" class="column">
				<div id="search">
					<form action="searchemplo.php" method="post" accept-charset="utf-8">
						<input type="text"  title="Search..." class="blink field"  placeholder="Search Employee"  name='search' size=60 maxlength=100/>
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
	
	<h4 class="alert_info">Welcome To <strong>"Buki"</strong> Admin Panel As: <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>

<script type="text/javascript">
function validateForm()
{
var a=document.forms["addemployee"]["fullname"].value;
if (a==null || a=="")
  {
  alert("Employee Full Name Is Missing !!!");
  return false;
  }
var b=document.forms["addemployee"]["username"].value;
if (b==null || b=="")
  {
  alert("Your Username Is Missing !!!");
  return false;
  }
  
   var c=document.forms["addemployee"]["password"].value;
if (c==null || c=="")
  {
  alert("Your Password Is Misssing !!!");
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
				Alart("Numbers Ii Not Allowed Sir!!!!!!");
            });
        });
    </script>
		

				
				
	<div id="form_wrapper" class="form_wrapper">
	
		 <table>
					<form class="register active" id="myForm"action="empRegistration.php"  method="POST" >

					<th colspan="3"><h2>Register</h2> </th> 
						

        <tr>
       <td>  

	  <label>Full Name:</label>
		
		<input type="text" id="empValid" name="fullname" placeholder="Full name" />
		<span class="error">This is an error</span>
	  </td>
      <td>   

	     <label>Username:</label>

		<input type="text" id="username" name="username" placeholder="User name" />
		<span class="error">This is an error</span>
      </td>
		</tr>
    <tr>
         <td>  

		<label> Selelct Employee image :</label>
		<input type="file" name="picture" id="picture"  required>
		<span id="pass-info"> </span>
                               
	    </td>
		
       <td>  

		<label> Enter Password:</label>
		
		<input type="password" id="password" name="password" placeholder="*****" >
		<span id="pass-info"> </span>
                               
	</td>

   </tr>



						<div class="bottom">

						<td colspan="3">	
						
						<button name="submit" id="submit" title="Click to Save"  class="a-btn"> <span class="a-btn-text"> Add Employee</span></button>
						
						</td>
							
							<div class="clear"></div>
						</div>
						
		

	</form>
					
	</table>
	</div>


						<script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#submit").click(function() { 
    
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'empRegistration.php',
        data: $("#myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script>
		
	





<?php
$result = mysqli_query($mysqli,"SELECT * FROM employee");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

			
			<thead><tr> <th colspan="7"> Employee Data Record</th>  </tr> <thead>
		<thead>
			<tr>
   		    <th>Check</th> 
    	      <th>Employee ID</th>
              <th> Employee Name</th>			  
    		<th>User Name</th>
		    <th>Password</th>
           <th>Picture</th>			
    		<th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php while($row = mysqli_fetch_array($result))
  {?>

      <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['Employee_ID']; ?></td>
    <td><?php echo $row['Employee_Name']; ?></td>
   <td><?php echo $row['Username']; ?></td>
	<td><?php echo $row['Password']; ?></td>
	<td><img src="../images/<?php echo $row['Picture']; ?>" width="40" height="40"></td>
    <td> <a href="empViewUpdate.php?update=<?php echo $row['Employee_ID']; ?>"  onClick="edit(this);" title="empEdit" >  <input type="image" src="images/icn_edit.png" title="Edit"> </a>
     <a href="empDelete.php?delete=<?php echo $row['Employee_ID']; ?>" onClick="del(this);" title="Delete"><input type="image" src="images/icn_trash.png" title="Trash"/>  </a></td>
    </tr>

  <?php }mysqli_close($mysqli);?>
      </tbody>
</table>
	  
 </div> 

	</section>
          </div>
   </div>
    
</body>

</html>