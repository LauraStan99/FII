<!DOCTYPE html>
<html lang="ro">
  <head>
    <title>Logare | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../public/css/Logare.css" rel="stylesheet" />
  </head>

  <body>

    <?php
      require 'header.php';
    ?>

    <main>
      <div class="main-stanga">
        <h1>
          Am deja un cont !
        </h1>

        <label for="logare-email">
          <a
            ><img id="email" src="../public/poze/email-tw.png" alt="email" />
            Email
          </a>
        </label>
        <input
          type="text"
          id="logare-email"
          name="email"
          placeholder="popescu@gmail.com"
        />

        <label for="logare-parola">
          <a
            ><img id="parola" src="../public/poze/parola-tw.png" alt="log-parola" />Parola
          </a>
        </label>
        <input
          type="text"
          id="logare-parola"
          name="parola"
          placeholder="********"
        />

        <button
          class="buton-stanga"
          type="button"
          onclick="window.location.href='./paginaPrincipala-view.php'"
        >
          Logare
        </button>
      </div>
      <hr />
      <div class="main-dreapta">
        <h2>
          Vreau sa-mi creez un cont!
        </h2>

        <button
          class="buton-dreapta"
          type="button"
          onclick="window.location.href='./inregistrare-view.php'"
        >
          CREATI UN CONT ACUM &gt
        </button>

        <h3>
          Beneficiile pentru contul clientului
        </h3>
        <div class="beneficii">
          <p>
            Puteti beneficia de plasarea de comenzi ,siguranta datelor, noile
            oferte si toate serviciile de care dispunem!
          </p>
        </div>
      </div>
    </main>

    <?php
      require 'footer.php';
    ?>
    
  </body>
</html>
