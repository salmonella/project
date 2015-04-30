<?php 

	try {
         $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        }   

    catch (PdoException $e) 
        {
        die("L'accès à la base de donnée est impossible.".$e);
        }
       $req = $bdd->prepare("select f_name,l_name,email  from user where type='etudiant' ;");
      $req->execute();
        $i=0;
      $response = "";
      while($rs = $req->fetch()) {
    if ($response != "") 
    {$response.= ",";}
    $response .= '{"name":"'  . $rs["f_name"] . '",';
    $response .= '"prenom":"'   . $rs["l_name"]        . '",';
    $response .= '"id":"'   . $i       . '",';
    $response.= '"email":"'. $rs["email"]     . '"}'; 
    $i=$i+1;
}
$response ='{"student":['.$response.']}';
//$req->close();
//print_r($outp);
//$response=='{"students":['.$response.']}';
echo($response);
     
?>