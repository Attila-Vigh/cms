<?php
    // Default values to prevent errors
    $page_id = $page_id ?? '';
    $subject_id = $subject_id ?? '';
    $visible = $visible ?? true;
?>

<navigation>
    <ul class="subjects sidenav">
    <?php $nav_subjects = Subject::find_all(['visible' => $visible]); ?>
    <?php foreach($nav_subjects as $nav_subject) { ?> <?php // if(!$nav_subject->visible) { continue; } ?>
        <li class="<?php if($nav_subject->id == $subject_id) { echo 'selected'; } ?>">
            <a class="red"
                href="<?php /*echo link_to('index.php?subject_id=' . h_u($nav_subject->id)));*/ ?>">
                <?php echo h($nav_subject->menu_name); ?>
                <i class="<?php echo h($nav_subject->icon); ?>"></i>
            </a>  
                <?php //if($nav_subject->id == $subject_id) { ?>
            <?php $nav_pages = WebPage::find_all(['visible' => $visible, 'subject_id' => $nav_subject->id ?? false]); ?>
            <?php $sub_class = $nav_subject->menu_name; ?>
            <ul class="pages <?php echo h($sub_class) ; ?>">
                <?php foreach($nav_pages as $nav_page) { ?>
                    <?php // if(!$nav_page->visible) { continue; } ?>
                    <li class="<?php if($nav_page->id == $page_id) { echo 'selected'; } ?>">
                        <a href="<?php echo link_to('index.php?id=' . h_u($nav_page->id)); ?>">
                            <i class="<?php echo h($nav_page->icon); ?>"></i>
                            <?php echo h($nav_page->menu_name); ?>
                        </a>  
                    </li>
                <?php } // while $nav_pages ?>
            </ul>
                <?php //} // endif($nav_subject->id == $subject_id) ?>
        </li>
    <?php } // endwhile $nav_subjects ?>
    </ul>
    <!-- <?php /*$nav_subjects::free;*/ ?> -->
</navigation>

