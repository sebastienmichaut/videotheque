<?php
    include "./database.php"; //connexion a la base de données
    include "./header.php";
    $pdo = Database::connect();
    if ($_POST) { // création des variables si le formulaire est rempli
        $title = $_POST["title"];
        $actors = $_POST["actors"];
        $director = $_POST["director"];
        $producer = $_POST["producer"];
        $storyLine = $_POST["storyLine"];
        $video = $_POST["video"];
        if (strlen($title) > 5 && strlen($actors) > 5 && strlen($director) > 5 && strlen($producer) > 5 && strlen($storyLine) > 5) { // on vérifie si la taille des champs est correcte
            if (filter_var($video, FILTER_VALIDATE_URL)) { // on verifie aussi que l'url est avec un bon format avant de faire la requete SQL
                $sql = ("INSERT INTO `movies` (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES ('$title', '$actors', '$director', '$producer', '{$_POST['year']}', '{$_POST['language']}', '{$_POST['category']}', '$storyLine', '$video') ");
                $pdo->query($sql);
                echo "<p class='text-primary fs-3'>Le film a bien été ajouté</p>"; //message d'erreur
            }else {
                echo "<p class='text-danger fs-3'> Votre URL n'a pas le bon format ! </p>"; //message d'erreur
            }
        }else {
            echo "<p class='text-danger fs-3'>Vous devez saisir 5 caractères minimum dans une catégorie</p>"; //message d'erreur
        }
    Database::disconnect();        // déconnexion de la base de données
    }
?>
<h1>Ajouter un film</h1>

<div class="container">
    <div class="row col-6">
        <form method=post>
            <div class="mb-3">
                <label for="title" class="form-label">Titre du film</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="actors" class="form-label">Nom des acteurs</label>
                <input type="text" class="form-control" id="actors" name="actors">
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Nom du réalisateur</label>
                <input type="text" class="form-control" id="director" name="director">
            </div>
            <div class="mb-3">
                <label for="producer" class="form-label">Nom du producteur</label>
                <input type="text" class="form-control" id="producer" name="producer">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="year">
                    <option selected>Année de production</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                 </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="language">
                    <option selected>Langue</option>
                    <option value="Français">Français</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Espagnol">Espagnol</option>
                 </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected>Catégorie</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Horreur">Horreur</option>
                    <option value="Guerre">Guerre</option>
                 </select>
            </div>
            <div class="mb-3">
                <label for="storyline" class="form-label">Synopsis</label>
                <textarea class="form-control" id="storyline" rows="3" name="storyLine"></textarea>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Lien de la vidéo</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="video">
                </div>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php
    include "./footer.php";
?>