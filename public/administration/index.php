<?php require_once('../../private/initialize.php');
      require_login();
    
    $page_title = 'Staff Menu';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">
    <div id="main-menu">
        <h2>Main Menu</h2>
        <ul>
            <!-- <li><a href="<?php /*echo link_to('/administration/pages/index.php'); */?>">Pages</a></li> -->
            <li><a href="<?php echo link_to('/administration/subjects/index.php'); ?>">Subjects</a></li>
            <li><a href="<?php echo link_to('/administration/pages/index.php'); ?>">Pages</a></li>
            <li><a href="<?php echo link_to('/administration/admins/index.php'); ?>">Admins</a></li>
        </ul>
    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>