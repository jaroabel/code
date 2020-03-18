<?php

include('includes/header.php');

if( isset($_SESSION['rank'])) {
    $val_rank = $_SESSION['rank'];
}
?>

<div>

<div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                <h1>Admin</h1><p>&nbsp;</p>

                <?php if( $val_rank === 1 ){ ?>
                <!-- RANK 1 MENU -->
                <div class="row row-cols-3">
                    <div class="col">
                        <!-- card 1 -->
                        <div class="card" style="width: 18rem;">
                            <img src="images/add_user.png" class="card-img-top" alt="Add user">
                            <div class="card-body">
                                <h5 class="card-title">Add new user</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="new_account.php" class="btn btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 2 -->
                        <div class="card" style="width: 18rem;">
                            <img src="images/manage_users.png" class="card-img-top" alt="Manage Users">
                            <div class="card-body">
                                <h5 class="card-title">Manage all users</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="find_user.php" class="btn btn-primary">Manage user</a>
                            </div>
                        </div>
                    </div>
                    <!-- caer 3
                    <div class="col">
                        
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                -->
                </div>
                <?php } elseif( $val_rank === 2 ){ ?>
                <!-- RANK 2 MENU -->
                <div class="row row-cols-3">
                    <div class="col">
                        <!-- card 1 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Rank 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 2 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 3 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } elseif( $val_rank === 3 ){ ?>
                <!-- RANK 3 MENU -->
                <div class="row row-cols-3">
                    <div class="col">
                        <!-- card 1 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Rank 3</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 2 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 3 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?> 
                <!-- NO RANK found -->
                <div class="row row-cols-3">
                    <div class="col">
                        <!-- card 1 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title  Rank not found</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 2 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- card 3 -->
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>               



                </div>
            </div>
        </div>
</div>

</div>

<?php
include( DOC_ROOT . '/include/footer.php' );
?>