<?php
session_start();
error_reporting(0);
define('__ROOT__', dirname(dirname(__FILE__)));
require(__ROOT__.'/vendor/autoload.php');
require(__ROOT__.'/firestore.php');
use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient([
        'projectId' => 'petik-357402'
    ]);

$userprofile = new firestore(collection:'vetclinic');
$check1=$userprofile->checkvet($_SESSION['user_id']);

if($check1)
    {
      $_SESSION['checkuser']='vetclinic';
      $docRef = $db->collection('vetclinic')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
   // $sdfs=$userprofile->snapshot();
    }
else
{
  $_SESSION['checkuser']='petstore';
  $docRef = $db->collection('petstore')->document($_SESSION['user_id']);
    $snapshot = $docRef->snapshot();
    
}
$num = $_SESSION['checkuser'];
$iduser = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PETik CAPSTONE PROJECT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <style>
  .btn1 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }.btnn{
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }
        .center {
  margin: auto;
  width:80%;
}
        </style>

</head>

<body class="user-profile">

<?php include './header-user1.php';?>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Verify Your Account</a>
            </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="typography-line">
            <a class="navbar-brand" href="#" style="size:50px;">Welcome to Petik, <?PHP printf($_SESSION['user_id'])?></a>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">  
                <a class="dropdown-item" href="./about.php">About Us</a>
                <a class="dropdown-item"  href="./terms.php">Terms and Agrrement</a>
                  <a class="dropdown-item" href="./logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm" >
      </div>
      <div class="content" >
        <div class="center" >
          
          <div class="center">
          <div class="card">
              <div class="card-header">

                <h5 class="title">Send Documents :</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" id="docform" name="docform">
              <div class="row">
                    <div class="col-md-3 pr-1">
                    <h5 style="font-size:12px; padding-top: 9px;color:black; text-align:center;">Barangay Clearance :</h5>
                    </div>
                    <div class="col-md-8 pr-1">
                    <input type="file" class="form-control" name="bc" id="bc"  required>
                        </div>
              </div><br/>
              <div class="row">
                    <div class="col-md-3 pr-1">
                    <h5 style="font-size:12px; padding-top: 9px;color:black; text-align:center;">Mayors Business Permit :</h5>
                    </div>
                    
                    <div class="col-md-8 pr-1">
                        <input type="file" class="form-control" name="mbp" id="mbp" required>
                        </div>
              </div><br/>
              <div class="row">
                <div class="col-md-3 pr-1">
                    <h5 style="font-size:12px; padding-top: 9px;color:black; text-align:center;">BIR Registration Documents :</h5>
                    </div>
                    <div class="col-md-8 pr-1">
                        <input type="file" class="form-control" name="bir" id="bir" required>
                      
                    </div>
              </div><br/>
              <div class="row">
              <div class="col-md-3 pr-1">
                    <h5 style="font-size:12px; padding-top: 9px;color:black; text-align:center;">SSS Registration :</h5>
                    </div>
                    <div class="col-md-8 pr-1">
                        <input type="file" class="form-control" name="sss" id="sss" required>
                      
                    </div>
              </div><br/>
              <div class="row">
              <div class="col-md-3 pr-1">
                    <h5 style="font-size:12px; padding-top: 9px;color:black; text-align:center;">Special Permit if Applicable :</h5>
                    </div>
                    <div class="col-md-8 pr-1">
                        <input type="file" class="form-control" name="spa" id="spa">
                      
                    </div>
                    
              </div><br/>
                  <button class="btn1 btn-info" id="uploaddoc" name="button1" value="" class="login100-form-btn" button type="submit" >
							Submit Documents
						</button>
            <button value="reset" class="btnn btn-primary" button type="reset" id="imgreset">
							Clear Fields
						</button>
                </form>
                
            
              </div>
            </div>
          </div>


        </div>
      </div>
      <?php include './footer.php';?>
    </div>
  </div>

  
<script type="module">

var col = "<?php echo $num; ?>";
sessionStorage.setItem ("Col",col);
var docu = "<?php echo $iduser; ?>";
sessionStorage.setItem("Docu",docu);

</script>



  <!--   Core JS Files   -->
  <!--<script type="module" src="../uploadimg3.js"></script>-->
  <script type="module" src="../uploadimg4.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
</body>

</html>

