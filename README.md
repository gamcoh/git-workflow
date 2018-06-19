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