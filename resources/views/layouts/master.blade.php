<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome to Classroom | Dashboard</title>

    <link href="{{ asset('frontend/fonts/opensans.css') }} " rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .display-comment .display-comment {
            margin-left: 40px
        }
        .post-box{

            border-radius: 5px;
            border: 2px solid #518bad;
            padding: 15px;
            margin-bottom: 20px;



        }
        .navbar-default .dropdown-menu.notify-drop .drop-content {
            min-height: 280px;
            max-height: 280px;
            min-width: 280px;
        }
    </style>

</head>
<body>

<div class="body">

    @yield('content')

</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>

<script>
    (function(){
        new Clipboard('#copy-button');
    })();


</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
</body>
</html>