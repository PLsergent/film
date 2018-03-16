<!--  En tête de page -->
<?php require_once(PATH_VIEWS.'header.php'); ?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');

if($_SESSION['logged'] == true){?>
  <h3> Ajouter film</h3>
  <form method="post" action="" enctype="multipart/form-data">
    <label for="image">Choisir le fichier :</label>
    <input type="file" name="image" id="image" /></br>

    <label for="titre">Titre du film :</label></br>
    <input type="text" name="titre" id="titre" /></br></br>

    <label for="resume">Résumé du film :</label></br>
    <textarea name="resume" id="resume" rows="10" cols="50"></textarea></br></br>

    <label for="genre">Choisir un genre:</label></br>
    <select name="genre" id="genre">
      <?php
        foreach ($genres as $genre) {
       ?>
        <option value="<?= $genre->getId() ?>">
          <?= $genre->getLibelle() ?>
        </option>
     <?php
   }
   ?>
    </select></br></br>
    <input type="submit" value="Envoyer"/>
  </form>
<?php }else{ ?>
  <p>Veuillez vous connecter.</p>
<?php } ?>
<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
