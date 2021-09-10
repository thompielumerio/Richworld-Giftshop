<?php
include 'include/head.inc.php';
include 'include/dbc.inc.php';
?>

</body>
</html>
<script src="js/script.js?v=<?php echo time(); ?>"></script>
<nav class="navbar navbar-expand-lg navbar-light" id="nav_index">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><p>R<span>G</span></p></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
      <li class="nav-item">
            <a class="nav-link active"aria-current="page" href="index.php#nav-body">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php#download">Download</a>
            </li>
            <li class="nav-item">
            <script src="js/script.js?v=<?php echo time(); ?>"></script>
            <a class="nav-link active" aria-current="page" href="job.php" style="margin-right:20px">Job Listing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php#about" style="margin-right:20px">About</a>
            </li>   
      <li class="nav-item">
            <?php
            session_start();
            if(isset($_SESSION["profile-name"])){
              $accid = $_SESSION["userId"];
              $sql = "SELECT * from account where acc_id = '$accid'";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $_SESSION["refreshpath"] = $row["prof_path"];
                }
              }
              echo '<div class="account-dashboard">
              <div class="dropdown">       
                      <div class="btn-group">';
                          
                          $prof_name = "img/account-profile/".$_SESSION["refreshpath"];?>
                          <img src="<?php echo $prof_name;?>" class="profile_img" alt="profile">
                          <?php
                          echo '<p class="name">'.$_SESSION["profile-name"].'</p>';
                      echo '<button type="button" style="background-color:#FD5757 !important" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="visually-hidden">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Settings</a></li>
                          <li><a class="dropdown-item" href="#">TBD</a></li>
                          <li><a class="dropdown-item" href="#">TBD</a></li>
                          <li><a class="dropdown-item" href="#">TBD</a></li>
                          <li><a class="dropdown-item" href="#">TBD</a></li>
                          <li><a class="dropdown-item" href="#">TBD</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><form action="include/logout.inc.php" method="POST"><a class="dropdown-item"><button type="submit" name="logout">Log out</button></a></form></li>
                      </ul>
                      </div>
              </div>     
              </div>';
            }else{
            echo '<a href="login.php"><button type="button" class="nav-login">Login</button></a>';}?>
            </li>
      </ul>
    </div>
  </div>
</nav>

<section id="job-body">
    <div class="job">
    <div class="container">
          <div class="row">
            <div class="col-6">
              <h1 style="margin-left:8%">Job Vacancies</h1>
            </div>
            <div class="col-6">
              <input type="text" name="search_input" id="search_name">
              <button type="button" name="button_input" onclick="search_click();">Search</button>
            </div>
          </div>
        </div>
          <div id="job-listIndex">
            <div class="container">
            <div class="row">
            <?php
              include 'include/showjobIndex.inc.php';?>
            </div>
            </div>
          </div>
    </div>
    <!-- start modal view job index -->
  <div class="modal fade" id="viewjobIndex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
     <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle"></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
         <div class="container-fluid p-0">
         <div class="row">
         <!-- <div class="col-12">
         <input type="text" class="form-control" placeholder="ID"></div> -->
         <div class="col-4 salary-min">
           <p class="min"></p>
         </div>
         <div class="col-1 salary-min">
           <p>-</p>
         </div>
         <div class="col-4 salary-max">
           <p class="max"></p>
         </div>
         <div class="col-sm-12 col-lg-12 job-des">
           <h6>Job Description: </h6>
           <p class="desc"></p>
         </div>                                             
         </div>
         </div>
     </div>
     <div class="modal-footer">
         <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
         <button type="button" class="btn btn-primary" onclick="addEmp()" style="width:100%">Apply Now</button>
         <p style="width:100%;text-align:center" class="pdf">* You must sign in to upload your pdf resume *</p>
         <div id="add"></div>
     </div>
     </div>
 </div>
</div>
    <!-- end modal view job index -->
    
</section>