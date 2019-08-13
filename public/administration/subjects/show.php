<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/subjects/index.php'); 

    $subject = Subject::find_by_id($id);
    // echo var_dump($subject);
    $pages = WebPage::find_all($subject->id);
    // echo var_dump($pages);

    $page_title = 'Show Subject';
    include(SHARED_PATH . '/administration_header.php'); 


?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show">
        <h1>Subject: <?php echo h($subject->menu_name); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($subject->menu_name); ?></dd>
            </dl>
            <dl>
            <dl>
                <dt>Icon</dt>
                <dd>
                <i class="<?php echo h($subject->icon); ?>"></i> 
                <?php echo h($subject->icon); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject->position); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo $subject->visible == '1' ? 'true' : 'false'; ?></dd>
            </dl>
        </div>

        <hr />

        <div class="pages listing">
            <h2>Pages</h2>

            <div class="actions">
                <a class="action" href="<?php echo link_to('/administration/pages/new.php?subject_id=' . h_u($subject->id)); ?>">Create New Page</a>
            </div>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Position</th>
                    <th>Visible</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php foreach($pages as $page) { ?>
                    <?php if($page->subject_id == $subject->id) { ?>
                        <tr>
                        <td><?php echo h($page->id); ?></td>
                        <td><?php echo h($subject->menu_name); ?></td>
                        <td><?php echo h($page->position); ?></td>
                        <td><?php echo $page->visible == 1 ? 'true' : 'false'; ?></td>
                        <td>
                            <i class="<?php echo h($page->icon); ?>"> </i> 
                            <?php echo h($page->icon); ?>
                        </td>
                        <td><?php echo h($page->menu_name); ?></td>
                        <td><a class="action" href="<?php echo link_to('/administration/pages/show.php?id=' . h_u($page->id)); ?>">View</a></td>
                        <td><a class="action" href="<?php echo link_to('/administration/pages/edit.php?id=' . h_u($page->id)); ?>">Edit</a></td>
                        <td><a class="action" href="<?php echo link_to('/administration/pages/delete.php?id=' . h_u($page->id)); ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>

        </div>



    </div>

</div>
