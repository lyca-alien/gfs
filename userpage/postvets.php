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

  <!-- TIME -->
  <link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
<script src="js/mobiscroll.javascript.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style>
  .btn1 {
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }
         .btnn{
          
          font-size:13px;
          text-align:center;
          vertical-align:middle;
          cursor:pointer;
  padding: 9px 25px;
          border-radius:.25rem;border: none;
  margin: 9px 2px;
        }

      .hide{
  opacity: 0;
  width: 0;
  float: left; /* Reposition so the validation message shows over the label */
 height: 0; border: none; position: absolute; pointer-events: none;
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
            <a class="navbar-brand" href="#pablo">Post Vets</a>
            
            <a class='btn btn-info float-right' id='list' name='list' href="listofvets.php">Vet List</a>
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
        <div class="row" >
          <div class="col-md-5" >
            <div class="card">
              <div class="card-header">
                <h5 class="title">Vet Profile</h5>
              </div>
              <div class="card-body">
                
              <div class="image" style="height:60%; ">
                <img id="display3" src="" alt="not set" onerror="this.src='../assets/img/bg5.jpg';">
              </div>
<br/>
              <div class="row">
                    <div class="col-md-11 pr-1" >
                        <label>Vet Image</label>
                        <!-- <input type="file" class="form-control" name="prodimg" id="prodimg" required>-->
                         <!-- <button type="button" class="btn btn-primary" id="upload_btn2">Upload</button> -->
<br/>
                      </div>
              </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-7">
          <div class="card">
              <div class="card-header">

                <h5 class="title">Vet Information :</h5>
              </div>
              <div class="card-body">
              <form action="" method="post" id="vetsform" name="form1">
              <div class="row">
                    <div class="col-md-6 pr-1">
                        <label style="color:red;">Vet Image*</label>
                        <input type="file" class="form-control" name="prodimg" id="prodimg" onchange="preview()" required>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Vet Name*</label>
                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="" required>
                      </div>
                    </div>
              </div>
              <div class="row">
                    
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Vet Number*</label>
                        <input type="number" class="form-control" name="Number" id="Number" placeholder="Number" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label style="color:red;">Vet Email*/label>
                        <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>
                        Schedule
                        </label><br>
                          <input style="margin-left:25px;" type="checkbox" id="Sunday" name="week" value="Sunday" onchange=chk_onchange1();>
                          <label for="Sunday"> Sunday</label> 
                          <input   id="demo-time" name="Sundaytime" style="width:50%; margin-left:35px;" type="hidden" placeholder="Please select..." /><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Monday" name="week" value="Monday" onchange= chk_onchange2();>
                          <label for="Monday"> Monday</label>
                          <input  name="Mondayt" id="demo-time" style="width:50%; margin-left:32px;" type="hidden" placeholder="Please select..." /><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Tuesday" name="week" value="Tuesday" onchange= chk_onchange3();>
                          <label for="vehicTuesdayle3"> Tuesday</label>
                          <input  id="demo-time" style="width:50%; margin-left:31px;"name="Tuesdaytime" type="hidden" placeholder="Please select..." /><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Wednesday" name="week" value="Wednesday" onchange= chk_onchange4();>
                          <label for="Wednesday"> Wednesday</label>
                          <input  id="demo-time" style="width:50%; margin-left:10px;"name="Wednesdaytime" type="hidden" placeholder="Please select..." /><br>
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>
                        </label><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Thursday" name="week" value="Thursday" onchange= chk_onchange5();>
                          <label for="Thursday"> Thursday</label>
                          <input  id="demo-time" style="width:50%; margin-left:8px;"name="Thursdaytime" type="hidden" placeholder="Please select..." /><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Friday" name="week" value="Friday" onchange= chk_onchange6();>
                          <label for="Friday"> Friday</label>
                          <input  id="demo-time" style="width:50%; margin-left:27px;"name="Fridaytime" type="hidden" placeholder="Please select..." /><br>
                          <input  style="margin-left:25px;" type="checkbox" id="Saturday" name="week" value="Saturday" onchange= chk_onchange7();>
                          <label for="Saturday"> Saturday</label>
                          <input  id="demo-time" style="width:50%; margin-left:10px;"name="Saturdaytime" type="hidden" placeholder="Please select..." /><br>
                          <input class="hide" name="hide" id="hiddenfile" type="text" >
                        </div>
                    </div>

                    <script type="text/javascript">

                      function chk_onchange1(){
                      if(document.getElementById("Sunday").checked){
                        document.querySelector("[name='Sundaytime']").type ="show";
                        document.querySelector("[name='Sundaytime']").required = "true";
                        document.getElementById("hiddenfile").value = "My value";
                        //chckbox++;
                      }
                      else
                      document.querySelector("[name='Sundaytime']").type = "hidden";
                      document.querySelector("[name='Sundaytime']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange2(){
                      if(document.getElementById("Monday").checked){
                      document.querySelector("[name='Mondayt']").type ="show";
                      document.querySelector("[name='Mondayt']").required = "true";
                      //chckbox++;
                      }
                      else
                      document.querySelector("[name='Mondayt']").type = "hidden";
                      document.querySelector("[name='Mondayt']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange3(){
                      if(document.getElementById("Tuesday").checked){
                      document.querySelector("[name='Tuesdaytime']").type = "show";
                      document.querySelector("[name='Tuesdaytime']").required = "true";
                      //chckbox++;
                    }
                      else
                      document.querySelector("[name='Tuesdaytime']").type = "hidden";
                      document.querySelector("[name='Tuesdaytime']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange4(){
                      if(document.getElementById("Wednesday").checked){
                      document.querySelector("[name='Wednesdaytime']").type = "show";
                      document.querySelector("[name='Wednesdaytime']").required = "true";
                      //chckbox++;
                      }
                      else
                      document.querySelector("[name='Wednesdaytime']").type = "hidden";
                      document.querySelector("[name='Wednesdaytime']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange5(){
                      if(document.getElementById("Thursday").checked){
                      document.querySelector("[name='Thursdaytime']").type = "show";
                      document.querySelector("[name='Thursdaytime']").required = "true";
                      //chckbox++;
                      }
                      else
                      document.querySelector("[name='Thursdaytime']").type = "hidden";
                      document.querySelector("[name='Thursdaytime']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange6(){
                      if(document.getElementById("Friday").checked){
                      document.querySelector("[name='Fridaytime']").type = "show";
                      document.querySelector("[name='Fridaytime']").required = "true";
                      //chckbox++;
                      }
                      else
                      document.querySelector("[name='Fridaytime']").type = "hidden";
                      document.querySelector("[name='Fridaytime']").required = "false";
                      //chckbox--;
                      }
                      function chk_onchange7(){
                      if(document.getElementById("Saturday").checked){
                      document.querySelector("[name='Saturdaytime']").type = "show";
                      document.querySelector("[name='Saturdaytime']").required = "true";
                      //chckbox++;
                      }
                      else
                      document.querySelector("[name='Saturdaytime']").type = "hidden";
                      document.querySelector("[name='Saturdaytime']").required = "false";
                      //chckbox--;
                      }
                      

                      
                      
                      </script>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                    <script>
                    </script>
                    </div>
                  </div>
                  <button class="btn1 btn-info" id="vetupload" name="button1" class="login100-form-btn" button type="submit" >
							Add Vet
						</button>
            <button value="reset" class="btnn btn-primary" button type="reset" id="imgreset" onclick="back()">
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

<script>
function preview(){
  display3.src=URL.createObjectURL(event.target.files[0]);
}
function back(){
  //$('display3').attr("src",originalImgSrc);
  display3.src="../assets/img/bg5.jpg";
}</script>

<script>
mobiscroll.datepicker('#demo-time', {
    controls: ['time'],
    select: 'range'
});
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

