<?php 
/*
Un script php comportant un formulaire avec un textarea 'message'
Lorsque l'on submit ce formulaire :

1 - On cree un fichier sortie.txt qui contient le message mais transformé
Bonjour Toto => bOnJoUr ToTO

str_split, implode, mt_rand, strtoupper / strtolower

2 - 
http://www.pallier.org/ressources/dicofr/liste.de.mots.francais.frgut.txt

l'enregistrer dans un fichier dico.txt
string function translation (int pas, string texte)

par exemple : translation(4,'la cigale et la fourmi') => "la cigarette et la fourmilliers"

3 - 
Trouver les palindromes du dico.txt

LAVAL
NON

*/
$info1 = ''; // J instencie une variable vide pour afficher le resultat final de l exo 1

if($_POST && isset($_POST['message'])){ // Si on post qqchose et que $_POST['message'] est déclaré

	// Je split (chaque lettre dans un tableau) le contenu de $_POST['message']
	$splitMessage = str_split($_POST['message']);

	// Je fais une boucle sur la longeur du tableau creer
	for( $i=0; $i < count($splitMessage)-1; $i++ ){

		// A chaque tour je fais un chiffre aléatoir entre 0 et 1 que je met dans $n
		$n = mt_rand(0, 1);
		// Puis une condition pour transformé le chiffre aléatoir en upper ou lower
		// que je redeclare dans sa propre position ^_^
		if ($n == 1) {
			$splitMessage[$i] = strtoupper($splitMessage[$i]);
		} else {
			$splitMessage[$i] = strtolower($splitMessage[$i]);
		}

	}

	// Je recolle toutes les lettres et les replacent dans une variable $message
	$message = implode('', $splitMessage);

	// Je creer le fichier sortie.txt
	$handle = fopen("sortie.txt", "w");
	// Dedans j ecrit le contenu de ma variable $message
	fwrite($handle, $message);
	// Je referme mon fichier
	fclose($handle);

	// Je rempli $info1 en y affichant le resultat
	$info1 .= "<a href='sortie.txt'>:: Voir sortie.txt ::</a>";

	// Mes tests :
	// echo $message;
	// var_dump($splitMessage);

}


?>
<section style="text-align:center;">

	<h2>Exercice 1 :</h2>

	<form method="post" action="">
		
		<p><textarea name="message" style="width:400px; height: 200px; resize:none;"></textarea></p>

		<p><input type="submit" value="Envoyer le message" /></p>

	</form>

	<article style="margin:0 auto; width:400px;">
		<?= $info1; ?>
	</article>

</section>

<hr />

<section style="text-align:center;">
	
	<h2>Exercice 2 :</h2>

</section>