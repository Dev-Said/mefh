
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import TwitterIcon from '@material-ui/icons/Twitter';
import FacebookIcon from '@material-ui/icons/Facebook';
import LinkedInIcon from '@material-ui/icons/LinkedIn';
import Button from '@material-ui/core/Button';
import { connect } from 'react-redux';

const useStyles = makeStyles((theme) => ({
    root: {
        // border: 'red solid 2px',
        width: '100%',
        height: "auto",
        marginTop: 20,
        color: "#0f5f91",
        fontWeight: "bold",
        display: "flex",
        flexDirection: "row",
        flexWrap: "wrap",
        justifyContent: "flex-start",
        alignItems: "center",
        gridRow: "4 / 5",
        gridColumn: "2 / 3",
    },
    button: {
        marginRight: 10,
        fontSize: "18px",
        color: "#005caa",
        backgroundColor: "#fafafa",
        display: "flex",
        flexDirection: "row",
        justifyContent: "center",
        alignItems: "center",
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
        '&:hover': {
            cursor: "pointer",
            backgroundColor: "#eeeeee",
        },
    },
    icon: {
        fontSize: "32px",
        color: "#0f5f91",
        backgroundColor: "#fafafa",
    },
    h2: {
        fontSize: "18px",
        color: "#0f5f91",
        width: "100%",
        textAlign: "left",
    }
}));

function Social() {
    const classes = useStyles();

    var url = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search;
    
    var image = "https://m-egalitefemmeshommes.org/storage/images/1616525907voilier.jpg";
    var titre = "Le mouvement pour l'égalité entre les femmes et les hommes";

    const handleTwitter = () => {
        var shareUrl = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(url) +
            "&via=ASBL Le mouvement pour l'Egalité entre les Femmes et les Hommes";
        popupCenter(shareUrl, "Partager sur Twitter");
    }

    const handleFacebook = () => {
        url = "https://m-egalitefemmeshommes.org";
        var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
        popupCenter(shareUrl, "Partager sur facebook");

    }

    const handleLinkedin = () => {
        var shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(url) +
            "&via=ASBL Le mouvement pour l'Egalité entre les Femmes et les Hommes";
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





    return (
        <div className={classes.root} >
        <h2 className={classes.h2}>Partagez</h2>
            <Button type="button" className={classes.button} onClick={handleTwitter} >
                <TwitterIcon className={classes.icon}  style={{ fontSize: 40 }}/>
            </Button>
            <Button type="button" className={classes.button} onClick={handleFacebook} >
                <FacebookIcon className={classes.icon}  style={{ fontSize: 40 }} />
            </Button>
            <Button type="button" className={classes.button} onClick={handleLinkedin} >
                <LinkedInIcon className={classes.icon}  style={{ fontSize: 40 }}/>
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

