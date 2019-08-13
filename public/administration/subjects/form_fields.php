<?php
    
    // prevents the page being loaded if the obj was not created
    if(!isset($subject)) redirect_to('/administration/subjects/index.php');

?>

<dl>
    <dt>Menu Name</dt>
    <dd><input type="text" name="subject[menu_name]" value="<?php echo h($subject->menu_name); ?>" /></dd>
</dl>
<dl>
<dl>
    <dt>Icon</dt>
    <dd><input type="text" name="subject[icon]" value="<?php echo h($subject->icon); ?>" /></dd>
</dl>
<dl>
    <dt>Position</dt>
    <dd>
        <select name="subject[position]">
        <?php
        for($i=1; $i <= $subject_count; $i++) {
            echo "<option value=\"{$i}\"";
            if($subject->position == $i) {
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
        <input type="hidden" name="subject[visible]" value="0" />
        <input type="checkbox" name="subject[visible]" value="1"<?php if($subject->visible == 1) { echo " checked"; } ?> />
    </dd>
</dl>