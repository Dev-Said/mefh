import React, { useState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Typography from "@material-ui/core/Typography";
import axios from "axios";
import ReactHtmlParser, { processNodes, convertNodeToElement, htmlparser2 } from 'react-html-parser';
import Button from '@material-ui/core/Button';
import Card from '@material-ui/core/Card';
import CardActions from '@material-ui/core/CardActions';
import CardContent from '@material-ui/core/CardContent';


const useStyles = makeStyles({
    root: {
        minWidth: 275,
        marginBottom: 30,
    },
    bullet: {
        display: 'inline-block',
        margin: '0 2px',
        transform: 'scale(0.8)',
    },
    title: {
        fontSize: 14,
    },
    pos: {
        marginBottom: 12,
    },
});

export default function Ressource(props) {
    const classes = useStyles();
    const [ressources, setRessources] = useState([]);
    const bull = <span className={classes.bullet}>•</span>;

    useEffect(() => {
        axios.get(`http://localhost:8000/ressourcesRes`).then((res) => {
            const ressourceData = Object.entries(res.data);
            console.log('ressourceData   ' + ressourceData)
            setRessources(ressourceData);
        });
    }, []);


    return (
        <div>
            <div className="quizHeader">
                <Button onClick={() => props.handleView('formation')} variant="outlined" className="quizBackButton">
                    Revenir sur la page de formation</Button>
            </div>
            <div className={classes.root}>
                {ressources.map((ressource) => (
                    <Card className={classes.root} key={ressource[1].id}>
                        <CardContent>
                            <Typography className={classes.title} color="textSecondary" gutterBottom>
                                {ReactHtmlParser(ressource[1].text)}
                            </Typography>

                        </CardContent>
                        <CardActions>
                            <Button size="small">Learn More</Button>
                        </CardActions>
                    </Card>
                ))}
            </div>
        </div>
    );
}







