<?php
    include "./database.php";
    include "./header.php";
    $pdo = Database::connect();
    $film_id = $_GET['id'];  //on récupere l'id afficher dans l'url
    $req = $pdo->query("SELECT * FROM `movies` WHERE id = {$film_id}");  // on selectionne toutes les données du film en particulier grace a son id
    $film = $req->fetch();
?>
<h1>Détails du film</h1>

<div class="card col-4">
  <div class="card-header">
    Titre du film : <?= $film['title'] ?>
  </div>
  <ul class="list-group list-group-flush">  
    <li class="list-group-item">Acteurs :  <?= $film['actors'] ?></li>   
    <li class="list-group-item">Nom du réalisateur :  <?= $film['director'] ?></li>
    <li class="list-group-item">Nom du producteur :  <?= $film['producer'] ?></li>
    <li class="list-group-item">Année de production :  <?= $film['year_of_prod'] ?></li>
    <li class="list-group-item">Langue :  <?= $film['language'] ?></li>
    <li class="list-group-item">Catégorie :  <?= $film['category'] ?></li>
    <textarea class="list-group-item">Synopsis :  <?= $film['storyline'] ?></textarea>
    <li class="list-group-item"><a href=<?= $film['video'] ?>>Lien de la vidéo</a></li>
  </ul>
</div>

<?php
    Database::disconnect(); 
    include "./footer.php";
?>