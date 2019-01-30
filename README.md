# Générateur de clé de salage Wordpress

## Installation

``` bash
composer install
```

## Options

``` bash
-i      Chemin d'entrée
-o      Chemin de sortie
-r      Traitement récursive des images
-w      Largeur de redimensionnement
-h      Hauteur de redimensionnement
```
Le redimensionnement ne gère pas le rognage des images.

## Utilisation

### Optimisation d'un dossier

Cet exemple permet d'optimiser un dossier complet avec écrasement des images existantes.
``` bash
 vendor/bin/imgopti -i /path/to/images/dir/
```

### Optimisation d'un dossier vers un autre dossier

Cet exemple copie toutes les images d'un dossier vers un autre dossier puis les optimise.
``` bash
 vendor/bin/imgopti -i /path/to/images/dir/ -o /path/to/optimized/images/
```

### Optimisation et redimensionnement des images d'un dossier

Cet exemple permet d'optimiser et de redimensionner les images d'un dossier complet avec écrasement des images existantes.
``` bash
 vendor/bin/imgopti -i /path/to/images/dir/ -w 640 -h 640
```

### Optimisation d'un fichier

``` bash
 vendor/bin/imgopti -i /path/to/image.ext
```

L'exemple suivant copie l'image dans un autre dossier puis l'optimise.
``` bash
 vendor/bin/imgopti -i /path/to/image.ext -o /path/to/optimized/image/
```
