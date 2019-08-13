<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/pages/index.php');
        
    $page = WebPage::find_by_id($id);
    if($page == false) {
        redirect_to('/administration/pages/index.php');
    }  

    $page_count = WebPage::count_all();


    if(is_post_request()) {

        $page->merge_attributes($_POST['page']);
        $result = $page->update();

        if($result === true) {
        $session->message('The page was updated successfully.');
            redirect_to('/administration/pages/show.php?id=' . $id);
        } else {
            $errors = $result;
        }

    }

    $page_title = 'Edit Page';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">

<a class="back-link" href="<?php echo link_to('/administration/subjects/show.php?id=' . h_u($page->subject_id)); ?>">&laquo; Back to Subject Page</a>

<div class="page edit">
    <h1>Edit Page</h1>

    <?php echo display_errors($page->errors); ?>

    <form action="<?php echo link_to('/administration/pages/edit.php?id=' . h_u($id)); ?>" method="post">
    
        <?php include('form_fields.php'); ?>

        <div id="operations">
            <input type="submit" value="Edit Page" />
        </div>
    </form>

</div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
    