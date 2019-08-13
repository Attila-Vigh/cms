<?php require_once('../../../private/initialize.php'); 
      require_login();

      $id = $_GET['id'] ?? redirect_to('/administration/pages/index.php'); 

    $page = WebPage::find_by_id($id);
    $subject = Subject::find_by_id($page->subject_id);

    $page_title = 'Show Page';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/subjects/show.php?id=' . h_u($subject->id)); ?>">&laquo; Back to Subject Page</a>

    <div class="page show">

        <h1>Page: <?php echo h($page->menu_name); ?></h1>

        <div class="actions">
            <a class="action" href="<?php echo link_to('/index.php?id=' . h_u($page->id) . '&preview=true'); ?>" target="_blank">Preview</a>
        </div>

        <div class="attributes">
        <dl>
            <dt>Subject</dt>
            <dd><?php echo h($subject->menu_name); ?></dd>
        </dl>
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo h($page->menu_name); ?></dd>
        </dl>
        <dl>
        <dl>
            <dt>Icon</dt>
            <dd>
                <i class="<?php echo h($page->icon); ?>"> </i>
                <?php echo h($page->icon); ?>
            </dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo h($page->position); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $page->visible == '1' ? 'true' : 'false'; ?></dd>
        </dl>
        <dl>
            <dt>Content</dt>
            <dd><?php echo h($page->content); ?></dd>
        </dl>
        </div>


    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
