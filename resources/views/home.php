<!DOCTYPE html>
<html>
<head>
    <title>Catch Test</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="theme/css/main.css">
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular-resource.js"></script>
    <script src="theme/js/app.js"></script>
</head>
<body>
<main class="container" ng-app="catchApp" ng-controller="MainController">
    <h1 class="t-title">Catch Test</h1>
    <button class="btn btn-primary btn-lg t-btn" ng-click="fetchCustomers()">{{ btnText}} Customers</button>
    <p ng-if="loading">Loading...</p>
    <div class="table-responsive t-table" ng-show="showCustomers">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>IP Address</th>
                <th>Company</th>
                <th>City</th>
                <th>Title</th>
                <th>Website</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="customer in customers">
                <th scope="row">{{ customer.id }}</th>
                <td>{{ customer.first_name }}</td>
                <td>{{ customer.last_name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.ip_address }}</td>
                <td>{{ customer.company }}</td>
                <td>{{ customer.city }}</td>
                <td>{{ customer.title }}</td>
                <td>{{ customer.website}}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</div>
</body>
</html>
