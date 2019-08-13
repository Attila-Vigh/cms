<?php require_once('../../../private/initialize.php'); 
      require_login();

    $current_page = $_GET['page'] ?? 1;
    $per_page = 20;
    $total_count = WebPage::count_all();
    $pagination = new Pagination($current_page, $per_page, $total_count);

    $sql = "SELECT * FROM pages ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $pages = WebPage::find_by_sql($sql);

    $page_title = 'Pages';
    include(SHARED_PATH . '/administration_header.php');
    
?>

<div id="content">
<div class="pages listing">
    <h1>Pages</h1>

    <div class="actions">
    <a class="action" href="<?php echo link_to('/administration/pages/new.php'); ?>">Create New Page</a>
    </div>

    <table class="list">
    <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <!-- <th>Pages</th> -->
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach($pages as $page) : ?>
        <?php /*$page_count = count_pages_by_page_id($page->id);*/ ?>
        <tr>
        <td><?php echo h($page->id); ?></td>
        <td><?php echo h($page->position); ?></td>
        <td><?php echo $page->visible == 1 ? 'true' : 'false'; ?></td>
            <td><?php echo h($page->menu_name); ?></td>
        <!-- <td><?php echo $page_count; ?></td> -->
        <td><a class="action" href="<?php echo link_to('/administration/pages/show.php?id=' . h_u($page->id)); ?>">View</a></td>
        <td><a class="action" href="<?php echo link_to('/administration/pages/edit.php?id=' . h_u($page->id)); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo link_to('/administration/pages/delete.php?id=' . h_u($page->id)); ?>">Delete</a></td>
        </tr>
<?php endforeach; ?>
    </table>

</div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
    