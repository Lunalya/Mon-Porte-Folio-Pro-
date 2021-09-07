<?php

require('crud/db.php');

$sql = "SELECT * from brief";
$request = $bdd->query($sql);

/*$req = $bdd->prepare('SELECT * FROM brief');
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);*/
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mon portfolio</title>

    <link rel="icon" type="image/png" href="assets/img/heart.png" />
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>


<header>
<nav class="fill">
  <ul>
  <img src="assets/img/alien.png" alt="Alien space invader" width="45"><li><a href="#me">About me</a></li>
  <img src="assets/img/alien2.png" alt="Alien space invader" width="45"><li><a href="#contacts">Contact</a></li>
  <img src="assets/img/alien1.png" alt="Alien space invader" width="45"><li><a href="#projet">Projets</a></li>
</ul>
</nav>


</header>

<section class="citation">
  <img class="ghibli" src="assets/img/hauru.gif" alt="Hauru" >
  <p class="quote">
    "Je n'étais qu'une petite fille avec un grand rêve,
    un rappel que vous ne devez jamais abandonner.
    Tellement de personnes m'ont dit que je n'y arriverai
    jamais mais je l'ai fait et vous le pouvez aussi."

  </p>
</section>

<a class="a1" href="crud/index.php">Connexion</a>

<div class="trie">

  <h1 class="titrefooter" id="projet"> Mes projets </h1>


  <nav class="categorie" id="myBtnContainer">
	<a  class="btn active" href="#projet" onclick="filterSelection('all')">All</a>
	<a  class="btn" href="#projet" onclick="filterSelection('html')">Html/Css</a>
	<a  class="btn" href="#projet" onclick="filterSelection('javascript')">JavaScript</a>
	<a  class="btn" href="#projet" onclick="filterSelection('php')">Php</a>

	<div class="animation start-home"></div>
</nav>




<div class="all_card container">

  <?php

while ($row = $request->fetch())
{
  ?>

              <div id="briefs" class="card_brief filterDiv <?= $row["type_language"] ?>" >
                <div class="zoom">
                  <div class="image">
                    <img src="<?= $row["photo"] ?>" >
                  </div>
                </div>
                  <h3><?=  $row["nom_brief"] ?></h3>
                      <div class="categorie_card">
                      <?=  $row["type_language"] ?>
                      </div>
                  <p class="brief_text"> <?=  $row["descrip"] ?> </p>
                  <div class="neon">
                    <ul>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                      <li></li>
                    </ul>
                  </div>
              </div>

      <?php
  }

  ?>

</div>
<hr class="glowstick">
</div>




<section class="presentation" id="me">
    <img class="girl" src="assets/img/girl.webp" alt="anime girl" >
  <div class="moi2" id="talkbubble">
    <h1 class="titrefooter">Qui suis-je?</h1> </br> <p>Je m'appelle Wendy et j'aspire à devenir Web developpeur.
      C'est pour cela je suis actuellement en formation chez Simplon. Je suis passionnée par les jeux vidéos,
  le maquillage ainsi que les tatouages. </br>

  <div class="container2">
   <h1 class="competence">Compétences</h1>
   <div class="bar learning" data-skill="Javascript"></div>
   <div class="bar back basic" data-skill="Bootstrap"></div>
   <div class="bar front advanced" data-skill="CSS3"></div>
   <div class="bar front advanced" data-skill="HTML5"></div>

 </div>
Si ça vous interesse je vous ai mis à disposition mon CV, il suffit de cliquer sur le bouton ci dessous!
  </p>
  <button class="big-button"><a href="Documents/cv.pdf" download="Mon CV">Push me</a></button>
    </div>
</section>

<footer id="contacts">
  <hr class="foot">
<h1 class="titrefooter">Contactez moi</h1>
<div class="contact">
  <div class="reseaux">
    <h2>Mon email</h2>
    <a href="mailto:Vanbelle.wendy95@gmail.com"><img  src="assets/img/PixelArt.png" alt="email" width="175" height="175"><a>



  </div>

  <div class="email">
    <h2 >Mes réseaux sociaux</h2>

<a href="https://twitter.com/boutchu">
      <img  src="assets/img/twitter.png" alt="twitter" width="150" height="150">
</a>
<a href="https://www.facebook.com/wendy.vanbelle1/">
      <img  src="assets/img/face.png" alt="facebook"  width="125" height="125">
</a>
<a href="https://www.instagram.com/lunalya_lutea/?hl=fr">
      <img  src="assets/img/insta.png" alt="instagram" width="150" height="150">
</a>



  </div>
</div>


</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

</script>
</body>
</html>
