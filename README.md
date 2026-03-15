# 📚 BiblioTEK – Application de Gestion de Bibliothèque

Application web développée avec **Laravel** permettant de gérer les emprunts et retours de livres d’une bibliothèque.

Projet réalisé dans le cadre du **BTS SIO – option SLAM** (Solutions Logicielles et Applications Métiers).

---

# 🎯 Objectif du projet

L'objectif de cette application est de permettre la gestion simple d'une bibliothèque.

L'application permet :

- consulter la liste des livres
- emprunter un livre
- retourner un livre
- voir la disponibilité des livres

Le projet utilise l’architecture **MVC du framework Laravel** et une base de données **MySQL**.

---

# 🛠 Technologies utilisées

- **PHP**
- **Laravel**
- **Blade (Template Engine)**
- **MySQL**
- **HTML / CSS**
- **Git**
- **GitHub**

---

# 🏗 Architecture du projet

Le projet utilise l’architecture **MVC (Model View Controller)**.


Routes → Controllers → Models → Views


Structure principale :


app
├── Models
│ ├── Livre.php
│ └── Emprunt.php
│
├── Http
│ └── Controllers
│ ├── LivreController.php
│ └── EmpruntController.php
│
resources
└── views
├── accueil.blade.php
├── livres.blade.php
├── emprunt.blade.php
├── retour.blade.php
├── compte.blade.php
└── template.blade.php

routes
└── web.php

database
└── migrations
├── create_livres_table.php
└── create_emprunts_table.php


---

# 📚 Fonctionnalités

## 1️⃣ Accueil

Page d’accueil présentant l’application.

---

## 2️⃣ Liste des livres

Affichage de tous les livres de la bibliothèque.

Informations affichées :

- titre
- auteur
- disponibilité

---

## 3️⃣ Emprunter un livre

Un utilisateur peut sélectionner un livre disponible et l’emprunter.

Lors de l’emprunt :

- un enregistrement est créé dans la table **emprunts**
- le livre devient **indisponible**

---

## 4️⃣ Retourner un livre

Un utilisateur peut retourner un livre emprunté.

Lors du retour :

- le livre redevient **disponible**

---

## 5️⃣ Page compte

Page utilisateur simple affichant :

- informations utilisateur
- nombre de livres empruntés

---

# 🗄 Base de données

L'application utilise **MySQL**.

## Table : livres

| Champ | Type |
|------|------|
| id | int |
| titre | string |
| auteur | string |
| disponible | boolean |
| created_at | timestamp |
| updated_at | timestamp |

---

## Table : emprunts

| Champ | Type |
|------|------|
| id | int |
| user_id | int |
| livre_id | int |
| date_emprunt | date |
| date_retour | date |
| created_at | timestamp |
| updated_at | timestamp |

---

# ⚙ Installation du projet

## 1️⃣ Cloner le projet

```bash
git clone https://github.com/TON-USERNAME/bibliotek.git
2️⃣ Installer les dépendances
composer install
3️⃣ Copier le fichier d'environnement
cp .env.example .env
4️⃣ Configurer la base de données

Modifier le fichier .env

DB_DATABASE=bibliotheque
DB_USERNAME=root
DB_PASSWORD=
5️⃣ Générer la clé Laravel
php artisan key:generate
6️⃣ Lancer les migrations
php artisan migrate
7️⃣ Démarrer le serveur
php artisan serve

Application disponible sur :

http://127.0.0.1:8000
🔄 Routes principales
Route	Fonction
/	accueil
/livres	liste des livres
/emprunt	emprunter un livre
/retour	retourner un livre
/compte	profil utilisateur
📌 Exemple de fonctionnement
Emprunt d'un livre

L'utilisateur choisit un livre disponible

Un enregistrement est créé dans emprunts

Le livre devient indisponible

Retour d'un livre

L'utilisateur sélectionne un livre emprunté

Le livre redevient disponible

🎓 Contexte pédagogique

Ce projet a été réalisé dans le cadre du BTS SIO – option SLAM.

Il permet de mettre en pratique :

développement web avec Laravel

architecture MVC

gestion d’une base de données

utilisation de Git et GitHub

👨‍💻 Auteur

Ashvin Mariyathas

Étudiant en BTS SIO – SLAM

Projet réalisé dans le cadre du module :

Conception et Développement d’Applications

📄 Licence

Projet pédagogique réalisé dans le cadre du BTS SIO.