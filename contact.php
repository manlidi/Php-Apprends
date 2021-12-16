<?php
    $title = "Nous contacter";
    require_once 'config.php';
    require_once 'functions.php';
    //date_default_timezone_get('Europe/Paris');
    $heure = (int)($_POST['heure'] ?? date('G'));
    $jour = (int)($_POST['jour'] ?? date('N') - 1);
    $creneaux = CRENEAUX[$jour];
    $ouvert = in_creneaux($heure, $creneaux);
    $color = 'green';
    if(!$ouvert){
        $color = 'red';
    }
    require 'header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h1>Nous contacter</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At nesciunt nulla necessitatibus corporis aliquid quia iusto numquam quo repudiandae 
            labore, molestias animi. Incidunt ullam architecto, totam asperiores quaerat omnis recusandae.</p>
    </div>
    <div class="col-md-4">
        <h2>Horraire d'ouverture</h2>
            <?php if($ouvert): ?>
            <div class="alert alert-success">
                Le magasin sera ouvert
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                Le magasin sera fermé
            </div>
        <?php endif ?>
        <br><br> 
        <form action="" method="POST">
            <div class="form-group">
                <?= select_option('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-primary" type="submit">
                Voir si le magasin est ouvert
            </button>
        </form>

        <ul>
            <?php foreach(JOURS as $k => $jour): ?>
                <li>
                    <strong><?= $jour ?></strong> :
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>


<?php
    require('footer.php');
?>