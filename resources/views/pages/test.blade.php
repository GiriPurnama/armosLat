<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Json Template</title>
</head>
<body>
    <h1>
        Test
    </h1>
    @foreach($users as $value)
    <div class="test">
      {{$value["userName"]}}  
    </div>
    @endforeach

    {!! Form::open(['url' => 'create']) !!}
        <div>
            <label for="name"> Nama</label>
            <!-- <input type="text" name="username"> -->
            {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Input Username', 'required']) !!}
        </div>

        <div>
            <label for="Password">Password</label>
            <!-- <input type="password" name="password"> -->
            {!! Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'Input Password', 'required']) !!}

        </div>

        <div>
            <label for="Firstname">Nama Depan</label>
            <!-- <input type="text" name="firstname"> -->
            {!! Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
        </div>
        
        <div>
            <label for="Lastname">Nama Belakang</label>
            <!-- <input type="text" name="lastname"> -->
            {!! Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
        </div>
        
        <div>
            <input type="submit" name="simpan">
        </div>
    {!! Form::close() !!}
</body>
</html>