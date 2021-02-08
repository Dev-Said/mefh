import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Accordion from '@material-ui/core/Accordion';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import Typography from '@material-ui/core/Typography';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import store from '../redux/store'
import SimpleList from '../modulesItems/selectedListItems';
import { StayPrimaryLandscape } from '@material-ui/icons';

const useStyles = makeStyles((theme) => ({
  root: {
    width: '70%',
    maxWidth: '70%',
    height: 'calc(100vh - 130px)',
    maxHeight: 'calc(100vh - 130px)',
    overflow: 'scroll',
    '&::-webkit-scrollbar': {
      width: '0',
      height: '0',
    },
    backgroundColor: '#fdfdfd',
    boxShadow: '0 0 0 0 ',
  },
  heading: {
    fontSize: theme.typography.pxToRem(15),
    flexBasis: '90.33%',
    flexShrink: 0,
    fontweight: 'bold',
    color: '#000000',
    boxShadow: '0 0 0 0 ',
  },
  summary: {
    backgroundColor: '#ffffff',
    height: 'calc((100vh - 130px) / 11)',
  },
  detail: {
    backgroundColor: '#ff0006',
    height: '300px',
  }
}));

  const ControlledAccordions = (props) => {
  const classes = useStyles();
  const [expanded, setExpanded] = React.useState(false);

  const handleChange = (panel) => (event, isExpanded) => {
    setExpanded(isExpanded ? panel : false);
  };

  const handleClick = (url_video) => {
    store.dispatch({ type: 'GET_VIDEO', url_video: url_video })
  };

  return (
    <div className={classes.root}>
      {props.modules.map((module, index) => <li key={module[0].id}>
        <Accordion expanded={expanded === 'panel' + index} onChange={handleChange('panel' + index)}>
          <AccordionSummary className={classes.summary} 
            expandIcon={<ExpandMoreIcon />}
            aria-controls="panel1bh-content"
            id="panel1bh-header">
            <Typography className={classes.heading}>
              {'Module ' + ++index + '  -    ' + module[0].modtitre}
            </Typography>
          </AccordionSummary>
          {module.map((chapitre) =>
            <AccordionDetails key={chapitre.id}>
              <SimpleList className={classes.detail} description={chapitre.description} 
              handleClick={handleClick} chapitre={chapitre.url_video} />
            </AccordionDetails>)}
        </Accordion>
      </li>)}
    </div>
  );
}

export default ControlledAccordions;

