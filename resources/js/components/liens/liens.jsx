/* eslint-disable jsx-a11y/anchor-is-valid */
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Typography from '@material-ui/core/Typography';
import InfoIcon from '@material-ui/icons/Info';
import PeopleIcon from '@material-ui/icons/People';
import VerifiedUserIcon from '@material-ui/icons/VerifiedUser';



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
        marginRight: 30,
        fontSize: "18px",
        color: "#005caa",
        display: "inline",
        '&:hover': {
            cursor: "pointer",
            textDecoration: 'underline',
        },
    }
}));

export default function Links(props) {
    const classes = useStyles();


    console.log('props.certificats   ' + props.certificats)


    // on affiche les liens que lorsqu'il y a quelque chose à afficher
    return (
        <div className={classes.root} >
            {props.faqs != 'hide' && props.faqs != '' ?
                <Typography className={classes.lien} onClick={() => props.handleView('faq')}>
                    <InfoIcon /> Questions éssentielles
        </Typography> : ''
            }
            {props.ressources != 'hide' && props.ressources != '' ?
                <Typography className={classes.lien} onClick={() => props.handleView('ressource')}>
                    <PeopleIcon /> Ressources
        </Typography> : ''
            }
            {props.certificats != 'hide' && props.certificats != '' ?
                <Typography className={classes.lien} onClick={() => props.handleView('certificat')}>
                    <VerifiedUserIcon /> Certificat
        </Typography> : ''
            }
        </div>
    );
}
