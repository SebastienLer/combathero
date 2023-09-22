<?php

require_once __DIR__ . '/Hero.php';
require_once __DIR__ . '/Orc.php';

$hero1 = new Hero('Excalibur',250,'Aegis', 600, 2000, 0);
$orc1 = new Orc(500,0);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métroid Fight</title>
    <link rel="icon" type="image/x-icon" href="./public/assets/img/metroid.jpg">
    <link href="https://fonts.cdnfonts.com/css/metroid-prime-hunters" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body class="container-fluid">
    <h1 class="text-center">Métroid Prime 4</h1>
    <div class="row"> 
    <?php
    while( $hero1->getHealth() > 0 && $orc1->getHealth() > 0){?>
        <div class="col-3"><?php
            
            $orc1->attack();
            $damage = $orc1->getDamage();
            $shield = $hero1->getShieldValue();
            $hero1->attacked($damage,$shield);
            $wound = $damage - $shield;
            $health =  $hero1->getHealth();
            if($hero1->getHealth()<0){
                $health=0;

            }
            ?>
            <p><?='Ridley a attaqué Samus et allait lui infliger '.$damage.'
            , Samus bloque son attaque pour une valeur de '.$shield.' et a subit '.$wound.' point de dégats. 
            La rage de Samus est de '.$hero1->rage.' et il lui reste '.$health.' points de vie';
            ?></p><?php
                if($health>0 && $hero1->getRage()>100){
                    $hero1->setRage(0);
                    $orc1->setHealth($orc1->getHealth()-$hero1->getWeaponDamage());?>
                    <p><?='Samus contre attaque et déchaine sa rage infligeant '.$hero1->getWeaponDamage().' point de dégats à Ridley. 
                    Il reste a ce dernier '.$orc1->getHealth().' point de vie.';?></p>
                    <?php
                }
            
            if($health<=0){
                $result ='Samus est morte';
                $victory = '/public/assets/img/ridley.jpg';
                $victoryAlt = 'ridley';
                $resultcolor = 'defeat';
            }
            if($orc1->health<=0){
                $result ='Ridley est mort';
                $victory = 'public/assets/img/samus_aran.jpg';
                $victoryAlt = 'samus';
                $resultcolor = 'win';
            }?>
        </div><?php
    }
    ?>
    </div>
    <div>
        <h2 class="text-center text-uppercase <?=$resultcolor ?>"><?=$result?></h2>
        <div class="result text-center">
            <img src="<?=$victory?>" alt="<?=$victoryAlt?>">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>