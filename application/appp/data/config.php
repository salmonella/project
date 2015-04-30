<?php 

$data = json_decode(file_get_contents("php://input"));
$unom = mysql_real_escape_string($data->nom);
$uprenom = mysql_real_escape_string($data->prenom);
$unumerique = $data->numerique;
$uidstudent = $data->idstudent;
$uspecialite = $data->specialite;
$uemail = $data->email;
$uscholarship = $data->scholarship;
$umotif = $data->motif;
$udate_debut =$data->date_debut;
$udate_fin = $data->date_fin;
$etat='en_attente';                         

$bdd= new PDO('mysql:host=localhost;dbname=database;charset=utf8','root','');

$req = $bdd->prepare('INSERT INTO demande (nom,prenom,numerique,idstudent,specialite,email,scholarship,motif,date_debut,date_fin,etat) 
            VALUES ("' . $unom . '","' . $uprenom . '","' . $unumerique . '","' . $uidstudent . '","' . $uspecialite . '","' . $uemail . '","' . $uscholarship . '","' . $umotif . '","' . $udate_debut . '","' . $udate_fin . '","' . $etat . '")');
$req->execute(array(    'nom' => $unom,
                        'prenom' => $uprenom ,
                        'numerique' => $unumerique,
                        'idstudent' => $uidstudent,
                        'specialite' => $uspecialite,
                        'email' => $uemail,
                        'scholarship' => $uscholarship,
                        'motif' => $umotif, 
                        'date_debut' => $udate_debut,
                        'date_fin' => $udate_fin,
                        'etat' => $etat));
    
    if ($req) {
        $arr = array('msg' => "User Created Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In inserting record');
        $jsn = json_encode($arr);
        print_r($jsn);
    } 

  ?> 