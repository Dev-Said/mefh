import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Accordion from '@material-ui/core/Accordion';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import Typography from '@material-ui/core/Typography';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
// import Link from '@material-ui/core/Link';
import { connect } from 'react-redux';
import { getVideo } from '../redux/module/module.actions';
import { ModulesActionTypes } from '../redux/module/module.types';
// import 'accordeon.css';
import store from '../redux/store'
import SimpleList from '../modulesItems/selectedListItems';

const useStyles = makeStyles((theme) => ({
  root: {
    width: '70%',
    maxWidth: '70%',
    height: 'calc(100vh - 130px)',
    maxHeight: '100vh',
    overflow: 'auto',
    backgroundColor: '#fafafa',
  },
  heading: {
    fontSize: theme.typography.pxToRem(15),
    flexBasis: '90.33%',
    flexShrink: 0,
  },
  typo: {
    fontweight: 900,
    color: '#c10412',
  }
}));

const ControlledAccordions = (props) => {
  const classes = useStyles();
  const [expanded, setExpanded] = React.useState(false);

  const handleChange = (panel) => (event, isExpanded) => {
    setExpanded(isExpanded ? panel : false);
  };

  const handleClick = (url_video) => {
    // console.log(url_video);
    store.dispatch({ type: 'GET_VIDEO', url_video: url_video })
  };

  const vid = 'learn.mp4';

  return (
    <div className={classes.root}>
    {console.log(props.modules)}
      {props.modules.map((module, index) => <li key={module[0].id}>
        <Accordion expanded={expanded === 'panel' + index} onChange={handleChange('panel' + index)}>

          <AccordionSummary
            expandIcon={<ExpandMoreIcon />}
            aria-controls="panel1bh-content"
            id="panel1bh-header">
            <Typography className={classes.heading}>
              {'Module ' + ++index + '  -    ' + module[0].modtitre}
            </Typography>
          </AccordionSummary>

       {module.map((chapitre) => 
          <AccordionDetails key={chapitre.id}>
            {/* <Typography className={classes.typo} onClick={() => handleClick(chapitre.url_video)}>
              {chapitre.description}
            </Typography> */}
            <SimpleList description={chapitre.description} handleClick={handleClick} chapitre={chapitre.url_video} />
          </AccordionDetails>)}

        </Accordion>
      </li>)}
    </div>
  );
}

{/* <div className={classes.root}>
{props.chapitres.map((chapitre, index) => <li key={chapitre.id}>
  <Accordion expanded={expanded === 'panel' + index} onChange={handleChange('panel' + index)}>
    <AccordionSummary
      expandIcon={<ExpandMoreIcon />}
      aria-controls="panel1bh-content"
      id="panel1bh-header">
      <Typography className={classes.heading}>{++index + '   ' + chapitre.titre}</Typography>
    </AccordionSummary>
    <AccordionDetails>
      <Typography className={classes.typo} onClick={() => handleClick(chapitre.url_video)}>
        {chapitre.description}</Typography>
    </AccordionDetails>
  </Accordion>
</li>)}
</div> */}

export default ControlledAccordions;

