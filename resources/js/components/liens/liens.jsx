/* eslint-disable jsx-a11y/anchor-is-valid */
import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import InfoIcon from '@material-ui/icons/Info';
import PeopleIcon from '@material-ui/icons/People';
import Button from '@material-ui/core/Button';
import './liens.scss';


const useStyles = makeStyles((theme) => ({
    root: {
        width: "100%",
        marginBottom: '40px',
        display: "flex",
        flexDirection: "row",
        flexWrap: "wrap",
        justifyContent: "flex-start",
        alignItems: "flex-start",
        gridRow: "1 / 2",
        gridColumn: "1 / 3",
    },
    lien: {
        marginRight: 15,
        fontSize: "14px",
        color: "#0f5f91",
        display: "flex",
        flexDirection: "row",
        justifyContent: "flex-start",
        alignItems: "center",
        backgroundColor: "#fcfcfc",
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
        '&:hover': {
            cursor: "pointer",
        },
    },
    icon: {
        marginRight: 8,
        fontSize: "22px",
    },
}));

export default function Links(props) {
    const classes = useStyles();

    // on affiche les liens que lorsqu'il y a quelque chose à afficher
    return (
        <div className="containerLiens">
            <div className={classes.root} >
                {props.faqs != 'hide' && props.faqs != '' ?
                    <Button className={classes.lien} onClick={() => props.handleView('faq')} >
                        <InfoIcon className={classes.icon} />{props.localiz['faq']}
                    </Button> : ''
                }
                {props.ressources != 'hide' && props.ressources != '' ?
                    <Button className={classes.lien} onClick={() => props.handleView('ressource')} >
                        <PeopleIcon className={classes.icon} /> {props.localiz['res']}
                    </Button> : ''
                }
            </div>
        </div>
    );
}
