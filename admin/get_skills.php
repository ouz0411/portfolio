<?php

require_once "../includes/db.php";

$skills = $pdo->query("SELECT * FROM skills ORDER BY id DESC")->fetchAll();

foreach($skills as $skill){
    echo '<div class="skill-card-admin">'.htmlspecialchars($skill["name"]).'</div>';
}
?>