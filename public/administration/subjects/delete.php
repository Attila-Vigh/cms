<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/subjects/index.php');
    $subject = Subject::find_by_id($id);
    if($subject == false) {
    redirect_to('/administration/subjects/index.php');
    }

    if(is_post_request()) {

    $result = $subject->delete();
    $session->message('The subject was deleted successfully.');
    redirect_to('/administration/subjects/index.php');

    }

    $page_title = 'Delete Subject';
    include(SHARED_PATH . '/administration_header.php'); 

?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo h($subject->menu_name); ?></p>

        <form action="<?php echo link_to('/administration/subjects/delete.php?id=' . h_u($subject->id)); ?>" method="post">
        <div id="operations">
            <input type="submit" name="commit" value="Delete Subject" />
        </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
