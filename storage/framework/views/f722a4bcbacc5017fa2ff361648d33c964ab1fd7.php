<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー登録完了画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー登録完了画面</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <p class="review-complete-content">商品レビューの登録が完了しました。</p>
    <div class="button-review-complete">
        <a href="<?php echo e(route('review.list', ['pg' => $data['page'], 'id' => $data['id']])); ?>" class="button-review-complete-1">商品レビュー一覧へ</a>
        <div style="height: 50px;"></div>
        <a href="<?php echo e(route('product.detail', ['page' => $data['page'], 'id' => $data['id']])); ?>" class="button-review-complete-2">商品詳細に戻る</a>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/review/complete.blade.php ENDPATH**/ ?>