<?php

include('includes/header.php');


?>

<div>

<div class="row">
    <div class="col">
      <!-- left col -->
    </div>
    <div class="col-6">
      <!-- Starting new account form -->

      <div class="card">
        <div class="card-header">
          Featured {{ arrMessage.msg }}
        </div>
        <div class="card-body">
          <!-- THE FORM -->
<!-- Default form register (action="admin_processes.php" method="post") -->
<!-- <form class="text-center border border-light p-5"> -->
 <div class="text-center border border-light p-5">
    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input name="fname" type="text" id="fname" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input name="lname" type="text" id="lname" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input name="email" type="email" id="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Username -->
    <input name="username" type="input" id="username" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input name="password" type="password" id="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- User permission rank -->
  
    <select class="form-control" id="rank" name="rank">
      <option value="">Select User permission</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>


    <!-- Sign up button -->
    <input type="hidden" name="action" id="action" value="newaccount"> 
    <button class="btn btn-info my-4 btn-block" v-on:click="checkNewUser">Create account</button>

    <hr>
 </div> 
<!-- </form> -->
<!-- Default form register -->
          <!-- END OF FORM -->
        </div>
      </div>

      <!-- End new account form -->
    </div>
    <div class="col">
      <!-- right col -->
    </div>
  </div>


</div>

<?php
include( DOC_ROOT . '/include/footer.php' );
?>