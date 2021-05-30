import React, { useState, useEffect } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Accordion from "@material-ui/core/Accordion";
import AccordionDetails from "@material-ui/core/AccordionDetails";
import AccordionSummary from "@material-ui/core/AccordionSummary";
import Typography from "@material-ui/core/Typography";
import ArrowDropDownIcon from '@material-ui/icons/ArrowDropDown';
import axios from "axios";
import CustomizedInputBase from '../searchInput/searchInput';
import ReactHtmlParser, { processNodes, convertNodeToElement, htmlparser2 } from 'react-html-parser';
import Button from '@material-ui/core/Button';
import QuestionAnswerOutlinedIcon from '@material-ui/icons/QuestionAnswerOutlined';
import '../liens/liens.scss';

const useStyles = makeStyles((theme) => ({
    root: {
        width: "100%",
        minWidth: "100%",
        display: "flex",
        flexDirection: "column",
        alignItems: "stretch",
        marginTop: "30px",
        gridRow: "6 / 7",
        gridColumn: "1 / 3",
    },
    heading: {
        height: "auto",
        paddingTop: "20px",
        paddingBottom: "20px",
    },
    quizBackButton: {
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
        marginBottom: 10,
        marginTop: 20,
        width: "400px",
        height: "50px",
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
    },
    accordeon: {
        borderRadius: "5px",
        marginBottom: "20px",
        width: "100%",
        minWidth: "100%",
        height: "auto",
        paddingBottom: "20px",
        boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
    },
}));

export default function Faq(props) {
    const classes = useStyles();
    const [faqs, setFaqs] = useState([]);

    useEffect(() => {
        setFaqs(Object.entries(props.faqs));
    }, []);

    const handleChange = (e) => {
        const value = e.currentTarget.value;
        axios.get(`${globalUrl}faqChange`,
            {
                params: {
                    value: value,
                    formation_id: idFormation,
                }
            }).then((res) => {
                const faqData = Object.entries(res.data);
                setFaqs(faqData);
            });
    }

    return (
        <div className={classes.root}>
            <h1 className="h1_faq">Questions essentielles</h1>
            <Button onClick={() => props.handleView('formation')} className={classes.quizBackButton} style={{ color: "#0f5f91" }}>
                Revenir sur la page de formation</Button>

            <CustomizedInputBase onChange={handleChange} />
            <div >
                {faqs.map((faq, index) => (
                    <Accordion key={index} className={classes.accordeon} >
                        <AccordionSummary
                            expandIcon={<ArrowDropDownIcon style={{ fontSize: 35, color: "#920000" }} />}
                            fontSize="large"
                        >

                            <Typography
                                className={classes.heading}
                                variant="h6" style={{ color: "#0f5f91" }}
                            >
                                <QuestionAnswerOutlinedIcon style={{ marginRight: 25, color: "#920000" }} />
                                {ReactHtmlParser(faq[1].question)}
                            </Typography>
                        </AccordionSummary>

                        <AccordionDetails>
                            <Typography style={{ marginLeft: 5, marginRight: 20 }}>
                                {ReactHtmlParser(faq[1].reponse)}
                            </Typography>
                        </AccordionDetails>
                    </Accordion>
                ))}
            </div>
        </div>
    );
}
