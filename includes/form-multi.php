<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiples Files</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label>File</label>
        <input type="file" name="file[]" multiple>

        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>