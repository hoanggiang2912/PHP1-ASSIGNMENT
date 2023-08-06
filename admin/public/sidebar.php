<div class="sidebar">
    <div style="
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;" >
        <a href="../../asm-p2/index.php" class="logo">
            <img src="./dist/img/logo-full.svg" alt="Typistial logo">
        </a>
        <i class="fa-solid fa-bars-sort"></i>
    </div>
    <nav class="sidebar__nav administrator__nav">
        <ul>
            <li class="nav__item active" style="background: rgba(0, 194, 255, 0.40)"><a
                    href="index.php?pg=dashboard" class="nav__link"><i class="fa-solid fa-chart-simple"
                        style="color: #00C2FF;"></i> Dashboard</a></li>
            <li class="nav__item"><a href="index.php?pg=message" class="nav__link"><i class="fa-solid fa-envelope"></i> Messages</a></li>
            <li class="nav__item"><a href="index.php?pg=user" class="nav__link"><i
                        class="fa-solid fa-users"></i> Customers</a></li>
            <li class="nav__item"><a href="index.php?pg=order" class="nav__link"><i class="fa-solid fa-box"></i>Orders</a></li>
            <li class="nav__item"><a href="index.php?pg=category" class="nav__link"><i class="fa-solid fa-box"></i>Categories</a></li>
            <li class="nav__item"><a href="index.php?pg=product" class="nav__link"><i class="fa-solid fa-box"></i>Products</a></li>
        </ul>
    </nav>
    <nav class="sidebar__nav setting__nav">
        <ul>
            <li class="nav__item"><a href="" class="nav__link"><i class="fa-solid fa-user-pen"></i> Roles</a></li>
            <li class="nav__item"><a href="" class="nav__link"><i class="fa-solid fa-arrow-right-arrow-left"></i>
                    Requests</a></li>
            <li class="nav__item"><a href="" class="nav__link"><i class="fa-solid fa-gear"></i> Preferences</a></li>
        </ul>
    </nav>
    <li class="nav__item warning"><a href="<?= "index.php?pg=logout" ?>" class="nav__link cancelled"><i class="fa-solid fa-arrow-right-from-bracket warning"></i> Log out</a></li>
</div>