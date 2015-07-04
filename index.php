<!DOCTYPE html>

<html>
    <head>
        <script src="res/js/jquery.js"></script>
        <script src="res/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="res/css/core.css"/>
    </head>
    <body>
        <div class="page-container">

            <?php
            include "header.php";
            ?>  

            <div class="jumbotron osrs">
                <div class="background">

                </div>
                <div class="container front-page">
                    <h1 class="noselect medieval banner-title"><b>OSRS Quest Manager</b> <small style="display: inline-block;">-&nbsp;Quest Your Best</small></h1>
                    <p>
                        <small>OSRS Quest Manager is a community dedicated to giving our users the most efficient questing experience possible.
                        We offer the most efficient questing routes, experience trackers and progress trackers, aswell
                        as the most up to date and advanced questing guides you could ever hope for.</small>
                    </p>
                    <p>
                        <small>OSRS Quest Manager comes with a range of features you just won't find anywhere else. OSRS Quest Manager can
                        evaluate your account and provide you with the most efficient questing path to complete a certain quest or unlock
                        that quest cape you desire so much...</small>
                    </p>
                    <p>
                        <small>We have unique portals dedicated to <abbr title="A self sufficient account">ironmen</abbr>,
                            <abbr title="A limited self sufficient account">hardcore ironmen</abbr>, and regular accounts, as well as one defence
                        pures and berserker pures - and a few others - to ensure that your account achieves it's full potential, risk free.</small>
                    </p>
                    <p>
                        <?php
                        if(!isset($_SESSION['email'])) {
                            ?>
                            <div class="row button-row">
                                <div class="col-md-4 center-content">
                                    <a class="btn btn-default btn-lg" href="#" role="button" data-target="#modal-register" data-toggle="modal">
                                        Sign Up
                                    </a>
                                </div>
                                <div class="col-md-4 center-content">
                                    <a data-target="#modal-login" data-toggle="modal" id="login-modal-trigger"
                                    class="btn btn-default btn-lg" href="#" role="button">
                                        Already have an account?
                                    </a>
                                </div>
                                <div class="col-md-4 center-content">
                                    <a class="btn btn-default btn-lg" href="quests.php" role="button">
                                        Quest Table
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row bottom-home">
                    <div class="col-md-4 center-content">
                        <h3>
                            <b>Quest List</b>
                        </h3>
                        <hr>
                        <p>
                            We boast of our tabular quest list quite a lot, <i>we have good reason to</i>. We
                            offer the most accessible, most interactive tabular quest list in the entire
                            OSRS community. It's easy to see what quests your account is able to do, what
                            quests your account is close to being able to do and what quests your account
                            has completed.
                        </p>
                        <p>
                            There are way too many features of our quest table to put here, so you should
                            definitely check it out.
                        </p>
                    </div>
                    <div class="col-md-4 center-content">
                        <h3>
                            <b>Account Tracker</b>
                        </h3>
                        <hr>
                        <p>
                            We take advantage of a number of available APIs to track your account's ingame
                            progress, such as the hi-score API provided by the Jagex team. These APIs allow
                            us to update your progress here without you having to worry about doing so.
                        </p>
                        <p>
                            Unfortunately, we're unable to track quests (yet), so for the time being you're
                            going to have to manually enter any quests you've completed so that we're able to
                            do the rest. <i>Although, that isn't too hard, is it?</i>
                        </p>
                    </div>
                    <div class="col-md-4 center-content">
                        <h3>
                            <b>Grand Exchange Tool</b>
                        </h3>
                        <hr>
                        <p>
                            We're always coming up with new ideas, one of which is a grand exchange flipping
                            application that monitors items sold through the grand exchange that have the largest
                            price margins. This is achievable because of the OSbuddy exchange API.
                        </p>
                        <p>
                            <hr>
                            <a class="btn btn-default btn" href="#" role="button" data-toggle="tooltip" data-placement="top"
                            title="Not quite finished this yet...">
                                It's worth checking out <span class="glyphicon glyphicon-arrow-right"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="loginmodal-container">
                        <h1 class="medieval"><b>Login to Your Account</b></h1>
                        <hr>
                        <form action="login-process.php" method="POST" autocomplete="off">
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
        </div>
    </body>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</html>
