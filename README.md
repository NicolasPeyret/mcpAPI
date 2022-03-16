# l'API de MCP
Ce dépôt contient la première version de l'API de MCP.
L’objectif de ce devoir est d’entrer dans un processus de mise en conformité du back-end avec les pratiques en vigueur dans l’industrie : *API-fication*, *normalisation de la couche* de *traitement HTTP*.

---

### Explications
Jusqu'à aujourd'hui (02/2022), nous avons réalisé les EndPoints suivants :
  * /ingredient
  * /recipe
  * /technical
  * /unit
  * /pictures
  * /equipment
  * /tag
  * /categories
  * /season

Divers codes d'erreurs ont été implantés pour permettre d'identifier les erreurs (301, 302, 310, 401, 403, 404, 406, 409, 415, etc).

Toute la documentation de l'API est disponible sur via API Platform /api grâce au Swagger UI.

---

### Configuration
Afin de faire fonctionner l'API, vous devez :
  * cloner le projet `git clone {lien-github}`
  * installer les composants `composer install`
  * démarrer le serveur symfony `symfony server:start --no-tls`

---

### Tests
Une batterie de tests a été réalisé et automatisé. 
En plus de la possibilité de tester chaque route via l'interface API Plateform, il est possible en lançant la commande `php ./vendor/bin/phpunit` *(ou `symfony run bin/phpunit`)* après avoir lancé le serveur Symfony, afin de visualiser le résulat des tests **unitaires** et **fonctionnels**.