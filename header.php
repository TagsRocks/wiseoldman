        <?php
        $active = $_SERVER["PHP_SELF"];
        $active = explode('/', $active);
        $active = $active[count($active) - 1];
        $active = str_replace(".php", "", $active);
        ?>

        <div class="pre-nav">
            <a class="item" data-target="#modal-login" data-toggle="modal">
                Login
            </a>
            <a class="item" data-target="#modal-register" data-toggle="modal">
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
            <a class="item">
                Support
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
                <img src="res/img/logo.png"/>
            </div>
        </div>