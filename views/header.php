<?php Session::init(); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link href="<?php echo URL; ?>public/css/headerNew.css" rel="stylesheet" />
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
                    <a href="<?php echo URL; ?>home" title="logo"><img class="logo" src="<?php echo URL; ?>public/poze/logoHeader.png" alt="logo" /></a>
                    <a href="<?php echo URL; ?>home" title="logo-nume"><img class="logo-nume" src="<?php echo URL; ?>public/poze/logo-nume.png" alt="logo-nume" /></a>
                </div>
            </div>

        </div>

    </header>

    <div class="navbar">

        <div class="femei">
            <button class="femei-buton" onclick="selectWoman()">FEMEI</button>
            <div class="femei-continut" id="DropF">
                <a href="<?php echo URL; ?>produse/femei/blugi">Blugi</a>
                <a href="<?php echo URL; ?>produse/femei/bluze">Bluze</a>
                <a href="<?php echo URL; ?>produse/femei/camasi">Camasi</a>
                <a href="<?php echo URL; ?>produse/femei/fuste">Fuste</a>
                <a href="<?php echo URL; ?>produse/femei/jachete">Jachete</a>
                <a href="<?php echo URL; ?>produse/femei/pantaloni">Pantaloni</a>
                <a href="<?php echo URL; ?>produse/femei/rochii">Rochii</a>
            </div>
        </div>


        <div class="barbati">
            <button class="barbati-buton" onclick="selectMen()">BARBATI</button>
            <div class="barbati-continut" id="DropB">
                <a href="<?php echo URL; ?>produse/barbati/blugi">Blugi</a>
                <a href="<?php echo URL; ?>produse/barbati/bluze">Bluze</a>
                <a href="<?php echo URL; ?>produse/barbati/camasi">Camasi</a>
                <a href="<?php echo URL; ?>produse/barbati/jachete">Jachete</a>
                <a href="<?php echo URL; ?>produse/barbati/pantaloni">Pantaloni</a>
                <a href="<?php echo URL; ?>produse/barbati/tricouri">Tricouri</a>
            </div>
        </div>

        <div class="copii">
            <button class="copii-buton" onclick="selectChildren()">COPII</button>
            <div class="copii-continut" id="DropC">
                <a href="<?php echo URL; ?>produse/copii/blugi">Blugi</a>
                <a href="<?php echo URL; ?>produse/copii/bluze">Bluze</a>
                <a href="<?php echo URL; ?>produse/copii/fuste">Fuste</a>
                <a href="<?php echo URL; ?>produse/copii/pantaloni">Pantaloni</a>
                <a href="<?php echo URL; ?>produse/copii/rochii">Rochii</a>
                <a href="<?php echo URL; ?>produse/copii/tricouri">Tricouri</a>
                <a href="<?php echo URL; ?>produse/copii/salopete">Salopete</a>
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