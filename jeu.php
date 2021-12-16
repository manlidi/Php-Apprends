<?php 
    $adeviner = 150;
    $error = null;
    $success = null;
    $value = null;
    if(isset($_POST['chiffre'])){
        $value = (int)$_POST['chiffre'];
        if($value > $adeviner){
            $error = "Votre chiffre est trop grand!!!";
        }elseif($value < $adeviner){
            $error = "Votre chiffre est trop petit!!!";
        }else{
            $success = "Bravo! Vous avez deviner le chiffre <strong> $adeviner </strong>!!!";
        }
    }
    require 'header.php'; 
?>

<?php if($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php elseif($success): ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif ?>
   

<div class="jumbotron">
<form action="jeu.php" method="POST">
  <div class="form-group">
    <input type="number" class="form-control" name="chiffre" min="0" placeholder="Nombre entre 0 et 1000" value="<?= $value ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Deviner</button>
</form>
</div>

<?php require('footer.php'); ?>

