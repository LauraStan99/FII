<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Checkout | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/checkout.css" rel="stylesheet" />
</head>

<body>

    <?php
    require 'header.php';
    ?>

    <main>
        <h1>Detalii livrare</h1>
        <hr />
        <div class="main">
            <form method="post" class="main-stanga">


                <div class="metoda-livrare">
                    <p>
                        Medota de livrare: Curier<input type="radio" id="curier" name="livrare" value="curier" />
                        Posta<input type="radio" id="posta" name="livrare" value="posta" />
                        <a class="neccessary">*</a>
                        <span class="error"><?php if (isset($this->livrareErr)) echo $this->livrareErr; ?></span>
                    </p>
                </div>
                <div class="linie">
                    <label for="checkout-nume">
                        <a><img id="register1" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Nume
                        </a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-nume" name="nume" placeholder="Popescu " value="<?php if (isset($this->nume)) echo $this->nume;
                                                                                                        else echo Session::get('nume'); ?>" />
                        <span class="error"> <?php if (isset($this->numeErr)) echo $this->numeErr; ?></span>
                    </div>
                </div>

                <div class="linie">
                    <label for="checkout-prenume">
                        <a><img id="register2" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Prenume</a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-prenume" name="prenume" placeholder="Daniel" value="<?php if (isset($this->prenume)) echo $this->prenume;
                                                                                                            else echo Session::get('prenume'); ?>" />
                        <span class="error"> <?php if (isset($this->prenumeErr)) echo $this->prenumeErr; ?></span>


                    </div>
                </div>

                <div class="linie">
                    <label for="checkout-email">
                        <a><img id="email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="email" />Email </a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-email" name="email" placeholder="popescu@gmail.com" value="<?php if (isset($this->email)) echo $this->email;
                                                                                                                    else echo Session::get('email'); ?>" />
                        <span class="error"> <?php if (isset($this->emailErr))
                                                    echo $this->emailErr;
                                                ?></span>
                    </div>
                </div>


                <div class="linie">
                    <label for="checkout-adresa">
                        <a><img id="adresa" src="<?php echo URL; ?>public/poze/adresaCheckout.png" alt="adresa" />Adresa</a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-email" name="adresa" placeholder="Str. Primaverii nr.8" value="<?php if (isset($this->adresa)) echo $this->adresa;
                                                                                                                        else echo Session::get('adresa'); ?>" />
                        <span class="error"> <?php if (isset($this->adresaErr))
                                                    echo $this->adresaErr;
                                                ?></span>
                    </div>
                </div>
                <div class="linie">
                    <label for="checkout-oras">
                        <a><img id="oras" src="<?php echo URL; ?>public/poze/orasCheckout.png" alt="oras" />Oras</a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-oras" name="oras" placeholder=" Iasi" value="<?php if (isset($this->oras)) {
                                                                                                            echo $this->oras;
                                                                                                        } ?>" />
                        <span class="error"> <?php if (isset($this->orasErr))
                                                    echo $this->orasErr;
                                                ?></span>
                    </div>
                </div>
                <div class="linie">
                    <label for="checkout-tara">
                        <a><img id="tara" src="<?php echo URL; ?>public/poze/taraCheckout.png" alt="tara" />Tara </a>
                        <a class="neccessary">*</a>
                    </label>
                    <div class="input">
                        <input type="text" id="checkout-tara" name="tara" placeholder="Romania" value="<?php if (isset($this->tara)) echo $this->tara; ?>" />
                        <span class="error"> <?php if (isset($this->taraErr))
                                                    echo $this->taraErr;
                                                ?></span>
                    </div>
                </div>
                <div class="metoda-plata">
                    <p>
                        Medota de plata: Ramburs<input type="radio" id="ramburs" name="plata" value="cash" />
                        Online cu card bancar<input type="radio" id="card" name="plata" value="card" />
                        <a class="neccessary">*</a>
                        <span class="error"><?php if (isset($this->paymentErr)) echo $this->paymentErr; ?></span>
                    </p>
                </div>

                <div class="butoane">
                    <button type="button" name="renunta" class="buton-renunta" onclick="window.location.href='<?php echo URL; ?>home'">
                        Renunta
                    </button>
                    <button type="submit" name="submit" value="Submit" class="buton-continua">
                        Plaseaza Comanda
                    </button>

                </div>

            </form>
            <div class="main-dreapta">


                <div class="tabel">

                    <table>
                        <tr>
                            <th class="articol"></th>
                            <th class="detalii"></th>
                        </tr>
                        <br>

                        <tr>
                            <td>
                                <a href="<?php echo URL . 'produse/produs/' ?>">
                                    <img id="produs" src="<?php echo URL; ?>public/poze/f-rochie1.png">
                                </a>
                            </td>
                            <td>
                                <div class="detalii-produs">
                                    <h2>Rochie de vara </h2>
                                    <a>Cantitate : </a>
                                    <a>Pret : </a>
                                </div>
                            </td>
                        </tr>

                    </table>
                    <hr>
                </div>
                <div class="total-comanda">
                    <a>Subtotal:</a>
                    <a>Cost transport:</a>
                    <a>Total:</a>
                </div>

            </div>

        </div>
    </main>

    <?php
    require 'footer.php';
    ?>
</body>

</html>