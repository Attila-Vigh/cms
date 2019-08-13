<?php require_once('../../../private/initialize.php');
      require_login();
      
    $admins = Admin::find_all();
    
    $page_title = 'Admins';
    include(SHARED_PATH . '/administration_header.php');

?>

<div id="content">
    <div class="admins listing">
        <h1>Admins</h1>

        <div class="actions">
            <a class="action" href="<?php echo link_to('/administration/admins/new.php'); ?>">Add Admin</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Username</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach($admins as $admin) { ?>
                <tr>
                    <td><?php echo h($admin->id); ?></td>
                    <td><?php echo h($admin->first_name); ?></td>
                    <td><?php echo h($admin->last_name); ?></td>
                    <td><?php echo h($admin->email); ?></td>
                    <td><?php echo h($admin->username); ?></td>
                    <td><a class="action" href="<?php echo link_to('/administration/admins/show.php?id=' . h_u($admin->id)); ?>">View</a></td>
                    <td><a class="action" href="<?php echo link_to('/administration/admins/edit.php?id=' . h_u($admin->id)); ?>">Edit</a></td>
                    <td><a class="action" href="<?php echo link_to('/administration/admins/delete.php?id=' . h_u($admin->id)); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>

<?php include(SHARED_PATH . '/administration_footer.php'); ?>
