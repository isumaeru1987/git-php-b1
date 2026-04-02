<?php

//Récupération du fichier JSON et conversion en tableau PHP
$filepath = 'data/students.json';
$data = json_decode(file_get_contents($filepath), true);

////Pour débugger :
//var_dump($data); //Affiche le tableau des eleves
//var_dump($GLOBALS); //Affiche les GET, POST, COOKIE, ...

$eleve = array_filter($data['eleves'], function($student){
    //Remplacer 1 par la valeur passée dans l'URL
    return $student['id'] == $_GET['id'];
});

////Pour débugger :
//var_dump($eleve); //Affiche le tableau de l'élève

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="assets/css/note.css" rel="stylesheet" />
  <title><?= htmlspecialchars($eleve['prenom']) . ' ' . htmlspecialchars($eleve['nom']) ?></title>
</head>
<body>
  <div class="page">
    <?php foreach ($eleve as $infos): ?>
    <section class="student-card">
      <div class="student-photo">
        <img src="assets/images/students/<?= htmlspecialchars($infos['image'])?>" alt="Photo de <?= htmlspecialchars($infos['prenom']) . ' ' . htmlspecialchars($infos['nom']) ?>">
      </div>
      
      <div class="student-info">
        <h1><?= htmlspecialchars($infos['prenom']) . ' ' . htmlspecialchars($infos['nom']) ?></h1>
        <div class="student-class"><?= htmlspecialchars($infos['classe'])?></div>

        <div class="student-summary">
          <div class="summary-box">
            <div class="summary-label">Nombre de matières</div>
            <div class="summary-value" id="nb-matieres"><?= count($infos['notes']) ?></div>
          </div>

          <div class="summary-box">
            <div class="summary-label">Nombre total de notes</div>
            <div class="summary-value" id="nb-notes"><?= array_sum(array_map('count', $infos['notes'])) ?></div>
          </div>

          <div class="summary-box">
            <div class="summary-label">Moyenne générale</div>
            <div class="summary-value" id="moyenne-generale-top">15,00</div>
          </div>
        </div>
      </div>
    </section>
    <?php endforeach ?>

    <section class="details-card">
      <h2 class="details-title">Détail des notes</h2>

      <div class="notes-table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Matière</th>
              <th>Notes</th>
              <th>Moyenne</th>
            </tr>
          </thead>
          <tbody id="notes-body">
          <?php foreach ($eleve as $infos): ?>
          <?php foreach ($infos['notes'] as $matieres => $notes): ?>
            <tr>
                <td><strong><?= htmlspecialchars(ucfirst($matieres)) ?></strong></td>
                <td>
                <div class="notes-list">
                    <?php foreach ($notes as $note): 
                      $somme_des_notes = 0;
                      $somme_des_notes += array_sum($notes);
                      $moyenne_matiere = $somme_des_notes / count($notes);
                      // c'est par là le probleme !!!!
                    ?>
                    <span class="note-badge"><?= htmlspecialchars($note) ?>/20</span>
                    <? endforeach ?>
                </div>
                </td>
                <td class="moyenne-cell"><?= substr(htmlspecialchars($moyenne_matiere), 0, 5) ?>/20</td>
            </tr>
          <? endforeach ?>
          <? endforeach ?>
          </tbody>
        </table>
      </div>

      <div class="footer-average">
        <div class="general-average-box">
          <div class="label">Moyenne générale</div>
          <?php foreach ($eleve as $infos): ?>
          <?php $moyenne_generale = $moyenne_matiere / count($infos['notes']) ?>
          <div class="value" id="moyenne-generale-bottom"><?= substr(htmlspecialchars($moyenne_generale)) ?>/20</div>
          <? endforeach ?>
        </div>
      </div>
    </section>
  </div>
</body>
</html>