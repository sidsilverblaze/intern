
     

<?php

	session_start();
	$var_value = $_SESSION['username'];
	
	$query = "SELECT * FROM `uploads` where username LIKE '%$var_value%' ";
	$search_result = filterTable($query);
	
	function filterTable($query){
		$connect = mysqli_connect("localhost","root","aki123","clientinfo");
		$filter_Result = mysqli_query($connect , $query);
		return $filter_Result;
	}

?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Client Area | DashBoard </title>
      <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Client</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#about">Work History</a></li>
          </ul>
          
          <ul class="nav navbar-nav  navbar-right">
            <li class="active"><a href="#">Welcome <?php   echo($var_value); ?></a></li>
            <li> <a href="http://localhost/test/logout.php" >Logout </a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
   <header id="header"> 
    <div class= "container">
    	<div class="row">
    		<div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;	Dashboard<small> &nbsp;Manage Your Data</small></h1>
            </div>
            <div class="col-md-2" >
            
            <div class="btn-group " role="group" aria-label="mid_button">
 				 
				 <button type="button" class="btn btn-default" data-target="#myModal" data-toggle="modal"><b><span class="glyphicon glyphicon-open" aria-hidden="true"></span> &nbsp;UPLOAD</b></button>
 				 
</div>
            
            </div>
    </div>
    
    </div>
   </header>
   
   <section id="breadcrumb">
   	<div class="container">
    	<ol class="breadcrumb">
        <li class="active">Dashboard</li>
        </ol>
    </div>
   </section>
   
   <!-- FILES DISPLAY SECTION -->
   <section id="main">
   <div class="container" id="maindiv">
   		<div class="row">
        	<div class="col-md-9">
            	<div class="panel panel-default">
  				 <div class="panel-heading">
  				  <h3 class="panel-title">Records</h3>
  				 </div>
  					<div class="panel-body">
                    <div style="overflow:auto; height:400px">
   						 
                         <table class="table table-striped table-hover table-responsive " >
                         	<tr>
                            	<th>Id</th>
                                <th> Username</th>
								<th> Email</th>
								<th> File Name</th>
                                <th> Time</th>
                                <th> ETA </th>
                            </tr>
							<?php 
							
							while($row = mysqli_fetch_array($search_result)):?>
                            <tr>
                            	
                            	<td><?php if(!isset($_SESSION['username'])) {echo $row['id'];}?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['filename'];?></td>
								<td><?php echo $row['time'];?></td>
								<td><?php echo $row['ETA'];?></td>
                            </tr>	
							<?php endwhile;
							 ?>
                         </table>
                         
                         </div>
  					</div>
				</div>
            
            
        	</div>
        </div>
   </div>	
   
   </section>
    
<footer id="footer">
	<p>Copyright KRCD , &copy;2017 </p>	

</footer>    
    
    
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Your Data</h4>
      </div>
      <div class="modal-body">
      <!--FORM FOR UPLOAD -->
        <form class="form-group" action="upload.php" method="POST" enctype="multipart/form-data">
			<input class="form-control" type="file" name="file">
			
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input  class ="btn btn-default btn-primary" type="submit" name="upload">
      </div>
      </form>
    </div>
  </div>
</div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
