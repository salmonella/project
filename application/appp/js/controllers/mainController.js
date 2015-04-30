
    'use strict';
    app.controller('mainController', function($scope,$location,$http) 
    {

      //$http.get("studentfetch.php").success(function(response) {$scope.student = response.student;});
      $scope.selectedstudent = null;

      $scope.formData = {};
      $scope.errors=[];
      $scope.msgs=[];
      $scope.activation=null;
       
        $scope.submitForm = function(isValid) {
           
           if (isValid) 
          {
              alert('votre demande est bien enregistree');
              getData();
              $scope.activation=1;
              $scope.addRow();
              /*$scope.nom=null;
              $scope.prenom=null;
              $scope.numerique=null;
              $scope.idstudent=null;
              $scope.specialite=null;
              $scope.email=null;
              $scope.scholarship=null;
              $scope.motif=null;
              $scope.date_debut=null;
              $scope.date_fin=null;*/
            }

        };
          function removeRow(nom)
            {              
                var index = -1;     
                var comArr = eval( $scope.students );
                for( var i = 0; i < comArr.length; i++ ) 
                {
                  if( comArr[i].nom === nom ) 
                    {
                      index = i;
                      break;
                    }
                }
              $scope.students.splice( index, 1 );        
              };
          $scope.addRow = function()
          {     
            $scope.student.push({ 
              'nom':$scope.nom,
              'prenom': $scope.prenom, 
              'numerique':$scope.numerique, 
              'idstudent': $scope.idstudent, 
              'specialite': $scope.specialite, 
              'email': $scope.email, 
              'scholarship': $scope.scholarship, 
              'motif': $scope.motif, 
              'date_debut':$scope.date_debut,
              'date_fin':$scope.date_fin});
          };
          $scope.student=[];    

           function getData(){

            $scope.errors.splice(0, $scope.errors.length); // remove all error messages
            $scope.msgs.splice(0, $scope.msgs.length);

            $http.post("data/config.php",{'nom':$scope.nom,'prenom':$scope.prenom,'numerique':$scope.numerique,'idstudent':$scope.idstudent,'email':$scope.email,'scholarship':$scope.scholarship,'motif':$scope.motif,'specialite':$scope.specialite,'date_debut':$scope.date_debut,'date_fin':$scope.date_fin})
            .success(function(data, status, headers, config) {
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
                        }).error(function(data, status) { // called asynchronously if an error occurs
    // or server returns response with an error status.
                            $scope.errors.push(status);
                        });
          };

          $scope.datafetch =function()
          {

            $scope.activation=1;
            $http.get("data/datafetch.php").success(function(response) {
             $scope.students = response.students;});
          };
          $scope.accepter=function(nom)
          {
            $scope.decision="accepter";
            $http.post("data/updatedata.php",{'nom':nom,'decision':$scope.decision}).success(function() {
              alert("accepte"); 
              removeRow(nom);
                         
           });
          };
           $scope.refuser=function(nom)
          {
             $scope.decision="refuser";
             $http.post("data/updatedata.php",{'nom':nom,'decision':$scope.decision}).success(function() {
              removeRow(nom);
             alert($scope.decision);
             });
             
          };
          //
          $scope.filtre=function()
          {
            $location.path('/DEfiltre');
          }
          //
      });
