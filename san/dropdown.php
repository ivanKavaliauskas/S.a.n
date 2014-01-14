<!DOCTYPE html>
<html lang="en">
<head>
<title>Example of Twitter Bootstrap Dropdowns</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style type="text/css">
	.bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <div class="navbar navbar-static">
        <div class="navbar-inner">
            <a href="#" class="brand">Company Name</a>
            <ul role="navigation" class="nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>                                		