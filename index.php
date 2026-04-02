<?php

//Récupération du fichier JSON et conversion en tableau PHP
$filepath = 'data/students.json';
$data = json_decode(file_get_contents($filepath), true);
if (isset($_POST["nom"])) {
  $recherche = $_POST["nom"];
} else {
  $recherche = "";
}
////Pour débugger :
// var_dump($data);
//var_dump($GLOBALS);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Etudiants</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet" />
</head>

<body>
  <section class="team-section">
    <h1 class="team-title">Etudiants</h1>

    <div class="search-container">
      <form action="" method="post">
        <input type="text" name="nom" value="<?= htmlspecialchars(trim($_POST["nom"] ?? ""))?>"/>
        <button type="submit">Rechercher</button>
      </form>
    </div>
    <div class="team-grid">
      <?php foreach ($data as $Ttableau) { ?>
        <?php foreach ($Ttableau as $value) { ?>
          <?php if (strpos(strtolower($value["prenom"]), strtolower($recherche)) !== false or $recherche == "") { ?>
            <article class="member-card">
              <div class="member-photo">
                <img src="assets/images/students/<?= $value["image"] ?>"
                  alt="Photo de <?= $value["nom"] . "." . $value["prenom"] ?>">
              </div>
              <div class="member-info">
                <h3><?= $value["nom"] . "." . $value["prenom"] ?></h3>
                <div class="member-role"><?= $value["classe"] ?></div>
                <p class="member-desc">
                  <?= $value["evaluation_globale"] ?>
                </p>
                <div>
                  <a href="note.php?id=<?= $value["id"] ?>"><button class="btn-notes">Voir les notes</button></a>
                </div>
              </div>
            </article>
          <?php } ?>

        <?php } ?>
      <?php } ?>
    </div>
  </section>
</body>

</html>