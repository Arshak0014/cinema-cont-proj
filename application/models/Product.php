<?php

namespace application\models;

use application\components\Db;
use application\components\Pagination;
use application\components\Router;

class Product
{
    public static function getProducts(){
        $page = Router::getPage();
        $pagination = new Pagination('/product/page/','products','9','9');
        $limit = $pagination->limit;
        $res_per_page = $pagination->result_per_page;
        $this_page_first_result = ($page - 1) * $res_per_page;

        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id  ORDER BY id DESC LIMIT $this_page_first_result,$limit");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['categories_id'] = $row['categories_id'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }

    public static function getProductsByCategory(){
        $page = Router::getPage();
        $categories_id = Router::getSegment('2');

        $pagination = new Pagination('/category/'.$categories_id.'/page/','products','9','9');

        $limit = $pagination->limit;
        $res_per_page = $pagination->result_per_page;
        $this_page_first_result = ($page - 1) * $res_per_page;

        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products
            LEFT JOIN categories ON products.categories_id = categories.id 
            WHERE categories_id = '$categories_id'
            ORDER BY id DESC LIMIT $this_page_first_result,$limit");
        $i = 0;

        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['categories_id'] = $row['categories_id'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }

}