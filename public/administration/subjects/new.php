<?php require_once('../../../private/initialize.php');
      require_login();
 
    // display the form
    $subject = new Subject;
    $subject_count = Subject::count_all() + 1;
      
    if(is_post_request()) {

        // Create record using post parameters
        $id = $_POST['subject'];
        $subject = new Subject($id);
        $result = $subject->create();
        if($result === true) {
            echo "new id".$new_id = $subject->id;
            $session->message( 'The subject was created successfully.');
            redirect_to('/administration/subjects/show.php?id=' . $new_id);
        }else {
            $errors = $result;
        }
  
    };

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/administration_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo link_to('/administration/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <?php echo display_errors($subject->errors); ?>

        <form action="<?php echo link_to('/administration/subjects/new.php'); ?>" method="post">

        <?php include('form_fields.php'); ?>
        
        <div id="operations">
            <input type="submit" value="Create Subject" />
        </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
