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
    const preventDefault = (event) => event.preventDefault();

    return (
        <div className={classes.root} >
            <Typography className={classes.lien} onClick={() => props.handleView('faq')}>
                <InfoIcon /> Questions éssentielles
        </Typography>
            <Typography className={classes.lien} onClick={() => props.handleView('ressource')}>
                <PeopleIcon /> Ressources
        </Typography>
            <Typography className={classes.lien} onClick={() => props.handleView('certificat')}>
                <VerifiedUserIcon /> Certificat
        </Typography>
        </div>
    );
}
