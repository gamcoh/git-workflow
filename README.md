[![Commitizen friendly](https://img.shields.io/badge/commitizen-friendly-brightgreen.svg)](http://commitizen.github.io/cz-cli/) [![Build Status](https://travis-ci.org/gamcoh/git-workflow.svg?branch=master)](https://travis-ci.org/gamcoh/git-workflow) [![Coverage Status](https://coveralls.io/repos/github/gamcoh/git-workflow/badge.svg?branch=master&service=github)](https://coveralls.io/github/gamcoh/git-workflow?branch=master) [![CodeFactor](https://www.codefactor.io/repository/github/gamcoh/git-workflow/badge)](https://www.codefactor.io/repository/github/gamcoh/git-workflow)

# Documention

## Commits
Les commit doivent être fait de manière conventionel

	<type de tâche>(<périmètre>): message court

	Description complémentaire/complète

	Référence/action sur un ticket définissant cette tâche

Les types de tâches sont : 
- fix : réparer un bug
- feat : création d'une fonctionalité
- test : mise en place de test unitaire
- docs : documention
- style : les changements qui n'ont pas d'effet sur le code (éspaces, tabulations, etc)
- refactor : un changement de code qui n'ajoute pas de fonctionalité et qui ne répare pas de bug
- perf : un changement de code qui améliore la performance
- chore : les changement concernant les outils tiers (librairie, extension, composer, npm, etc)
- build : les changement qui affecte les fichiers de configuration comme npm, gulp, webpack, etc
- revert : inverser un précendant commit

### Installer Commitizen pour commiter directement avec les conventions

	npm install -g commitizen

Installer sa convention préféré

	npm install -g cz-conventional-changelog

Configurer le `.czrc`

	echo '{ "path": "cz-conventional-changelog" }' > ~/.czrc

Ensuite il suffit d'utiliser la commande `git cz` au moment du commit.

Une fois que le projet utilise commitizen dans les règles de l'art nous pouvons mettre le badge de ce dernier sur notre README.md de cette manière : 

	[![Commitizen friendly](https://img.shields.io/badge/commitizen-friendly-brightgreen.svg)](http://commitizen.github.io/cz-cli/)

Ce qui va afficher ceci

[![Commitizen friendly](https://img.shields.io/badge/commitizen-friendly-brightgreen.svg)](http://commitizen.github.io/cz-cli/)

Pour utiliser Commitizen avec VS Code téléchargez cette extension : https://github.com/KnisterPeter/vscode-commitizen

## Créer une méthode agile sur GITHUB pour travailler avec un système de ticket

Une fois votre projet créer sur github aller dans la rubrique "Projects" et ajoutez un nouveau projet.
Il y a plusieurs choix de template le meilleur selon moi est "Automated kanban template". Il permet d'automatiser les colones de manière à ce que les issues se trouvent dans la colone TO DO par exemple.

## Travailler sur un nouveau ticket
### 1. Création du ticket
Pour créer un ticket il suffit de créer un nouvel issue dans l'onglet ISSUES et y ajouter des options : 

- Assigner un collaborateur pour qu'il travail dessus
- Ajouter un titre (forcément 🤓)
- Ajouter des labels (demande de features, fix, doc)
- Lier à un projet

Si vous avez bien configurer votre projet ce ticket s'ajoutera directement dans les TODO.

Une fois la TODO créer, créer une nouvelle branch pour coder dessus.
La nomenclature de la branch doit être écrite de cette manière :
`<contexte>/<issueId>-<fonction>`, exemple : `feat/4-login`

Une fois le ticket términé, le commiter à l'aide de Commitizen sur cette nouvelle branch, puis faire une pull request sur la branch principal voulus.

## Travis !
Pour automatiser les push et pull requests, nous allons utiliser Travis qui, à chaque request va faire des test automatique pour verifier differents niveaux de code.

### 1. Créer l'environement
Pour commencer créer une nouvelle branch pour la feature que vous développer

	git checkout -b feat/43-login

Coder ce que vous avez à coder, ajouter des build dans le fichier `.travis.yml` à la racine du projet, commiter et pusher sur votre branch.

Une fois tout ceci fait, retrouvez-vous sur github pour effectuer une pull request sur la branch principal de votre chois ce qui va enclencher travis.

## PHPUnit (test unitaires pour PHP)
### Test Driven Development (TDD)

Un des meilleurs moyens de coder avec les testes unitaires est la convention "Test Driven Development".
C'est à dire que les testes sont écris en premier et qu'il vont "driver" le développement future.
C'est une bonne idée car on a souvent une idée de ce qu'on veut comme résultat mais pas tout de suite la méthodologie pour le coder, du coup, écrire les testes d'abord permet de se baser sur ce que l'ont veut pour ensuite commencer à développer.

Ce pattern est appelé le "TDD Pattern", le voici :
![TDD Pattern](https://user-images.githubusercontent.com/18115514/41646951-595489cc-7475-11e8-8460-efa8f1ec6dbc.png)

### Installation

Pour installer PHPUnit il faut avoir les extensions : 
- DOM
- JSON
- PCRE
- Reflection
- SPL
- XMLWriter
- Xdebug

Pour installer PHPUnit ajouter un composer.json comme celui de ce projet.
Ensuite lancer la commande : `composer install`.

Pour tester si tout c'est bien passé, lancer la commande : `vendor/bin/phpunit --version`.

### Getting started
Pour créer un premier test, il suffit de créer le dossier `tests` à la racine de notre projet puis utiliser la même architecture que notre application.
Si j'ai une class ayant cette architecture : `src/lib/Model.class.php` alors dans mon dossier `tests` j'aurai `src/lib/ModelTest.class.php`.

Pour regarder un exemple de test unitaire, ouvrez le fichier `tests/ReceiptTest.php`. À l'intérieur vous y trouverai les dépendances ansi que les tests PHP effectuer et la manière de les executer.

Une fois que les tests ont été coder, il faut demander à PHPUnit de les lancer. Pour ce faire, utiliser votre terminal et lancer la commande : `vendor/bin/phpunit tests` où `tests` est le dossier où le code a été effectuer.
Si nous voulons lancer des tests spécifique il suffit de rajouter l'option filter dans la commande : `vendor/bin/phpunit tests --filter=ReceiptTest::testTax`.
De cette manière seulement la méthode `testTax` de la class `ReceiptTest` sera executé.

Pour créer une architecture de tests plus propre, il est conseiller de créer un fichier `phpunit.xml` de cette façon, une fois la commande lancer seul les filtres demandés dans ce fichier seront lancer.
Pour l'exemple regarder ce même fichier à la racine.

### Utilisation avec IDE
Pour utiliser PHPUnit avec VSCode il suffit de télécharger cette extension : https://github.com/elonmallin/vscode-phpunit
Pour ceux qui travaillent sur Sublime, testez cette extension : https://github.com/stuartherbert/sublime-phpunit

### Test Double
## Mock
Un Mock est un système de "test double" qui permet de modifier certaines méthodes avant d'en tester une. En effet, parfois certaines fonctions doivent être tester en modifier le retour d'autres méthodes.
Si par exemple, je veux tester la méthode `update` de mon model principal mais que à l'interieur de celle-ci se trouve d'autres méthodes qui check la cohérence des champs de mon entitée (comme la date de création, email, etc), pour faire en sorte de ne pas avoir de failure de test lier à d'autre fonction, grace au Mock je vais dire que pour ce test, les methodes de check appeller dans `update` vont retourner automatiquement `true` de manière à ce que je teste que le retour de ma méthode `update`.
Pour voir un exemple regarder dans le fichier `ReceiptTest.php` la méthode : `testPostTaxTotal`.

## Ajouter le standard Gamzer au check travis
Pour utiliser un standard custom avec travis il suffit le configurer avec phpcs :

	phpcs --config-set installed_paths /path/to/custom/standard

Pour voir un exemple, regarder dans la conf de travis : `.travis.yml`

## CodeFactor
CodeFactor est vraiment très simple. Il suffit juste de lier son compte avec un de ses projet github et d'ajouter ou d'enlever les fonctionalitées de check proposer par CodeFactor.

## Travis et coveralls
Pour ajouter Coveralls à travis il faut d'abord se créer un compte et le lier à notre repository github.
Il faut ensuite ajouter à la racine de notre projet un fichier `.coveralls.yml` avec à l'interieur les propriétées et les valeur qu'il y a par exemple dans ce projet ci.

### PHP
Pour utiliser coveralls avec PHP (PHPUnit) il faut rajouter à la racine de notre projet un  fichier `phpunit.xml` avec les propriétées et les valeurs qu'il y à dans ce projet.
La valeur des deux propriétées `directory` dans `testsuite` et `whitelist` correspond au dossier qui va être testé par PHPUnit et envoyer à Coveralls.

Dans le fichier `.travis.yml` il faut ajouter les lignes ci-dessous :

	before_install:
		- export CI_BUILD_NUMBER="$TRAVIS_BUILD_NUMBER"
		- export CI_PULL_REQUEST="$TRAVIS_PULL_REQUEST"
		- export CI_BRANCH="$TRAVIS_BRANCH"
		- composer require php-coveralls/php-coveralls '^2.1'

	before_script:
		- mkdir -p tests/logs
		
	script:
		- ./vendor/bin/phpunit -c ./ --coverage-text --coverage-clover tests/logs/clover.xml

	after_script:
		- php ./vendor/bin/php-coveralls -v
