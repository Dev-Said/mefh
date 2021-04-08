@extends('layouts.nav')

@section('content')
<div class="contenairContact">
    <div class="coordonnees">
    
    <p><i class="fas fa-phone-alt"></i><a href="tel:+32473536903">+32 473 53 69 03</a></p><br>
    <p><i class="fas fa-envelope"></i><a href="mailto:mouvementegalite.femmeshommes@gmail.com">mouvementegalite.femmeshommes@gmail.com</a></p><br>
    <p><i class="fas fa-map-marker-alt"></i></i>Rue de la Peupleraie 30, 5310 Eghezée</p>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2532.7913626163627!2d4.909337715956295!3d50.593831084903826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c1759ed3657a05%3A0xca2272fd064faae9!2sRue%20de%20la%20Peupleraie%2030%2C%205310%20%C3%89ghez%C3%A9e!5e0!3m2!1sfr!2sbe!4v1617709036471!5m2!1sfr!2sbe" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>

</div>
    <div class="contenairForm">
    <form action="/ma-page-de-traitement" method="post">
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">Email</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="msg">Message</label>
            <textarea id="msg" name="user_message"></textarea>
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
    </div>
</div>


@endsection