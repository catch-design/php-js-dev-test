angular.module("catchApp", ['ngResource'])

    .controller('MainController', function ($scope, $resource) {

        var Customers  = $resource('customers/:id');

        $scope.showCustomers = false;
        $scope.loading = false;
        $scope.btnText = 'Show'

        /**
         * On button click fetch the customers from the service,
         * and update button and loader state
         */
        $scope.fetchCustomers = function(){
            $scope.loading = $scope.showCustomers ? false : true;
            Customers.query(function(data){
                $scope.loading = false;
                $scope.customers = data;
                $scope.showCustomers = !$scope.showCustomers;
                $scope.btnText = $scope.btnText == 'Show' ? 'Hide' : 'Show';
            }, function(error){
                console.error("Error :", error);
            });
        }
    });