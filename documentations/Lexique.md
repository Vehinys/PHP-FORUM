Lexique : 

APP                      = Dossier de l'ensemble des classes nécessaires au bon fonctionnement du Framework.

AbstractController.php   = Fournit 2 méthode pour la restriction de rôle et une méthode facilitant la redirection.
 
Autoloader.php           = Permet un auto chargement des classes du projet (appelé dans index.php).

ControllerInterface.php  = Permet d'imposer la méthode "index" aux controllers qui l'implémente. 

DAO.php                  = Fournit toutes les méthodes génériques qui interagissent avec la base de données : connexion, SELECT, INSERT, UPDATE, DELETE.

Entity.php               = Fournit la méthode d'hydratation des instances de classes du projet (transformer un tableau associatif en objet ou collection d'objets comme le ferait un ORM comme Doctrine dans Symfony).

Manager.php              = Fournit les méthodes permettant de renvoyer les résultats du Manager vers le Controller correspondant.

Session.php              = Fournit les méthodes relatives à la session (messages flash et gestion des utilisateurs). 

Controller               = Les controllers permettent d'intercepter / prendre en charge la requête HTTP émise par le client (à travers index.php).

                           Chaque controller (namespace Controller) doit hériter d'AbstractController et implémenter ControllerInterface.

Public                   = Dossier qui contient les assets.

View                     = Le dossier "view" contiendra l'ensemble des vues du projet.

Index                    = Le fichier index.php à la racine de notre Framework va permettre de définir toutes les constantes nécessaires à notre configuration initiale, la gestion de la session, 
                           la prise en charge de la requête HTTP provenant du client ainsi que la temporisation de sortie pour charger nos vues de la bonne façon.

Classe Abstraite         = Une classe abstraite est une *classe qui ne peut pas être instanciée* directement mais qui peut contenir des méthodes abstraites et des méthodes concrètes. 
                           Les méthodes abstraites sont des méthodes déclarées mais non implémentées dans la classe abstraite, ce qui signifie que les classes filles doivent les implémenter.

Héritage                 = L'héritage est un concept de la programmation orientée objet qui permet à une classe (appelée classe fille ou sous-classe) 
                           d'hériter des propriétés et des méthodes d'une autre classe (appelée classe parent ou superclasse). 
                           Cela permet la réutilisation du code et la création de hiérarchies de classes.

Interface                = Une interface en PHP est un contrat définissant un ensemble de méthodes que les classes qui l'implémentent doivent fournir. 
                           Contrairement aux classes abstraites, les interfaces ne contiennent pas d'implémentation de méthodes, seulement leur signature. 
                           Une classe peut implémenter plusieurs interfaces.

Classe Finale            = Une classe finale est une classe qui ne peut pas être étendue. 
                           Cela signifie qu'aucune autre classe ne peut hériter de cette classe finale. 
                           On utilise généralement ce concept lorsqu'on veut empêcher une classe d'être modifiée ou étendue.

Autoloader               = L'autoloader est un mécanisme en PHP qui permet de charger automatiquement les classes au moment de leur utilisation, 
                           sans avoir besoin d'inclure manuellement les fichiers qui les définissent. 
                           Cela simplifie le processus de chargement des classes et évite les erreurs d'inclusion manuelle.

Hydratation              = L'hydratation est un processus où les données sont utilisées pour initialiser un objet. 
                           En PHP, cela signifie généralement prendre des données provenant d'une source externe (comme une base de données) et les utiliser pour remplir les propriétés d'un objet.

Entities                 = Chaque table de la base de données doit avoir son équivalent sous forme de classe (namespace Model\Entities). Chaque entité doit hériter de la classe Entity (App). 
                           Chaque entité a le même constructeur qui hydrate les objets de la classe concernée (la méthode hydrate appartient à la classe parent "Entity" et peut être donc utilisée par héritage). 
                           On génère les getters et les setters pour toutes les propriétés de la classe et on ajoute un __toString() pour faciliter nos affichages.

Managers                 = Les managers sont responsables de l'interaction avec la base de données.
                           Comme tous les managers héritent de la classe abstraite "App\Manager", nul besoin de définir les méthodes classiques suivantes dans chaque manager : 

findAll(array $order)    = Retourne une collection d'objets de la classe spécifiée dans le Manager. Possibilité de trier selon un ou plusieurs critères.

findOneById(int $id)     = Retourne un objet de la classe spécifiée dans le Manager (dont l'identifiant est passé en paramètre).

add(array $data)         = Ajoute un enregistrement en base de données.

delete(int $id)          = Supprime un enregistrement en base de données (dont l'identifiant est passé en paramètre).


