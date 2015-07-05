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

            <?php
            $skill_names = [
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
 
            <div class="jumbotron compact">
                <div class="container sub-page">
                    <h2 class="noselect medieval sub-title"><b><span class="glyphicon glyphicon-globe"></span>
                        Quests</b></h2> 
                </div>
            </div>
            <?php 
                $user_id = 1; //just assuming
            ?>
            <table height="500px" class="quests table table-bordered">
                <thead>
                    <th class="quest_title">
                        Quest
                    </th>
                    <th>
                        Skill<br>Requirements
                    </th>
                    <th>
                        Quest<br>Requirements
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
                    $mysqli = new mysqli("localhost", "root", "", "rsquest");
                    $quests = $mysqli->query('SELECT * FROM quests');
                    while($row = $quests->fetch_assoc()) {
                        $skills = [];
                        // check to see if user has completed this quest

                            $quest_id = $row['id'];
                            $user_id = 1;

                            $user_completed_quest = $mysqli->query("SELECT * FROM user_quest_completed WHERE user_id = 1 AND quest_id = $quest_id");
                            if($user_completed_quest->num_rows > 0) {
                                echo "<tr class='complete'>";
                            } else {
                               echo "<tr>"; 
                            }

                            echo "<td class='quest_title'>";
                            echo $row['quest_name'];   
                            echo "</td>"; 
                            $requirements = $mysqli->query("SELECT * FROM quests_to_requirements 
                            WHERE quest_id = $quest_id");
                            while($req = $requirements->fetch_assoc()) {
                                $req_id = $req['requirements_id'];
                                $requirement = $mysqli->query("SELECT * FROM requirements
                                WHERE id = $req_id");
                                while($r = $requirement->fetch_assoc()) {
                                    $skill_id = $r['skill_id'];
                                    $skill_level = $r['skill_level'];
                                    $skills[] = [(int)$skill_id, (int)$skill_level];
                                }
                            } 
                            echo "<td class='skill_requirements'>";
                            foreach($skills as $skill) {
                                echo "<img width='18px' height='auto' 
                                src='res/img/icon/" . $skill_names[$skill[0]-1] . "_icon.png'/> ";
                                echo '<span class="label label-success">';
                                echo $skill[1];
                                echo '</span>';
                                echo "&nbsp;&nbsp&nbsp;";
                            }
                            if(count($skills) == 0) {
                                echo '<span class="label label-default">None</span>';
                            }
                            echo "</td>";
                            echo "<td class='quest_requirements'>";
                                echo '<ul class="list-group quests">';

                                    //need to get a list of quest requirements for this quest now

                                    $quest_requirements = $mysqli->query("SELECT * FROM quest_to_quest_requirement WHERE quest_id = $quest_id");
                                    while($q_r = $quest_requirements->fetch_assoc()) {
                                        $quest_id_to_fetch = $q_r['quest_requirement_quest'];
                                        $quest = $mysqli->query("SELECT * FROM quests WHERE id = $quest_id_to_fetch");
                                        while($quest_requirement = $quest->fetch_assoc()) {

                                            $requirement_quest_id = $quest_requirement['id'];
                                            $user_completed_quest = $mysqli->query("SELECT * FROM user_quest_completed WHERE user_id = 1 AND quest_id = $requirement_quest_id");
                                            if($user_completed_quest->num_rows > 0) {
                                                echo "<li class='list-group-item completed'>";
                                                    echo $quest_requirement['quest_name'];
                                                echo "</li>";
                                            } else {
                                                echo "<li class='list-group-item quest'>";
                                                    echo $quest_requirement['quest_name'];
                                                echo "</li>";
                                            }

       
                                        }
                                    }
                                    echo '<li class="list-group-item quest completed quest-completed">
                                        <b>Quest Complete</b> <span class="glyphicon glyphicon-ok"></span>
                                        </li>';
                                    echo "</ul>";
                            echo "</td>";
                            echo "<td>";
                            echo $row['quest_difficulty'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['quest_length'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['quest_type'];
                            echo "</td>"; 
                        echo "</tr>";  
                    }
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
        </div>
    </body>
</html>
