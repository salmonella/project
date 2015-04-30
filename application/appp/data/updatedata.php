<?php 
$data = json_decode(file_get_contents('php://input'));  
$unom=$data->nom;
$decision=$data->decision;
print_r($unom);
//$unom ="benlama";
	try {
         $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        }   

    catch (PdoException $e) 
        {
        die("L'accès à la base de donnée est impossible.".$e);
        }
        if ($decision =="accepter")
        {
      	 	$req = $bdd->prepare("UPDATE demande SET etat  = 'accepte' where nom = '".$unom."';");
      		$req->execute();
  		}
  		else if ($decision =="refuser")
  		{	
  			$req = $bdd->prepare("UPDATE demande SET etat  = 'refuse' where nom = '".$unom."';");
      		$req->execute();
  		}
      //$msg="succés"
       //$jsn = json_encode($msg);
      //print_r($msg);
?>