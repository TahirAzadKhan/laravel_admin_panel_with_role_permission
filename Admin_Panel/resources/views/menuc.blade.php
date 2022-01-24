@extends('app')
@section('content')

<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="
        display:block;
        position:absolute;
        left: 500px;
        border-top-width: 50px;
        top: 50px;
        ">
        <a href="{{url('/menu-a')}}" class="btn btn-primary my-3">Show User</a>
        @if(Session::has('msg'))
        <p>{{ Session::get('msg') }}</p>
        @endif
        <h2>Add User</h2>
        <form action="{{url('/menu-c-add')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter Your name">
                <label for="">Email</label>
                <input type="text" class="form-control" name="user_email" placeholder="Enter Your email">
                <label for="">Password</label>
                <input type="text" class="form-control" name="user_password" placeholder="Enter Your pass">
            </div>
            <h2>Add Permission</h2>
            <div class="form-group">
                <table class="table" >
                    <thead class="thead-dark">

                    </thead>
                    <tbody>
                        @foreach ($showData as $key=>$data)
                        <tr>

                            <td>

                            <input type="checkbox" id="vehicle1" name="permission3" value={{$data->menu_id}}>
                            {{$data->menu_name}}
                            <input type="radio" id="read" name="cat3" value="1">
                            <label for="html">Read</label>
                            <input type="radio" id="write" name="cat3" value="2">
                            <label for="html">Write</label><br>
                            </td>

                            <td>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>
<div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

