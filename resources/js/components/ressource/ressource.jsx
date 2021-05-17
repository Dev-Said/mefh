import React, { useState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Typography from "@material-ui/core/Typography";
// import ReactHtmlParser, { processNodes, convertNodeToElement, htmlparser2 } from 'react-html-parser';
import ReactHtmlParser from 'react-html-parser';
import Button from '@material-ui/core/Button';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';


const useStyles = makeStyles({
    root: {
        Width: "100%",
        gridRow: "7 / 8",
        gridColumn: "1 / 3",
    },
    title: {
        fontSize: 14,
    },
    content: {
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
        marginBottom: 50,
        backgroundColor: "#ffffff",
    },
    backButton: {
        marginRight: 15,
        fontSize: "14px",
        color: "#0f5f91",
        display: "flex",
        flexDirection: "row",
        justifyContent: "center",
        alignItems: "center",
        backgroundColor: "#fcfcfc",
        '&:hover': {
            cursor: "pointer",
        },
        marginBottom: 40,
        marginTop: 20,
        width: "400px",
        height: "50px",
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
    },
});

export default function Ressource(props) {
    const classes = useStyles();
    const [ressources, setRessources] = useState([]);

    useEffect(() => {
        setRessources(Object.entries(props.ressources));
    }, []);


    return (
        <div className={classes.root}>

            <h1>Ressources</h1>

            <Button onClick={() => props.handleView('formation')} className={classes.backButton}>
                Revenir sur la page de formation</Button>

            <div className={classes.root}>
                {ressources.map((ressource, index) => (
                    <Card key={index} className={classes.root} className={classes.content}>
                        <CardContent>
                            <Typography className={classes.title} color="#0c0c0c" gutterBottom>
                                {ReactHtmlParser(ressource[1].text)}
                            </Typography>
                        </CardContent>
                    </Card>
                ))}
            </div>

        </div>
    );
}







