<?php
    extract($catalog[0]);
?>

<div class="container admin-page">
    <?php
    require_once 'sidebar.php';
    ?>
    <div class="admin-page__body">
        <main class="admin-main__panel cate__table">
            <form action="index.php?pg=updateCategoryForm&cateId=<?=$id?>" method="post" style="display: flex; flex-direction: column; align-self: stretch">
                <h2 class="title" style="margin-bottom: 22px">Update category</h2>
                <table>
                    <tr>
                        <th style="width: 80%">Tên danh mục</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" placeholder="Ex: Feature product..." value="<?=$name?>"></td>
                        <td>
                            <button type="submit" name="update__btn" class="form__btn">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
        </main>
    </div>
</div> 