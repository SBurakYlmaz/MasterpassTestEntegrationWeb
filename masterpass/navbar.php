<?php
?>
<body class="header_area sticky-header">
<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h cover" href="index.php"><img class="cover navbar-custom"
                                                                       src="img/masterpass-logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item "><a class="nav-link"
                                             href="index.php">Home</a>
                    </li>
                    <li class="nav-item "><a class="nav-link"
                                             href="manipulateCards.php">Manipulate Cards</a>
                    </li>
                    <?php echo(isset($_SESSION["msisdn"]) ? "<li class=\"nav-item\"><a href=\"logout.php\" 
                                                                    class=\"nav-link\">Logout</a></li>" : "<li class=\"nav-item\"><a href=\"getPhoneNumber.php\" 
                                                                    class=\"nav-link\">Login</a></li>") ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
</body>
