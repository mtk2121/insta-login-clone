<?php
$data = file_get_contents('user_data.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Data</title>
</head>
<body>
    <h1>Stored User Data</h1>
    <pre><?php echo $data; ?></pre>
</body>
</html>