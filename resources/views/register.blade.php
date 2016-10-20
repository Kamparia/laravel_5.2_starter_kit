<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Laravel Project - Sign Up</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
    @include('template.navbar')

    <!-- Page Content -->
    <div class="container" style="margin-top:120px; margin-bottom: 20px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><strong>User Registration </strong></h2>
                </div>
                <div class="panel-body">
                    @include('template.alert')
                    {!! Form::open(array('url' => 'auth/register', 'method' => 'post')) !!}
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('names', 'Full Name') !!}
                                    {!! Form::text('names', null, ['class' => 'form-control']) !!}
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('username', 'Username') !!}
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'E-mail Address') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>                                                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('confirm_password', 'Confirm Password') !!}
                                    {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember', 'value', true); !!} Accept our terms and services
                                    </label>
                                </div>                                                        
                            </div>
                        </div>                                 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::submit('Register', ['class' => 'form-control btn-default'] ); !!}
                                </div>                                                            
                            </div>
                        </div>                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-section-a -->

    @include('template.footer')

</body>

</html>
