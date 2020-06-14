<?php

namespace application\models;

use application\components\Db;

class Category
{

    public static function getCategories(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM categories");

        $i = 0;
        $categories = array();
        while ($row = $result->fetch()) {
            $categories[$i]['id'] = $row['id'];
            $categories[$i]['name'] = $row['name'];
            $categories[$i]['slug'] = $row['slug'];
            $categories[$i]['create_date'] = $row['create_date'];
            $categories[$i]['update_date'] = $row['update_date'];
            $i++;
        }

        return $categories;
    }

}