<?php
include('views/layouts/header.view.php');
include('views/nba.php');
?>
<main>
    <h1 class="fornbacolor">NBA BASKETBALL</h1>
    <div class="container">
        <div class="card fornba">
            <img src="static/images/teams/gsw.png" alt="NBA logo" class="logo" />
            <div class="name">
                <em>#<span id="tnumber"></span></em>
                <h2><span id="tfirstname"></span> <strong><span id="tlastname"></span></strong></h2>
            </div>
            <div class="profile">
                <img src="static/images/players/allblacks/" id="timage" alt="" class="headshot" />
                <div class="features">
                    <?php foreach ($featured as $statistic) { ?>
                    <!--     <div class="feature">
                            <h3><?= $statistic['label'] ?></h3>
                            <?= $statistic['value'] ?>
                        </div> -->
                    <?php } ?>
                </div>
            </div>
            <div class="bio">
                <div class="data">
                    <strong>Position</strong>
                    <span id="tposition">
                </div>
                <div class="data">
                    <strong>Weight</strong>
                    <span id="tweight">KG
                </div>
                <div class="data">
                    <strong>Height</strong>
                    <span id="theight">CM
                </div>
                <div class="data">
                    <strong>Age</strong>
                    <span id="tage"> years
                </div>
            </div>
            <div style="">

            </div>
        </div>
        <div class="results"></div>
    </div>
<!--     <div class="result"></div> -->


    
</main>
<?php
include('views/layouts/footer.view.php');
?>
