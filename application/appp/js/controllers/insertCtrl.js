'use strict';

app.controller('insertCtrl', ['$scope','insertService', function ($scope,insertService) {
	  			 $scope.submitForm = function(isValid)
        {
          insertService.submitForm(isValid,$scope);
        }
        }]);
        
/* app.controller('insertCtrl', function($scope,$http) {

        $scope.msgtxt='';
        $scope.formData = {};
        $scope.errors=[];
        $scope.msgs=[];
        $scope.activation=null;         
    $scope.submitForm = function(isValid) {
       if (isValid) {
              alert('votre demande est bien enregistree');
              getData();
              $scope.activation=1;
              $scope.addRow();
              
            }

          };
          $scope.addRow = function(){     
            $scope.student.push({ 
              'motif': $scope.motif, 
              'date_debut':$scope.date_debut,
              'date_fin':$scope.date_fin
            });
          };
          $scope.student=[];    

          function getData(){

            $scope.errors.splice(0, $scope.errors.length); // remove all error messages
            $scope.msgs.splice(0, $scope.msgs.length);

            $http.post("data/insert.php",{'motif':$scope.motif,'date_debut':$scope.date_debut,'date_fin':$scope.date_fin}).success(function(data, status, headers, config) {
                            if (data.msg != '')
                            {
                                $scope.msgs.push(data.msg);
                                 console.log("valid");
                            }
                            else
                            {
                              console.log("valid");
                                $scope.errors.push(data.error);
                            }
                        }).error(function(data, status) { $scope.errors.push(status); });
          };


        });

*/