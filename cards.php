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
                    <?php $quests = new Collection("quests"); ?>
                    <?php $skills = new Collection("skills"); ?>
                    <?php foreach($quests->get_collection() as $quest_row) : ?>
                        <?php $connection = new Connection; ?>
                        <?php $quest = new Quest($quest_row['id']); ?>
                        <div class="col-md-4 col-sm-4 panel-container">
                            <ul class="panel-options">
                                <li data-toggle="tooltip" data-placement="top" title="View Guides">
                                    <span class="glyphicon glyphicon-book"></span>
                                </li>
                                <li data-toggle="tooltip" data-placement="right" title="Mark Completed">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </li>
                                <li data-toggle="tooltip" data-placement="right" title="To Do List">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" title="Join Discussion">
                                    <span class="glyphicon glyphicon-comment"></span>
                                </li>
                            </ul>
                            <div class="panel panel-default" >
                                <div class="panel-heading clearfix quest-title">
                                    <h3 class="quest-title panel-title pull-left"><?=$quest->get_title();?>

                                    </h3>
                                </div>
                                <div class="panel-body no-pad">
                                    <div class="row" >
                                        <div class="col-xs-12" >
                                            <div class="list-group" >
                                                <div class="list-group-item list-title" >
                                                    <img style="margin-top: -6px;" height="20px" width="auto" src="/Public/img/icon/Stats_icon.png"/>&nbsp;
                                                    <b>Stats Required</b>
                                                </div>

                                                <div class="list-group-item skill">
                                                    <div class="skills_container">
                                                        <?php foreach($quest->get_skill_requirements() as $key=>$skill_requirement) : ?>
                                                            <div class="skill"/>
                                                                <img height="18px" width="auto"
                                                                src="/Public/img/icon/<?=$skills->get_collection()[$skill_requirement->get_skill_id() - 1]['name']?>_icon.png"/>
                                                                <div>
                                                                    <?=$skill_requirement->get_skill_level();?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <?php if(count($quest->get_skill_requirements())==0) : ?>
                                                            <div class="skill">
                                                                <img height="18px" width="auto"
                                                                src="/Public/img/icon/No_skills_icon.png"/>
                                                                <div>
                                                                    None
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="list-group">
                                                <div class="list-group-item">
                                                    <b>Quests Required</b>
                                                </div>
                                                <div class="list-group-item quest">
                                                    <div class="quest-row">

                                                        <?php foreach($quest->get_quest_requirements() as $quest_requirement) : ?>
                                                            <div style="margin-left: 5px; margin-right: 5px;" class="label label-primary quest">
                                                                <?=$quest_requirement->get_title();?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <?php if(count($quest->get_quest_requirements()) == 0) : ?>
                                                            None
                                                        <?php endif; ?>
                                                    </div>
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
                                            <small><?=$quest->get_length();?></small>
                                        </div>
                                        <div class="col-xs-4">
                                            Type
                                            <br>
                                            <small><?=$quest->get_type();?></small>
                                        </div>
                                        <div class="col-xs-4">
                                            Difficulty
                                            <br>
                                            <small><?=$quest->get_type();?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </body>

    <script>
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    })
    </script>
</html>
