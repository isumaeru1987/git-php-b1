<?php

//Récupération du fichier JSON et conversion en tableau PHP
$filepath = 'data/students.json';
$data = json_decode(file_get_contents($filepath), true);

////Pour débugger :
//var_dump($data);
//var_dump($GLOBALS);

function clean($value) : string {
  return htmlspecialchars(trim($value));
}

$isSearch = isset($_GET["search"]);
if ($isSearch) {
  $search = clean($_GET["search"]);
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
      <form action="" method="">
        <input type="text" name="search"/>
        <button>Rechercher</button>
      </form>
      <?php if ($isSearch) : ?> <h2>Trouvé pour "<b><?=$search?></b>"</h2> <?php endif;?>
    </div>

    <div class="team-grid">
      <?php foreach ($data["eleves"] as $eleve) {
        if ($isSearch && strpos($eleve["prenom"],$search) === FALSE) {continue;}
        $calling = clean($eleve["prenom"]) . " " . strtoupper(clean($eleve["nom"][0])) .".";
        ?>
        <article class="member-card">
          <div class="member-photo">
            <img src="assets/images/students/<?= $eleve["image"] ?>" alt="Photo de <?=clean($calling)?>">
          </div>
          <div class="member-info">
            <h3><?=clean($calling)?></h3>
            <div class="member-role"><?= clean($eleve["classe"]) ?></div>
            <p class="member-desc">
              <?=clean($eleve["evaluation_globale"])?>
            </p>
            <div>
              <button class="btn-notes" onclick="window.open('note.php?id=<?=$eleve['id']?>')">Voir les notes</button>
            </div>
          </div>
        </article>
      <?php } ?>
    </div>
  </section>
</body>
</html>
