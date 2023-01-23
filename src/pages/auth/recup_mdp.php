<?php
    /*************************
    * Page: mot-de-passe-oublie.php
    * Page encodée en UTF-8
    **************************/
//configuration pour la connexion SQL:
$SQL['host']="localhost";//serveur
$SQL['user']="root";//nom d'utilisateur
$SQL['pass']="";//pass
$SQL['base']="nom_de_la_base_de_donnees";//nom de la base de données

include_once("../../components/header.php");
?>

    <h1>Récupération du mot de passe</h1>
    <a href="./">Retour accueil</a>

    <?php
        if(isset($_GET['code'],$_GET['mail'])){
            //un lien est cliqué dans un mail, on recherche si le code et le mail correspondent à une ligne dans la table "recup_mdp"
            $Code=htmlentities($_GET['code'],ENT_QUOTES,"UTF-8");
            $Mail=htmlentities($_GET['mail'],ENT_QUOTES,"UTF-8");
            $mysqli=mysqli_connect($SQL['host'],$SQL['user'],$SQL['pass'],$SQL['base']);
            if(!$mysqli) {
                echo "Erreur connexion BDD";
                //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_connect_error(), pour cela décommentez la ligne suivante:
                
                
            } else {
                $req=mysqli_query($mysqli,"SELECT * FROM recup_mdp WHERE code='$Code' AND mail='$Mail'");
                if(mysqli_num_rows($req)==1){
                    //on génère un nouveau pass (de 5 caractères) et on lui envoi:
                    $NouveauPass=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,5);
                    //on modifie son mot de passe pour son compte
                    mysqli_query($mysqli,"UPDATE membres SET mdp='".md5($NouveauPass)."' WHERE mail='$Mail'");
                    //on ui envoi un mail avec son pass temporaire:
                    mail($Mail,"Votre nouveau mot de passe","Le nouveau mot de passe pour votre compte est: $NouveauPass (Il est vivement conseille de le modifier depuis votre espace membre)");
                    //on supprime la demande mot de passe qui est dans la table "recup_mdp":
                    mysqli_query($mysqli,"DELETE FROM recup_mdp WHERE code='$Code' AND mail='$Mail'");
                    echo "Votre nouveau pass temporaire vient d'être envoyé par mail.";
                } else {
                    echo "Lien incorrect.";
                }
            }
        } else {
            //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
            if(isset($_POST['valider'])){
                //vérifie si le champ mail est bien rempli:
                if(empty($_POST['mail'])){
                    echo "Le champs mail n'est pas renseigné.";
                } else {
                    //tous les champs sont précisés, on regarde si le membre est inscrit dans la bdd:
                    //d'abord il faut créer une connexion à la base de données dans laquelle on souhaite regarder:
                    $mysqli=mysqli_connect($SQL['host'],$SQL['user'],$SQL['pass'],$SQL['base']);
                    if(!$mysqli) {
                        echo "Erreur connexion BDD";
                        //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
                        
                        //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
                        
                    } else {
                        //on défini nos variables:
                        $Mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8");//htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
                        $req=mysqli_query($mysqli,"SELECT * FROM membres WHERE mail='$Mail'");
                        //on regarde si le membre est inscrit dans la bdd:
                        //même si le membre n'existe pas, on affiche qu'un mail à été envoyé, ceci permet d'empécher les robots de voir si un mail existe ou pas dans votre base de données et de vous le dérober
                        if(mysqli_num_rows($req)!=1){
                            //mail inconnu
                        } else {
                            //mail connu, on lance la procédure d'envoi du mail pour recevoir un nouveau mdp
                            $Code=md5(rand(1,99999999));
                            mysqli_query($mysqli,"INSERT INTO recup_mdp SET code='$Code', mail='$Mail'");
                            $Lien=$_SERVER['HTTP_HOST']."/mot-de-passe-oublie.php?code=$Code&mail=$Mail";
                            mail($Mail,"Recuperation du mot de passe","Pour recevoir un nouveau mot de passe cliquez sur le lien suivant: $Lien");
                        }
                        echo "<p>Si votre mail est inscrit, vous allez recevoir un mail contenant un lien à cliquer afin de recevoir un nouveau mot de passe.</p>";
                        $TraitementFini=true;//pour cacher le formulaire
                    }
                }
            }
            if(!isset($TraitementFini)){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                ?>
    <br>
    <p>Remplissez le formulaire ci-dessous pour recevoir un nouveau mot de passe:</p>
    <form method="post" action="mot-de-passe-oublie.php">
        <input type="text" name="mail" placeholder="Votre mail..." required>
        <!-- required permet d'empêcher l'envoi du formulaire si le champ est vide -->
        <input type="submit" name="valider" value="Recevoir un nouveau mot de passe">
    </form>
    <?php
            }
        }
        include_once("../../components/footer.php")
        ?>
