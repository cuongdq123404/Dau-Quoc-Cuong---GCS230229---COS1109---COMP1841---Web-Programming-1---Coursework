<form action="" method="post" enctype="multipart/form-data">
    <label for="questiontext">Type your question here:</label>
    <textarea name="questiontext" rows="3" cols="40"></textarea>
    <input type="file" name="fileToUpload">
    <label for="users">Select a user:</label>
    <select name="users" id="users">
        <option value="">Select a user</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="modules">Select a module:</label>
    <select name="modules" id="modules">
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Add">
</form>
