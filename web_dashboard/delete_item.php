<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action.";
    	header('location: items.php');
        exit;

	}
    $item_name = $del_id;

    $db = getDbInstance();
    $db->where('item_name', $item_name);
    $status = $db->delete('items');
    
    if ($status) 
    {
        $_SESSION['info'] = "Item deleted successfully!";
        header('location: items.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete item.";
        header('location: items.php');
        exit;

    }
    
}