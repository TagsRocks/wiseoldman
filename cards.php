<?php
require("Entities/Quest.php");
require("Entities/Connection.php");
require("Entities/Collection.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="Public/js/jquery.js"></script>
        <script src="Public/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="Public/css/core.css"/>
    </head>
    <body>
        <div class="page-container">

            <?php
            Include "Include/header.php";
            ?>
            <div class="jumbotron compact">
                <div class="container sub-page">
                    <h2 class="noselect medieval sub-title">
                        <b>
                            <span class="glyphicon glyphicon-globe"></span>
                            Quests
                        </b>
                    </h2>
                </div>
            </div>
            <div class="container pad-top">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h3 class="quest-title panel-title pull-left">Animal Magnetism</h3>
                            </div>
                            <div class="panel-body no-pad">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="list-group">
                                            <div style="text-align: center;" class="list-group-item">
                                                <img class="pull-left" height="18px" width="auto" src="/Public/img/icon/Stats_icon.png"/>&nbsp;
                                                <b>Skills Required</b>
                                            </div>
                                            <div class="list-group-item">
                                                <img class="pull-left" height="18px" width="auto" src="/Public/img/icon/Hunter_icon.png"/>&nbsp;
                                                18 Slayer
                                            </div>
                                            <div class="list-group-item">
                                                <img class="pull-left"  height="18px" width="auto" src="/Public/img/icon/Ranged_icon.png"/>&nbsp;
                                                30 Ranged
                                            </div>
                                            <div class="list-group-item">
                                                <img class="pull-left"  height="18px" width="auto" src="/Public/img/icon/Woodcutting_icon.png"/>&nbsp;
                                                36 Woodcutting
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="list-group">
                                            <div style="text-align: center;" class="list-group-item">
                                                <img class="pull-right"  height="18px" width="auto" src="/Public/img/icon/QP_icon.png"/>&nbsp;
                                                <b>Quests Required</b>
                                            </div>
                                            <div class="list-group-item">
                                                <img class="quest pull-right"  height="18px" width="auto" src="/Public/img/icon/QP_icon.png"/>&nbsp;
                                                Priest In Peril
                                            </div>
                                            <div class="list-group-item">
                                                <img class="quest pull-right"  height="18px" width="auto" src="/Public/img/icon/QP_icon.png"/>&nbsp;
                                                Restless Ghost
                                            </div>
                                            <div class="list-group-item">
                                                <img class="quest pull-right"  height="18px" width="auto" src="/Public/img/icon/QP_icon.png"/>&nbsp;
                                                Ernest The Chicken
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-4 ">
                                        Length
                                        <br>
                                        <small>Medium</small>
                                    </div>
                                    <div class="col-xs-4">
                                        Type
                                        <br>
                                        <small>Members</small>
                                    </div>
                                    <div class="col-xs-4">
                                        Difficulty
                                        <br>
                                        <small>Intermediate</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
