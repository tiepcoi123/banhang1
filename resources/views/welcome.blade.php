<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="top_nav">
        <a href="{{url('login')}}">Đăng nhập</a>    
        <a href="{{url('register')}}">Đăng kí</a>
    </div>
    <div>
        <center><img class="aa" src="{{asset('backend/images/ok.png')}}" alt="Đây là ảnh Tiệp nhưng k hiện lên"></center>
    </div>
    <style>
        .aa{
            max-width:20%;
        }
    </style>
   
</body>
</html>