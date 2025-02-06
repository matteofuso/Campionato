<?php $main_classes = ''; require 'componenti/header.php';?>

<section class="hero w-100">
    <div class="overlay">
        <h1>La Gara Automobilistica</h1>
        <p class="mx-3">Partecipa e segui le emozionanti gare del campionato di automobilismo!</p>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <h2>Benvenuto nel mondo delle gare!</h2>
        <p>
            Segui le gare automobilistiche più emozionanti della stagione, dai circuiti leggendari alle nuove sfide. Scopri
            tutti i dettagli sui piloti, le squadre e gli eventi del campionato.<br>
            Ti offriamo anche una panoramica delle classifiche, dei punteggi e degli highlights delle gare precedenti.
            Resta aggiornato con tutte le nostre novità!
        </p>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <h2>Domande Frequenti (FAQ)</h2>
        <div class="accordion" id="accordionFAQ">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Come posso partecipare a una gara?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Puoi partecipare come pilota, o supportare la tua squadra preferita seguendo la gara. Scopri le
                        modalità di iscrizione sul nostro sito.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Quali circuiti ospitano le gare?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Le gare si svolgono su circuiti leggendari come Monza, Silverstone, e tanti altri. Consulta il nostro
                        calendario per scoprire tutte le tappe del campionato.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Come posso seguire una gara in diretta?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Puoi seguire le gare in diretta sul nostro sito web o sulle piattaforme di streaming partner.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'componenti/footer.php'; ?>
