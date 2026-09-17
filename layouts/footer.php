<?php
$assetBase = $assetBase ?? smartwills_asset_base();
$pageScripts = $pageScripts ?? [];
?>
<script src="<?php echo htmlspecialchars($assetBase); ?>/js/global.js"></script>
<?php foreach ($pageScripts as $script): ?>
    <script src="<?php echo htmlspecialchars($assetBase . '/js/' . $script); ?>"></script>
<?php endforeach; ?>
</body>
</html>
