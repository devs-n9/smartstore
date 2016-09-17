<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Create new News</h3>
    <form method="post">
       {{ csrf_field() }}
        <label for="">Title</label>
        <br>
        <input type="text" name="title">
        <br>
        <label for="">Content</label>
        <br>
        <textarea name="content" cols="30" rows="10"></textarea>
        @if(!empty($errors))
        
        @foreach($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
        
        @endif
        <br>
        <input type="submit" value="Save">
        
    </form>
</body>
</html>