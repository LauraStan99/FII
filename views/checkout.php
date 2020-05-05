<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Checkout | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/checkout1.css" rel="stylesheet" />
</head>

<body>

    <?php
    require 'header.php';
    ?>

    <main>

        <form method="post">
            <h1>Detalii livrare</h1>
            <hr />

            <div class="metoda-livrare">
                <p>
                    Medota de livrare: Curier<input type="checkbox" id="curier" />
                    Posta<input type="checkbox" id="posta" />
                    <a class = "neccessary">*</a>
                </p>
            </div>
            <div class="linie">
                <label for="checkout-nume">
                    <a><img id="register1" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Nume
                    </a>
                    <a class = "neccessary">*</a>
                </label>
                <div class="input">
                    <input type="text" id="checkout-nume" name="nume" placeholder="Popescu " value="<?php if (isset($this->nume)) echo $this->nume; ?>" />
                    <span class="error"> <?php if (isset($this->numeErr)) echo $this->numeErr; ?></span>
                </div>
            </div>

            <div class="linie">
                <label for="checkout-prenume">
                    <a><img id="register2" src="<?php echo URL; ?>public/poze/register-tw.png" alt="register" />Prenume</a>
                    <a class = "neccessary">*</a>
                </label>
                <div class="input">
                    <input type="text" id="checkout-prenume" name="prenume" placeholder="Daniel" value="<?php if (isset($this->prenume)) echo $this->prenume; ?>" />
                    <span class="error"> <?php if (isset($this->prenumeErr)) echo $this->prenumeErr; ?></span>


                </div>
            </div>

            <div class="linie">
                <label for="checkout-email">
                    <a><img id="email" src="<?php echo URL; ?>public/poze/email-tw.png" alt="email" />Email </a>
                    <a class = "neccessary">*</a>
                </label>
                <div class="input">
                    <input type="text" id="checkout-email" name="email" placeholder="popescu@gmail.com" value="<?php if (isset($this->email)) echo $this->email; ?>" />
                    <span class="error"> <?php if (isset($this->emailErr))
                                                                echo $this->emailErr;
                                                            ?></span>
                </div>
            </div>


            <div class="linie">
                <label for="checkout-adresa">
                    <a><img id="adresa" src="<?php echo URL; ?>public/poze/adresaCheckout.png" alt="adresa" />Adresa</a>
                    <a class = "neccessary">*</a>
                </label>
                <div class="input">
                    <input type="text" id="checkout-email" name="adresa" placeholder="Str. Primaverii nr.8" value="<?php if (isset($this->adresa)) echo $this->adresa; ?>" />
                    <span class="error"> <?php if (isset($this->adresaErr))
                                                                echo $this->adresaErr;
                                                            ?></span>
                </div>
            </div>
            <div class="linie">
                <label for="checkout-oras">
                    <a><img id="oras" src="<?php echo URL; ?>public/poze/orasCheckout.png" alt="oras" />Oras</a>
                    <a class = "neccessary">*</a>
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
                    <a class = "neccessary">*</a>
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
                    Medota de plata: Ramburs<input type="checkbox" id="ramburs" />
                    Online cu card bancar<input type="checkbox" id="card" />
                    <a class = "neccessary">*</a>
                </p>
            </div>

            <div class="butoane">
                <button type="button" name="renunta" class="buton-renunta" onclick="window.location.href='<?php echo URL; ?>home'">
                    Renunta
                </button>
                <button type="submit" name="submit" value="Submit" class="buton-continua">
                    Continua
                </button>

            </div>

        </form>
    </main>

    <?php
    require 'footer.php';
    ?>
</body>

</html>