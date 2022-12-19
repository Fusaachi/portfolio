Nous allons créer un site Portfolio 
        -partie front
        - partie back-office (admin) qui permettra au webmaster (vous) de configurer le site ou récupérer des informations

        - au niveau de la bdd
            L'accès au back-office
            - une table user (avec plusieurs champs ou colonnes)
                - nom 
                - prenom
                - email
                - password
                - role
            Messagerie
            - une table message
                - nom 
                - prenom 
                - societe 
                - email
                - telephone
                - description
            Compétence 
            - une table front-end
                - titre
                - texte
                - image
                - lien
                - active
            - une table back-end
                - titre
                - texte
                - image
                - lien
                - active

*création de l'architecture(arborescence des dossiers et fichiers)
* création de la table user dans la bdd portfolio
* création du dossier et fichier aide/creerUnAdminDuSite.php
    - ce fichier va nous permettre de créer un formulaire pour enregistrer un administrateur  qui auras accès au back-office (console d'administration) de notre site (pour le portfolio vous-même)
* création d'une barre de navigation dans le fichier assets/inc/headerFront.php
* création du fichieradmin/index.php qui va gérer le formulaire de connexion au back-office
* création du fichier core/userController.php qui va gérer les différentes fonctions(login logout et le CRUD de la table user)