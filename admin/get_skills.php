<?php

require_once "../includes/db.php";

$skills = $pdo->query("SELECT * FROM skills ORDER BY id DESC")->fetchAll();

foreach($skills as $skill){
    echo '<div class="skill-card-admin">
            '.htmlspecialchars($skill["name"]).'
            <a href="delete_skill.php?id='.$skill["id"].'" class="delete-skill" data-id="'.$skill["id"].'" style="margin-left:10px; color:red; text-decoration:none; font-weight:bold;">&times;</a>
          </div>';
}
?>