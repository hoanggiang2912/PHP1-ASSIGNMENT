<h1 class="big-text">social</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="/assets/images/user__avt.png" alt=""></div>
                <div>
                    <div class="flex">
                        <h4 class="user__name">Hồ Duy Hoàng Giang</h4>/<span class="user__control-panel">Social
                            Profiles</span>
                    </div>
                    <p class="control-panel__detail">Add elsewhere links to your profile</p>
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
                    <form action="" method="post" class="user-account__form">
                        <div class="form__group">
                            <label for="" class="form__label">Twitter</label>
                            <input type="text" class="form__input twitter" placeholder="" value="">
                            <p class="form__message"></p>
                            <button class="button twitter__btn"><i class="fa-brands fa-twitter"></i>Connect to
                                Twitter</button>
                            <p class="form__user-note">One-click sign in</p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Facebook</label>
                            <input type="text" class="form__input facebook" placeholder="" value="">
                            <p class="form__message"></p>
                            <button class="button facebook__btn"><i class="fa-brands fa-facebook"></i>Connect to
                                Facebook</button>
                            <p class="form__user-note">One-click sign in</p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Google</label>
                            <p class="form__message"></p>
                            <button class="button google__btn"><i class="fa-brands fa-google"></i>Connect to
                                Google</button>
                            <p class="form__user-note">One-click sign in only</p>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Instagram</label>
                            <input type="text" class="form__input instagram">
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Github</label>
                            <input type="text" class="form__input instagram">
                        </div>
                    </form>
                </div>
                <div class="user-content__save-changes">
                    <div class="flex">
                        <span class="required">*</span>
                        <p class="save__note">Please save your change before leave the site</p>
                    </div>
                    <button class="content-save__btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>