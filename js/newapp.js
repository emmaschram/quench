var MessageApp = angular.module("MessageApp", [
    "ngRoute", 
    "AllControllers"
]);

MessageApp.config([
    "$routeProvider", "$locationProvider", function($routeProvider, $locationProvider){
        $routeProvider.when(
            "/message", //name for the route
            {
                templateUrl:"view/amsg.html"
            }
        ).when(
            "/user",
            {
                templateUrl:"view/user.html",
            }
        ).when(
            "/send", 
            {
                templateUrl:"view/message.html"   
            }
        ).when(
            "/chat",
            {
                templateUrl:"view/amsg.html",
                controller:"chatCtrl"
            }
        ).when(
            "/login",
            {
                templateUrl:"view/login.html"
            }    
            
        ).when(
            "/register",
            {
                templateUrl:"view/register.html"
            }  
        ).when(
            "/feed",
            {
                templateUrl:"view/feed.html"
            } 

        ).when(
            "/additem",
            {
                templateUrl:"view/additem.html"
            } 

        )
    }
]);