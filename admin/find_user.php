<?php

include('includes/header.php');


?>

<div id="app">

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
                            <label for="email">Find a single user:</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="email" value="" placeholder="email@example.com">
                        </div>
                        <div class="form-group mb-2">
                        <label for="findall">(OR) Check to list all users:</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input class="form-check-input" type="radio" name="findall" id="findall" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" v-on:click="searchUser">Find</button>
                        &nbsp;
                        <button type="submit" class="btn btn-secondary mb-2" v-on:click="clearForm('finduser')">Clear</button>
                    </div>
                    </td>
                    <td></td>
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
                    </tr>
                </thead>
                
                    <tr v-for="user in showusers">
                        <th scope="row">{{ user.id }}</th>
                        <td>{{ user.fname }}</td>
                        <td>{{ user.lname }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.rank }}</td>
                    </tr>
                
            </table>
            <!-- End result table -->
            </div>
        </div>
      <!-- End search section -->
      
    </div>
    <div class="col">
      <!-- right col -->
    </div>
  </div>


</div>

<?php
include( DOC_ROOT . '/include/footer.php' );
?>