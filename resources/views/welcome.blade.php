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

            {!! Form::open(array('url' => '/user/create','class' => 'form-horizontal form_class')) !!}
            
            @if (Session::has('create_message'))
            <div id="flash_error" style=""><span class="alert alert-success">{{ Session::get('create_message') }}</span></div>
            @endif
             @if (Session::has('login_message'))
            <div id="flash_error" style=""><span class="alert alert-danger">{{ Session::get('login_message') }}</span></div>
            @endif
            <div class="form-group">
                <h1 style="font-weight: 700;"> Login here </h1>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <a href="{{URL::to('user/adduser')}}">Sign Up!!</a>
                </div>

            </div>

        </form>
    </div>
</body>
</html>
