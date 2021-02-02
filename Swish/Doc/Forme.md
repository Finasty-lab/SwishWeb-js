# Projet Swish
**Etudes des formes**
> Avec C.TOFFIN, Y.SEVRET, A.GOLFIER, T.SOUCHON et Monsieur LAFOURCADE EN 2A de DUT Info.

---
## SOMMAIRE
   - [Explications](#Explications)
   - [Etude du cercle](#Etude-du-cercle)
   - [Etude du carré](#Etude-du-carré)
   - [Etude du triangle](#Etude-du-triangle)
   - [Etude du losange](#Etude-du-losange)
   - [Etude du pentagone](#Etude-du-pentagone)


---
## Explications

Chaque forme est contenu dans une div carré. Pour simplifier mes calculs, je prends un carré de longueur X qui permet de calculer facilement par la suite, si nous augmentons ou diminuons la taille de la div.

Ayant 2 divisions, l'une sans fond et l'autre pour une version avec fond.

Code des divisions :
```css
.containform {
    height: var(--x);
    width: var(--x);
    display: table-cell;
    vertical-align: middle;
}

.containform2{
	position: relative;
	height: var(--x);
    width: var(--x);
    display: table-cell;
    vertical-align: middle;
    background-color: var(--couleur);
}
```

Il est important de noter que nous allons stocker des variables dans le code css. Nous allons avoir 3 variable :  
x : La taille de la division conteneur  
y : la taille de la forme conteneur  
z : la taille de la forme contenue  

Soit :  
```css
:root{
  /*Couleurs*/
	--couleur : black;
	--couleurfond : white;
	/*Dimensions*/
	--x : 5vw;
	--y : 4vw; /*taille anneau*/
	--z : 3vw; /*taille rond*/
}
```


---
## Etude du cercle

Cette structure contient deux formes :
   - Un anneau (composé de 2 ronds) qui représente la partie extérieur
   - Un rond qui représente la partie intérieur manquante

En HTML pour coder un rond, nous partons d'une div simple (un quadrilatère) :
```HTML
<div class="rond"></div>
```
Et en CSS nous définissons
```CSS
.rond {
    /*centrer la division*/
    display: table;
    margin: 0 auto;
    /*définir la couleur*/
    background-color: #FFD100;
    /*définir la taille*/
    height: 3vw;
    width: 3vw;
    /*définir un arondie à notre div*/
    border-radius: 3vw;
}
```

### Version 1
Notre objectif étant de réaliser la figure suivante :

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/779749908038156333/unknown.png "Image rond")

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="anneau">
		<div class="rondinterieur"></div>
	</div>
</div>

<div class="containform">
  <div class="rond"></div>
</div>
```

Code forme anneau :
```css
.anneau {
	position: relative;
	left: calc((var(--x) - var(--y)) / 2);
    background-color: var(--couleur);
    border-radius: var(--y);
    height: var(--y);
    width: var(--y);
    display: table-cell;
    vertical-align: middle;
}
.rondinterieur {
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
    display: table;
    margin: 0 auto;
    border-radius: var(--z);
}
.rond {
    display: table;
    margin: 0 auto;
    background-color: var(--couleur);
    height: var(--z);
    width: var(--z);
    border-radius: var(--z);
}
```

Pour résumer, le rond intérieur va se centrer au milieu de l'anneau.

### Version 2
Notre objectif étant de réaliser la figure suivante :

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/779768320752091146/unknown.png "Image rond")

Ici, nous nous intéressons sur la forme de gauche, car la forme de droite est déhà présenté au dessus.
Code HTML :
```HTML
<div class="containform2">
	<div class="rond2"></div>
</div>

<div class="containform">
	<div class="rond"></div>
</div>
```
Code CSS :
```css
.rond2 {
	display: table;
    margin: 0 auto;
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
    border-radius: var(--z);
}
```

### Version 3
Pour la version 3, nous assemblons les idée du dessous de façon à obtenir cette idée :

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/782610205258154034/unknown.png "Image rond")
Pour différencier chacunes des formes, nous réduisons le diamètre à chaque fois.

```HTML
<div class="containform2">
	<div class="anneau2"></div>
</div>

<div class="containform">
	<div class="anneau3">
		<div class="rond3"></div>
	</div>
</div>

<div class="containform">
	<div class="rond4"></div>
</div>
```
Code CSS :
```css
.anneau2 {
	position: relative;
    background-color: var(--couleurfond);
    border-radius: var(--y);
    height: var(--y);
    width: var(--y);
    left : calc((var(--x) - var(--y))/2);
    display: table-cell;
    vertical-align: middle;
}
.anneau3 {
	position: relative;
    background-color: var(--couleur);
    border-radius: var(--y);
    height: var(--y);
    width: var(--y);
    margin-left: auto;
    margin-right: auto;
}
.rond3 {
	position: relative;
	top : calc((var(--y) - var(--z))/ 2);
	left : calc((var(--y) - var(--z))/2);
	display: table-cell;
    vertical-align: middle;
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
    border-radius: var(--z);
}
.rond4 {
	display: table;
    margin: 0 auto;
    background-color: var(--couleur);
    height: var(--z);
    width: var(--z);
    border-radius: var(--z);
}

```

---

## Etude du carré

Cette structure contient deux formes :
   - Un carré (composé de 2 carré) qui représente la partie extérieur
   - Un carré qui représente la partie intérieur manquante

### Version 1

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/780037455859941436/unknown.png "Image carré")

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="carre">
		<div class="carreinterieur"></div>
	</div>
</div>

<div class="containform">
	<div class="carre2"></div>
</div>
```

Code CSS pour le carré :
```css
.carre {
    position: relative;
    background-color: var(--couleur);
    height: var(--y);
    width: var(--y);
    margin-left: auto;
    margin-right: auto;
}
.carreinterieur {
    position: relative;
	top : calc((var(--y) - var(--z))/2);
	left : calc((var(--y) - var(--z))/2);
	display: table-cell;
    vertical-align: middle;
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
}
.carre2 {
    background-color: var(--couleur);
    height: var(--z);
    width: var(--z);
    display: table;
    margin: 0 auto;
}

```

### Version 2

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/780036552255471646/unknown.png "Image carré")

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="carreinterieur2"></div>
</div>

<div class="containform">
	<div class="carre2"></div>
</div>
```

Code CSS pour le carré :
```css
.carreinterieur2 {
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
    display: table;
    margin-left: auto;
    margin-right: auto;
}
```

### Version 3

![Alt text](https://cdn.discordapp.com/attachments/712609191432290325/780041515745411102/unknown.png "Image carré")

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="carreinterieur3"></div>
</div>

<div class="containform">
	<div class="carrev2">
		<div class="carreinterieur4"></div>
	</div>
</div>

<div class="containform">
	<div class="carre3"></div>
</div>
```

Code CSS pour le carré :
```css
.carreinterieur3 {
	position: relative;
    background-color: var(--couleurfond);
    height: var(--y);
    width: var(--y);
    left : calc((var(--x) - var(--y))/2);
    display: table-cell;
    vertical-align: middle;
}
.carrev2 {
	position: relative;
    background-color: var(--couleur);
    height: var(--y);
    width: var(--y);
    margin-left: auto;
    margin-right: auto;
}
.carreinterieur4 {
	position : relative;
	top : calc((var(--y) - var(--z)) / 2);
	left : calc((var(--y) - var(--z)) / 2);
    background-color: var(--couleurfond);
    height: var(--z);
    width: var(--z);
    display: table-cell;
    vertical-align: middle;
}
.carre3 {
    background-color: var(--couleur);
    height: var(--z);
    width: var(--z);
    display: table;
    margin: 0 auto;
}
```
---
## Etude du triangle

### Version 1

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="trianglerinterieur"></div>
	<div class="triangle"></div>
</div>

<div class="containform">
	<div class="ptriangle"></div>
</div>
```

Code CSS pour le carré :
```css
.triangle {
    display: table;
    margin: 0 auto;
    border-left: calc(var(--y) /2) solid transparent;
    border-right: calc(var(--y) /2) solid transparent;
    border-bottom: var(--y) solid var(--couleur);
}
.trianglerinterieur {
	position: absolute;
	bottom: calc(((var(--x) - var(--y))/2) + ((var(--y) - var(--z))/3));
	left : calc((var(--x) - var(--z))/2);
	border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-bottom: var(--z) solid var(--couleurfond);
}
.ptriangle {
	position: absolute;
	top : calc((var(--x) - var(--z))/2);
	left : calc((var(--x) - var(--z))/2);
	border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-bottom: var(--z) solid var(--couleur);
}
```

### Version 2

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="trianglerinterieur2"></div>
</div>

<div class="containform">
	<div class="ptriangle"></div>
</div>
```

Code CSS pour le carré :
```css
.trianglerinterieur2 {
	position: absolute;
	bottom: calc((var(--x) - var(--z))/2);
	left : calc((var(--x) - var(--z))/2);
	border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-bottom: var(--z) solid var(--couleurfond);
}
```

### Version 3

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="triangle2"></div>
</div>

<div class="containform">
	<div class="trianglerinterieur"></div>
	<div class="triangle"></div>
</div>

<div class="containform">
	<div class="ptriangle"></div>
</div>
```

Code CSS pour le carré :
```css
.triangle2 {
    display: table;
    margin: 0 auto;
    border-left: calc(var(--y) /2) solid transparent;
    border-right: calc(var(--y) /2) solid transparent;
    border-bottom: var(--y) solid var(--couleurfond);
}
```

---
## Etude du croix

### Version 1

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="croixinté">
		<div class="croixgaucheinte"></div>
		<div class="croixdroiteinte"></div>
	</div>
	<div class="croix">
		<div class="croixgauche"></div>
		<div class="croixdroite"></div>
	</div>
</div>

<div class="containform">
	<div class="croixinté">
		<div class="croixgaucheinte2"></div>
		<div class="croixdroiteinte2"></div>
	</div>
</div>
```

Code CSS pour le carré :
```css
.croixinté{
    z-index: 2;
    position: absolute;
    left: calc((var(--x) - var(--z))/2);
    bottom: calc(((var(--x) - var(--z))/2) + ((var(--z)) / 2.33));
}
.croixgaucheinte{
    position: relative;
    background-color: var(--couleurfond);
    height: calc(var(--z)/16);
    width: calc(var(--z));
    top : calc(var(--z) / 32);
    transform: rotate(45deg);
}
.croixdroiteinte{
    position: relative;
    background-color: var(--couleurfond);
    height: calc(var(--z)/16);
    width: calc(var(--z));
    bottom : calc(var(--z) / 32);
    transform: rotate(-45deg);
}
.croix{
	position: absolute;
	left: calc((var(--x) - var(--y)) / 2);
    bottom: calc(  ((var(--x) - var(--y))/2) + ((var(--y)) / 4)  );
}
.croixgauche{
    position: relative;
    background-color: var(--couleur);
    height: calc(var(--y)/4);
    width: var(--y);
    top : calc(var(--y) / 8);
    transform: rotate(45deg);
}
.croixdroite{
    position: relative;
    background-color: var(--couleur);
    height: calc(var(--y)/4);
    width: var(--y);
    bottom : calc(var(--y) / 8);
    transform: rotate(-45deg);
}
.croixgaucheinte2{
    position: relative;
    background-color: var(--couleur);
    height: calc(var(--z)/16);
    width: calc(var(--z));
    top : calc(var(--z) / 32);
    transform: rotate(45deg);
}
.croixdroiteinte2{
    position: relative;
    background-color: var(--couleur);
    height: calc(var(--z)/16);
    width: calc(var(--z));
    bottom : calc(var(--z) / 32);
    transform: rotate(-45deg);
}
```

### Version 2

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="croix">
		<div class="croixgauche2"></div>
		<div class="croixdroite2"></div>
	</div>
</div>

<div class="containform">
	<div class="croix">
		<div class="croixgauche"></div>
		<div class="croixdroite"></div>
	</div>
</div>
```

Code CSS pour le carré :
```css
.croixgauche2{
    position: relative;
    background-color: var(--couleurfond);
    height: calc(var(--y)/4);
    width: var(--y);
    top : calc(var(--y) / 8);
    transform: rotate(45deg);
}
.croixdroite2{
    position: relative;
    background-color: var(--couleurfond);
    height: calc(var(--y)/4);
    width: var(--y);
    bottom : calc(var(--y) / 8);
    transform: rotate(-45deg);
}
```

### Version 3

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="croix">
		<div class="croixgauche2"></div>
		<div class="croixdroite2"></div>
	</div>
</div>

<div class="containform">
	<div class="croixinté">
		<div class="croixgaucheinte"></div>
		<div class="croixdroiteinte"></div>
	</div>
	<div class="croix">
		<div class="croixgauche"></div>
		<div class="croixdroite"></div>
	</div>
</div>

<div class="containform">
	<div class="croixinté">
		<div class="croixgaucheinte2"></div>
		<div class="croixdroiteinte2"></div>
	</div>
</div>
```

---
## Etude du losange

### Version 1

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="losangehautinte"></div>
	<div class="losangebasinte"></div>
	<div class="losangehaut"></div>
	<div class="losangebas"></div>
</div>

<div class="containform">
	<div class="losangehautinte2"></div>
	<div class="losangebasinte2"></div>
</div>
```

Code CSS pour le carré :
```css
.losangehautinte {
    z-index: 3;
    position: absolute;
    left: calc((var(--x) - var(--z))/2);
    bottom : calc(var(--x) / 2);
    border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-bottom: calc(var(--z) /2) solid var(--couleurfond);
}
.losangebasinte {
    z-index: 3;
    position: absolute;
    left: calc((var(--x) - var(--z))/2);
    top : calc(var(--x) / 2);
    border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-top: calc(var(--z) /2) solid var(--couleurfond);
}
.losangehaut {
    z-index: 2;
    position: absolute;
    left: calc((var(--x) - var(--y)) / 2.4);
    bottom : calc(var(--x) / 2);
    border-left: calc(var(--y) /1.9) solid transparent;
    border-right: calc(var(--y) /1.9) solid transparent;
    border-bottom: calc(var(--y) /1.9) solid var(--couleur);
}
.losangebas {
    position: absolute;
    z-index: 2;
    left: calc((var(--x) - var(--y)) / 2.4);
    top : calc(var(--x) / 2);
    border-left: calc(var(--y) /1.9) solid transparent;
    border-right: calc(var(--y) /1.9) solid transparent;
    border-top: calc(var(--y) /1.9) solid var(--couleur);
}
.losangehautinte2 {
    z-index: 3;
    position: absolute;
    left: calc((var(--x) - var(--z))/2);
    bottom : calc(var(--x) / 2);
    border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-bottom: calc(var(--z) /2) solid var(--couleur);
}
.losangebasinte2 {
    z-index: 3;
    position: absolute;
    left: calc((var(--x) - var(--z))/2);
    top : calc(var(--x) / 2);
    border-left: calc(var(--z) /2) solid transparent;
    border-right: calc(var(--z) /2) solid transparent;
    border-top: calc(var(--z) /2) solid var(--couleur);
}
```

### Version 2

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="losangehaut2"></div>
	<div class="losangebas2"></div>
</div>

<div class="containform">
	<div class="losangehaut"></div>
	<div class="losangebas"></div>
</div>
```

```css
.losangehaut2 {
    position: absolute;
    left: calc((var(--x) - var(--y)) / 2);
    bottom : calc(var(--x) / 2);
    border-left: calc(var(--y) /2) solid transparent;
    border-right: calc(var(--y) /2) solid transparent;
    border-bottom: calc(var(--y) /2) solid var(--couleurfond);
}
.losangebas2 {
    position: absolute;
    left: calc((var(--x) - var(--y)) / 2);
    top : calc(var(--x) / 2);
    border-left: calc(var(--y) /2) solid transparent;
    border-right: calc(var(--y) /2) solid transparent;
    border-top: calc(var(--y) /2) solid var(--couleurfond);
}
```

### Version 3

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="losangehaut2"></div>
	<div class="losangebas2"></div>
</div>

<div class="containform">
	<div class="losangehautinte"></div>
	<div class="losangebasinte"></div>
	<div class="losangehaut"></div>
	<div class="losangebas"></div>
</div>

<div class="containform">
	<div class="losangehautinte2"></div>
	<div class="losangebasinte2"></div>
</div>
```


---
## Etude du pentagone

### Version 1

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="trapezeinte"></div>
	<div class="trapeze"></div>
</div>

<div class="containform">
	<div class="trapezeinte2"></div>
</div>
```

```css
.trapezeinte{
    width: var(--z);
    height: var(--z);
    background: var(--couleurfond);
    position: absolute;
    z-index: 2;
    bottom : calc( ((var(--x) - var(--z))/2.1));
    left: calc((var(--x) - var(--z))/2);
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
}
.trapeze{
    width: var(--y);
    height: var(--y);
    background: var(--couleur);
    position: relative;
    left: calc((var(--x) - var(--y)) / 2);
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
}
.trapezeinte2{
    width: var(--z);
    height: var(--z);
    background: var(--couleur);
    position: absolute;
    z-index: 2;
    bottom : calc( ((var(--x) - var(--z))/2.1));
    left: calc((var(--x) - var(--z))/2);
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
}
```

### Version 2

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="trapeze2"></div>
</div>

<div class="containform">
	<div class="trapeze"></div>
</div>
```

```css
.trapeze2{
    width: var(--y);
    height: var(--y);
    background: var(--couleurfond);
    position: relative;
    left: calc((var(--x) - var(--y)) / 2);
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
}
```

### Version 3

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="trapeze2"></div>
</div>

<div class="containform">
	<div class="trapezeinte"></div>
	<div class="trapeze"></div>
</div>

<div class="containform">
	<div class="trapezeinte2"></div>
</div>
```

---
## Etude du octogone

### Version 1

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform">
	<div class="octogoninte"></div>
	<div class="octogon"></div>
</div>

<div class="containform">
	<div class="octogoninte2"></div>
</div>
```

```css
.octogoninte{
    width: var(--z);
    height: var(--z);
    background: var(--couleurfond);
    position: absolute;
    z-index: 2;
    bottom : calc( ((var(--x) - var(--z))/2.1));
    left: calc((var(--x) - var(--z))/2);
    clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
}
.octogon{
    width: var(--y);
    height: var(--y);
    background: var(--couleur);
    position: relative;
    left: calc((var(--x) - var(--y)) / 2);
    clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
}
.octogoninte2{
    width: var(--z);
    height: var(--z);
    background: var(--couleur);
    position: absolute;
    z-index: 2;
    bottom : calc( ((var(--x) - var(--z))/2.1));
    left: calc((var(--x) - var(--z))/2);
    clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
}
```

### Version 2

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="octogon2"></div>
</div>

<div class="containform">
	<div class="octogon"></div>
</div>
```

```css
.octogon2{
    width: var(--y);
    height: var(--y);
    background: var(--couleurfond);
    position: relative;
    left: calc((var(--x) - var(--y)) / 2);
    clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
}
```

### Version 3

En HTML pour coder les formes ci-dessus :
```HTML
<div class="containform2">
	<div class="octogon2"></div>
</div>

<div class="containform">
	<div class="octogoninte"></div>
	<div class="octogon"></div>
</div>

<div class="containform">
	<div class="octogoninte2"></div>
</div>
```

```
