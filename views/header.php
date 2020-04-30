<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link href="<?php echo URL; ?>public/css/header1.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="header-navigation">
            <div class="header-right">
                <div class="favorite">

                    <img class="trigger-fav" src="<?php echo URL; ?>public/poze/logo-favorite-tw.png" alt="Favorite" />
                    <div class="modal-fav">
                        <div class="modal-content-fav">
                            <span class="close-button-fav">&times;</span>
                            <h1>Trebuie sa fiti logat pentru a vizualiza produsele favorite!</h1>
                        </div>
                    </div>
                    
                    <script type="text/javascript" src="<?php echo URL; ?>public/js/modal-fav.js"></script>

                    <?php if (Session::get('loggedIn') == true) : ?>
                        <a class="link-favorite" href="<?php echo URL; ?>wishlist/empty" title="Lista de dorinte">
                            <img class="logo-favorite" src="<?php echo URL; ?>public/poze/logo-favorite-tw.png" alt="Favorite" />
                        </a>
                    <?php endif; ?>
                </div>

                <div class="cos">

                    <img class="trigger" src="<?php echo URL; ?>public/poze/shopping-cart-tw.png" alt="Cos cumparaturi" />
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close-button">&times;</span>
                            <h1>Trebuie sa fiti logat pentru a adauga produse in cos!</h1>
                        </div>
                    </div>
                    <script type="text/javascript" src="<?php echo URL; ?>public/js/modal.js"></script>

                    <?php if (Session::get('loggedIn') == true) : ?>
                        <?php if (Session::get('cart') == true) : ?>
                            <img class="trigger-cartEmpty" src="<?php echo URL; ?>public/poze/shopping-cart-tw.png" alt="Cos cumparaturi" />
                            <div class="modal-cartEmpty">
                                <div class="modal-content-cartEmpty">
                                    <span class="close-button-cartEmpty">&times;</span>
                                    <h1>Cosul este gol!</h1>
                                </div>
                            </div>
                            <script type="text/javascript" src="<?php echo URL; ?>public/js/modal-cartEmpty.js"></script>


                        <?php else : ?>
                            <a class="link cos" href="<?php echo URL; ?>cart" title="Cos cumparaturi">
                                <img class="logo-cos" src="<?php echo URL; ?>public/poze/shopping-cart-tw.png" alt="Cos cumparaturi" />
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="cont">
                    <a class="link cont" href="<?php echo URL; ?>login" title="Cont">
                        <img class="logo-cont" src="<?php echo URL; ?>public/poze/cont-tw.png" alt="Cont" />
                    </a>
                    <?php if (Session::get('loggedIn') == true) : ?>
                        <a class="link cont" href="<?php echo URL; ?>account" title="Cont">
                            <img class="logo-cont" src="<?php echo URL; ?>public/poze/cont-tw.png" alt="Cont" />
                        </a>
                    <?php endif; ?>

                </div>
            </div>

            <div class="header-left">
                <div class="link-nume">
                    <a href="<?php echo URL; ?>home" title="logo"><img class="logo" src="<?php echo URL; ?>public/poze/logo.png" alt="logo" /></a>
                    <a href="<?php echo URL; ?>home" title="logo-nume"><img class="logo-nume" src="<?php echo URL; ?>public/poze/logo-nume.png" alt="logo-nume" /></a>
                </div>
            </div>

        </div>

    </header>

    <div class="navbar">

        <div class="femei">
            <button class="femei-buton" onclick="selectWoman()">FEMEI</button>
            <div class="femei-continut" id="DropF">
                <a href="#">Blugi</a>
                <a href="#">Bluze</a>
                <a href="#">Camasi</a>
                <a href="#">Fuste</a>
                <a href="#">Jachete</a>
                <a href="#">Pantaloni</a>
                <a href="#">Rochii</a>
            </div>
        </div>


        <div class="barbati">
            <button class="barbati-buton" onclick="selectMen()">BARBATI</button>
            <div class="barbati-continut" id="DropB">
                <a href="#">Blugi</a>
                <a href="#">Bluze</a>
                <a href="#">Camasi</a>
                <a href="#">Jachete</a>
                <a href="#">Pantaloni</a>
                <a href="#">Tricouri</a>
            </div>
        </div>

        <div class="copii">
            <button class="copii-buton" onclick="selectChildren()">COPII</button>
            <div class="copii-continut" id="DropC">
                <a href="#">Blugi</a>
                <a href="#">Bluze</a>
                <a href="#">Fuste</a>
                <a href="#">Pantaloni</a>
                <a href="#">Rochii</a>
                <a href="#">Tricouri</a>
                <a href="#">Salopete</a>
            </div>
        </div>
        <script src="<?php echo URL; ?>public/js/navbar.js"> </script>
        <form>
            <input type="search" name="q" placeholder="Cauta..." />
            <input type="submit" value="OK" />
        </form>
    </div>
</body>

</html>