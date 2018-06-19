[![Commitizen friendly](https://img.shields.io/badge/commitizen-friendly-brightgreen.svg)](http://commitizen.github.io/cz-cli/) [![Build Status](https://travis-ci.org/gamcoh/git-workflow.svg?branch=master)](https://travis-ci.org/gamcoh/git-workflow)

# Documention

## Commits
Les commit doivent être fait de manière conventionel

	<type de tâche>(<périmètre>): message court

	Description complémentaire/complète

	Référence/action sur un ticket définissant cette tâche

La liste des type de tâche est : 
- fix : réparer un bug
- feat : création d'une fonctionalitée
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

Installer sa convention préférer

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

Une fois votre projet créer sur github aller dans la rubrique "Projects" et ajouter un nouveau projet.
Il y a plusieurs choix de template le meilleur selon moi est "Automated kanban template". Il permet d'automatiser les colones de manière à ce que les issues se trouvent dans la colone TO DO par exemple.

## Travailler sur un nouveau ticker
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


