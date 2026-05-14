<?php
require_once "../includes/db.php";
require_once "../includes/auth.php";

$stmt = $pdo->query("SELECT * FROM certificates ORDER BY id DESC");
$certs = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($certs as $cert) {
    echo '<div class="experience-item-admin">
            <h4>'.htmlspecialchars($cert["title"]).'</h4>
            <p style="font-weight:bold;">'.htmlspecialchars($cert["organization"]).' ('.htmlspecialchars($cert["issue_date"]).')</p>
            <a href="delete_certificate.php?id='.$cert["id"].'" class="delete-cert btn-delete" data-id="'.$cert["id"].'">Sil</a>
          </div>';
}
?>
