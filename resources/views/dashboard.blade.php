@extends('layouts.nav')

@section('content')

<div class="bodyStats">
    <div id="nbUrlVisit" style="width: 90%;height:550px;margin-bottom:50px;"></div>

    <div class="dailyVist_Platform">
        <div id="nbPlatform" style="width: 45%;height:350px;margin-bottom:50px;"></div>
        <div id="nbDailyVisit" style="width: 45%;height:350px;margin-bottom:50px;"></div>
    </div>

    <div class="age_sexe">
        <div id="nbUserAge" style="width: 45%;height:350px;margin-bottom:50px;"></div>
        <div id="nbUserSexe" style="width: 45%;height:350px;margin-bottom:50px;"></div>
    </div>

    <div class="pays_ville">
        <div id="nbUserPays" style="width: 45%;height:350px;margin-bottom:50px;"></div>
        <div id="nbUserVille" style="width: 45%;height:350px;margin-bottom:50px;"></div>
    </div>

    <div id="nbQuiz" style="width: 90%;height:350px;margin-bottom:50px;"></div>
    <div id="nbCertificat" style="width: 90%;height:350px;margin-bottom:50px;"></div>
</div>
 

<script type="text/javascript">
    // Quiz----------------------------------------------------------

    var quizzes = <?= json_encode($quiz->toArray(), JSON_HEX_TAG); ?>;
    var tquiz_id = [];
    var tquiz_titre = [];


    quizzes.map(quiz => {
        tquiz_id.push(quiz['countQuiz'])
    });
    quizzes.map(quiz => {
        tquiz_titre.push(quiz['quiz_titre'])
    });

    var chartQuiz = echarts.init(document.getElementById('nbQuiz'));

    option = {
        title: {
            text: 'Nombre de quiz réussis',
            // subtext: 'MEFH'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        label: {
            show: true,
            // Text of labels.
            fontSize: '17px',
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            show: false,
            type: 'category',
            data: tquiz_titre,
            axisTick: {
                alignWithLabel: true
            }
        }],
        yAxis: [{
            type: 'value',
            axisLabel: {
                fontSize: 17,
                margin: 10,
            }
        }],
        series: [{
            type: 'bar',
            barWidth: '60%',
            data: tquiz_id
        }]
    };

    chartQuiz.setOption(option);


    // Certificat----------------------------------------------------------

    var certificats = <?= json_encode($certificat->toArray(), JSON_HEX_TAG); ?>;
    var tcertificat_id = [];
    var tcertificat_titre = [];


    certificats.map(certificat => {
        tcertificat_id.push(certificat['countCertificat'])
    });
    certificats.map(certificat => {
        tcertificat_titre.push(certificat['formation_titre'])
    });

    var chartCertificat = echarts.init(document.getElementById('nbCertificat'));

    option = {
        title: {
            text: 'Certificats obtenus',
            // subtext: 'MEFH'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        label: {
            show: true,
            // Text of labels.
            fontSize: '17px',
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            show: false,
            type: 'category',
            data: tcertificat_titre,
            axisTick: {
                alignWithLabel: true
            }
        }],
        yAxis: [{
            type: 'value',
            axisLabel: {
                fontSize: 17,
                margin: 10,
            }
        }],
        series: [{
            type: 'bar',
            barWidth: '60%',
            data: tcertificat_id
        }]
    };

    chartCertificat.setOption(option);


    // UserAge----------------------------------------------------------

    var userAges = <?= json_encode($userAge->toArray(), JSON_HEX_TAG); ?>;
    var tuserAge_count = [];
    var tuserAget_age = [];


    userAges.map(userAge => {
        tuserAge_count.push(userAge['countUserAge'])
    });
    userAges.map(userAge => {
        tuserAget_age.push(userAge['user_age'])
    });

    var chartUserAge = echarts.init(document.getElementById('nbUserAge'));

    option = {
        title: {
            text: 'Tranches d\'ages des utilisateurs',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        label: {
            show: true,
            fontSize: '17px',
        },
        yAxis: {
            type: 'category',
            data: tuserAget_age
        },
        series: [{
            type: 'bar',
            data: tuserAge_count
        }]
    };

    chartUserAge.setOption(option);

    // UserSexe----------------------------------------------------------

    var userSexes = <?= json_encode($userSexe->toArray(), JSON_HEX_TAG); ?>;
    var tuserSexe_count = [];
    var tuserSexe_sexe = [];


    userSexes.map(userSexe => {
        tuserSexe_count.push(userSexe['countUserSexe'])
    });
    userSexes.map(userSexe => {
        tuserSexe_sexe.push(userSexe['user_sexe'])
    });

    var chartUserSexe = echarts.init(document.getElementById('nbUserSexe'));

    option = {
        title: {
            text: 'Sexes des utilisateurs',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        label: {
            show: true,
            fontSize: '17px',
        },
        yAxis: {
            type: 'category',
            data: tuserSexe_sexe
        },
        series: [{
            type: 'bar',
            data: tuserSexe_count
        }]
    };

    chartUserSexe.setOption(option);


    // UserPays----------------------------------------------------------

    var userPays = <?= json_encode($userPays->toArray(), JSON_HEX_TAG); ?>;
    var tuserPay_count = [];
    var tuserPay_pay = [];


    userPays.map(userPay => {
        tuserPay_count.push(userPay['countUserPays'])
    });
    userPays.map(userPay => {
        tuserPay_pay.push(userPay['user_pays'])
    });

    var chartUserPays = echarts.init(document.getElementById('nbUserPays'));

    option = {
        title: {
            text: 'Pays des utilisateurs',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        label: {
            show: true,
            fontSize: '17px',
        },
        yAxis: {
            type: 'category',
            data: tuserPay_pay
        },
        series: [{
            type: 'bar',
            data: tuserPay_count
        }]
    };

    chartUserPays.setOption(option);


    // UserVille----------------------------------------------------------

    var UserVilles = <?= json_encode($userVille->toArray(), JSON_HEX_TAG); ?>;
    var tuserVille_count = [];
    var tuserVille_ville = [];


    UserVilles.map(userVille => {
        tuserVille_count.push(userVille['countUserVille'])
    });
    UserVilles.map(userVille => {
        tuserVille_ville.push(userVille['user_ville'])
    });

    var chartUserVilles = echarts.init(document.getElementById('nbUserVille'));

    option = {
        title: {
            text: 'Codes postaux des villes des utilisateurs',
            // subtext: 'MEFH'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        label: {
            show: true,
            // Text of labels.
            fontSize: '17px',
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            show: false,
            type: 'category',
            data: tuserVille_ville,
            axisTick: {
                alignWithLabel: true
            }
        }],
        yAxis: [{
            type: 'value',
            axisLabel: {
                fontSize: 17,
                margin: 10,
            }
        }],
        series: [{
            type: 'bar',
            barWidth: '60%',
            data: tuserVille_count
        }]
    };

    chartUserVilles.setOption(option);


    // Platform-----------------------------------------------------------------

    var Platforms = <?= json_encode($platform->toArray(), JSON_HEX_TAG); ?>;
    var tplatform_count = [];
    var tplatform_platform = [];


    Platforms.map(platform => {
        tplatform_count.push(platform['countPlatform'])
    });
    Platforms.map(platform => {
        tplatform_platform.push(platform['platform'])
    });

    var chartPlatforms = echarts.init(document.getElementById('nbPlatform'));

    option = {
        title: {
            text: 'Plateforms utilisées',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        label: {
            show: true,
            fontSize: '17px',
        },
        yAxis: {
            type: 'category',
            data: tplatform_platform
        },
        series: [{
            type: 'bar',
            data: tplatform_count
        }]
    };

    chartPlatforms.setOption(option);


    // DailyVisit---------------------------------------------------------------

    var DailyVisits = <?= json_encode($dailyVisit->toArray(), JSON_HEX_TAG); ?>;
    var tdailyVisit_count = [];
    var tdailyVisit_dailyVisit = [];


    DailyVisits.map(dailyVisit => {
        tdailyVisit_count.push(dailyVisit['countIp'])
    });
    DailyVisits.map(dailyVisit => {
        tdailyVisit_dailyVisit.push(dailyVisit['date'])
    });

    var chartDailyVisits = echarts.init(document.getElementById('nbDailyVisit'));

    option = {
        title: {
            text: 'Visites journalières du site',
            // subtext: 'MEFH'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        label: {
            show: true,
            // Text of labels.
            fontSize: '17px',
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            show: false,
            type: 'category',
            data: tdailyVisit_dailyVisit,
            axisTick: {
                alignWithLabel: true
            }
        }],
        yAxis: [{
            type: 'value',
            axisLabel: {
                fontSize: 17,
                margin: 10,
            }
        }],
        series: [{
            type: 'bar',
            barWidth: '60%',
            data: tdailyVisit_count
        }]
    };
    chartDailyVisits.setOption(option);


    // UrlVisit---------------------------------------------------------------

    var UrlVisits = <?= json_encode($urlVisit->toArray(), JSON_HEX_TAG); ?>;
    var turlVisit_count = [];
    var turlVisit_urlVisit = [];


    UrlVisits.map(urlVisit => {
        turlVisit_count.push(urlVisit['countUrl'])
    });
    UrlVisits.map(urlVisit => {
        turlVisit_urlVisit.push(urlVisit['url'].replace("http://127.0.0.1:8000/", ""))
    });

    var chartUrlVisits = echarts.init(document.getElementById('nbUrlVisit'));

    option = {
        title: {
            text: 'Visites journalières par page',
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        label: {
            show: true,
            fontSize: '17px',
        },
        yAxis: {
            type: 'category',
            data: turlVisit_urlVisit
        },
        series: [{
            type: 'bar',
            data: turlVisit_count
        }]
    };

    chartUrlVisits.setOption(option);
</script>


@endsection