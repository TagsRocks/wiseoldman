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
            	include "include/header.php";
            ?>  
 
            <div class="jumbotron compact">
                <div class="container sub-page">
                    <h2 class="noselect medieval sub-title">
                        <b>
                            <span class="glyphicon glyphicon-globe"></span>
                            Progress
                        </b>
                    </h2> 
                </div>
            </div>
            <div class="container pad-top">
                <?php if(isset($_SESSION['user'])) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group">
                            <a class="list-group-item">
                                <span class="badge">
                                    14
                                </span>
                                Current Quest Points
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    247
                                </span>
                                Required Quest Points
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    233
                                </span>
                                Quest Points Left
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group">
                            <a class="list-group-item">
                                <span class="badge">
                                    4
                                </span>
                                Badges Earned
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    64
                                </span>
                                Hours Played
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    234
                                </span>
                                Community Score
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group">
                            <a class="list-group-item">
                                <span class="badge">
                                    7
                                </span>
                                Quests Completed
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    88
                                </span>
                                Total Quests
                            </a>
                            <a class="list-group-item">
                                <span class="badge">
                                    81
                                </span>
                                Quests Left
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">

                </div>
            </div>
    	</div>
	</body>
</html>