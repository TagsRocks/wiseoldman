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
            <table id="quest_table" class="quests table table-bordered">
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
                                <ul class="list-group quests">
                                    <?php foreach($quest->get_skill_requirements() as $requirement): ?>
                                        <li class="list-group-item">
                                            
                                            <?php 
                                            if($requirement->get_skill_id() < 25) : ?>
                                                <img style="position: absolute; right: 10px;" class="skill_icon"
                                                src="res/img/icon/<?=$skill_collection[$requirement->get_skill_id()]['name']?>_icon.png"/>
                                                <?=$requirement->get_skill_level();?>
                                                <?=$skill_collection[$requirement->get_skill_id()]['name'];?> 
                                            <?php endif; ?>

                                            <?php 
                                            if($requirement->get_skill_id() == 25) : ?>
                                                <img style="position: absolute; right: 10px;" class="skill_icon"
                                                src="res/img/icon/Combat_icon.png"/>
                                                <?=$requirement->get_skill_level();?>
                                                Combat
                                            <?php endif; ?>

                                        </li>
                                    <?php endforeach; ?>
                                    <?php if(count($quest->get_skill_requirements()) == 0) : ?>
                                        <li class="list-group-item">
                                            None
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </td>
                            <td class="quest_requirements">
                                <ul class="list-group quests">
                                    <?php foreach($quest->get_quest_requirements() as $quest_requirement): ?>
                                        <li class="list-group-item">
                                            <?=$quest_requirement->get_title()?>
                                        </li>
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
</html>
