<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // categoryが変更された場合
            $('.category').change(function() {
                var category_id = $(this).val();

                // category_idの値を渡す
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "<?php echo e(route('product.register.category')); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        category_id: category_id
                    }
                })
                .done(function(data) {
                    // subcategoryのoption値を一旦削除
                    $('.subcategory option').remove();

                    // 戻ってきたdataの値をそれぞれoptionタグとして生成し、subcategoryにoptionタグを追加する
                    $.each(data, function(id, name) {
                        $('.subcategory').append($('<option>').text(name).attr('value', id));
                    })
                })
                .fail(function() {
                    console.log("失敗");
                })
            })
        })
    </script>
    <title>商品一覧</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <?php if(Auth::check()): ?>
        <div id="top-head-2">
            <span class="product-list-title">商品一覧</span>
            <div>
                <a href="<?php echo e(route('product.register2')); ?>" class="button-top-right-1">新規商品登録</a>
            </div>
        </div>
    <?php else: ?>
        <div id="top-head-2">
            <span class="product-list-title">商品一覧</span>
        </div>
    <?php endif; ?>
    <div class="product-list-search">
        <form action="<?php echo e(route('product.search')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <span>カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if($session_product_search['category'] == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </select>
                <select name="subcategory" class="subcategory">
                    <?php if($session_product_search['subcategory'] == 0): ?>
                        <option value="0">----------------</option>
                    <?php else: ?>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subcategory->id); ?>" <?php if($session_product_search['subcategory'] == $subcategory->id): ?> selected <?php endif; ?>><?php echo e($subcategory->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <br>
            <div>
                <span>フリーワード</span>
                <input type="text" name="word" size="40" maxlength="255" class="product-list-word" value="<?php echo e($session_product_search['word']); ?>">    
            </div>
            <input type="submit" value="商品検索" class="button-product-list-search">
        </form>
    </div>
    <div class="product-list-result">
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-list-bar"></div>
            <div class="product-list">
                <img src="<?php echo e(asset('images/' . $result->image_1)); ?>" class="product-list-image">
                <div class="product-list-right">
                    <span class="product-list-category"><?php echo e($result->getCategoryName()); ?>＞<?php echo e($result->getSubcategoryName()); ?></span>
                    <br><br>
                    <a href="<?php echo e(route('product.detail', ['page' => $page, 'id' => $result->id])); ?>" class="button-product-list-to-detail-1"><?php echo e($result->name); ?></a>
                    <div class="product-list-star">
                        <?php if($star[$result->id] == 0): ?>
                            <span><?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                        <?php if($star[$result->id] == 1): ?>
                            <span>★ <?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                        <?php if($star[$result->id] == 2): ?>
                            <span>★★ <?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                        <?php if($star[$result->id] == 3): ?>
                            <span>★★★ <?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                        <?php if($star[$result->id] == 4): ?>
                            <span>★★★★ <?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                        <?php if($star[$result->id] == 5): ?>
                            <span>★★★★★ <?php echo e($star[$result->id]); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-detail-button">
                        <a href="<?php echo e(route('product.detail', ['page' => $page, 'id' => $result->id])); ?>" class="button-product-list-to-detail-2">詳細</a>
                    </div>            
                </div>    
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($results)): ?>
            <div class="product-list-page">
                <?php if($results->onFirstPage()): ?>
                    <span class="admin-member-main-page-left-off"></span>
                <?php else: ?>
                    <a href="<?php echo e($results->previousPageUrl()); ?>" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="<?php echo e($results->previousPageUrl()); ?>" class="admin-member-main-page-left-on"><?php echo e($results->currentPage() - 1); ?></a>
                <?php endif; ?>
                <span class="admin-member-main-page-center"><?php echo e($results->currentPage()); ?></span>
                <?php if($results->hasMorePages()): ?>
                    <a href="<?php echo e($results->nextPageUrl()); ?>" class="admin-member-main-page-right-on"><?php echo e($results->currentPage() + 1); ?></a>
                    <a href="<?php echo e($results->nextPageUrl()); ?>" class="admin-member-main-page-next">次へ＞</a>
                <?php else: ?>
                    <span class="admin-member-main-page-right-off"></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="product-list-button">
            <a href="<?php echo e(route('top')); ?>" class="button-product-list">トップに戻る</a>
        </div>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/product/list.blade.php ENDPATH**/ ?>