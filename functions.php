<?php
function displayMessage($message, $redirectUrl = null) {
    // Affiche le message dans un pop-up
    echo "<script>  alert('" . addslashes($message) . "');</script>";
    
    // Redirection si un URL est fourni
    if ($redirectUrl) {
        echo "<script>window.location.href = '$redirectUrl';</script>";
    }
}
?>
