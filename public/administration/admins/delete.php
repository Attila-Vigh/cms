<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/admins/index.php');

    $admin = Admin::find_by_id($id);
    if($admin == false) {
        redirect_to('/administration/admins/index.php');
    }

    if(is_post_request()) {

       $result = $admin->delete();
        $session->message('The admin was deleted successfully.');
        redirect_to('/administration/admins/index.php');

    }

    $page_title = 'Delete Admin';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/admins/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin delete">
        <h1>Delete Admin</h1>
        <p>Are you sure you want to delete this admin?</p>
        <p class="item"><?php echo h($admin->full_name()); ?></p>
        <form action="<?php echo link_to('/administration/admins/delete.php?id=' . h_u($id)); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Admin" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
