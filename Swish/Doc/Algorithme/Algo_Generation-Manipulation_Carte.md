# GESTION DIVERSE DE CARTE#

## CREATION DE CARTE

**CreationCarte(void):** Carte:Matrice(4,3)

**Entrées** : void

**Sortie** : Carte:Matrice(4,3)

### Début

> ###Variables locales :
>
>  **Carte**:Tableau(4,3) d'entiers = 0
>  
>  **Cox1,Cox2,Coy1,Coy2** : entiers
>  ---
>  
>  **Cox1** <- entier entre 1 et 3;
>  
>  **Coy1** <- entier entre 1 et 4;
>  
>  **Carte(Coy1,Cox1)** <- 1;
>  
>  **Cox2** <- entier entre 1 et 3;
>  
>  **Coy2** <- entier entre 1 et 4;
>  
>  **tant que** ( **Cox1** == **Cox2** et **Coy1** == **Coy2** ) **faire**
>  
>  >**Cox2** <- entier entre 1 et 3;
>  >
>  >**Coy2** <- entier entre 1 et 4;
>  
>  **fin tant que**
>  
>  **Carte(Coy2,Cox2)** <- 2;

### FIN

## ROTATION DE CARTE

**rotationVerticale(Carte:Tableau(4,3) d'entiers)** :Carte:Tableau(4,3) d'entiers

**Entrées** : Carte:Tableau(4,3) d'entiers

**Sortie** : Carte:Tableau(4,3) d'entiers

### Début
> ###Variables locales
>
> Inv:Tableau(3,3) d'entier <- [0,0,1;0,1,0;1,0,0];
>
> ---
>
> Carte <- Carte * Inv;
>
### FIN
---

**rotationHorizontale(Carte:Tableau(4,3) d'entiers)** :Carte:Tableau(4,3) d'entiers

**Entrées** : Carte:Tableau(4,3) d'entiers

**Sortie** : Carte:Tableau(4,3) d'entiers

### Début
> ###Variables locales
>
> Inv:Tableau(4,4)d'entiers <- [0,0,0,1;0,0,1,0;0,1,0,0;1,0,0,0];
>
> Carte2:Tableau(3,4) d'entiers;
>
> ---
>
> Cart2 <- Carte' * Inv;
>
> Carte <- Carte2';
>
### FIN


## RECHERCHE COORDONNEES##

**rechercheCo(Carte:Tableau(4,3) d'entiers)** : xCercle,yCercle,xPoint,yPoint entiers

**Entrees** : Carte:Tableau(4,3) d'entiers

**Sortie** : xCercle,yCercle,xPoint,yPoint entiers

### Debut 
>###Variables Locales
> Cox,Coy : entiers
>
> xCercle,yCercle,xPoint,yPoint : entiers
>
> ---
> Cox <- 1
>
> Coy <- 1
>
> tant que 1
>
>>Si Cox == 4 alors
>>
>>>Si Coy == 4 alors
>>>
>>>>break;
>>>
>>>Fin Si
>>
>>>Cox <- 1
>>
>>>Coy <- Coy + 1
>
>>Fin Si
>
>>>
>
>>Si Carte(Coy,Cox) == 1 alors
>
>>> xPoint <- Cox
>
>>> yPoint <- Coy
>
>> Fin Si
>
>>Si Carte(Coy,Cox) == 2 alors
>
>>>xCercle <- Cox
>
>>>yCercle <- Coy
>
>> Fin Si
>
>Cox <- Cox + 1
>
>Fin tant que

### Fin
