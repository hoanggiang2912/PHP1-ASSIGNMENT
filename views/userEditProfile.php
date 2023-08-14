<?php
    if ($user) {
        extract($user);
        if ($username != '') {
            $usernameView = $username;
        } else {
            $usernameView = '';
        }
        if ($fullname != '') {
            $fullnameView = $fullname;
        } else {
            $fullnameView = '';
        }
        if ($bio != '') {
            $bioView = $bio;
        } else {
            $bioView = '';
        }
        if ($usernameView == '') {
            $errorMessage = 'Oh , look like you don\'t have full name yet ';
        } else {
            $errorMessage = '';
        }
    }
?>

<h1 class="big-text">profile</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="/assets/images/user__avt.png" alt=""></div>
                <div>
                    <?=$errorMessage?>
                    <div class="flex">
                        <h4 class="user__name"><?=$usernameView?></h4>/
                        <span class="user__control-panel">Edit
                            Profile</span>
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
                    <div class="avt__uploader">
                        <div class="exist-avt"><img src="/assets/images/user__avt.png" alt=""></div>
                        <div class="buttons-set">
                            <label for="uploadImage" class="button uploader__btn">Upload new picture</label>
                            <input type="file" hidden name="uploadImage" id="uploadImage" multiple>
                            <button class="button delete__btn">Delete</button>
                        </div>
                    </div>
                    <form action="index.php?pg=editProfile&user=<?=$id_user?>" method="post" class="user-account__form">
                        <div class="form__group">
                            <label for="" class="form__label">Name <span class="required">*</span></label>
                            <input type="text" class="form__input username" name="fullName" placeholder="" value="<?=$fullnameView?>">
                            <p class="form__message"></p>
                            <p class="form__user-note">We’re big on real names around here, so people know who’s who.
                            </p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Location</label>
                            <input type="text" class="form__input email" placeholder="" value="Việt Nam">   
                            <p class="form__message"></p>
                        </div>
                        <div class="form__group">
                            <div class="form__group__title">
                                <label for="" class="form__label">Bio</label>
                                <label for="" class="form__sublabel">1024</label>
                            </div>
                            <textarea name="bio" id="user-bio" cols="30" rows="10"></textarea>
                            <p class="form__message"></p>
                        </div>
                        <div class="user-content__save-changes">
                            <div class="flex">
                                <span class="required">*</span>
                                <p class="save__note">Please save your change before leave the site</p>
                            </div>
                            <button type="submit" name="updateProfile" class="content-save__btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>