<?php
if ($user) {
    extract($user);
    if ($username != '') {
        $usernameView = $username;
    } else {
        $usernameView = '';
    }
    if ($usernameView == '') {
        $errorMessage = 'Oooops! Something went wrong , we will fix soon.';
    } else {
        $errorMessage = '';
    }
}
?>

<h1 class="big-text">password</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="/assets/images/user__avt.png" alt=""></div>
                <div>
                    <div class="flex">
                        <h4 class="user__name"><?=$usernameView?></h4>/<span class="user__control-panel">Password</span>
                    </div>
                    <p class="control-panel__detail">Manage your password</p>
                </div>
            </div>
        </div>
        <div class="main__bottom">
            <!-- user sidebar render start -->
            <?php
            require_once 'userSidebar.php';
            ?>
            <!-- user sidebar render end -->
            <div class="user-account-content__wrapper">
                <div class="user-account__content">
                    <form action="index.php?pg=password&user=<?=$userSaved['id']?>" method="post" class="user-account__form">
                        <?=$message?>
                        <div class="form__group">
                            <label for="" class="form__label">Old password</label>
                            <input type="text" class="form__input old-password" name="oldPassword" placeholder="" value="">
                            <p class="form__message"></p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">New password</label>
                            <input type="text" class="form__input new-password" name="newPassword" placeholder="" value="">
                            <p class="form__message"></p>
                            <p class="form__user-note">Minimum 6 characters</p>
                        </div>
                        <div class="user-content__save-changes">
                            <div class="flex">
                                <span class="required">*</span>
                                <p class="save__note">Please save your change before leave the site</p>
                            </div>
                            <button type="submit" name="updatePassword" class="content-save__btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    Validator({
        formSelector: '.user-account__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isPassword('.old-password'),
            Validator.isPassword('.new-password'),
        ]
    })
</script>