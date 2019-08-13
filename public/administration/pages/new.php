<?php require_once('../../../private/initialize.php');
      require_login();

    // display the form
    $page = new WebPage;
    $page_count = WebPage::count_all() + 1;

    if(is_post_request()) {

        $page = new WebPage($_POST['page']);
        $result = $page->create();

        if($result === true) {
            $new_id = $page->id;
            $session->message('The page was created successfully.');
            redirect_to('/administration/pages/show.php?id=' . $new_id);
        } else {
            $errors = $result;
        }

    }

    $page_title = 'Create Page';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">

    <!-- <a class="back-link" href="<?php //echo link_to('/administration/subjects/show.php?id=' . h_u($_GET['subject_id'])); ?>">&laquo; Back to Subject Page</a> -->
    <a class="back-link" href="<?php echo link_to('/administration/subjects/index.php'); ?>">&laquo; Back to Subject Page</a>

    <div class="page new">
        <h1>Create Page</h1>

        <?php echo display_errors($page->errors); ?>

        <form action="<?php echo link_to('/administration/pages/new.php'); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Create Page" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
