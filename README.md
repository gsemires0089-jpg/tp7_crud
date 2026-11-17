# TP7 CRUD - Gestion des formations, étudiants et modules

## 1. Présentation du projet

Ce projet est une application web développée avec PHP et MySQL permettant de gérer les formations, les étudiants et les modules.

L'application permet d'effectuer les opérations CRUD :
- Create : ajouter des enregistrements.
- Read : afficher les données.
- Update : modifier les données.
- Delete : supprimer les données.

## 2. Technologies utilisées

- PHP
- MySQL
- HTML
- PDO
- XAMPP

## 3. Structure du projet

```text
tp7_crud/
│
├── connexion.php
├── index.php
│
├── formations/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── etudiants/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
└── modules/
    ├── index.php
    ├── create.php
    ├── edit.php
    └── delete.php
```

## 4. Fonctionnalités

- Gestion des formations.
- Gestion des étudiants.
- Gestion des modules.
- Ajout, affichage, modification et suppression des données.
- Utilisation des clés étrangères pour les relations entre les tables.
- Utilisation des requêtes JOIN pour afficher les noms des formations.
- Utilisation de listes déroulantes dans les formulaires.
- Connexion à la base de données avec PDO.

## 5. Installation et exécution

1. Installer XAMPP.
2. Copier le dossier du projet dans `htdocs`.
3. Démarrer Apache et MySQL.
4. Créer la base de données `tp7_crud` dans phpMyAdmin.
5. Importer le fichier SQL de la base de données.
6. Vérifier les paramètres de connexion dans `connexion.php`.
7. Ouvrir le navigateur et accéder à :

`http://localhost/mon%20projet/`

## 6. Auteur

Projet réalisé dans le cadre du TP7 - CRUD avec PHP et MySQL.
