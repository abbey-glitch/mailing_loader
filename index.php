<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image upload</title>
</head>
<body>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="image"><br>
        <input type="text" name="imgdesc" id="" placeholder="enter image desc"><br>
        <input type="email" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter your password" id="">
        <input type="submit" value="upload">
    </form>
</body>
</html>