<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';

// Serve POST method, After successful insert, redirect to items.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);

    // Insert user and timestamp
    $data_to_db['created_at'] = date('Y-m-d H:i:s');

    $db = getDbInstance();
    $last_id = $db->insert('items', $data_to_db);

    if ($last_id)
    {
        $_SESSION['success'] = 'Item added successfully!';
        // Redirect to the listing page
        header('Location: items.php');
        // Important! Don't execute the rest put the exit/die.
    	exit();
    }
    else
    {
        echo 'Insert failed: ' . $db->getLastError();
        exit();
    }
}

// We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add Recipe Item</h2>
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="item_form" enctype="multipart/form-data">
        <?php include BASE_PATH.'/forms/item_form.php'; ?>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
   $('#item_form').validate({
       rules: {
            item_name: {
                required: true,
                minlength: 3
            },
            item_price: {
                required: true,
                minlength: 1
            },   
            item_image_url: {
                required: true,
                minlength: 4
            },  
            item_stock: {
                required: true,
                minlength: 1
            },    
        }
    });
});
</script>
<?php include BASE_PATH.'/includes/footer.php'; ?>
