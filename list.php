<?php
    include "./database.php";
    include "./header.php";
    $pdo = Database::connect();
    $req = $pdo->query("SELECT * FROM `movies`"); // on envoie la requete sql
    $movies = $req->fetchAll(); // on récupère toutes les données de chaque film grâce a la requete sql sous forme de tableau
?>
<h1>Liste des films</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Film</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Année de production</th>
            <th scope="col">Plus d'infos</th>
        </tr>
    </thead>
    <tbody>
     <!-- boucle pour afficher chaque film -->
    <?php foreach ($movies as $movie) {?> 
        <tr>
            <td><?= $movie['title'];?></td>
            <td><?= $movie['producer'];?></td>
            <td><?= $movie['year_of_prod'];?></td>
            <!--  on envoie l'id du film dans l'url -->
            <td><a href="./moreInfo.php?id=<?php echo $movie['id'] ?>" type="button" class="btn btn-primary">+ d'infos</a></td> 
        </tr>
    <?php 
            Database::disconnect(); 
            }
    ?>

    </tbody>
</table>


<?php
    include "./footer.php";
?>