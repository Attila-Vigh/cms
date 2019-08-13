<?php require_once('../../../private/initialize.php');
      require_login();

    $admin = new Admin;

    if(is_post_request()) {

        $args = $_POST['admin'];
        $admin = new Admin($args);
        $result = $admin->create();

        if($result === true) {
            $new_id = $admin->id;
            $session->message('The admin was created successfully.');
            redirect_to('/administration/admins/show.php?id=' . $new_id);
        } else {
            //  TODO: show errors
        }
    }

    $page_title = 'Create Admin';
    include(SHARED_PATH . '/administration_header.php'); 

?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/admins/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin new">
        <h1>Create Admin</h1>

        <?php echo display_errors($admin->errors); ?>

        <form action="<?php echo link_to('/administration/admins/new.php'); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Create Admin" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
