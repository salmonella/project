<?php 
//session_start();
$date_fin="12-12-2006";
$date_debut="13-01-2011";
$motif="lllllllll";
$sid=12;

	$user=json_decode(file_get_contents('php://input'));  //get user from 

	try {
         $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        }   

    catch (PdoException $e) 
        {
        print "Erreur : " . $e->getMessage();
    die();
        }

    
    $st = $bdd->prepare("INSERT INTO demande(debut_j,fin_j,motif,id_etudiant) VALUES ('".$date_debut."', '".$date_fin."','".$motif."','".$sid."');");
   $st->execute();
        if ($st) {
            $arr = array('msg' => "User Created Successfully!!!", 'error' => '');
            $jsn = json_encode($arr);
            print_r($jsn);
            } 
        else 
            {
            $arr = array('msg' => "", 'error' => 'Error In inserting record');
            $jsn = json_encode($arr);
		}
  
?>