# Test Easy4D

 Ceci est un test avec différentes étapes pour les capacités et/ou d'adaptation sous les Framework Symfony et Bootstrap.

     1. Créer un nouveau projet Symfony.

     2. Créer une entité "Produit" avec les champs correspondants au fichier csv. (le fichier csv se trouve dans public/import)

     3. Ajouter à l’entité les validateurs nécessaires, en fonction des données présentes dans le .csv, pour les champs suivants : Easy4D code, Designation, Segment.

     4. Utiliser le maker Symfony pour générer les fonctions CRUD de l'entité Produit.

     5. Intégrer Bootstrap sur les vues générées par le maker, et faire une mise en page simple (intégrer un logo ainsi qu’une structure de page web standard).

     6. Créer une commande pour la console Symfony, qui permettra l'intégration automatique du fichier csv en base de données. La commande devra récupérer le fichier dans un dossier nommé "import" à la racine du projet. Les données du fichier devront être validées par le composant « Validator » avant d’être injectées en base de données. Si le fichier contient plus de 3 erreurs lors de la validation, il devra être déplacé dans un sous-dossier « erreur » et ne devra pas être intègré. 

## Informations

La base de données que j'ai utilisé est Mysql en local, qui est réglé dans le fichier .env avec : DATABASE_URL="mysql://BdAdmin:BdAdmin@localhost:3306/easy4dtest".

La commande "php bin/console app:import-products" permet d'importer tous les fichiers qui se trouvent dans le dossier "public/import" et de déplacer dans 
"public/import/erreur" ceux qui ont plus de 3 erreurs, sans mettre à jour la base de données.

## Aperçu

<img src="imagesGit/racine.jpg" alt="Racine" width="500"/>
<img src="imagesGit/details.jpg" alt="Racine" width="500"/>
<img src="imagesGit/creer.jpg" alt="Racine" width="500"/>
<img src="imagesGit/modifier.jpg" alt="Racine" width="500"/>

