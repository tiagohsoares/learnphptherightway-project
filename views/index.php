<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action= "/upload" method="post" enctype="multipart/form-data" id="receipt">
        <input type="file" name="receipt[]" multiple>
        <button type="submit" name="receipt">Upload</button>
    </body>
</html>
