<?php 
 session_start();
error_reporting(E_ALL & ~E_NOTICE);
 
if($_SESSION['username'])
{}
else 
die("<h3>you cannot enter</h3>");
?>
<header>
  
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding-top: 70px">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="#">KRCD</a></div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
        
        
        <ul class="nav navbar-nav navbar-right">
          <li><a href='logout.php'>Logout</a></li>
          
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-1.11.2.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.js"></script>
  </body>
  <div class="row">
  <div class="col-lg-12"></div>
</div>
</html>
</header>
          
  <?php  
 session_start();
error_reporting(E_ALL & ~E_NOTICE);
 
if($_SESSION['username'])
{}
else 
die("<h3>you cannot enter</h3>");
#echo "<h3>Downloads<br>";

$username=$_SESSION['username'];
$con=mysqli_connect("localhost","root","") or die("cannot connect");
mysqli_select_db($con,"logind") or die("can not connect to db");
 $query=mysqli_query($con,"select * from uploads order by time desc");
#  echo " username: ".$username1. "-> download_link:<a href='$download'>'$download'</a> time:'$tst'>";
 # echo "<br>";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  <title></title>
</head>
<body>


<?php if($username==="abc3"){ ?>  
 
    
  

                                     
                              <div class="col-sm-12">
                              <div class="panel-body">
                              <div style="overflow: auto;height: 600px;">
                      
                          <header class="panel-heading">
                             <h3>users</h3> 
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                   <th>Srno.</th>
                                  <th>Username</th>
                                  <th>Filename</th>
                                  <th>time</th>
                                  <th>Date</th>
                                  <th>Download</th>
                                  <th>ETA</th>
                                  <th>alloted time</th>
                              </tr>
                              </thead>
                              
                                                                      <tbody>
                                                                      <?php while($row=mysqli_fetch_assoc($query))
                                                                        { 
                                                                          $i=$i+1;
                                                                          $username1=$row['username'];
                                                                              $download=$row['fileloc'];
                                                                              $time=$row['time'];
                                                                              $id=$row['id'];
                                                                              $tst=date("H:i",strtotime($time));
                                                                              $fname=$row['filename'];
                                                                              $ta=$row['ETA'];
                                                                              $tdate=date("d-m-y",strtotime($time));
                                                                          ?>
                                                                      <tr>
                                                                      <td><?php echo $i; ?></td>
                                                                      <td> <?php echo $username1; ?></td>
                                                                      <td><?php echo $fname; ?></td>
                                                                      <td><?php echo $tst; ?></td>
                                                                      <td><?php echo $tdate; ?></td>
                                                                      <td><a href="<?php echo $download?>"><?php echo $download?></a></td>
                                                                      <td> <form action="incr.php?u=<?php echo $username1 ?>&f=<?php echo $fname ?>" method="POST">
                                                                      <input type="text" name="eta"> 
                                                                       <input type="submit" value="submit">   
                                                                      </form></td>
                                                                      <td><?php echo $ta; ?></td>
                                                                      
                                                                                                                                                </td>
                                                                  </tr>
                                                                  <?php  } ?>
                                                                  </tbody>
                                                              </table>
                                                          
                                                      </div>
                                                       </div>
                                                      </div>
                                                       

                                                     
                                                     
                                                    <?php 

                                    #echo "<a href='logout.php'>click here to logout</a> ";
                                       }
                                      else
die("you cannot enter");

?>

<!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
</body>
</html>
 