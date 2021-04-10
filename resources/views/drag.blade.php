<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>HTML5 : Drag and Drop !</title>
    <!-- <link rel="stylesheet" href="styles.css" type="text/css"> -->
    <style>
        [draggable=true] {
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: move;
        }

        [draggable=false] {
            cursor: no-drop;
        }

        p[draggable] {
            display: inline-block;
            vertical-align: top;
            height: 55px;
            background: #A9C832;
            padding: 10px;
            margin: 0;
            color: white;
            min-width: 55px;
        }

        #drop {
            height: 200px;
            width: 90%;
            border: 3px dashed #bbb;
            padding: 1em;
            margin-bottom: 1em;
        }

        #drop:hover {
            background: #e0e6e9;
        }

        .deposezmoi {
            background: #b5e766;
            border: 3px dashed #79a633;
        }

        img {
            width: 100px;

        }
    </style>
</head>

<body>
    <div class="wrap">
        <p><strong>Glisser...</strong></p>
        <img src="{{ asset('storage/images/1616515510asia.jpg') }}" alt="" onclick="changeOrdre('e', 'r')" draggable="true" ondragstart="deplace(event);" ondragend="supprime(event);">
        <img src="{{ asset('storage/images/1616515544voilier.jpg') }}" alt="" draggable="true" ondragstart="deplace(event);" ondragend="supprime(event);">
        <img src="{{ asset('storage/images/1617105937Capture.JPG') }}" alt="" ondragend="supprime(event);">

        <p draggable="true" ondragstart="deplace(event);" ondragend="supprime(event);">Texte</p>
        <p><strong>Déposer...</strong></p>
        <div id="drop" dropzone="move s:text/plain" ondrop="depot(event);"></div>
    </div>




    <script src="{{ asset('js/gestionOrdre.js')}}" type="text/javascript"></script>



  <div class="tst" onclick="changeOrdre('dgdgde', 'r')"></div>




    <script>
        // Identifiant de l’élément de réception
        var dropzone = document.getElementById('drop');
        // Fonction entrée survol de la cible
        function entree(event) {
            event.target.className = 'deposezmoi';
            event.preventDefault();
        }
        // Fonction sortie survol de la cible
        function sortie(event) {
            event.target.className = '';
        }
        // Fonction d’annulation du comportement par défaut
        function survol(event) {
            event.preventDefault();
            return false;
        }
        // Redéfinition des événements
        if (window.addEventListener) {
            dropzone.addEventListener('dragover', survol);
            dropzone.addEventListener('dragenter', entree);
            dropzone.addEventListener('dragleave', sortie);
        } else {
            dropzone.attachEvent('dragover', survol);
            dropzone.attachEvent('dragenter', entree);
            dropzone.attachEvent('dragleave', sortie);
        }

        // Traitement du déplacement
        function deplace(event) {
            event.dataTransfer.effectAllowed = "all";
            var attribut_src = event.target.getAttribute("src");
            if (attribut_src != null) {
                event.dataTransfer.setData("text/html", '<img src="' + attribut_src + '">');
            } else {
                event.dataTransfer.setData("text/plain", event.target.innerText || event.target.textContent);
            }
        }

        // Déclenché par dragover
        function survol(event) {
            event.dataTransfer.dropEffect = "copy";
            event.preventDefault();
            return false;
        }

        // traitement du dépot
        function depot(event) {
            event.preventDefault();
            var html = event.dataTransfer.getData("text/html");
            var texte = event.dataTransfer.getData("text/plain");
            if (html) event.target.innerHTML += html + " ";
            else event.target.innerHTML += texte + " ";
            event.target.className = '';
        }

        // Suppression de l'élément ayant suscité l'événement
        function supprime(event) {
            event.target.parentNode.removeChild(event.target);
        }







        // var element = getElementById("theElementID");
        // element.addEventListener("click", function() {
        //     // Your code 
        // });
    </script>

    <div style="width: 80px; height: 20px; background-color: red;" onmouseover="document.getElementById('div1').style.display = 'block';">
        <div id="div1" style="display: none;"> Text < /div>
        </div>

        <!-- onmouseout = "document.getElementById('div1').style.display = 'none';" -->

</body>

</html>