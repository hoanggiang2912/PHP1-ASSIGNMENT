<?php 
    $html = '';
    foreach ($categories as $item) {
        extract($item);
        $html.= '
            <tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.count(getProductByCatalogId($id)).'</td>
                <td>
                    <a href="index.php?pg=updateCategoryForm&cateId='.$id.'" class="edit__btn"><i class="fal fa-pen"></i></a>
                    | 
                    <a href="index.php?pg=delCategory&cateId='.$id.'" class="delete__btn"><i class="fal fa-trash-alt"></i></a>
                </td>
            </tr>
        ';
    }
?>

<div class="container admin-page">
    <?php
    require_once 'sidebar.php';
    ?>
    <div class="admin-page__body">
        <div class="dashboard__header">
            <div class="toggle__sidebar">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <form action="index.php?pg=cateSearch" method="post" class="searchbar">
                <input type="text" name="query" placeholder="Search...">
                <button class="search__icon magni-icon" name="search" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="admin flex">
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <a href="">
                    <img src="./dist/img/TYPISTIAL-CANVA-LOGO.png" alt="Typistial customer" class="admin__avt"></a>
                <div class="admin__detail">
                </div>
                <i class="fa-solid fa-chevron-down" style="color: white;"></i>
            </div>
        </div>
        <main class="admin-main__panel cate__table">
            <form action="index.php?pg=addCategory" method="post" style="display: flex; flex-direction: column; align-self: stretch">
                <h2 class="title" style="margin-bottom: 22px">Add new category</h2>
                <table>
                    <tr>
                        <th style="width: 80%">Tên danh mục</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" placeholder="Ex: Feature product..."></td>
                        <td>
                            <button type="submit" name="insert__btn" class="form__btn"><i class="fal fa-plus"></i> Add</button>
                        </td>
                    </tr>
                </table>
            </form>
            <?=$tb?>
            <table>
                <h2 class="title">Categories</h2>
                <tr>
                    <th>Id</th>
                    <th style="flex-grow: 1">Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Sửa | Xóa</th>
                </tr>
                <!-- categories render start -->
                <?=$html?>
                <!-- categories render end -->
            </table>
        </main>
    </div>
</div>