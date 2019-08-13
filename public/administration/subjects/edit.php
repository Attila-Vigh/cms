<?php require_once('../../../private/initialize.php');
      require_login();

    $id = $_GET['id'] ?? redirect_to('/administration/subjects/index.php');
    
    $subject = Subject::find_by_id($id);
    if($subject == false) {
        redirect_to('/administration/subjects/index.php');
    }  

    $subject_count = Subject::count_all();

    if(is_post_request()) {

        $subject->merge_attributes($_POST['subject']);
        $result = $subject->update();

        if($result === true) {
            $session->message('The subject was updated successfully.');
            redirect_to('/administration/subjects/show.php?id=' . $id);
        } else {
            $errors = $result;
            //var_dump($errors);
        }

    }

    $page_title = 'Edit Subject'; 
    include(SHARED_PATH . '/administration_header.php'); 
?>

<div id="content">

  <a class="back-link" href="<?php echo link_to('/administration/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <?php echo display_errors($subject->errors); ?>

    <form action="<?php echo link_to('/administration/subjects/edit.php?id=' . h_u($id)); ?>" method="post">

    <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
