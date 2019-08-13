<?php

    // prevents the page being loaded if the obj was not created
    if(!isset($page)) redirect_to('/administration/pages/index.php');

?>

<dl>
    <dt>Subject</dt>
    <dd>
        <select name="page[subject_id]">
        <?php
        $subjects = Subject::find_all();
        foreach($subjects as $subject) {
            echo "<option value=\"" . h($subject->id) . "\"";
            if($page->subject_id == $subject->id) {
                echo " selected";
            }
            echo ">" . h($subject->menu_name) . "</option>";
        }
        $subjects->free_result;
        ?>
        </select>
    </dd>
</dl>
<dl>
    <dt>Menu Name</dt>
    <dd><input type="text" name="page[menu_name]" value="<?php echo h($page->menu_name); ?>" /></dd>
</dl>
<dl>
    <dt>Icon</dt>
    <dd><input type="text" name="page[icon]" value="<?php echo h($page->icon); ?>" /></dd>
</dl>
<dl>
<dl>
<dt>Position</dt>
<dd>
    <select name="page[position]">
    <?php
        for($i=1; $i <= $page_count; $i++) {
        echo "<option value=\"{$i}\"";
        if($page->position == $i) {
            echo " selected";
        }
        echo ">{$i}</option>";
        }
    ?>
    </select>
</dd>
</dl>
<dl>
<dt>Visible</dt>
<dd>
    <input type="hidden" name="page[visible]" value="0" />
    <input type="checkbox" name="page[visible]" value="1"<?php if($page->visible == "1") { echo " checked"; } ?> />
</dd>
</dl>
<dl>
<dt>Content</dt>
<dd>
    <textarea name="page[content]" cols="60" rows="10"><?php echo h($page->content); ?></textarea>
</dd>
</dl>