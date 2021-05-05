<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>

    <style>
        .bodyCertificat {
            position: relative;
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-start;
            color: black;
            font-family: sans-serif;
            line-height: 24px;
        }        
        
        .containerCertificat {
            width: 100%;
            position: absolute;
            top: 240px;
            left: 0;
            color: black;
            font-family: sans-serif;
        }

        h1 {
            width: 100%;
            font-size: 24px;
            text-align: center;
            margin-top: 25px;
            margin-bottom: 0;
        }

        h3 {
            width: 100%;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 0;
        }

        h2 {
            width: 80%;
            margin-left: 10%;
            font-size: 28px;
            line-height: 30px;
            text-align: center;
            color: #dd1111;
            margin-top: 20px;
            margin-bottom: 0;
        }

        p {
            width: 100%;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            line-height: 28px;
            margin-top:20px;
            margin-bottom: 0;
        }

        span {
            position: absolute;
            top: 300px;
            left: 0;
            width: 100%;
            font-size: 18px;
            text-align: center;
            line-height: 20px;
            margin-top:20px;
            margin-bottom: 0;
        }
    </style>
</head>

<body class="bodyCertificat">
    <div class="containerCertificat">
        <h1>{{$prenom}}&nbsp;&nbsp;{{$nom}}</h1>
        <h3>a suivi avec succès le MOOC Entreprise</h3>
        <h2>{{$formation}}</h2>
        <p>proposé par le Mouvement Egalité Femmes Hommes et Psytel<br>
            dans le cadre d'un projet européen du programme REC</p>
        <span>Le&nbsp;{{$date}}</span>
    </div>



    <!-- <br/>
    <strong>Public Folder:</strong>
    <img src="{{ public_path('images/certificat.png') }}" style="width: 200px; height: 200px">
   -->

    <img src="{{ storage_path('app/public/images/certificat.png') }}" style="width: 27.3cm; height: auto; margin-top: 1.3cm;">
</body>

</html>