<?php

include_once "../lib/php/functions.php";

$output = [];

$data = json_decode(file_get_contents("php://input"));

switch($data->type) {
  case "products_all":
    $output['result'] = makeQuery(
      makeConn(),
      "SELECT *
       FROM `products`
       ORDER BY `id` ASC
       LIMIT 12"
    );
    break;

  case "product_search":
    $search = isset($data->search) ? "%{$data->search}%" : "%%";
    $output['result'] = makeQuery(
      makeConn(),
      "SELECT *
       FROM `products`
       WHERE `name` LIKE '$search'
       ORDER BY `id` ASC
       LIMIT 12"
    );
    break;

  case "product_filter":
    $column = $data->column;
    $value = isset($data->value) ? $data->value : "";

    $output['result'] = makeQuery(
      makeConn(),
      "SELECT *
       FROM `products`
       WHERE `$column` = '$value'
       ORDER BY `id` ASC
       LIMIT 12"
    );
    break;

  case "product_sort":
    $output['result'] = makeQuery(makeConn(), "
        SELECT * 
        FROM `products`
        ORDER BY `$data->column` $data->dir
        LIMIT 12
    ");
    break;

  default:
    $output['error'] = "No Valid Type";
}

echo json_encode($output, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);

?>