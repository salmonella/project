<?php 

 //session_start();
 //$i=0;
 //$sid= $_SESSION['sid'];
	try {
         $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        }   

    catch (PdoException $e) 
        {
        die("L'accès à la base de donnée est impossible.".$e);
        }
       $req = $bdd->prepare("select nom,prenom,numerique,specialite,email,idstudent,scholarship,motif,date_debut,date_fin,etat from demande where etat ='accepte' or etat='refuse';");
      $req->execute();
      //print("Récupération de toutes les lignes d'un jeu de résultats :\n");
      //$reponse = $req->fetchAll();
      //$response = json_encode($reponse);
      //print_r($result);
      $outp = "";
      while($rs = $req->fetch()) {
    if ($outp != "") 
    {$outp .= ",";}
    $outp .= '{"nom":"'  . $rs["nom"] . '",';
    $outp .= '"prenom":"'   . $rs["prenom"]        . '",';
    $outp .= '"idstudent":"'   . $rs["idstudent"]        . '",';
    $outp .= '"email":"'   . $rs["email"]        . '",';
    $outp .= '"specialite":"'   . $rs["specialite"]        . '",';
    $outp .= '"scholarship":"'   . $rs["scholarship"]        . '",';
    $outp .= '"motif":"'   . $rs["motif"]        . '",';
    $outp .= '"date_debut":"'   . $rs["date_debut"]        . '",';
    $outp .= '"date_fin":"'   . $rs["date_fin"]        . '",';
    $outp .= '"email":"'. $rs["email"]     . '",';
    $outp .= '"etat":"'. $rs["etat"]     . '"}'; 
}
$outp ='{"students":['.$outp.']}';
//$req->close();
//print_r($outp);
//$response=='{"students":['.$response.']}';
echo($outp);
     
?>