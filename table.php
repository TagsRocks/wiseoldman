<!DOCTYPE html>

<html>
    <head>
        <script src="res/js/jquery.js"></script>
        <script src="res/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="res/css/core.css"/>
    </head>
    <body>
        <div class="pre-nav">
            <a class="item" data-target="#modal-login" data-toggle="modal">
                Login
            </a>
            <a class="item">
                Register
            </a>
            <a class="item">
                Contact
            </a>
            <a class="item">
                Contribute
            </a>
            <a class="item">
                Community
            </a>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="res/img/logo.png" height="30px" width="auto"/>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">
                                <span class="glyphicon glyphicon-home"></span> Home
                            </a>
                        </li>
                        <li class="active">
                            <a href="table.php">
                                <span class="glyphicon glyphicon-globe"></span> Quests
                            </a>
                        </li>
                        <li>
                            <a href="table.php">
                                <span class="glyphicon glyphicon-book"></span> Achievement Diaries
                            </a>
                        </li>
                        <li>
                            <a href="table.php">
                                <span class="glyphicon glyphicon-user"></span> Progress
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="top-right">
            <div class="face">
                <img src="res/img/logo.png"/>
            </div>
        </div>

        <?php
        $skills = [
        'Attack',
        'Strength',
        'Defence',
        'Ranged',
        'Prayer',
        'Magic',
        'Runecrafting',
        'Construction',
        'Hitpoints',
        'Agility',
        'Herblore',
        'Thieving',
        'Crafting',
        'Fletching',
        'Slayer',
        'Hunter',
        'Mining',
        'Smithing',
        'Fishing',
        'Cooking',
        'Firemaking',
        'Woodcutting',
        'Farming',
        'QP',
        'Combat'
        ];
        ?>

        <div class="table-options">
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <input id="table-search" type="text" class="form-control search-table" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>
        <table class="quests table table-bordered">
            <thead>
                <th>

                </th>
                <th>
                    Quest
                </th>
                <?php
                    foreach($skills as $skill) {
                        echo "<th
                            class='data hidden-sm hidden-xs'>";
                            ?>
                            <div data-toggle='tooltip' data-placement='left' title='<?=$skill;?>'  style="width: 100%; height: 100%;">
                                <img src="res/img/icon/<?=$skill;?>_icon.png"/>
                            </div>
                            <?php
                        echo "</th>";
                    }
                ?>
            </thead>
            <tbody>
                <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'quest');
                ?>
            </tbody>
        </table>

        <script>
            $("document").ready(function() {
                $(function () {
                  $('[data-toggle="tooltip"]').tooltip()
                })

                $("tr").each(function() {
                    $(this).click(function(e) {
                        if(e.toElement.localName != "input") {
                            $cb = $(this).find("input");
                            $cb.prop("checked", !$cb.prop("checked"));
                        }
                    });
                });
                $("#table-search").keyup(function() {
                    $value = $("#table-search")[0].value;
                    $rows = $(".quest_row");
                    $rows.each(function() {
                        $title = $(this).find(".quest_title");
                        if($title[0].innerHTML.toUpperCase().indexOf($value.toUpperCase()) > -1) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    })
                })

            });
        </script>

        <div class="top-right">
            <div class="face">
                <img src="res/img/logo.png"/>
            </div>
        </div>

        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="loginmodal-container">
                    <h1 class="medieval"><b>Login to Your Account</b></h1><br>
                    <form autocomplete="off">
                        <input style="display:none" type="text" name="fakeusernameremembered"/>
                        <input style="display:none" type="password" name="fakepasswordremembered"/>
                        <input autocomplete="off" type="text" name="user" placeholder="Username">
                        <input autocomplete="off" type="password" name="pass" placeholder="Password">
                        <input autocomplete="off" type="submit" name="login" class="darken-button login loginmodal-submit" value="Login">
                    </form>

                    <div class="login-help">
                        <a href="#">Register</a> - <a href="#">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
