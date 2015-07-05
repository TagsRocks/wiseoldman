<!DOCTYPE html>

<?php require "Entities/Quest.php"; ?>
<?php require "Entities/Collection.php"; ?>
<?php require "Entities/Connection.php"; ?>

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
            include "include/header.php";
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
            <table class="quests table table-bordered">
                <thead>
                    <th class="quest_title">
                        Quest
                    </th>
                    <th>
                        Skill Requirements
                    </th>
                    <th>
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
                                <?php foreach($quest->get_skill_requirements() as $requirement): ?>
                                    <img class="skill_icon"
                                    src="res/img/icon/<?=$skill_collection[$requirement->get_skill_id()]['name']?>_icon.png"/>
                                    <span class="label skill_requirement label-success">
                                        <?=$requirement->get_skill_level();?>
                                    </span>
                                <?php endforeach; ?>
                            </td>
                            <td class="quest_requirements">
                                <ul class="list-group quests collapse">
                                    <?php foreach($quest->get_quest_requirements() as $quest_requirement): ?>
                                        <li class="list-group-item">
                                            <?=$quest_requirement->get_title()?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <ul class="list-group quests summary">
                                    <li class="list-group-item">
                                        <b><?=count($quest->get_quest_requirements());?></b> Required Quests
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <?=$quest->get_difficulty()?>
                            </td>
                            <td>
                                <?php switch($quest->get_length()) { 
                                    case "Short":
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">

                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case "Short-Medium":
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width: 37%;">

                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case "Medium":
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">

                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case "Long":
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">

                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case "Very Long":
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">

                                        </div>
                                    </div>
                                    <?php
                                    break;
                                } ?>
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
    $(document).ready(function() {
        $("tr").click(function() {
            $(this).find(".list-group.summary").toggle();
            $(this).find(".list-group.collapse").toggle();
            $(this).toggleClass("active");
        })
    })
    </script>
</html>
