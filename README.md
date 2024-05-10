# MediatekFormation
## Application d'origine
L'application d'origine est disponible en suivant ce lien : [https://github.com/CNED-SLAM/mediatekformation](https://github.com/CNED-SLAM/mediatekformation) <br>
La documentation est disponible dans le readme du dépôt ci-dessus.
<br>
## Présentation
Ce site, développé avec Symfony 5.4, permet d'accéder aux vidéos d'auto-formation proposées par une chaîne de médiathèques et qui sont aussi accessibles sur YouTube. La partie back-office permet de gérer les formations proposées une fois connecté en tant qu'administrateur.
<br>Voici les fonctionnalités :
![image](![290880510-fe4165a4-c082-4670-b1a9-b225ab53283c](https://github.com/Theo-L11/mediatekformation/assets/145274256/40160700-3e2d-4297-9cc1-bdc94141d059)
)<br>
<br>
## Les différentes pages
### Page n°1: Les playlists - Front-office
![image](![290887205-df44a5cc-5f1f-4b53-b0a1-4df47b54d228](https://github.com/Theo-L11/mediatekformation/assets/145274256/c4e8108f-7149-4129-be9d-8b675d415e88)
)<br>
Cette page était déjà codée (cf: <a href="https://github.com/CNED-SLAM/mediatekformation">dépôt Github<a/>). Une colonne recensant le nombre de formations par playlist a été ajoutée ainsi que des boutons permettant de faire un tri par ordre croissant ou décroissant.<br>
### Page n°2: Page de connexion - Back-office
![image](![290888708-46614faa-ae4b-47d7-8e6a-a8910d247c9e](https://github.com/Theo-L11/mediatekformation/assets/145274256/f4993ad7-22a6-4f1b-a02f-b70b1d891974)
)<br>
Cette page permet à l'administrateur de se connecter à la partie gestion du site grâce à ses identifiants (nom d'utilisateur et mot de passe). Cette page est accessible en ajoutant /admin à l'URL du site<br>
### Page n°3: Page des formations - Back-office
![image](![290895739-a0d624ba-864e-429c-8d11-b2c926cfb27f](https://github.com/Theo-L11/mediatekformation/assets/145274256/cfc73cd3-7664-4946-98e2-c89752a24500)
)<br>
Cette page s'affiche lorsque l'administrateur est connecté. Elle reprend le modèle de la page des formations du front office. Au niveau du header un bouton se déconnecter est ajouté pour pouvoir fermer la session
d'administration du site. Au dessus du tableau, juste sous le menu de navigation le titre de la page est affiché. Une colonne gestion contient deux boutons permettant soit d'éditer ou de supprimer une formation déjà présente. Tout en haut, un bouton permet d'ajouter une formation. Lors du clic sur le bouton supprimer, un pop-up apparait pour confirmer la suppression
### Page n°4: Ajouter une formation
![image](![290900766-8b3e347b-8868-423c-8d79-d82e2a13c530](https://github.com/Theo-L11/mediatekformation/assets/145274256/efc1afe7-c665-4e64-b154-5b2574a69743)
)
Cette page s'affiche lorsque l'administrateur clique sur le bouton ajouter une formation. Elle contient le même header et le même footer que le reste du back-office, un titre a été ajouté. Il y a un formulaire vide avec à gauche le champ pour l'id de la vidéo Youtube de la formation et à droite les champs pour la date, le titre, la playlist, la catégorie et la description de la formation. Seules la description et la catégorie ne sont pas obligatoires. La date est sous forme de DateTimePicker et doit être antérieure à la date du jour. Un bouton enregistrer permet de soumettre le formulaire.
### Page n°5: Modifier une formation
![image](![290902088-9443e6f7-e5e6-4ff1-8ef6-faf95352c836](https://github.com/Theo-L11/mediatekformation/assets/145274256/0ae44141-5c5f-4494-9a2a-979382a13adc)
)
Cette page s'affiche lorsque l'administrateur clique sur le bouton éditer une formation. Elle est similaire à la page d'ajout d'une formation mais le formulaire est pré-rempli avec les informations de la formation que l'utilisateur a sélectionnée. Sous le titre, on retrouve la vidéo Youtube de la formation.
### Page n°6: Page des playlists - Back-office
![image](![290903075-2c0fbba3-fe7c-40d0-82e1-293c6ac581d4](https://github.com/Theo-L11/mediatekformation/assets/145274256/48aa991d-f7e4-407b-b951-465877f2c450)
)
Cette page s'affiche lorsque l'administrateur clique sur "Playlists" dans le menu de navigation. Elle est similaire à la page des playlists du front-office et comme la page des formations du côté admin elle a une colonne de gestion permettant d'ajouter, d'éditer ou de supprimer une playlist. Là aussi le clic sur le bouton supprimer affiche un pop up pour confirmer la suppression. La suppression d'une playlist n'est possible que si cette dernière est vide. Si ce n'est pas le cas alors un message d'erreur apparaîtra en haut de l'écran.
### Page n°7: Ajout d'une playlist
![image](![290904500-6463825f-18bb-4e53-a265-8cc24c4552a7](https://github.com/Theo-L11/mediatekformation/assets/145274256/23f42aa3-4565-4184-943a-6e5cf60652e8)
)
Cette page s'affiche lorsque l'administrateur clique sur "ajouter une playlist". Il s'agit d'un formulaire avec les champs nom et description. Seul le champ nom est obligatoire. Un bouton "enregistrer" permet de soumettre le formulaire.
### Page n°8: Modification d'une playlist
![image](![290904859-c1179030-2939-4bc2-9f77-1d56365a903c](https://github.com/Theo-L11/mediatekformation/assets/145274256/2ef62d83-af94-42fa-8b72-37f187fb14b0)
)
Cette page s'affiche lorsque l'administrateur clique sur "Editer" dans la colonne gestion des playlists. A gauche, on retrouve le même formulaire que celui présent sur la page d'ajout d'une playlist. Il est pré-rempli avec les informations de la playlist. A droite, il y a la liste des vidéos composant la playlist avec leur miniature et leur titre.
### Page n°9: Page des catégories
![image](![290905642-cc7374f4-2d92-4a88-a7a9-d81bc3fbf0a9](https://github.com/Theo-L11/mediatekformation/assets/145274256/b757c81f-b678-4fb2-8634-5f1fe98d1dec)
)
Cette page s'affiche lorsque l'administrateur clique sur "catégories" dans le menu de navigation. Elle contient un titre et un formulaire permettant d'ajouter une catégorie. On ne peut ajouter une catégorie que si cette dernière n'existe pas encore. En dessous il y a un tableau composé de deux colonnes : une colonne contenant les noms des catégories et une colonne de gestion avec un bouton supprimer permettant la suppression de la catégorie sur la ligne du bouton. Le clic sur le bouton de suppression déclenche un pop up de confirmation.
## Installation de l'application en local
- Vérifier que Composer, Git et Wamserver (ou équivalent) sont installés sur l'ordinateur.
- Télécharger le code et le dézipper dans www de Wampserver (ou dossier équivalent) puis renommer le dossier en "mediatekformation".
- Ouvrir une fenêtre de commandes en mode admin, se positionner dans le dossier du projet et taper "composer install" pour reconstituer le dossier vendor.
- Récupérer le fichier mediatekformation.sql en racine du projet et l'utiliser pour créer la BDD MySQL "mediatekformation" en root sans pwd (si vous voulez mettre un login/pwd d'accès, il faut le préciser dans le fichier ".env" en racine du projet).
- De préférence, ouvrir l'application dans un IDE professionnel. L'adresse pour la lancer est : http://localhost/mediatekformation/public/index.php
## Tester l'application en ligne
L'application est disponible en ligne à cette adresse : [http://mediatekformationlchz.go.yj.fr](https://www.mediatekformationn.go.yj.fr/mediatekformation/public/) <br>
La page d'authentification est disponible en rajoutant admin à l'adresse : [http://mediatekformationlchz.go.yj.fr/admin](https://www.mediatekformationn.go.yj.fr/mediatekformation/public/admin) <br>
La documentation technique est disponible à cette adresse : [https://mediatekformationlchz.go.yj.fr/mediatekformation_doc/](https://mediatekformationlchz.go.yj.fr/mediatekformation_doc/)
