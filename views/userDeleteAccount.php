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

<h1 class="big-text delete-text">delete</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="/assets/images/user__avt.png" alt=""></div>
                <div>
                    <div class="flex">
                        <h4 class="user__name"><?= $usernameView?></h4>/<span class="user__control-panel">Delete
                            Account</span>
                    </div>
                    <p class="control-panel__detail">Delete your account</p>
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
                    <form action="index.php?pg=deleteAccount&user=<?=$id_user?>" method="post" class="user-account__form">
                        <div class="form__group">
                            <label for="" class="form__label">Delete your account</label>
                            <p class="form__user-note">If you’d like to reduce your email notifications, <a href="#">you
                                    can disable them here</a> or if you just want to change your username, <a
                                    href="#">you can do that here</a>.
                                Be advised, account deletion is final. There will be no way to restore your account.</p>
                            <label for="account-delete-confirm" class="form__user-note flex" style="gap: 8px"><input
                                    type="checkbox" name="delete-account" id="account-delete-confirm"> I’m sure to
                                delete my account</label>
                        </div>
                        <?= $message ?>
                        <div class="form__group">
                            <label for="" class="form__label">Confirm your password <span
                                    class="required">*</span></label>
                            <input type="text" name="password" class="form__input email" placeholder="" value="">
                            <p class="form__message"></p>
                            <p class="form__user-note">We have to ensure that’s you</p>
                        </div>
                        <div class="user-content__save-changes">
                            <div class="flex">
                                <span class="required">*</span>
                                <p class="save__note">We’re so sorry to see you leave</p>
                            </div>
                            <button type="submit" name="deleteAccount" class="content-save__btn delete__btn">Delete account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>