<form action="" method="post">
    <input type="hidden" name="questionid" value="<?=$question['id'];?>">
    <label for='questiontext'>Edit your question here:</label>
    <textarea name="questiontext" rows="3" cols="40">
    <?=$question['questiontext']?>
    </textarea>
   
    <label for="users">Edit User:</label>
    <select name="users">
        <option value="<?= htmlspecialchars($question['userid'], ENT_QUOTES, 'UTF-8'); ?>">
            <?= htmlspecialchars($question['username'], ENT_QUOTES, 'UTF-8'); ?>
        </option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="modules">Edit Module:</label>
    <select name="modules">
        <option value="<?= htmlspecialchars($quesion['moduleid'], ENT_QUOTES, 'UTF-8'); ?>">
            <?= htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
        </option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <td width="150px">
    <img height="300px" src="images/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8') ?>" />
    </td>
    <input type="submit" name="submit" value="Save">
</form>
