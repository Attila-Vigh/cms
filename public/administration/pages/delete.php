<?php require_once('../../../private/initialize.php');
    require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/pages/index.php');
    $page = WebPage::find_by_id($id);
    if($page == false) {
      redirect_to('/administration/pages/index.php');
    }

    if(is_post_request()) {

        $result = $page->delete();
        $session->message('The page was deleted successfully.');
        redirect_to('/administration/subjects/show.php?id=' . h_u($page->subject_id));

    }

?>

<?php $page_title = 'Delete Page'; ?>
<?php include(SHARED_PATH . '/administration_header.php'); ?>

<div id="content">

<a class="back-link" href="<?php echo link_to('/administration/subjects/show.php?id=' . h_u($page->subject_id)); ?>">&laquo; Back to Subject Page</a>

<div class="page delete">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete this page?</p>
    <p class="item"><?php echo h($page->menu_name); ?></p>

    <form action="<?php echo link_to('/administration/pages/delete.php?id=' . h_u($page->id)); ?>" method="post">
        <div id="operations">
            <input type="submit" name="commit" value="Delete Page" />
        </div>
    </form>
</div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
