<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

$stmt = $pdo->query("SELECT * FROM experiences ORDER BY id DESC");
$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($experiences as $exp) {
    echo '<div class="experience-item-admin">
            <h4>'.htmlspecialchars($exp["company"]).'</h4>
            <p style="font-weight:bold;">'.htmlspecialchars($exp["role"]).' ('.htmlspecialchars($exp["duration"]).')</p>
            <p style="font-size:14px; color:#94a3b8;">'.htmlspecialchars($exp["description"]).'</p>
            <a href="delete_experience.php?id='.$exp["id"].'" class="delete-exp btn-delete" data-id="'.$exp["id"].'">Sil</a>
          </div>';
}
?>
