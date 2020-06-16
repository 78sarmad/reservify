<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// reservations class
require_once BASE_PATH . '/lib/Formats/Reservation.php';
$reservations = new reservation();

// Get Input data from query string
$order_by    = filter_input(INPUT_GET, 'order_by');
$order_dir    = filter_input(INPUT_GET, 'order_dir');
$search_str    = filter_input(INPUT_GET, 'search_str');

// Per page limit for pagination
$pagelimit = 15;

// Get current page
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

// Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('reservation_id', 'customer_email', 'item_name', 'sitting_type', 'booking_hours', 'booking_mins', 'order_sidenote', 'order_total', 'order_feedback', 'order_remarks');

// Start building query according to input parameters
// If search string
if ($search_str) {
    $db->where('customer_email', '%' . $search_str . '%', 'like');
    $db->orwhere('sitting_type', '%' . $search_str . '%', 'like');
}
// If order direction option selected
if ($order_dir) {
    $db->orderBy($order_by, $order_dir);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query
$rows = $db->arraybuilder()->paginate('reservations', $page, $select);
$total_pages = $db->totalPages;
?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Reservations</h1>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str, ENT_QUOTES, 'UTF-8'); ?>">
            <label for="input_order">Order By</label>
            <select name="order_by" class="form-control">
                <?php
                foreach ($reservations->setOrderingValues() as $opt_value => $opt_name) : ($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
                    echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
                endforeach;
                ?>
            </select>
            <select name="order_dir" class="form-control" id="input_order">
                <option value="Asc" <?php
                                    if ($order_dir == 'Asc') {
                                        echo 'selected';
                                    }
                                    ?>>Asc</option>
                <option value="Desc" <?php
                                        if ($order_dir == 'Desc') {
                                            echo 'selected';
                                        }
                                        ?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">
        </form>
    </div>
    <hr>
    <!-- //Filters -->

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="15%">Customer Email</th>
                <th width="10%">Recipe Name</th>
                <th width="10%">Sitting Type</th>
                <th width="5%">Timings</th>
                <th width="15%">Order Sidenote</th>
                <th width="10%">Order Total</th>
                <th width="5%">Feedback</th>
                <th width="25%">Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['reservation_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['sitting_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['booking_hours'] . ':' . $row['booking_mins']); ?></td>
                    <td><?php echo htmlspecialchars($row['order_sidenote']); ?></td>
                    <td><?php echo htmlspecialchars('$'. $row['order_total']); ?></td>
                    <td><?php echo htmlspecialchars($row['order_feedback'] . ' Stars'); ?></td>
                    <td><?php echo htmlspecialchars($row['order_remarks']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
        <?php echo paginationLinks($page, $total_pages, 'reservations.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>