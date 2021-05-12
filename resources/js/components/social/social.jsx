
/* eslint-disable jsx-a11y/anchor-is-valid */
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Typography from '@material-ui/core/Typography';
import TwitterIcon from '@material-ui/icons/Twitter';
import FacebookIcon from '@material-ui/icons/Facebook';
import LinkedInIcon from '@material-ui/icons/LinkedIn';
import Button from '@material-ui/core/Button';
import { Helmet } from "react-helmet";
import { connect } from 'react-redux';

const useStyles = makeStyles((theme) => ({
    root: {
        // border: 'blue solid 2px',
        width: "100%",
        marginBottom: '40px',
        display: "flex",
        flexDirection: "row",
        flexWrap: "wrap",
        justifyContent: "flex-start",
        alignItems: "flex-start",
    },
    lien: {
        marginRight: 35,
        fontSize: "18px",
        color: "#005caa",
        display: "inline",
        display: "flex",
        flexDirection: "row",
        justifyContent: "flex-start",
        alignItems: "center",
        '&:hover': {
            cursor: "pointer",
            textDecoration: 'underline',
        },
    },
    icon: {
        marginRight: 8,
        fontSize: "22px",
    },
}));

function Social(props) {
    const classes = useStyles();

    var url = '';
    var image = '';
    var titre = '';

    const handleProperty = () => {
        var og = document.head.getElementsByTagName("meta");
        console.log('og  '  + og);
        for (var i = 0; i < og.length; i++) {        
            var property = og[i].getAttribute("property");
            if (property == "og:url") {
                url = "https://m-egalitefemmeshommes.org/formation/1";
                // og[i].setAttribute("content", "https://m-egalitefemmeshommes.org/formation/2");
            }
            if (property == "og:title") {
                titre = "Le mouvement pour l'égalité entre les femmes et les hommes";
                // og[i].setAttribute("content", "Le mouvement pour l'égalité entre les femmes et les hommes");
            }
            if (property == "og:image") {
                image = "https://m-egalitefemmeshommes.org/storage/images/certificat.png";
                // og[i].setAttribute("content", "https://m-egalitefemmeshommes.org/storage/images/1616515510asia.jpg");
            }
            console.log('og  '  + property);
            console.log('og  '  + og[i].getAttribute("content"));
        }
    }


    const handleTwitter = () => {
        handleProperty();
        console.log(props.info_chapitre.image_formation);
        // var url = 'https://m-egalitefemmeshommes.org/';
        var shareUrl = "https://twitter.com/intent/tweet?url=" + document.title +
            "&via=ASBL Le mouvement pour l'Egalité entre les Femmes et les Hommes" +
            "&url=" + encodeURIComponent(url) +
            "&image=" + image;
        popupCenter(shareUrl, "Partager sur Twitter");
    }

    const handleFacebook = () => {
        handleProperty();
        // var url = "https://m-egalitefemmeshommes.org/formation/1";
        var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url) + "&imageurl=" + image + "&title=" + titre;
        popupCenter(shareUrl, "Partager sur facebook");

    }

    const handleLinkedin = () => {
        handleProperty();
        // var url = 'https://m-egalitefemmeshommes.org/formation/1';
        var shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(document.title) +
            "&via=ASBL Le mouvement pour l'Egalité entre les Femmes et les Hommes" +
            "&image=" + image +
            "&title=" + titre +
            "&url=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur LinkedIn");
    }


    const popupCenter = function (url, title, width, height) {
        var popupWidth = width || 640;
        var popupHeight = height || 320;
        var windowLeft = window.screenLeft || window.screenX;
        var windowTop = window.screenTop || window.screenY;
        var windowWidth = window.innerWidth || document.documentElement.clientWidth;
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;
        var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2;
        var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
        var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
        popup.focus();
        return true;
    };




    // on affiche les liens que lorsqu'il y a quelque chose à afficher
    return (
        <div className={classes.root} >
            <Button type="button" variant="outlined" className="button share_twitter" onClick={handleTwitter}>
                <TwitterIcon className={classes.icon} />
            </Button>
            <Button type="button" variant="outlined" className="button share_facebook" onClick={handleFacebook}>
                <FacebookIcon className={classes.icon} />
            </Button>
            <Button type="button" variant="outlined" className="button share_linkedin" onClick={handleLinkedin}>
                <LinkedInIcon className={classes.icon} />
            </Button>

        </div>
    );
}


const mapStateToProps = ({ chapitreData }) => {
    return {
        info_chapitre: chapitreData.chapitreData,
    };
};

export default connect(mapStateToProps)(Social);

