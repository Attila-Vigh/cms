<?php require_once('../../../private/initialize.php'); 
      require_login();

$current_page = $_GET['page'] ?? 1;
$per_page = 20;
$total_count = subject::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// Find all subjects;
// use pagination instead
// $subjects = Subject::find_all();

$sql = "SELECT * FROM subjects ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$subjects = Subject::find_by_sql($sql);
?>

<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH . '/administration_header.php'); ?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>

    <div class="actions">
          <a class="action" href="<?php echo link_to('/administration/subjects/new.php'); ?>">Create New Subject</a>
    </div>

  	<table class="list">
  	    <tr>
            <th>ID</th>
            <th>Icon</th>
            <th>Position</th>
            <th>Visible</th>
  	        <th>Name</th>
            <!-- <th>Pages</th> -->
  	        <th>&nbsp;</th>
  	        <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach($subjects as $subject) { ?>
        <?php /*$page_count = count_pages_by_subject_id($subject->id);*/ ?>
            <tr>
                <td><?php echo h($subject->id); ?></td>
                <td>
                    <i class="<?php echo h($subject->icon); ?>"></i>
                    <?php echo h($subject->icon); ?>
                </td>
                <td><?php echo h($subject->position); ?></td>
                <td><?php echo $subject->visible == 1 ? 'true' : 'false'; ?></td>
                <td><?php echo h($subject->menu_name); ?></td>
                <!-- <td><?php echo $page_count; ?></td> -->
                <td><a class="action" href="<?php echo link_to('/administration/subjects/show.php?id=' . h_u($subject->id)); ?>">View</a></td>
                <td><a class="action" href="<?php echo link_to('/administration/subjects/edit.php?id=' . h_u($subject->id)); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo link_to('/administration/subjects/delete.php?id=' . h_u($subject->id)); ?>">Delete</a></td>
            </tr>
        <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
