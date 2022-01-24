@extends('app')
@section('content')

<!DOCTYPE html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="
        display:block;
        position:absolute;
        left: 500px;
        border-top-width: 100px;
        top: 100px;
        ">
        <table class="table" >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($showdata as $key=>$data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->user_name }}</td>
                    <td>{{ $data->user_email }}</td>
                    <td>{{ $data->user_id }}</td>
                    <td>
                        <a href="{{ url('/menu-b-edit/'.$data->user_id)}}" class="btn btn-success">Edit</a>
                        <a href="{{ url('/menu-b-delete/'.$data->user_id)}}" onlclick = "return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                        <a href="{{ url('/menu-b-permission/'.$data->user_id)}}" onlclick = "return confirm('Are you sure?')" class="btn btn-danger">Permission</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>








