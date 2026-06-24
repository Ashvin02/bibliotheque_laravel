# 📚 BiblioTEK – Application de Gestion de Bibliothèque

Application web développée avec **Laravel** permettant de gérer les emprunts et retours de livres d'une bibliothèque, avec un **back-office complet** pour les bibliothécaires.

Projet réalisé dans le cadre du **BTS SIO – option SLAM** (Solutions Logicielles et Applications Métiers).

🌐 **Application en ligne** : [http://35.180.46.174](http://35.180.46.174)  
📁 **Compte rendu** : [https://ashvin-portfolio.dev/assets/projet-bibliotek.pdf](https://ashvinportfolio.dev/assets/projet-bibliotek.pdf)

---

## 🎯 Objectif du projet

L'objectif est de permettre la gestion complète d'une bibliothèque avec deux niveaux d'accès :

- **Utilisateurs** : consulter les livres, emprunter, retourner, voir leur compte
- **Administrateurs** : gérer les livres (CRUD), gérer les utilisateurs, consulter tous les emprunts

---

## 🛠 Technologies utilisées

- **PHP 8.3** — Langage principal
- **Laravel** — Framework MVC
- **Blade** — Moteur de templates
- **MySQL** — Base de données
- **Docker** — Conteneurisation (MySQL + phpMyAdmin)
- **PHPUnit** — Tests unitaires
- **SonarQube Cloud** — Qualité et sécurité du code
- **Git / GitHub** — Gestion de versions
- **AWS** — Déploiement en production
- **Bootstrap 5** — Interface utilisateur

---

## 🏗 Architecture du projet

Le projet utilise l'architecture **MVC (Model-View-Controller)**.

### Flux de fonctionnement

```
Requête HTTP → Routes (web.php) → Controller → Model → Base de données
                                                   ↓
                                             View (Blade)
                                                   ↓
                                         Réponse HTML
```

### Structure des fichiers

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AdminController.php       # Gestion du back-office
│   │   ├── CompteController.php      # Page profil utilisateur
│   │   ├── EmpruntController.php     # Gestion des emprunts
│   │   └── Auth/                     # Authentification
│   └── Middleware/
│       └── AdminMiddleware.php       # Protection routes admin
├── Models/
│   ├── User.php                      # Modèle utilisateur (rôles)
│   ├── Livre.php                     # Modèle livre
│   └── Emprunt.php                   # Modèle emprunt
database/
├── migrations/                       # Structure de la BDD
└── seeders/
    ├── UserSeeder.php                # 13 utilisateurs (2 admins)
    ├── LivreSeeder.php               # 50 livres
    └── EmpruntSeeder.php             # Emprunts réalistes
resources/views/
├── template.blade.php                # Layout principal
├── admin/                            # Vues back-office
│   ├── dashboard.blade.php
│   ├── livres.blade.php
│   ├── users.blade.php
│   └── emprunts.blade.php
└── auth/                             # Vues authentification
    ├── login.blade.php
    └── register.blade.php
routes/
└── web.php                           # Définition des routes
```

### Système de rôles

- `user` → Consulter livres, emprunter, retourner, page compte
- `admin` → Tout + back-office (CRUD livres, gestion users, emprunts)

Les routes admin sont protégées par le `AdminMiddleware`.

---

## 🗄 Base de données

L'application utilise **MySQL** avec 3 tables principales.

### Diagramme UML

```
+------------------+         +------------------+         +------------------+
|      users       |         |     emprunts      |         |      livres      |
+------------------+         +------------------+         +------------------+
| PK id            |1      * | PK id            | *      1| PK id            |
|    name          |---------| FK user_id       |---------|    titre         |
|    email         |         | FK livre_id      |         |    auteur        |
|    password      |         |    date_emprunt  |         |    disponible    |
|    role          |         |    date_retour   |         |    created_at    |
|    created_at    |         |    created_at    |         |    updated_at    |
+------------------+         +------------------+         +------------------+
        |
        | *
        |
+------------------+
|      roles       |
+------------------+
| PK id            |
|    name          |
|    (admin/user)  |
+------------------+
      1                             *               *                1
  User ──────────────────────── Emprunt ───────────────────────── Livre
  (hasMany)                  (belongsTo)                        (hasMany)

  Relations :
User     ──< Emprunt >── Livre   (un user a plusieurs emprunts, un livre aussi)
User     >── Role               (un user a un rôle)
```

### Relations

- Un **utilisateur** peut avoir plusieurs **emprunts** → `hasMany`
- Un **livre** peut être emprunté plusieurs fois → `hasMany`
- Un **emprunt** appartient à un user et un livre → `belongsTo`

---

## 📚 Fonctionnalités

### Espace Utilisateur

- Inscription et connexion sécurisée
- Consulter la liste des 50 livres avec disponibilité en temps réel
- Emprunter un livre disponible
- Retourner un livre emprunté
- Page compte avec emprunts en cours et historique complet

### Back-Office Administrateur

- Dashboard avec statistiques (total livres, disponibles, empruntés, users, emprunts)
- Gestion des livres : ajouter, modifier, supprimer
- Gestion des utilisateurs : changer les rôles, supprimer
- Consulter tous les emprunts avec possibilité de forcer un retour

---

## 🔐 Sécurité

- Mots de passe hachés avec **Bcrypt** via `Hash::make()`
- Protection **CSRF** sur tous les formulaires avec `@csrf`
- Middleware **auth** — routes protégées si non connecté
- Middleware **admin** personnalisé — back-office réservé aux admins
- Analyse de vulnérabilités avec **SonarQube Cloud**

---

## 🧪 Tests

Tests unitaires avec **PHPUnit** — **10/10 tests passent** ✅

```bash
php artisan test
```

- ✅ Page d'accueil accessible
- ✅ Page livres accessible
- ✅ Connexion avec identifiants valides
- ✅ Connexion refusée avec mauvais mot de passe
- ✅ Page inscription accessible
- ✅ Création d'un nouveau compte
- ✅ Existence d'un livre en base
- ✅ Test exemple unitaire
- ✅ Test exemple feature
- ✅ Page livres charge correctement

---

## ⚙ Installation du projet

### 1. Cloner le projet

```bash
git clone https://github.com/Ashvin02/bibliotheque_laravel.git
cd bibliotheque_laravel
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Copier le fichier d'environnement

```bash
cp .env.example .env
```

### 4. Configurer la base de données dans `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bibliotheque
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Générer la clé Laravel

```bash
php artisan key:generate
```

### 6. Lancer les migrations et les seeders

```bash
php artisan migrate:fresh --seed
```

### 7. Démarrer le serveur

```bash
php artisan serve
```

Application disponible sur : `http://127.0.0.1:8000`

---

## 🔑 Comptes de démonstration

- 👑 Admin : `admin@bibliotek.fr` / `admin1234`
- 👑 Admin : `sophie@bibliotek.fr` / `password`
- 👤 User : `jean@mail.fr` / `jdupont`
- 👤 User : `marie@mail.fr` / `mcurie`
- 👤 User : `user@bibliotek.fr` / `utest`

---

## 🔄 Routes principales

```
GET  /                    → Page d'accueil          (Public)
GET  /livres              → Liste des livres         (Public)
GET  /login               → Formulaire connexion     (Guest)
POST /login               → Traitement connexion     (Guest)
GET  /register            → Formulaire inscription   (Guest)
POST /register            → Traitement inscription   (Guest)
POST /logout              → Déconnexion              (Auth)
GET  /emprunt             → Formulaire emprunt       (Auth)
POST /emprunt             → Traitement emprunt       (Auth)
GET  /retour              → Formulaire retour        (Auth)
POST /retour              → Traitement retour        (Auth)
GET  /compte              → Page compte              (Auth)
GET  /admin/dashboard     → Dashboard admin          (Admin)
GET  /admin/livres        → Gestion livres           (Admin)
POST /admin/livres        → Ajouter un livre         (Admin)
GET  /admin/users         → Gestion utilisateurs     (Admin)
GET  /admin/emprunts      → Tous les emprunts        (Admin)
```

---

## 🎓 Contexte pédagogique

Projet réalisé dans le cadre du **BTS SIO – option SLAM** à **H3 Hitema, Paris**.

Période : du **16/02/2026** au **31/03/2026** — Réalisé seul

Compétences mises en pratique :

- Conception et développement d'une solution applicative (MVC Laravel)
- Gestion d'une base de données relationnelle (MySQL, Eloquent ORM)
- Système d'authentification et gestion des rôles (middleware)
- Tests unitaires avec PHPUnit
- Déploiement sur serveur AWS
- Gestion de versions avec Git/GitHub
- Analyse qualité et sécurité avec SonarQube Cloud

---

## 👨‍💻 Auteur

**Ashvin Mariyathas**  
Étudiant en BTS SIO – SLAM  
H3 Hitema, Paris — Session 2026

🌐 Portfolio : [https://ashvinportfolio.dev](https://ashvinportfolio.dev)

---

## 📄 Licence

Projet pédagogique réalisé dans le cadre du BTS SIO — Session 2026.