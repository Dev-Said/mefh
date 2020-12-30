import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Accordion from '@material-ui/core/Accordion';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import Typography from '@material-ui/core/Typography';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import Link from '@material-ui/core/Link';
// import 'accordeon.css';
 

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
    backgroundColor: '#fafafa',
  },
  heading: {
    fontSize: theme.typography.pxToRem(15),
    flexBasis: '33.33%',
    flexShrink: 0,
  },
  secondaryHeading: {
    fontSize: theme.typography.pxToRem(15),
    color: theme.palette.text.secondary,
  },
}));

export default function ControlledAccordions(props) {
  const classes = useStyles();
  const [expanded, setExpanded] = React.useState(false);

  const handleChange = (panel) => (event, isExpanded) => {
    setExpanded(isExpanded ? panel : false);
  };

  return (
    <div className={classes.root}>
    {props.chapitres.map((chapitre, index) => <li key={chapitre.id}>
      <Accordion expanded={expanded === 'panel' + index} onChange={handleChange('panel' + index)}>
        <AccordionSummary
          expandIcon={<ExpandMoreIcon />}
          aria-controls="panel1bh-content"
          id="panel1bh-header">
          <Typography className={classes.heading}>{index + '   ' + chapitre.titre}</Typography>
          {/* <Typography className={classes.secondaryHeading}>{props.url}</Typography> */}
        </AccordionSummary>
        <AccordionDetails>
          <Link href={chapitre.url_video}>
            <Typography>{chapitre.description}</Typography>
          </Link>
        </AccordionDetails>
      </Accordion>
      </li>)}
    </div>
  );
}



