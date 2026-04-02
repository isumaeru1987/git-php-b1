<?php
//Récupération du fichier JSON et conversion en tableau PHP
$data = json_decode(file_get_contents('data/students.json'), true);

////Pour débugger :
//var_dump($data); //Affiche le tableau des eleves
//var_dump($GLOBALS); //Affiche les GET, POST, COOKIE, ...

$eleve = array_filter($data['eleves'], function($student){
    //Remplacer 1 par la valeur passée dans l'URL
    return $student['id'] == 1;
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
  <title><?= "John Doe" ?></title>
</head>
<body>
  <div class="page">
    <section class="student-card">
      <div class="student-photo">
        <img src="" alt="Photo de John Doe">
      </div>

      <div class="student-info">
        <h1>John Doe</h1>
        <div class="student-class">B1</div>

        <div class="student-summary">
          <div class="summary-box">
            <div class="summary-label">Nombre de matières</div>
            <div class="summary-value" id="nb-matieres">0</div>
          </div>

          <div class="summary-box">
            <div class="summary-label">Nombre total de notes</div>
            <div class="summary-value" id="nb-notes">0</div>
          </div>

          <div class="summary-box">
            <div class="summary-label">Moyenne générale</div>
            <div class="summary-value" id="moyenne-generale-top">15,00</div>
          </div>
        </div>
      </div>
    </section>

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
            <tr>
                <td><strong>Maths</strong></td>
                <td>
                <div class="notes-list">
                    <span class="note-badge">14/20</span>
                    <span class="note-badge">16/20</span>
                </div>
                </td>
                <td class="moyenne-cell">15,00/20</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="footer-average">
        <div class="general-average-box">
          <div class="label">Moyenne générale</div>
          <div class="value" id="moyenne-generale-bottom">15,00/20</div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>