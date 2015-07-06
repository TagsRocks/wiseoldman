        <?php 
        session_start();
        $active = $_SERVER["PHP_SELF"];
        $active = explode('/', $active);
        $active = $active[count($active) - 1]; //magic number, this is bad.
        $active = str_replace(".php", "", $active);
        ?>

        <div class="pre-nav">
            <?php if(!isset($_SESSION['user'])) { ?>
            <a class="item" data-target="#modal-login" data-toggle="modal">
                Login
            </a>
            <a class="item" data-target="#modal-register" data-toggle="modal">
                Register
            </a>
            <?php } else { ?>
            <a href="logout.php?referer=<?=$active;?>" class="item">
                Logout
            </a>
            <?php } ?>
            <a class="item">
                Contact
            </a>
            <a class="item">
                Contribute
            </a>
            <a class="item">
                Community
            </a>
            <a class="item">
                Support
            </a>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="Public/img/logo.png" height="30px" width="auto"/>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($active == 'index') { echo 'active'; }?>">
                            <a href="index.php">
                                <span class="glyphicon glyphicon-home"></span> Home
                            </a>
                        </li>
                        <li class="<?php if($active == 'quests') { echo 'active'; }?>">
                            <a href="quests.php">
                                <span class="glyphicon glyphicon-globe"></span> Quests
                            </a>
                        </li>
                        <li class="<?php if($active == 'diary') { echo 'active'; }?>">
                            <a href="diary.php">
                                <span class="glyphicon glyphicon-book"></span> Achievement Diaries
                            </a>
                        </li>
                        <li class="<?php if($active == 'progress') { echo 'active'; }?>">
                            <a href="progress.php">
                                <span class="glyphicon glyphicon-user"></span> Progress
                            </a>
                        </li>
                        <li class="<?php if($active == 'downloads') { echo 'active'; }?>">
                            <a href="downloads.php">
                                <span class="glyphicon glyphicon-download"></span> Downloads
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="top-right">
            <div class="face">
                <img src="Public/img/logo.png"/>
            </div>
        </div>

        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="loginmodal-container">
                    <h1 class="medieval"><b>Login to Your Account</b></h1>
                    <hr>
                    <?php if(isset($_GET['login'])): ?>
                        <?php if($_GET['login'] == 'fail'): ?>
                            <div class="alert alert-danger" role="alert">Invalid username/password combination.</div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <form action="login.php?referer=<?=$active;?>" method="POST" autocomplete="off">
                        <input style="display:none" type="text" name="fakeusernameremembered"/>
                        <input style="display:none" type="password" name="fakepasswordremembered"/>
                        <div class="row">
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <input autocomplete="off" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <input autocomplete="off" type="submit" name="login" class="darken-button login loginmodal-submit" value="Login">
                    </form>

                    <div class="login-help">
                        <a href="#">Register</a> - <a href="#">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal register fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="loginmodal-container">
                    <h1 class="medieval"><b>Register New Account</b></h1>
                    <form action="register-process.php" method="POST" autocomplete="off">
                        <input style="display:none" type="text" name="fakeusernameremembered"/>
                        <input style="display:none" type="password" name="fakepasswordremembered"/>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p>Unfortunately, we cannot verify OSRS accounts - we also wouldn't want to if we could. We never ask for
                            OSRS details other than your username and we only ask for this so that we can pull in hiscore data for
                            your account.</p>
                            <p>You should not enter your OSRS password on this site if you value your account security. Although we
                            will never attempt to access one of our users accounts, we do not want to and will not accept responsibility
                            if a user's account is compromised due to poor security on their part.</p>
                            <p><small>We do allow you to change your OSRS username in the account management section should this change
                            </small></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    Does not have to match your OSRS email
                                </label>
                                <input autocomplete="off" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label>
                                    Should match your OSRS username
                                </label>
                                <input autocomplete="off" type="text" name="user" placeholder="OSRS Username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    Do not use your OSRS password.
                                </label>
                                <input autocomplete="off" type="password" name="pass" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label>
                                    Confirm Password
                                </label>
                                <input autocomplete="off" type="password" name="pass_confirmed" placeholder="Repeat Password">
                            </div>
                        </div>
                        <hr>
                        <input autocomplete="off" type="submit" name="login" class="darken-button login loginmodal-submit" value="Register">
                    </form>

                    <div class="login-help">
                        <a href="#">Terms and Conditions</a> - <a href="#">Support</a>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($_GET['login'])): ?>
            <?php if($_GET['login'] == 'fail') :?>
                <script>
                    $('#modal-login').modal('show');
                </script>
            <?php endif; ?>
        <?php endif; ?>