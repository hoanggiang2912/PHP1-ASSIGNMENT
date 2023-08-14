<?php
    $usernameView = '';
    $emailView = '';
    if (isset($_GET['user'])) {
        $userId = $_GET['user'];
        $user = getUserById($userId);
        extract($user);
        if (isset($username) && $username != '') {
            $usernameView = $username;
        } else {
            $usernameView = '';
        }
        if (isset($email) && $email != '') {
            $emailView = $email;
        } else {
            $emailView = '';
        }
    }
?>

<h1 class="big-text">general</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="./views/layout/assets/images/user__avt.png" alt=""></div>
                <div>
                    <div class="flex">
                        <h4 class="user__name"><?=$usernameView?></h4>/<span class="user__control-panel">General</span>
                    </div>
                    <p class="control-panel__detail">Update your username and manage your account</p>
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
                    <form action="index.php?pg=general" method="post" class="user-account__form">
                        <div class="form__group">
                            <label for="" class="form__label">Username</label>
                            <input type="text" name="username" class="form__input username" placeholder="" value="<?= $usernameView ?>">
                            <p class="form__message"></p>
                            <p class="form__user-note">Your Typistial URL: https://typistial.com/<?= $usernameView ?></p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Email</label>
                            <input type="text" name="email" class="form__input email" placeholder=""
                                value="<?= $emailView ?>">
                            <p class="form__message"></p>
                        </div>
                        <div class="user-content__save-changes">
                            <div class="flex">
                                <span class="required">*</span>
                                <p class="save__note">Please save your change before leave the site</p>
                            </div>
                            <button type="submit" name="updateGeneral" class="content-save__btn">Save changes</button>
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
            Validator.isRequired('.username'),
            Validator.isRequired('.email'),
            Validator.isRequired('.email'),
            Validator.isEmail('.email')
        ]
    })
</script>