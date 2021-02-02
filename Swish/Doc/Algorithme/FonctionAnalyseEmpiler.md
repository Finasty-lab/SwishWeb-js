# ANALYSE DE CARTE #

## DEFINITION DES STRUCTURES ##
### ENUMERATION FORMEFIGURE ###
//formes géométriques possibles sur des cartes

- **Rond** :rond
- **Carre** :carre
- **Triangle** : triangle
- **Pentagone** : pentagone
- **Losange** : losange

---
### ENUMERATION TYPEFIGURE ###
//Tailles de Figure possibles sur des cartes
- **Petit** : petit
- **Moyen** : moyen
- **Grand** : grand

---
### STRUCTURE FIGURE ###
### Attributs ###
- **Figure.type** : TypeFigure [ ]
- **Figure.forme** : FormeFigure
- **Figure.X** : entier // Coordonnées X sur la **Carte**
- **Figure.Y** : entier // Coordonnées Y sur la **Carte**
- **Figure.HTML** : code HTML
### Méthodes ###
- **Figure.get...**: Retourne l'attributs voulus

---
###STRUCTURE CARTE ###

### Attributs ###
- **Carte.indentifiant** : entier
-  **Carte.row** : eniter // Nombre de lignes sur la carte
-  **Carte.column** : entier // Nombre de colonnes sur la carte
- **Carte.HTML**: code HTML
- **Carte.Matrice**: entier[n][k];
- **Carte.lesFigures** : Figures [ ]
### Méthodes ###
- **Carte.carteVerticale** : obtient sa carte verticalement symétrique.
- **Carte.carteHorizontale** : obtient sa carte horizontalement symétrique.
- **Carte.get...** : Retourne l'attributs voulus

---
### STRUCTURE CODE ###

### Attributs ###
- **Code.code** : entier //Nombre de liaisons
- **Code.Carte**: Carte

---

## COMPARAISON DE CARTE ##

**ComparaisonDeCarte(CarteMere: Carte,  CarteFille: Carte)** : entier,Carte

**Entrées** : 

- **CarteMere** : Carte témoin, "support" de l'assemblage.

-  **CarteFille** : Carte sujette, "pièce" à comparer sur le support.

**Objectif** : Determine le nombre de liaison possible entre CarteMere et CarteFille.

**Sortie** : entier,Carte

**Sortie Possible :**

- **-1,CarteMere** : L'assemblage est impossible.

- **nbliaisons,CarteMere** : L'assemblage est possible avec un certain nombre de liaisons entre les cartes.


### COMMENT FAIRE ###
- Pour chaque **Figure** contenu dans **CarteFille.lesFigures**
	- On regarde chaque **Figure** contenu dans **CarteMere.lesFigures**
	- Si des figures sont aux mêmes endroits, de même **forme** et de **type** différents, on incrémente le nombre de liaisons.
	- Si des figures sont aux mêmes endroits mais que les **Types** sont identiques ou que les **Forme** sont différentes, le nombre de liaisons vaut -1 et on retourne le résultat dans ce cas.
- A la fin de la comparaison des **Figures**. On fait la mise à jour de **CarteMere** en faisant la somme des deux cartes puis on retourne le résultat avec le nombre de liaison.

---


## SOMME DE CARTE #

**SommeDeCarte(CarteMere:Carte d'entiers,CarteFille:Carte)**:Carte

**Entrees** :

 - **CarteMere** : Carte témoin, Carte mise à jour
-  **CarteFille** : Carte sujette,Carte comportant les nouveaux ajouts

**Objectif** : Mettre à jour **CarteMere**  en ajoutant les propriétés de **CarteFille**

**Sortie** : Carte

### COMMENT FAIRE ###
- Pour chaque **Figure** contenu dans **CarteFille.lesFigures**
	- On regarde chaque **Figure** contenu dans **CarteMere.lesFigures**
	- Si l'une des Figures de **CarteFille** est absente de **CarteMere** on l'ajoute à la liste **CarteMere.lesFigures**.
	- Sinon on fait rien
- Une fois toutes les figures mises à jour dans **CarteMere.lesFigures**, **CarteMere.Matrice** est aussi mise à jour en faisant apparaitre les figures ainsi que les types par le biais de somme de puissance de 2.

---

Dans une Matrice si on a : 

- 1 -> Petit
- 2 -> Moyen
- 3 -> Petit Moyen
- 4 -> Grand
- 5 -> Gand Petit
- 6 -> Grand Moyen
- 7 -> Grand Moyen Petit

---
- On retourne **CarteMere** mise à jour
> ---

# ASSEMBLAGE #

**Assemblage(TasDeCarte: Carte[], CarteMere:Carte** : Code[ ]

**Entree** : 

 - **TasDeCarte** : Liste de **Carte** selectioonnées afin de tester si un assemblage valide est possible.
 -  **CarteMere** : Carte témoin, "support" de l'assemblage.

**Objectif** : Tester tous les assemblages possibles du tas de cartes

**Sortie** : Code[ ]

### COMMENT FAIRE ###

- On supprime la tête de liste de **TasDeCarte** qui est égale à **CarteMere**.
- Si **TasDeCarte** est maintenant vide on retourne un **Code** avec **Code.code** = 0 et **Code.Carte** = **CarteMere**.
	-Sinon on continue  
- On appelle la même fonction **Assemblage** en envoyant la liste **TasDeCarte** et en testant avec toutes les variantes de rotation de la tête de **TasDeCarte**.
- Une fois toutes les listes de **Code** retournées par ces appelles de fonctions et récupérées dans une seule :
	- Pour chaque **Code** de la liste :
		- Si **Code.code**  est différent de -1, on compare **Code.Carte** et **CarteMere**. Puis on ajoute le nombre de liaison à **Code.code**.
- On retourne la liste de **Code** mise à jour.

---
















