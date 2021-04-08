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
        minWidth: "80%",        
    },
    title: {
        fontSize: 14,
    },
    pos: {
        marginBottom: 12,
    },
    content: {
        boxShadow: "-4px 9px 25px -6px rgba(0, 0, 0, 0.1)",
        marginBottom: 50,
        backgroundColor: "#ffffff",
    },
    backButton: {
        marginBottom: 50,
    },
});

export default function Certificat(props) {
    const classes = useStyles();
    const [certificats, setCertificats] = useState([]);

    // useEffect(() => {
    //     axios.get(`http://localhost:8000/certificatsRes/${idFormation}`).then((res) => {
    //         const certificatData = Object.entries(res.data);
    //         setCertificats(certificatData);
    //     });
    // }, []);

    useEffect(() => {
        setCertificats(Object.entries(props.certificats));
    }, []);

    return (
        <div>
            <Button onClick={() => props.handleView('formation')} variant="outlined" className={classes.backButton}>
                Revenir sur la page de formation</Button>
            <div className={classes.root}>
                {certificats.map((ressource) => (
                    <Card className={classes.root} key={ressource[1].id} className={classes.content}>
                        <CardContent>
                            <Typography className={classes.title} color="textSecondary" gutterBottom>
                                {ReactHtmlParser(ressource[1].text)}
                            </Typography>

                        </CardContent>
                        {/* <CardActions>
                            <Button size="small">Learn More</Button>
                        </CardActions> */}
                    </Card>
                ))}
            </div>
        </div>
    );
}







