    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<?php 
// fungsi pengecekan hak_akses untuk menampilkan menu sesuai dengan hak_akses
// jika hak_akses = admin, tampilkan menu
if ($_SESSION['hak_akses']=='Admin') {
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") { ?>
        <li class="active nav-item">
            <a href="beranda"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Beranda</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu beranda tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="beranda"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Beranda</span></a>
        </li>
    <?php
    }

    // jika menu surat keputusan dipilih, menu surat keputusan aktif
    if ($_GET["module"] == "surat_keputusan" || $_GET["module"] == "form_surat_keputusan") { ?>
        <li class="active nav-item">
            <a href="surat-keputusan"><i class="icon-file-text2"></i><span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Surat Keputusan</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu surat keputusan tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="surat-keputusan"><i class="icon-file-text2"></i><span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Arsip Digital</span></a>
        </li>
    <?php
    }
    ?>

    <li class=" navigation-header">
        <span data-i18n="nav.category.support">Utility</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
    </li>

    <?php
    // jika menu user dipilih, menu user aktif
    if ($_GET["module"] == "user" || $_GET["module"] == "form_user") { ?>
        <li class="active nav-item">
            <a href="user"><i class="icon-user"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Manajemen User</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu user tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="user"><i class="icon-user"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Manajemen User</span></a>
        </li>
    <?php
    }

    // jika menu backup database dipilih, menu backup database aktif
    if ($_GET["module"] == "backup") { ?>
        <li class="active nav-item">
            <a href="backup-database"><i class="icon-database"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Backup Database</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu backup database tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="backup-database"><i class="icon-database"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Backup Database</span></a>
        </li>
    <?php
    }
    ?>

    <li class=" navigation-header">
        <span data-i18n="nav.category.support">Bantuan</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
    </li>

    <?php
    // jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
    if ($_GET["module"] == "tentang") { ?>
        <li class="active nav-item">
            <a href="tentang"><i class="icon-info"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Tentang Aplikasi</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu tentang aplikasi tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="tentang"><i class="icon-info"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Tentang Aplikasi</span></a>
        </li>
    <?php
    }

    // jika menu petunjuk aplikasi dipilih, menu petunjuk aplikasi aktif
    if ($_GET["module"] == "petunjuk") { ?>
        <li class="active nav-item">
            <a href="petunjuk"><i class="icon-book"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Petunjuk Aplikasi</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu petunjuk aplikasi tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="petunjuk"><i class="icon-book"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Petunjuk Aplikasi</span></a>
        </li>
    <?php
    }
}
// jika hak_akses = user, tampilkan menu ------------------------------------------------------------------------------------------------------
elseif ($_SESSION['hak_akses']=='User') {  
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") { ?>
        <li class="active nav-item">
            <a href="beranda"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Beranda</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu beranda tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="beranda"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Beranda</span></a>
        </li>
    <?php
    }

    // jika menu surat keputusan dipilih, menu surat keputusan aktif
    if ($_GET["module"] == "surat_keputusan" || $_GET["module"] == "form_surat_keputusan") { ?>
        <li class="active nav-item">
            <a href="surat-keputusan"><i class="icon-file-text2"></i><span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Surat Keputusan</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu surat keputusan tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="surat-keputusan"><i class="icon-file-text2"></i><span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Surat Keputusan</span></a>
        </li>
    <?php
    }
    ?>
    
    <li class=" navigation-header">
        <span data-i18n="nav.category.support">Bantuan</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
    </li>

    <?php
    // jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
    if ($_GET["module"] == "tentang") { ?>
        <li class="active nav-item">
            <a href="tentang"><i class="icon-info"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Tentang Aplikasi</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu tentang aplikasi tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="tentang"><i class="icon-info"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Tentang Aplikasi</span></a>
        </li>
    <?php
    }

    // jika menu petunjuk aplikasi dipilih, menu petunjuk aplikasi aktif
    if ($_GET["module"] == "petunjuk") { ?>
        <li class="active nav-item">
            <a href="petunjuk"><i class="icon-book"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Petunjuk Aplikasi</span></a>
        </li>
    <?php
    } 
    // jika tidak, menu petunjuk aplikasi tidak aktif
    else {  ?>
        <li class=" nav-item">
            <a href="petunjuk"><i class="icon-book"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Petunjuk Aplikasi</span></a>
        </li>
    <?php
    }
}  
?>
    </ul>