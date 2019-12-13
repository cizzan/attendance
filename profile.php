<?php 

include_once('includes/header.php');


//change pasword

if(isset($_POST['changepwd'])){
 $oldpassword = $_POST['oldpassword'];
 $newpassword =$_POST['newpassword'];
 $newpassword1 = $_POST['newpassword1'];
 if(empty($_POST['oldpassword'])||empty($_POST['newpassword'])||empty($_POST['newpassword1'])){
    $error = "Please fill in all the details.";
  }elseif ($_POST['newpassword']!=$_POST['newpassword1']) {
    $error = "Passwords do not match.";
  }else{

  $sql2 = "SELECT * FROM user where id = '$user_id'";
  $query2 = mysqli_query($connection,$sql2);
  $data2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);

  if(md5($oldpassword)!=$data2['password']){
    $error= "Old Password is incorrect.";
  }elseif ($oldpassword==$_POST['newpassword']) {
    $error = "Old and New Password cannot be same.";
  }else{
  mysqli_query($connection, "UPDATE user set password =md5('$newpassword') WHERE id='$user_id'");
  $msg = "Password Changed successfully.";
  
  }
  }
}

//update data
if(isset($_POST['update'])){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $designation = $_POST['designation'];
  $company = $_POST['company'];
  $about = $_POST['about'];

  if(!preg_match("/^[a-zA-Z ]*$/", $firstname) || !preg_match("/^[a-zA-Z ]*$/", $lastname)){
    $error = "Name should contain only letters.";
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email address.";
  }elseif (!empty($username) && !empty($email)) {
    $updateuserquery = mysqli_query($connection, "UPDATE user set username='$username' WHERE id='$user_id'");

    if($updateuserquery){
      $msg ="DONE";
    }else{
      $error = "User can't be modified. Mysql Says: " . mysqli_error($connection);
    }
  }else{
    
  }

//$error= "hello we are here";

}





?>

<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./assets/img/theme/<?php echo $data['profilephoto'];?>); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Hello <?php echo ucfirst($data['firstname']); ?></h1>
        <p class="text-white mt-0 mb-5">This is your profile page. You can make changes to your profile information from this page.</p>
        
        <label for="example-text-input" class="form-control-label">Switch to Edit Your Details</label><br/>
        <label class="custom-toggle">
    <input class="slide-toggle" type="checkbox">
    <span class="custom-toggle-slider rounded-circle"></span>
</label>

      </div>

    </div>

  </div>

</div>
<?php include_once('includes/message.php'); ?>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="./assets/img/theme/<?php  if($data['photo']=='') {echo 'dummy.jpg';} else {echo $data['photo'];} ?>" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <!--<div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
          </div>-->
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                  <span class="heading">22</span>
                  <span class="description">Friends</span>
                </div>
                <div>
                  <span class="heading">10</span>
                  <span class="description">Photos</span>
                </div>
                <div>
                  <span class="heading">89</span>
                  <span class="description">Comments</span>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <h3>
              <?php echo ucwords($data['firstname'] . " ". $data['lastname']);  ?><span class="font-weight-light">, <?php $dateOfBirth = $data['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
echo $diff->format('%y');?></span>
            </h3>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i><?php echo ucwords($data['city'] . ", ". $data['country']);  ?>
            </div>
            <div class="h5 mt-4">
              <i class="ni ni-briefcase-24 mr-2"></i><?php echo ucwords($data['designation']);  ?>
            </div>
            <div>
              <i class="ni ni-hat-3 mr-2"></i><?php echo ucwords($data['company']);  ?>
            </div>
            <hr class="my-4" />
            <p><?php echo ucfirst($data['about']);  ?></p>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">My account</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-chgpwd">Change Password</a>
              <div class="modal fade" id="modal-chgpwd" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">

                      <div class="card bg-secondary shadow border-0">
                        
                        <div class="card-body px-lg-5 py-lg-5">
                          <div class="text-center text-muted mb-4">
                            <small>Change your password from here.</small>
                          </div>
                          <form role="form" method="post">
                            <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Old Password" type="password" name="oldpassword" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                </div>
                                <input id="password" class="form-control" placeholder="New Password" type="password" name="newpassword" required >
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                </div>
                                <input id="confirm_password" class="form-control" placeholder="Confirm New Password" type="password" name="newpassword1" required>
                              </div>
                            </div>
                            
                            <div class="text-center">
                              <button type="submit" class="btn btn-warning my-4" name="changepwd">Change Password</button>
                            </div>
                          </form>
                        </div>
                      </div>




                    </div>

                  </div>
                </div>
              </div>





            </div>
          </div>
        </div>

        <div class="card-body">
          <form id="GFG" method="post">
            <?php
              //echo $user_id;
            $sql1 = "SELECT * FROM user where id = '$user_id'";
            $query1 = mysqli_query($connection,$sql1);
            $data1 = mysqli_fetch_array($query1); ?>
            
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" name="username" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $data1['username']; ?>" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php echo $data['email']; ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">First name</label>
                    <input type="text" name="firstname" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $data['firstname']; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Last name</label>
                    <input type="text" name="lastname" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $data['lastname']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Date of Birth</label>
                    <input type="text" name="dob" id="input-dob" class="form-control form-control-alternative datepicker" placeholder="Select Date" value="<?php echo $data['dob']; ?>" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <?php
                          $male = '';
                          $female = '';
                          if(isset($data['gender'])){
                            if($data['gender'] == "f"){
                            $male = '';
                            $female = 'checked'; 
                            }elseif ($data['gender'] == "m") {
                            $male = 'checked';
                            $female = '';
                            }
                          }
                            
                        ?>

                    <label class="form-control-label" for="input-gender">Gender</label><br/>
                    <div class="custom-control custom-radio mb-3 custom-control-inline">
                      <input name="gender" class="custom-control-input" id="customRadio5" type="radio" value="m" <?php echo $male;?>>
                      <label class="custom-control-label" for="customRadio5">Male</label>
                    </div>
                    <div class="custom-control custom-radio mb-3 custom-control-inline">
                      <input name="gender" class="custom-control-input" id="customRadio6" type="radio" value="f" <?php echo $female;?>>
                      <label class="custom-control-label" for="customRadio6">Female</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Contact information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" name="address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $data['address']; ?>" type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-city">City</label>
                    <input type="text" name="city" id="input-city" class="form-control form-control-alternative" placeholder="City" value="<?php echo $data['city']; ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Country</label>
                    <input type="text" name="country" id="country_selector" class="form-control form-control-alternative" placeholder="Country" value="<?php echo $data['country']; ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Phone Number</label>
                    <input type="tel" name="phone" id="input-postal-code" class="form-control form-control-alternative" placeholder="xxxxxxxxxx" pattern="^\d{10}$" value="<?php echo $data['phone']; ?>" >
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Description -->

            <h6 class="heading-small text-muted mb-4">About me</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Designation</label>
                    <input type="text" name="designation" id="input-designation" class="form-control form-control-alternative datepicker" placeholder="Select Date" value="<?php echo $data['designation']; ?>" >
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Institution/Company</label>
                    <input type="text" name="company" id="input-company" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $data['company']; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label">Your Introduction</label>
                <textarea rows="4" name="about" class="form-control form-control-alternative" placeholder="A few words about you .."><?php echo $data['about']; ?></textarea>
              </div>
            </div>
            <hr class="my-4" />
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12 text-center">

                  <button class="btn btn-default" type="submit" name="update">Update</button>
                  <input class="btn btn-danger" type="reset" value="Reset">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
        </div>
      </div>
      <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</div>

<?php include_once('./includes/footer.php')?>