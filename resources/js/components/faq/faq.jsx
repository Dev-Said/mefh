import React, { useState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Accordion from "@material-ui/core/Accordion";
import AccordionDetails from "@material-ui/core/AccordionDetails";
import AccordionSummary from "@material-ui/core/AccordionSummary";
import Typography from "@material-ui/core/Typography";
import ExpandMoreIcon from "@material-ui/icons/ExpandMore";
import axios from "axios";
import CustomizedInputBase from '../searchInput/searchInput';
import ReactHtmlParser, { processNodes, convertNodeToElement, htmlparser2 } from 'react-html-parser';
import Button from '@material-ui/core/Button';


const useStyles = makeStyles((theme) => ({
    root: {
        width: "100%",
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
        marginTop: "30px",
    },
    heading: {
        height: "60px",
        paddingTop: "20px",
    },
    accordeon: {
        borderRadius: "8px",
        marginBottom: "15px",
        width: "50%",
        boxShadow: "-4px 9px 25px -6px rgba(0, 0, 0, 0.1)",
    },
}));

export default function Faq(props) {
    const classes = useStyles();
    const [faqs, setFaqs] = useState([]);
    const [param, setParam] = useState('');

    useEffect(() => {
        axios.get(`http://localhost:8000/faqs/${param}`).then((res) => {
            const faqData = Object.entries(res.data);
            setFaqs(faqData);
        });
    }, []);

    const handleChange = (e) => {
        const value = e.currentTarget.value;
        // console.log(e.currentTarget.value);
        axios.get(`http://localhost:8000/faqs/${value}`).then((res) => {
            const faqData = Object.entries(res.data);
            setFaqs(faqData);
        });
    }

    return (
        <div>

            <Button onClick={() => props.handleView('formation')} variant="outlined" className="quizBackButton">
                Revenir sur la page de formation</Button>

            <div className={classes.root}>
                <CustomizedInputBase onChange={handleChange} />
                {faqs.map((faq, index) => (
                    <Accordion className={classes.accordeon} key={faq[1].id}>
                        <AccordionSummary
                            expandIcon={<ExpandMoreIcon color="primary" />}
                            fontSize="large"
                        >
                            <Typography
                                className={classes.heading}
                                variant="h6"
                            >
                                {ReactHtmlParser(faq[1].question)}
                            </Typography>
                        </AccordionSummary>

                        <AccordionDetails>
                            <Typography>
                                {ReactHtmlParser(faq[1].reponse)}
                            </Typography>
                        </AccordionDetails>
                    </Accordion>
                ))}
            </div>
        </div>
    );
}
