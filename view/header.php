<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/header.css" rel="stylesheet" />
  </head>

<body>
    <header>
    <div class="header-navigation">
        <div class="header-right">
            <div class="favorite">
                <a class="link-favorite" href="" title="Lista de dorinte">
                    <img class="logo-favorite" src="../Poze/logo-favorite-tw.png" alt="Favorite" />
                </a>
            </div>

            <div class="cos">
                <a class="link cos" href="" title="Cos cumparaturi">
                    <img class="logo-cos" src="../Poze/shopping-cart-tw.png" alt="Cos cumparaturi" />
                </a>
            </div>

            <div class="cont">
                <a class="link cont" href="./DateCont.html" title="Cont">
                    <img class="logo-cont" src="../Poze/cont-tw.png" alt="Cont" />
                </a>
            </div>
        </div>

        <div class="header-left">
            <div class="link-nume">
                <a href="#" title="logo"><img class="logo" src="../Poze/logo.png" alt="logo" /></a>
                <a href="#" title="logo-nume"><img class="logo-nume" src="../Poze/logo-nume.png" alt="logo-nume" /></a>
            </div>
        </div>
    </div>
    </header>

    <div class="navbar">
        <div class="femei">
            <button class="femei-buton" onclick="myFunction1()">FEMEI</button>
            <div class="femei-continut" id="DropF">
            <a href="#">Blugi</a>
            <a href="#">Bluze</a>
            <a href="#">Camasi</a>
            <a href="#">Fuste</a>
            <a href="#">Jachete</a>
            <a href="#">Pantaloni</a>
            <a href="#">Rochii</a>
            </div>
            <script>
            function myFunction1() {
                document.getElementById('DropF').classList.toggle('show');
            }

            window.onclick = function (e) {
                if (!e.target.matches('.femei-buton')) {
                var myDropdown = document.getElementById('DropF');
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
                }
            };
            </script>
        </div>

        <div class="barbati">
            <button class="barbati-buton" onclick="myFunction2()">BARBATI</button>
            <div class="barbati-continut" id="DropB">
            <a href="#">Blugi</a>
            <a href="#">Bluze</a>
            <a href="#">Camasi</a>
            <a href="#">Jachete</a>
            <a href="#">Pantaloni</a>
            <a href="#">Tricouri</a>
            </div>
            <script>
            function myFunction2() {
                document.getElementById('DropB').classList.toggle('show');
            }

            window.onclick = function (e) {
                if (!e.target.matches('.barbati-buton')) {
                var myDropdown = document.getElementById('DropB');
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
                }
            };
            </script>
        </div>

        <div class="copii">
            <button class="copii-buton" onclick="myFunction3()">COPII</button>
            <div class="copii-continut" id="DropC">
            <a href="#">Blugi</a>
            <a href="#">Bluze</a>
            <a href="#">Fuste</a>
            <a href="#">Pantaloni</a>
            <a href="#">Rochii</a>
            <a href="#">Tricouri</a>
            <a href="#">Salopete</a>
            </div>

            <script>
            function myFunction3() {
                document.getElementById('DropC').classList.toggle('show');
            }

            window.onclick = function (e) {
                if (!e.target.matches('.copii-buton')) {
                var myDropdown = document.getElementById('DropC');
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
                }
            };
            </script>
        </div>

        <form>
            <input type="search" name="q" placeholder="Cauta..." />
            <input type="submit" value="OK" />
        </form>
        </div>
    </body>
</html>