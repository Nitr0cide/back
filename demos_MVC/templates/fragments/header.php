<header>
    <div>Administration des articles</div>
</header>
<?php
global $message;
if (!empty($message)) {
    echo '<div class="messages">';
    echo nl2br(htmlentities($message));
    echo '</div>';
}
?>


