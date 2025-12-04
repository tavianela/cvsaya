<?php
header("Location: artikel.php");
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        // Fallback JavaScript redirect in case PHP header fails
        window.location.replace("artikel.php");
    </script>
</head>
<body>
    <p>If you are not redirected automatically, please <a href="artikel.php">click here</a>.</p>
</body>
</html>