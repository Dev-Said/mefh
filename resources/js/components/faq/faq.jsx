import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Accordion from '@material-ui/core/Accordion';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import Typography from '@material-ui/core/Typography';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import axios from 'axios';

const useStyles = makeStyles((theme) => ({
    root: {
      width: '60%',
      marginLeft: '20%',
      marginTop: '30px',
    },
    heading: {
      fontSize: theme.typography.pxToRem(15),
      fontWeight: theme.typography.fontWeightRegular,
      height: '70px',
      textAlign: 'center',
    },
    accordeon: {
        borderRadius: '10px',
        marginbottom: '15px',
    }
  }));



export default function Faq() {
  const classes = useStyles();
  const [faqs, setFaqs] = useState([]);

useEffect(() => {
    axios.get(`http://localhost:8000/faqs`)
    .then(res => {

      const faqData = Object.entries(res.data);

      setFaqs(faqData);
      console.log(faqData);
        
    })
  }, []);

  
  return (
    <div className={classes.root}>

      {faqs.map((faq, index) => 
      <Accordion className={classes.accordeon}
      key={faq[1].id}>

        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel1bh-content"
          id="panel1bh-header">
          <Typography className={classes.heading}>{ faq[1].question }</Typography>
        </AccordionSummary>

        <AccordionDetails>
          <Typography>
          { faq[1].reponse }
          </Typography>
        </AccordionDetails>

      </Accordion>)}
    </div>
  );
}
