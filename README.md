Rapport de Projet : Site Web du Consulat de France
Introduction
Ce projet consiste en la création d’un site web pour le Consulat de France. Le site a été conçu pour offrir des informations sur la France, permettre des demandes de visa, et proposer une loterie pour certains privilèges. Ce rapport couvre la conception fonctionnelle et technique, les règles de développement suivies, les tests effectués pour assurer la qualité du projet, et les outils utilisés.
Plan
Conception Fonctionnelle
Page d’accueil
Présentation du pays
Demande de visa
Connexion / Création de compte
Loterie
Compte utilisateur
Page d’administration
Conception Technique
Architecture du site
Structure de la base de données
Technologies utilisées
Règles de Développement
Tests Unitaires
Outils

1. Conception Fonctionnelle
Page d’accueil
Description du contenu : La page d’accueil est une introduction au site, présentant brièvement les services disponibles. Elle est visuellement attrayante avec une image de fond et une citation inspirante, ce qui aide à attirer l’utilisateur.
But : Permettre à l’utilisateur de comprendre rapidement l’objectif du site et d’accéder aux autres sections.
Scénario d’utilisation : Un utilisateur arrive sur le site, prend connaissance des options, puis décide de naviguer vers la page de demande de visa ou d'inscription.
Page de Présentation du Pays
Description du contenu : Cette page met en avant la culture, l’histoire et des éléments marquants de la France. Elle contient du texte explicatif et des images qui illustrent ces aspects.
But : Fournir aux visiteurs une présentation immersive de la France, leur permettant de découvrir le pays avant d’entamer une demande de visa.
Scénario d’utilisation : Un utilisateur intéressé par le pays consulte cette page pour en apprendre plus sur la culture française. Cette étape peut influencer sa décision de demander un visa.
Page d'Actualités
Description du contenu : La page d'actualités présente les dernières informations relatives aux services du consulat, aux annonces officielles ou aux événements en rapport avec la France. Chaque actualité est affichée sous forme de carte avec une image, un titre, et un paragraphe de description.
But : Informer les visiteurs sur les nouvelles récentes et les informations importantes, telles que les changements dans les procédures de visa ou les événements culturels.
Scénario d’utilisation : Un utilisateur consulte la page d'actualités pour se tenir informé des derniers événements ou annonces concernant le consulat ou la France. Il peut lire chaque article pour obtenir des détails supplémentaires sur un sujet spécifique.
Page de Demande de Visa
Description du contenu : La page de demande de visa propose un formulaire pour renseigner des informations personnelles, des détails de séjour, et des informations de paiement. Avant de soumettre la demande, l’utilisateur est guidé sur les documents nécessaires.
But : Simplifier le processus de demande de visa en collectant les informations essentielles de manière organisée.
Scénario d’utilisation : L’utilisateur remplit chaque champ requis (nom, prénom, passeport, dates de séjour, paiement, etc.), puis valide le formulaire pour soumettre sa demande. Une vérification est faite sur chaque champ pour s’assurer de la validité des informations.
Page de Loterie
Description du contenu : La page de loterie présente un formulaire d’inscription pour participer à une loterie spéciale, ainsi qu’un historique des derniers gagnants.
But : Offrir aux utilisateurs connectés la possibilité de participer à une loterie qui peut leur donner des privilèges spéciaux.
Scénario d’utilisation : L’utilisateur se connecte et s’inscrit à la loterie en cliquant sur le bouton d’inscription. S’il est déjà inscrit, il a la possibilité de se désinscrire. La page affiche également un message indiquant s’il a déjà gagné à la loterie.
Page Compte Utilisateur
Description du contenu : Cette page affiche les informations personnelles de l’utilisateur connecté, comme son nom, prénom, numéro de téléphone, email, ainsi que son statut par rapport à la loterie (inscrit ou non, résident ou non).
But : Permettre à l’utilisateur de consulter ses informations personnelles enregistrées et de voir son statut de résidence et d’inscription à la loterie.
Scénario d’utilisation : L’utilisateur, après s’être connecté, accède à cette page pour vérifier ses informations personnelles et son statut dans la loterie. Si l’utilisateur n’est pas connecté, il est redirigé vers la page d’accueil.
Page de Connexion / Création de Compte
Description du contenu : Cette page contient deux formulaires : un pour la connexion des utilisateurs existants et un autre pour la création de compte. La création de compte requiert le nom, prénom, email, mot de passe et numéro de téléphone.
But : Gérer l’authentification des utilisateurs pour l’accès aux services personnalisés, comme la demande de visa et la participation à la loterie.
Scénario d’utilisation : Un utilisateur nouvellement arrivé sur le site crée un compte en remplissant les champs requis. Par la suite, il pourra se connecter pour accéder aux fonctionnalités réservées, comme l’inscription à la loterie.
Page d’Administration
Description du contenu : Cette page est réservée aux administrateurs. Elle contient un bouton pour effectuer un tirage de la loterie et afficher le résultat. Elle est accessible uniquement aux utilisateurs avec le statut d’administrateur.
But : Fournir un outil de gestion simple pour administrer les tirages de loterie et s’assurer de la régularité des opérations.
Scénario d’utilisation : Un administrateur se connecte, puis accède à cette page pour effectuer un tirage. Si aucun candidat n’est présent, un message l’indique ; sinon, le gagnant est affiché et devient résident.
2. Conception Technique
2.1 Architecture du Site
Le site est structuré de manière modulaire pour permettre une navigation fluide et une gestion simplifiée. Les pages principales incluent des sections partagées pour le header, le footer, et une organisation standardisée pour le contenu central.
Organisation des fichiers :
Pages principales : Chaque fonctionnalité a sa propre page PHP (index.php, account.php, visa.php, etc.).
Inclusions : header.php et footer.php sont inclus dans chaque page via PHP (include), offrant une cohérence visuelle et facilitant les modifications globales.
Scripts et styles : Un fichier style.css gère l’apparence générale, avec des classes partagées pour chaque page. Les scripts JavaScript sont centralisés dans script.js pour la gestion des interactions (affichage des pop-ups, validation côté client, etc.).
Routage et Redirections :
Les utilisateurs non connectés sont redirigés vers l’index ou vers la page de connexion s’ils tentent d’accéder à des pages réservées.
La page d’administration est accessible uniquement pour les utilisateurs ayant des droits d’administration.
2.2 Structure de la Base de Données
La base de données est organisée autour de trois tables principales : user, draw, et country_blacklist. Chaque table a une structure adaptée pour stocker efficacement les données nécessaires aux différentes fonctionnalités du site.
Table user : Contient les informations des utilisateurs.
Champs principaux :
userId (ID unique),
first_name, last_name, phone_number, email, password,
isResident (statut de gagnant de la loterie),
isAdmin (droits d’administration),
isLotterySubscribed (statut d’inscription à la loterie).
Table draw : Stocke les informations sur chaque tirage.
Champs principaux :
drawId (ID unique du tirage),
redUserId (ID du gagnant),
hasBeenInformed (indique si le gagnant a été informé),
date (date et heure du tirage).
Table country_blacklist : Liste les pays dont les ressortissants ne peuvent pas faire de demande de visa.
Champs principaux :
country (nom du pays).
2.3 Technologies Utilisées
Frontend :
HTML5 / CSS3 : Utilisés pour structurer et styliser le contenu. Chaque page suit une structure cohérente pour garantir une bonne lisibilité.
Bootstrap : Framework CSS pour assurer une mise en page responsive et des éléments stylisés. Utilisé pour les formulaires, les boutons, et les cartes.
JavaScript : Principalement pour la validation côté client et les interactions dynamiques. Les formulaires de connexion, d’inscription, et de demande de visa sont vérifiés en temps réel.
Backend :
PHP : Gère les interactions serveur et les requêtes vers la base de données. PHP est également utilisé pour gérer les sessions utilisateur et les redirections en fonction des permissions.
MySQL : Base de données relationnelle pour stocker les informations des utilisateurs, les résultats des tirages, et la liste des pays blacklistés.
PDF :
FPDF : Bibliothèque PHP pour générer des documents PDF. Utilisée pour créer des confirmations de demande de visa en PDF.
2.4 Gestion des Sessions et Sécurité
Sessions PHP : Chaque utilisateur se connecte via une session PHP, et ses informations sont stockées en session pour une navigation sécurisée entre les pages.
Validation des Données :
Côté client (JavaScript) : Vérifie les champs du formulaire pour limiter les erreurs de saisie.
Côté serveur (PHP) : Validation renforcée avant insertion dans la base de données (email, numéro de téléphone, mot de passe).
Redirections et Contrôle des Accès :
Les utilisateurs non connectés ou non autorisés sont redirigés depuis les pages réservées.
Cette architecture modulaire et ces choix techniques permettent une navigation fluide, une maintenance facilitée, et un accès sécurisé aux fonctionnalités du site.
3. Règles de Développement
Des règles de développement claires ont été mises en place pour garantir une qualité de code, une maintenance facilitée et une cohérence globale. Ces règles concernent principalement la structure du code, le nommage, la documentation et la gestion des erreurs.
3.1 Nommage des Variables et Fonctions
Variables : Les noms de variables sont en anglais et suivent une convention de camelCase (e.g., userEmail, isResident). Cela permet de garder une cohérence dans le code et facilite la compréhension de celui-ci, notamment pour les autres développeurs.
Fonctions : Les fonctions sont nommées en snake_case (e.g., validate_email, create_user), une convention choisie pour différencier visuellement les fonctions des variables.
Évaluation : Cette règle de nommage a bien fonctionné pour maintenir la clarté, mais il aurait été utile d’ajouter des conventions pour différencier les fonctions publiques des fonctions privées (e.g., ajouter un underscore pour les fonctions privées).
3.2 Documentation du Code
Commentaires : Chaque fonction est commentée pour expliquer son objectif, ses paramètres et sa valeur de retour. Cela est particulièrement important pour les fonctions critiques comme celles qui gèrent les validations de formulaire ou les interactions avec la base de données.
Documentation des Fichiers : Certains fichiers contiennent une section d’introduction en commentaire expliquant leur but général (e.g., signup_process.php pour gérer les inscriptions). Cela rend le code plus compréhensible et facilite la navigation dans le projet.
Évaluation : Cette documentation a bien contribué à la clarté du projet, même si certains fichiers auraient bénéficié de commentaires supplémentaires, notamment sur les sections complexes comme la génération de PDF.
3.3 Structure des Fichiers
Organisation Modulaire : Le code est divisé en fichiers modulaires (e.g., header.php, footer.php), chacun ayant une fonction spécifique. Cela permet de réutiliser des sections de code et de faciliter les modifications globales (e.g., modifier le header dans une seule place).
Séparation Frontend/Backend : Les fichiers PHP s’occupent des interactions serveur tandis que le JavaScript est géré séparément dans script.js. Cela améliore la lisibilité et facilite le débogage.
Évaluation : Cette structure est efficace pour les modifications globales. Cependant, une structure de dossiers plus détaillée (e.g., un dossier includes pour les fichiers partagés) pourrait encore améliorer l’organisation.
3.4 Validation et Sécurité
Validation Côté Client : JavaScript est utilisé pour des validations de base (e.g., format de l’email, longueur du mot de passe). Cela améliore l’expérience utilisateur en détectant les erreurs en temps réel.
Validation Côté Serveur : PHP gère la validation complète avant insertion dans la base de données (e.g., email, numéro de téléphone). Cette double validation garantit que les données sont bien formatées avant leur traitement.
Sécurité des Sessions : Une session est requise pour accéder aux pages sensibles comme le compte utilisateur ou la loterie. La session est vérifiée sur chaque page, et les utilisateurs non autorisés sont redirigés vers l’accueil.
Évaluation : La validation fonctionne bien pour les principaux champs, mais l’ajout de hachage de mot de passe et de vérifications avancées (e.g., regex pour le format du téléphone) serait un plus.
3.5 Gestion des Erreurs et Retours Utilisateurs
Affichage des Erreurs : Les erreurs sont affichées via des pop-ups pour alerter l’utilisateur en cas de problème (e.g., format invalide, mot de passe non confirmé). Les messages d’erreur sont clairs et orientent bien l’utilisateur vers la correction.
Retour JSON pour les Opérations Serveur : Les requêtes AJAX renvoient des messages JSON, facilitant la gestion des erreurs sans rechargement de la page. Cela est particulièrement utile pour les formulaires de connexion et d’inscription.
Évaluation : L’affichage des erreurs est efficace, mais l’ajout de logs d’erreurs côté serveur aiderait à traquer les erreurs de manière plus détaillée, surtout pour le débogage.
Ces règles de développement ont permis de maintenir un code de qualité, d’assurer une certaine sécurité et de rendre le projet plus facile à maintenir et à développer.
4. Tests Unitaires
Bien que des tests unitaires automatisés n'aient pas été mis en place dans ce projet, des tests manuels ont été réalisés pour vérifier les principales fonctionnalités. Voici un aperçu des tests menés, ainsi que des suggestions pour des tests automatisés à ajouter à l’avenir.
4.1 Tests Manuels
Les tests manuels réalisés couvrent les éléments suivants :
Formulaire de Connexion et Inscription
Vérification des Champs : Test des validations pour l’email, le mot de passe, et le numéro de téléphone (e.g., respect du format, confirmation du mot de passe).
Création de Compte : Test du flux de création de compte avec différentes valeurs valides et invalides pour vérifier le retour d’erreurs approprié.
Connexion et Déconnexion : Test de connexion et déconnexion pour s'assurer que les sessions fonctionnent comme prévu et redirigent correctement l’utilisateur.
Formulaire de Demande de Visa
Validation des Données : Test des validations pour les dates de séjour, le numéro de carte bancaire et le pays d’origine, notamment pour détecter les formats incorrects.
Téléchargement de Documents : Test de l’upload des fichiers pour les champs de passeport et de photo d’identité, vérification des types de fichiers acceptés et des erreurs associées.
Messages de Confirmation : Test de l’affichage du résumé des informations saisies, pour s’assurer que toutes les données sont bien transmises.
Fonctionnalités de Loterie
Inscription et Désinscription : Test des boutons pour s’inscrire et se désinscrire de la loterie, vérification des mises à jour dans la base de données.
Tirage Administrateur : Test du tirage par un administrateur pour vérifier que les informations du gagnant sont mises à jour correctement.
Navigation et Accès Utilisateur
Contrôle des Accès : Test de la redirection automatique des utilisateurs non connectés vers l’index lorsqu’ils tentent d’accéder aux pages restreintes (e.g., compte, loterie).
Affichage des Messages d’Erreur : Test de l’affichage des messages d’erreur en pop-up lorsque l’utilisateur essaie de contourner les restrictions d’accès ou de soumettre des données incorrectes.
4.2 Suggestions pour les Tests Unitaires Automatisés
Les tests unitaires et d'intégration seraient une amélioration significative pour automatiser les vérifications et garantir la fiabilité du site. Voici quelques tests unitaires clés à envisager :
Tests de Validation de Formulaire
Email, Mot de Passe, Téléphone : Tests unitaires pour chaque champ du formulaire d’inscription, s’assurant que seuls les formats valides passent.
Vérification de la Carte Bancaire : Implémenter un test pour vérifier que les numéros de carte bancaire suivent la validation de Luhn.
Tests de Création et Connexion d’Utilisateur
Création de Compte : Test pour vérifier que les informations sont correctement ajoutées dans la base de données, avec des contrôles sur les doublons d’email.
Connexion : Test unitaire pour simuler une connexion avec les bons identifiants et tester la gestion des sessions.
Tests de la Loterie
Inscription/Désinscription : Vérifier que l’état d’inscription change dans la base de données et que les utilisateurs inscrits sont bien pris en compte dans les tirages.
Simulation de Tirage : Test d’intégration pour vérifier qu’un utilisateur gagnant est bien sélectionné et marqué comme résident.
Tests de Sécurité
Accès Restreint : Test unitaire pour vérifier que les pages protégées redirigent bien les utilisateurs non connectés.
Hachage de Mot de Passe : Bien que non implémenté ici, un test unitaire pourrait s’assurer que les mots de passe sont bien hachés avant d’être stockés.
Tests d'Interface et d'Affichage
Affichage Correct des Erreurs : Test pour s’assurer que les erreurs sont bien transmises en JSON et affichées en pop-up.
Navigation Mobile : Test d’interface pour s’assurer que le site reste responsive sur différentes tailles d’écran.
Conclusion des Tests
Bien que les tests manuels aient permis de valider les principales fonctionnalités, l’ajout de tests automatisés améliorerait significativement la fiabilité et faciliterait les mises à jour. La mise en place de tests unitaires pourrait également réduire les risques de régression lors de futures modifications du code.
5. Outils
Plusieurs outils ont été utilisés tout au long du projet pour le développement, la gestion de la base de données, la création graphique, et la génération de PDF. Voici un aperçu des outils principaux et de leur rôle dans le projet.
5.1 Visual Studio Code
Description : Visual Studio Code (VS Code) est l’éditeur de texte principal utilisé pour écrire et organiser le code du projet. Sa flexibilité et ses nombreuses extensions ont facilité le développement.
Utilisation :
Développement Frontend et Backend : VS Code a été utilisé pour écrire le HTML, CSS, JavaScript et PHP nécessaires à chaque page.
Extensions : Des extensions comme Prettier pour le formatage du code et PHP Intelephense pour l’autocomplétion et les suggestions PHP ont amélioré la productivité et réduit les erreurs.
5.2 XAMPP
Description : XAMPP est un serveur local permettant d’exécuter Apache et MySQL pour tester le site en local avant sa mise en production.
Utilisation :
Apache : Le serveur Apache intégré à XAMPP a permis de tester les pages PHP et les interactions serveur en local.
MySQL : Utilisé pour créer et gérer la base de données, essentielle au fonctionnement des comptes utilisateurs, des demandes de visa et de la loterie.
phpMyAdmin : Interface graphique intégrée dans XAMPP pour gérer les tables de la base de données, ajouter des enregistrements, et effectuer des requêtes SQL manuelles.
5.3 GIMP
Description : GIMP (GNU Image Manipulation Program) est un logiciel de création et de retouche d’images.
Utilisation :
Création des Images de Fond : Les images de fond et les éléments graphiques utilisés sur les pages d’accueil, de présentation du pays et d’actualités ont été traités et ajustés avec GIMP.
Optimisation des Images : GIMP a permis de redimensionner et d’optimiser les images pour réduire le temps de chargement des pages.
5.4 FPDF
Description : FPDF est une bibliothèque PHP open source utilisée pour la génération de documents PDF.
Utilisation :
Génération des Demandes de Visa : Bien que des difficultés aient été rencontrées, FPDF a été utilisé pour générer des documents PDF reprenant les informations saisies par l’utilisateur dans la demande de visa.
Améliorations à Envisager : Pour faciliter l’intégration de FPDF, des tests supplémentaires et une configuration approfondie seront nécessaires afin de garantir la génération correcte des fichiers PDF.
5.5 Git (GitHub)
Description : Git est un système de contrôle de version décentralisé, et GitHub est la plateforme choisie pour héberger le code.
Utilisation :
Gestion des Versions : Git a permis de sauvegarder régulièrement les modifications apportées au code et de conserver un historique des changements.
Collaboration : Héberger le code sur GitHub a facilité l’accès aux différentes versions et assuré une sauvegarde en ligne des développements.
Ces outils ont joué un rôle essentiel dans le développement du site web et ont contribué à assurer une bonne organisation, une visualisation adéquate, et une validation des fonctionnalités tout au long du projet.
