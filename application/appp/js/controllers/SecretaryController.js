app.controller('SecretaryController', function($scope,$http,$location) 
    {   
    		 $scope.ing1=null;
             $scope.ing2=null;
             $scope.ing3=null;

            $scope.ing1=function()
          {
             $scope.ing1=1;
             $scope.ing2=null;
             $scope.ing3=null;
             $http.get("data/datafetchsecretaire.php").success(function(response) {
             $scope.students = response.students;});
          };
          $scope.ing2=function()
          {
             $scope.ing1=null;
             $scope.ing2=1;
             $scope.ing3=null;
             $http.get("data/datafetchsecretaire.php").success(function(response) {
             $scope.students = response.students;});
          };
          $scope.ing3=function()
          {
             $scope.ing1=null;
             $scope.ing2=null;
             $scope.ing3=1;
             $http.get("data/datafetchsecretaire.php").success(function(response) {
             $scope.students = response.students;});
          };
     
      });
