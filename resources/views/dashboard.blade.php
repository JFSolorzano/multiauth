<!DOCTYPE html>
<html>
    <head>
        <title>Creolestudios</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .form_class{
                width: 50%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
      
            <!--                <form class="form-horizontal form_class" action role="form">-->
            
            <div class="row" style="text-align: right">
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-5">
                        <a href="{{ URL::to('/user/logout') }}"><button type="button" class="btn btn-default btn-md">Logout</button></a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h1 style="font-weight: 700;"> Warm Wel-come {!! Auth::client()->get()->first_name; !!}</h1>
            </div>


        </div>
    </body>
</html>
