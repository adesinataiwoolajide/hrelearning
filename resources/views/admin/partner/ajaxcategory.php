<?php 
$sel = "SELECT * FROM categories WHERE category_id=:category_id";
echo json_encode(loadCOurseSubCategories($_GET['category_id']));


?>