<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%;float:left;">
            <h3 class="w3-bar-item">Menu</h3>
            <a href="{{url('/menu-a')}}" class="w3-bar-item w3-button">Menu A</a>
            <a href="{{url('/menu-b')}}" class="w3-bar-item w3-button">Menu B</a>
            <a href="{{url('/menu-c')}}" class="w3-bar-item w3-button">Menu C</a>
            <a href="{{url('/menu-d')}}" class="w3-bar-item w3-button">Menu D</a>
            <div class="row" style="
            display:block;
            position:absolute;
            left: 35px;
            border-top-width: 50px;
            top: 300px;
            ">
            <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
