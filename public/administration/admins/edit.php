<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/admins/index.php');

    $admin = Admin::find_by_id($id);
    if($admin == false) {
        redirect_to('/administration/admins/index.php');
    }

    if(is_post_request()) {

        $args = $_POST['admin'];
        $admin->merge_attributes($args);
        $result = $admin->update();

        if($result === true) {
            $session->message('The admin was updated successfully.');
            redirect_to('/administration/admins/show.php?id=' . $id);
        } else {
            // TODO: show errors
        }

    } 

    $page_title = 'Edit Admin';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/admins/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin edit">
        <h1>Edit Admin</h1>

        <?php echo display_errors($admin->errors); ?>

        <form action="<?php echo link_to('/administration/admins/edit.php?id=' . h_u($id)); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Edit Admin" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
