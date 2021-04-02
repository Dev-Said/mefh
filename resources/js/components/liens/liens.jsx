/* eslint-disable jsx-a11y/anchor-is-valid */
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Link from '@material-ui/core/Link';
import Typography from '@material-ui/core/Typography';

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
        color: "blue",
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
                Questions éssentielles
        </Typography>
            <Typography className={classes.lien} onClick={() => props.handleView('ressource')}>
                Ressources
        </Typography>
            <Typography className={classes.lien} onClick={() => props.handleView('certificat')}>
                Certificat
        </Typography>
        </div>
    );
}
