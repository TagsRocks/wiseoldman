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
            $skill_collection = new Collection("skills");
            $skill_collection = $skill_collection->get_collection();
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

            <div class="table-manager">
                <button id="show_skill_requirements" type="button" class="btn btn-default active" data-toggle="button" aria-pressed="true" autocomplete="off">
                    Show Skill Requirements
                    <span class="glyphicon glyphicon-remove"></span>
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
                <button id="show_quest_requirements" type="button" class="btn btn-default active" data-toggle="button" aria-pressed="true" autocomplete="off">
                    Show Quest Requirements
                    <span class="glyphicon glyphicon-remove"></span>
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
                <button id="toggle_cascading" type="button" class="btn btn-default" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Enable cascading skill requirements
                    <span class="glyphicon glyphicon-remove"></span>
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
            </div>

            <table id="quest_table" class="quests table table-bordered">
                <thead>
                    <th class="quest_title">
                        Quest
                    </th>
                    <th id="skill_requirements">
                        Skill Requirements
                    </th>
                    <th id="quest_requirements">
                        Quest Requirements
                    </th>
                    <th>
                        Difficulty
                    </th>
                    <th>
                        Length
                    </th>
                    <th>
                        Members/Free
                    </th>
                </thead>
                <tbody>
                    <?php
                    $connection = new Connection();
                    $quests = $connection->get_connection()->query('SELECT * FROM quests');
                    while($row = $quests->fetch_assoc()) :
                        $quest = new Quest($row['id']);
                        ?>

                        <tr>
                            <td class='quest_title'>
                                <?=$quest->get_title()?>
                            </td>

                            <td class="skill_requirements">
                                <ul class="list-group quests">
                                    <?php foreach($quest->get_skill_requirements() as $requirement): ?>
                                        <li class="list-group-item">
                                            <?php
                                            if($requirement->get_skill_id() < 25) : ?>
                                                <img style="position: absolute; right: 10px;" class="skill_icon"
                                                src="Public/img/icon/<?=$skill_collection[$requirement->get_skill_id()]['name']?>_icon.png"/>
                                                <?=$requirement->get_skill_level();?>
                                                <?=$skill_collection[$requirement->get_skill_id()]['name'];?>
                                            <?php endif; ?>

                                            <?php
                                            if($requirement->get_skill_id() == 25) : ?>
                                                <img style="position: absolute; right: 10px;" class="skill_icon"
                                                src="Public/img/icon/Combat_icon.png"/>
                                                <?=$requirement->get_skill_level();?>
                                                Combat
                                            <?php endif; ?>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                    <?php
                                    //here I should loop through the quest requirements and get
                                    //any skill requirements for those

                                    foreach($quest->get_quest_requirements() as $quest_requirement):?>
                                        <ul class="list-group quests secondary">
                                            <?php if(count($quest_requirement->get_skill_requirements()) > 0) : ?>
                                            <li class="list-group-item quest-title">
                                                <b>[<?=$quest_requirement->get_title();?>]</b>
                                                <img style="position: absolute; right: 10px;" class="skill_icon"
                                                        src="Public/img/icon/QP_icon.png"/>
                                            </li>
                                            <?php endif; ?>
                                            <?php foreach($quest_requirement->get_skill_requirements() as $quest_requirement_skill_requirement):?>

                                                <li class="list-group-item quest-requirement-skill-requirement">
                                                    <?php
                                                    if($quest_requirement_skill_requirement->get_skill_id() < 25) : ?>
                                                        <img style="position: absolute; right: 10px;" class="skill_icon"
                                                        src="Public/img/icon/<?=$skill_collection[$quest_requirement_skill_requirement->get_skill_id()]['name']?>_icon.png"/>
                                                        <?=$quest_requirement_skill_requirement->get_skill_level();?>
                                                        <?=$skill_collection[$quest_requirement_skill_requirement->get_skill_id()]['name'];?>
                                                    <?php endif; ?>

                                                    <?php
                                                    if($quest_requirement_skill_requirement->get_skill_id() == 25) : ?>
                                                        <img style="position: absolute; right: 10px;" class="skill_icon"
                                                        src="Public/img/icon/Combat_icon.png"/>
                                                        <?=$quest_requirement_skill_requirement->get_skill_level();?>
                                                        Combat
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endforeach;?>

                                    <?php if(count($quest->get_skill_requirements()) == 0) : ?>
                                        <li class="list-group-item">
                                            None
                                        </li>
                                    <?php endif; ?>
                            </td>
                            <td class="quest_requirements">
                                <ul class="list-group quests">
                                    <?php foreach($quest->get_quest_requirements() as $quest_requirement): ?>

                                            <li class="list-group-item toggle-quest-requirements">
                                                <?=$quest_requirement->get_title()?>
                                            </li>
                                        <!-- I should add a means to toggle each sub-quest -->
                                                <div class="list-group-hidden">
                                                <?php foreach($quest_requirement->get_skill_requirements() as $skill_requirement) : ?>
                                                    <li class="list-group-item">
                                                        <?php
                                                        if($skill_requirement->get_skill_id() < 25) : ?>
                                                            <img style="position: absolute; right: 10px;" class="skill_icon"
                                                            src="Public/img/icon/<?=$skill_collection[$skill_requirement->get_skill_id()]['name']?>_icon.png"/>
                                                            <?=$skill_requirement->get_skill_level();?>
                                                            <?=$skill_collection[$skill_requirement->get_skill_id()]['name'];?>
                                                        <?php endif; ?>

                                                        <?php
                                                        if($skill_requirement->get_skill_id() == 25) : ?>
                                                            <img style="position: absolute; right: 10px;" class="skill_icon"
                                                            src="Public/img/icon/Combat_icon.png"/>
                                                            <?=$skill_requirement->get_skill_level();?>
                                                            Combat
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </div>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if(count($quest->get_quest_requirements()) == 0) : ?>
                                <ul class="list-group quests">
                                    <li class="list-group-item">
                                        None
                                    </li>
                                </ul>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?=$quest->get_difficulty()?>
                            </td>
                            <td>
                                <?=$quest->get_length()?>
                            </td>
                            <td>
                                <?=$quest->get_type()?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>

    <script>
        $("#toggle_cascading").click(function() {
            $("ul.secondary").each(function() {
                $(this).toggle();
            });
            $(this).find(".glyphicon").each(function() {
                $(this).toggle();
            });
        });
        $("#show_skill_requirements").click(function() {
            $("th#skill_requirements").toggle();
            $("td.skill_requirements").toggle();
            $(this).find(".glyphicon").each(function() {
                $(this).toggle();
            });
            $(this).removeClass("focus");
            $(this).blur();
        })
        $("#show_quest_requirements").click(function() {
            $("th#quest_requirements").toggle();
            $("td.quest_requirements").toggle();
            $(this).find(".glyphicon").each(function() {
                $(this).toggle();
            });
            $(this).removeClass("focus");
            $(this).blur();
        })
        $(".toggle-quest-requirements").each(function() {
            $(this).click(function() {
                $(this).next(".list-group-hidden").toggle();
            })
        });
    </script>
</html>
