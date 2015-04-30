   
app.controller('studentfilter', function($scope,$http) {
	$scope.activation=null;
	$scope.selectedstudent = null;
	if ($scope.selectedstudent != null)
	{
		$scope.activation=1;
		alert($scope.activation);
	}

    $http.get("data/studentfetch.php").success(function(response) {$scope.student = response.student;});
    
    $scope.affichage=function(email){
    	$scope.activation=1;
    	//alert(email);
    	$http.post("data/datafetchonestudent.php", email).success(function(response) {$scope.onestudent = response.etudiant;alert(onestudent.nom);});
    }
    //alert($scope.selectedstudent.email);
    /*if ($scope.selectedstudent != null)
    {
   		
    }*/
});