<table border='1px'>
        <p><?=$totalQuestions?> posts have been submitted.</p>
        <?php foreach($questions as $question): ?>
        <tr>
        <td width="300px"><?=htmlspecialchars($question['questiontext'],ENT_QUOTES,'UTF-8')?>
        <br /><?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8')?>
        (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

        <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>

        <form action="deletequestion.php" method = "post">
            <input type="hidden" name="id" value="<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8');?>">
            <input type="submit" value="Delete">
        </form> 

        <td width="150px"><?php $display_date = date('D d M Y', strtotime($question['questiondate'])); ?>
        <?=htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8')?>
        <td width="150px">
        <img height="100px" src="images/<?=htmlspecialchars($question['image'],ENT_QUOTES,'UTF-8');?>"/>
        </tr>
        <?php endforeach;?>
        </table>