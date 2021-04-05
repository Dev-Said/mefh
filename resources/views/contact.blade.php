@extends('layouts.nav')

@section('content')

<section id="contact">
        <form id="formContact" method="post" action="mail.php" enctype="multipart/form-data" autocomplete="on">

            <div id="formContactLeft">
                <div id="inputLeft">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required="required">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required="required"> 
                    <label for="entreprise">Entreprise</label>
                    <input type="text" id="entreprise" name="company">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" id="telephone" name="phone">
                </div>
            </div>

            <div id="formContactRight">
                <p><label for="message">Message</label></p>
                <p><textarea id="message" name="message"></textarea></p>  
                <p>
                    <div><input type="submit" value="Envoyer"></div>
                </p>
            </div>
        </form>

        <div id="coordonnees_block">
            <div id="coordonnees">
                <!-- <h3>< $pageIndex->coordonnees_h3 ?></h3>
                <P>FC Translations</P>
                <p>< $pageIndex->adresse ?></p>
                <p>< $pageIndex->commune ?></p>
                <p>< $pageIndex->ville ?></p> -->
                <p id="tel"><a href="tel:+32476580056" target="_blank">Tel 0476 58 00 56</a></p>
                <p id="mail_contact"><a href="mailto:info@fc-translations.com">info@fc-translations.com</a></p>
            </div>
            <div id="res">
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                <!-- <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a> -->
                <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </section>

@endsection