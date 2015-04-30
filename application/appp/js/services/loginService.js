'use strict';
app.factory('loginService',function($http, $location, sessionService){
	return{
		login:function(data,scope){
			var $promise=$http.post('data/user.php',data); //send data to user.php
			$promise.then(function(msg){
				var uid=msg.data;
				if(uid){
					//scope.msgtxt='Correct information';
					sessionService.set('uid',uid);
					if (uid=="etudiant")
						$location.path('/demande');
					else if (uid=="DE")
						$location.path('/DE');
					else 
						$location.path('/secretaire');
				}	       
				else  {
					scope.msgtxt='incorrect information';
					$location.path('/login');
				}				   
			});
		},
		logout:function(){
			sessionService.destroy('uid');
			$location.path('/login');
		},
		islogged:function(){
			var $checkSessionServer=$http.post('data/check_session.php');
			return $checkSessionServer;}
	}

});