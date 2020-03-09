<?php

include('includes/header.php');


?>

<div>

<div class="row">
    <div class="col">
      <!-- left col -->
    </div>
    <div class="col-10">

      <!-- Starting search section -->
        <div class="card">
            <div class="card-header">
            Find User 
            </div>
            <div class="card-body">
            <!-- Start Search form -->
            <table class="table">
                <tbody>
                    <tr>
                    <th scope="row"></th>
                    <td>
                    <div class="form-inline">
                        <div class="form-group mb-2">
                            <label for="email">Enter email to find a user:</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="email" value="" placeholder="email@example.com">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" v-on:click="searchUser('findemail')">Find</button>
                        &nbsp;
                        <button type="submit" class="btn btn-secondary mb-2" v-on:click="clearForm('finduser')">Clear</button>
                    </div>
                    </td>
                    <td>
                        <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                                <label for="getall"> Click here to list all users:</label>
                        </div>
                            <button type="submit" name="getall" class="btn btn-primary mb-2" v-on:click="searchUser('findall')">List all users</button>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
            <!-- End search form -->
            <!-- Starting result table -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rank</th>
                    <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                    <tr>
                        <td colspan="5" v-if="!arr_result">
                            <div class="alert alert-warning" role="alert">
                                This email address " {{ email }} " dosn't exist in our record!
                            </div>
                        </td>
                    </tr>
                    
                    
                    <tr v-for="user in showusers.slice(fnum, snum)">
                        <th scope="row">{{ user.id }}</th>
                        <td>{{ user.fname }}</td>
                        <td>{{ user.lname }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.rank }}</td>
                        <td class="align-right">
                            <div class="form-inline"> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" v-on:click="getUserForModal(user.id, 'getuser')">Update</button>
                                &nbsp; 
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDeleteUser" :value="user.id" v-on:click="setDeleteValue(user.id, user.email)">Delete</button>
                                
                            </div>
                        </td>
                    </tr>
            </table>

            <!-- End result table -->
            </div>
            <table class="table" v-if="arr_length > 3">
                <tr>

                        <td class="align-right">
                            <div class="form-inline">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="getall"> Total user in record: <strong>{{ arr_length }}</strong></label>
                                </div>
                                <button type="button" class="btn btn-secondary" v-on:click="navigateSearch( fnum, snum, 'prev')" v-if="fnum >= step">Previous</button> 
                                &nbsp; 
                                <button type="button" class="btn btn-secondary" v-on:click="navigateSearch( fnum, snum, 'next')" v-if="snum < arr_length">Next</button>
                            </div>
                        </td>
                </tr>
            </table>
        </div>
      <!-- End search section -->
      
    </div>
    <div class="col">
      <!-- right col -->
    </div>
  </div>

<!-- Start Modal Update-->
<template>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update user - {{ message }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <template  v-for="toupdate in modalusers">
              <!-- <form class="text-center border border-light p-5"> -->
                <div class="text-center border border-light p-5">

                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input name="upfname" type="text" id="upfname" class="form-control" :value="toupdate.fname">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input name="uplname" type="text" id="uplname" class="form-control" :value="toupdate.lname">
                        </div>
                    </div>
                    
                    <!-- E-mail -->
                    <input name="upemail" type="email" id="upemail" class="form-control mb-4" :value="toupdate.email">

                    <!-- Username -->
                    <input name="upusername" type="input" id="upusername" class="form-control mb-4" :value="toupdate.username">

                    <!-- User permission rank -->
                    <select class="form-control" id="uprank" name="rank">
                    <option value="">Select User permission</option>
                    <option v-for="rnum in arrRank" :value="rnum" :selected="toupdate.rank === rnum">{{rnum}}</option>
                    </select>

                    
                    <!-- Sign up button -->
                    <input type="hidden" name="updateid" id="updateid" :value="toupdate.id"> 
                    <input type="hidden" name="action" id="action" value="update"> 

                    <hr>
                </div> 
                <!-- </form> -->
          </template>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" v-on:click="sendUserUpdateData('update')">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>
<!-- End Modal update-->

<!-- Start Modal Delete-->
<template>
<div class="modal fade" id="ModalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?<br>
        {{ email }}
      </div>
      <div class="modal-footer">
        <input type="hidden" name="deluid" id="deluid" :value="userid">
        <input type="hidden" name="delemail" id="delemail" :value="email">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="deleteUserForModal(userid, 'delete')">Delete</button>
      </div>
    </div>
  </div>
</div>
</template>
<!-- End Modal Delete-->
</div>

<?php
include( DOC_ROOT . '/include/footer.php' );
?>