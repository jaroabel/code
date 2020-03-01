<?php


namespace Classes;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include/header_login.php');

/*
$test = new Controllers\Userlogin();

$email = "jma@jmabel.net";
$connect = $test->user_login( $email );
print_r($connect) ;
*/
?>

<div id="app">

<!-- start login form -->
<div class="row">
    <div class="col">
      <!-- left col -->
    </div>
    <div class="col-6">
    <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
      <!-- FORM -->
<!-- Default form login -->
<form class="text-center border border-light p-5" action="processing.php" method="post">

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input name="email" type="email" id="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input name="password" type="password" id="password" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <input type="hidden" name="action" id="action" value="userlogin">
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>


</form>
<!-- Default form login -->
       <!-- END FORM -->
  </div>
</div>
    </div>
    <div class="col">
      <!-- right col -->
    </div>
  </div>

<!-- end login form -->
</div>

<?php
include('include/footer.php');
?>