<?php 
	$user=json_decode(file_get_contents('php://input'));  //get user from 

	try {
         $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        }   

    catch (PdoException $e) 
        {
        die("L'accès à la base de donnée est impossible.".$e);
        }

    /*$st = $bdd->query("SELECT * FROM user;");
    while($result = $st->fetch())
    {
    echo $result["f_name"];
    }*/
    
    $st = $bdd->query("SELECT COUNT(*) FROM user WHERE email='".$user->mail."' AND password='".$user->pass."';")->fetch();
    if ($st['COUNT(*)'] == 1)
    {
        $sql = $bdd->prepare( 'SELECT * FROM user WHERE email= "'.$user->mail.'";');   
         $sql->execute(); //or die('Erreur SQL !<br />'.$sql.'<br />'.$sql->errorInfo());
        while($user = $sql->fetch())
        {
           session_start();
            $_SESSION['l_name'] = $user['l_name'];
            $_SESSION['f_name'] = $user['f_name'];
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['type'] = $user['type'];
            $_SESSION['sid'] = $user['sid'];            
		//$_SESSION['uid']=uniqid('ang_');
		print $_SESSION['type'];
        }
    }
?>