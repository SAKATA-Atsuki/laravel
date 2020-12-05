@php
    // Ajaxで渡ってきた値をもとに、product_subcategoriesテーブルから該当するsubcategoryを抽出
    $category_id = $_POST['category_id'];
    $subcategories = $_POST['subcategories'];

    // 抽出された値を$subcategories_list配列に格納
    $subcategories_list = array();
    foreach ($subcategories as $subcategory) {
        if ($subcategory->product_category_id == $category_id) {
            $subcategories_list[$subcategory->id] = $subcategory->name;
        }
    }
    header('Content-Type: application/json');

    //json形式でregister.blade.phpへバックする
    echo json_encode($subcategories_list);
@endphp