<?php require_once"dbconfig.php";
if(isset($_SESSION['login']))
{
	
}
else
{
	header("location:login.php");
}

?>
<!DOCTYPE html>
<head>
<title>Seller Panel </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script>
  function findselected() { 
    var result = document.querySelector('input[name="status"]:checked').value;
    if(result=="complete"){

        document.getElementById("remamount").setAttribute('disabled', true);
		document.getElementById("duedate").setAttribute('disabled', true);
	
    }
    else{
        document.getElementById("remamount").removeAttribute('disabled');
		document.getElementById("duedate").removeAttribute('disabled');
    }
}
  </script>
  
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.php" class="logo">
        SELLER
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<?php include"nav_top.php";?>

</header>
<!--header end-->
<!--sidebar start-->
<?php include"sidebar.php";?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
            <div class="row">
                <div class="col-lg-3">
                    <section class="panel">
					 
                        <header class="panel-heading">
                            CHOOSE CATEGORY 
                            
                        </header>
						
						</br>
						
						
						
						
						
						
				<?php
				$r=select("select * from `category`");
				while($re=mysqli_fetch_array($r))
				{extract($re);
				?>		
						<form method="post" class="form-inline">
								<input type="hidden" name="catid" value="<?=$re[0]?>">
		<button class="btn btn-warning " style="font-weight:bold;color:black" name="butcut"><?=$cat_name?>
		</button>
		</form>&nbsp;
		<?php
				}
		?>
		
			
		</br>

                </div>
				
				<div class="col-lg-9">
				<?php

if(isset($_REQUEST['butcut']))
{
	extract($_REQUEST);
	
	?>
<div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " action="phpmy.php" enctype = "multipart/form-data" id="commentForm" method="post"  novalidate="novalidate">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">SELECT CATEGORY  </label>
                                        <div class="col-lg-6">
										<select class="form-control" name="category">
										<option>SELECT CATEGORY
										</option>
										<?php
										$result=select("select * from subcategory where cat_id='".$catid."'");
										while($r=mysqli_fetch_array($result))
										{
											extract($r);
										?>
										<option value="<?=$sub_id?>">
										<?=ucwords($sub_name)?>
										</option><?php
										}
										?>
										</select>
                                                  </div>
                                    </div>
                            <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3"> COLOUR </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" type="text" name="colour" id="expensedate"  required="enter the item">
                                        </div>
                                    </div>			
				    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3"> PRICE </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" type="text" name="price" id="expensedate"  required="">
                                        </div>
                                    </div>
<div class="form-group ">
 <label for="ccomment" class="control-label col-lg-3"> DESCRIPTION</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="ccomment" name="des" required=""></textarea>
                                        </div>
                                    </div>

<div class="form-group ">
 <label for="ccomment" class="control-label col-lg-3"> IMAGE</label>
 <div class="col-lg-6">
<input type="file" name = "myfile" id = "image" class="form-control" required="" >

</div>
</div>
 <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn  btn-block btn-primary" name="saveexpence" type="submit">Save</button>
                                                 </div>
                                    </div>

</form>
								
							
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                            </div>
<?php
//print_r($_SESSION);
if(isset($_REQUEST['savecat']))
{
	$id=$_SESSION['userid'];
	extract($_REQUEST);
	$n=iud("INSERT INTO `category`(`name`, `discription`, `userid`) values ('$catname','$catdis','$id')  ");
	if($n==1)
	{
echo "Successful";
	}
}
?>
                        </div>
	
	<?php
}
	
?>

	
						
						
                        
                    </section> 
            </div>
            </div>
            
            <!-- page end-->
        </div>
</section>

</section>

<!--main content end-->

</section>
<script>
   var selectBox = document.getElementsByName("catid")[0];
var fileInput = document.getElementById("image");

selectBox.addEventListener("change", checkInputs);
fileInput.addEventListener("change", checkInputs);

function checkInputs() {
  if (selectBox.value && fileInput.value) {
    makePrediction();
  }
}

function makePrediction() {
  var data = new FormData();
  data.append('catid', selectBox.value);
  data.append('myfile', fileInput.files[0]);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/predict/');
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      alert('The predicted value is ' + response.breed);
    } else {
      alert('Request failed. Returned status of ' + xhr.status);
    }
  };
  xhr.send(data);
}

</script>



<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
