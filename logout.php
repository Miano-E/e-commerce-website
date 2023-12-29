
<?php
// Clear session-related data
session_start();
session_unset();
session_destroy();

header("Location: shop.php");
exit();


?>