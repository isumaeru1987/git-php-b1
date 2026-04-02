<?php

//Récupération du fichier JSON et conversion en tableau PHP
$filepath = 'data/students.json';
$data = json_decode(file_get_contents($filepath), true);

//Pour débugger :
// var_dump($data);
//var_dump($GLOBALS);

$eleves_a_afficher = $data['eleves'];
if (!empty(trim($_POST['prenom']))) {
    $recherche = mb_strtolower(trim($_POST['prenom']));

    $eleves_a_afficher = array_filter($data['eleves'], function($eleve) use ($recherche) {
        $prenom_eleve = mb_strtolower($eleve['prenom']);
        return str_contains($prenom_eleve, $recherche);
    });
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Etudiants</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet" />
</head>
<body>
  <section class="team-section">
    <h1 class="team-title">Etudiants</h1>

    <div class="search-container">
      <form action="index.php" method="post">
        <input type="text" name="prenom" />
        <button>Rechercher</button>
      </form>
    </div>

    <div class="team-grid">
      <?php foreach($data['eleves'] as $eleve) { ?>
        <article class="member-card">
          <div class="member-photo">
            <img src="assets/images/students/<?= htmlspecialchars($eleve['image']) ?>" alt="Photo de <?= htmlspecialchars($eleve['prenom'])." ".substr(htmlspecialchars($eleve['nom']), 0, 1)."."; ?>">
          </div>
          <div class="member-info">
            <h3><?= htmlspecialchars($eleve['prenom'])." ".substr(htmlspecialchars($eleve['nom']), 0, 1)."."; ?></h3>
            <div class="member-role"><?= htmlspecialchars($eleve['classe']) ?></div>
            <p class="member-desc">
              <?= htmlspecialchars($eleve['evaluation_globale']) ?>
            </p>
            <div>
              <button class="btn-notes" onclick="window.location='note.php?id=<?= urlencode($eleve['id']) ?>'">Voir les notes</button>
            </div>
          </div>
        </article>
      <?php } ?>
    </div>
  </section>
</body>
</html>
