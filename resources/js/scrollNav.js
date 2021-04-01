let flag = true;



jQuery(document).ready(function () {

    $(window).scroll(function () {

        if ($(window).scrollTop() > 1) {
            $('.menu').css({
                background: '#fdfdfd',
                height: '80px',
                border: '#a1a1a1 solid',
                'border-width': '0 0 1px 0',
                /*  borderBottom: 'white solid 2',
                  'box-shadow': '0 4px 8px 0 rgba(0, 0, 0, 0.2)',*/
                'align-items': 'center',
            });

            $('.menu a:link').css({
                color: '#1c2168',
            });

            $('.logo img').css({
                height: '40px',
            });

        }

        if ($(window).scrollTop() <= 1) {
            $('.menu').css({
                background: '#fdfdfd',
                height: '100px',
                border: 'white2 solid',
                'border-width': '0 0 1px 0',
                'align-items': 'center',
            });

            $('.logo img').css({
                height: '50px',
            });

        }
    })
});

