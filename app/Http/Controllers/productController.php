<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public static function getProducts()
    {
        $productArray = product::all();
        return $productArray;
    }

    public static function getProductsByOrder($orderBy, $orderDir)
    {
        $sql = "SELECT product.name, min_system_require_id, rec_system_require_id, product.display, developer, publisher, release_date, price, sale_name, sale.display as 'sale_display', discount, image, background_image, description 
				FROM `product` JOIN `sale` 
				WHERE ((IFNULL(product.sale_name, 'no_discount')=sale.name 
					AND (sale.date_begin IS NULL OR sale.date_begin <= NOW()) 
					AND (sale.date_end IS NULL OR sale.date_end >= NOW()))
					OR (sale.name='no_discount'))
				ORDER BY $orderBy $orderDir";
        $productArray = User::hydrate(DB::select($sql));
        $productArray_main = array();
        foreach ($productArray as $row) {
            $product = new product($row['name'], $row['min_system_require_id'], $row['rec_system_require_id'], $row['display'], $row['developer'], $row['publisher'], $row['release_date'], $row['price'], $row['sale_name'], $row['image'], $row['background_image'], $row['description']);
            $product->setSaleDisplay($row['sale_display']);
            $product->setDiscount($row['discount']);
            array_push($productArray_main, $product);
        }
        return $productArray_main;
    }
}
