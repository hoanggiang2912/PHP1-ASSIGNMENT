<?php
    if (isset($_GET['user']) && $_GET['user'] > 0) {
        $userId = $_GET['user'];
        $linkUser = '&user='.$userId;
    }
?>

<div class="user__sidebar">
    <ul class="sidebar__list">
        <li class="sidebar__item"><a href="index.php?pg=general<?=$linkUser?>" class="sidebar__link active">General</a>
        </li>
        <li class="sidebar__item"><a href="index.php?pg=editProfile<?= $linkUser ?>" class="sidebar__link">Edit
                Profile</a></li>
        <li class="sidebar__item"><a href="index.php?pg=password<?= $linkUser ?>" class="sidebar__link">Password</a></li>
        <li class="sidebar__item"><a href="index.php?pg=socialAccount<?= $linkUser ?>" class="sidebar__link">Social
                Profiles</a></li>
        <li class="sidebar__item"><a href="index.php?pg=emailNoti<?= $linkUser ?>" class="sidebar__link">Email
                Notifications</a></li>
        <li class="sidebar__item"><a href="index.php?pg=billing<?= $linkUser ?>" class="sidebar__link">Billing</a></li>
        <li class="sidebar__item"><a href="index.php?pg=dataExport<?= $linkUser ?>" class="sidebar__link">Data
                Export</a></li>
        <li class="sidebar__item"><a href="index.php?pg=deleteAccount<?= $linkUser ?>" class="sidebar__link delete-account">Delete
                Account</a></li>
    </ul>
</div>