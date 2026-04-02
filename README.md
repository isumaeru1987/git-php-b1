# 📚 Exercice PHP + Git — Gestion des élèves et des notes

## 🎯 Objectif
Compléter les fichiers `index.php` et `note.php` **en respectant un workflow Git propre** :

- travail sur branche personnelle
- commits clairs et réguliers
- push sur dépôt distant

---

# 🔧 Étapes Git obligatoires

1. Cloner le projet  
2. Créer une branche avec votre prénom en minuscule

---

# 🧩 Fichier `index.php`

## Travail + commits attendus

1. Trouver `students.json`  
2. Ligne 4 → corriger le chemin  

✅ Commit :
```
Correction du chemin json
```

3. Boucler sur les élèves (générer les `<article>`)  

✅ Commit :
```
Boucle des élèves faite
```

4. Remplacer la valeurs en dur :
- chemin image  
- alt  
- `<h3>`  
- `.member-role`  
- appréciation  

✅ Commit :
```
Suprression des valeurs en dur
```

5. Lien vers `note.php?id=...`  

✅ Commit :
```
index.php opérationnel
```

---

# 🧾 Fichier `note.php`

## Travail + commits attendus

1. Corriger les erreurs PHP  

✅ Commit :
```
Fix des erreurs PHP
```

2. Utiliser l’ID dans l’URL  

✅ Commit :
```
Récupération de l'id
```

3. Remplacer les valeurs en dur :
- `<title>`
- image + alt
- `<h1>`
- classe  

✅ Commit :
```
Récupération des informations de l'étudiant
```

4. Nombre de matières + notes  

✅ Commit :
```
Le nombre de matières et de notes sont OK
```

5. Boucle des matières + affichage des notes  

✅ Commit :
```
Toutes les notes de toutes les matières s'affiche
```

6. Calcul :
- moyenne par matière
- moyenne générale (haut + bas)  

✅ Commit :
```
YATA :)
```

---

# ⭐ BONUS

1. Formulaire de recherche par prénom  
2. Filtrage des élèves  

✅ Commit :
```
Recherche opérationnelle
```

3. Conserver la valeur de la saisie dans l'input de recherche après la soumission du formulaire

✅ Commit :
```
Final boss
```

---

# 🧮 Grille de notation (20/20)

## 🔹 Git & méthode (6/6)

| Critère | Points |
|--------|--------|
| Branche créée correctement | 1/1 |
| Commits présents et bien nommés | 3/3 |
| Push sur dépôt distant | 1/1 |
| Respect des étapes demandées | 1/1 |

---

## 🔹 index.php (4/4)

| Critère | Points |
|--------|--------|
| Chargement JSON | 0.5/0.5 |
| Boucle des élèves | 1.5/1.5 |
| Suppression des valeurs en dur | 1.5/1.5 |
| Lien vers note.php | 0.5/0.5 |

---

## 🔹 note.php (/10)

| Critère | Points |
|--------|--------|
| Correction des erreurs PHP | 1/1 |
| Récupération ID URL | 0.5/0.5 |
| Affichage infos élève | 1/1 |
| Nb matières + nb notes | 1.5/1.5 |
| Boucle matières + notes | 2/2 |
| Moyennes (matière + générale) | 4/4 |

---

## 🎁 BONUS
+2 points : recherche fonctionnelle
+0.5 point : garder la valeur de la recherche

---

# 🧠 Conseils

- Utiliser `foreach`
- Utiliser `$_GET`
- Tester régulièrement
- Faire des commits fréquents

---

# 💡 Objectif pédagogique

- Comprendre le lien **backend (PHP) + données JSON**
- Manipuler des **tableaux et boucles**
- Apprendre un **workflow Git propre**
- Produire un code **maintenable et dynamique**

---

Bon courage 💪🔥
