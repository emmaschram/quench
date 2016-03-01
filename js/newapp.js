var MessageApp = angular.module("MessageApp", [
    "ngRoute", 
    "AllControllers"
]);

MessageApp.config([
    "$routeProvider", "$locationProvider", function($routeProvider, $locationProvider){
        $routeProvider.when(
            "/message", //name for the route
            {
                templateUrl:"view/amsg.php"
            }
        ).when(
            "/user",
            {
                templateUrl:"view/user.php",
            }
        ).when(
            "/send", 
            {
                templateUrl:"view/message.php"   
            }
        ).when(
            "/chat",
            {
                templateUrl:"view/amsg.php",
                controller:"chatCtrl"
            }
        ).when(
            "/login",
            {
                templateUrl:"view/login.php"
            }    
            
        ).when(
            "/register",
            {
                templateUrl:"view/register.php"
            }  
        ).when(
            "/feed",
            {
                templateUrl:"view/feed.php"
            } 

        ).when(
            "/additem",
            {
                templateUrl:"view/additem.php"
            } 

        )
    }
]);