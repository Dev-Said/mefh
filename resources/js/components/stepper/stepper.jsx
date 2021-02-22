import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import axios from "axios";
import store from '../redux/store'

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
  },
  backButton: {
    marginRight: theme.spacing(1),
    color: 'primary',
  },
  // instructions: {
  //   marginTop: theme.spacing(1),
  //   marginBottom: theme.spacing(1),
  // },
}));

function getSteps() {
  return ['1', '1', '3', '4', '5', '6'];
}

function getStepContent(stepIndex) {
  switch (stepIndex) {
    case 0:
      return 'Select campaign settings...';
    case 1:
      return 'What is an ad group anyways?';
    case 2:
      return 'This is the bit I really care about!';
    default:
      return 'Unknown stepIndex';
  }
}

const Stepper = (props) => {
  const classes = useStyles();
  const [activeStep, setActiveStep] = React.useState(1);
  const steps = getSteps();
  // const getModuleId = props.getModuleId;
  const [modules, setModules] = useState([]);

  console.log(props);
  console.log(activeStep);

  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`).then((res) => {
      const modulesData = Object.entries(res.data);
      setModules(modulesData);
    });
  }, []);


  const handleNext = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
    store.dispatch({ type: 'INC_MODULE_ID', module_id: activeStep });
  };

  const handleBack = () => {
    setActiveStep((prevActiveStep) => prevActiveStep - 1);
    store.dispatch({ type: 'DEC_MODULE_ID', module_id: activeStep });
  };

  const handleReset = () => {
    setActiveStep(0);
    getModuleId(activeStep);
  };

  const salut = (x) => {
    alert(x);
  };


  return (
    <div className={classes.root}>

      <div>
        {modules.map((module) => (
          <Button key={module.moduleId} onClick={() => salut(module[1].moduleTitre)} variant="outlined" color="primary" size="small" >
            {module[1].moduleTitre}
          </Button>

        ))}
      </div>


      <div>
        {activeStep === steps.length ? (
          <div>
            <Typography className={classes.instructions}>All steps completed</Typography>
            <Button onClick={handleReset}>Reset</Button>
          </div>

        ) : (

            <div>
              <Typography className={classes.instructions}>{getStepContent(activeStep)}</Typography>
              <div>
                <Button
                  disabled={activeStep === 0}
                  onClick={handleBack}
                  // className={classes.backButton}
                  color="primary"
                  variant="contained"
                >
                  Back
              </Button>
                <Button variant="contained" color="primary" onClick={handleNext}>
                  {activeStep === steps.length - 1 ? 'Finish' : 'Next'}
                </Button>
              </div>
            </div>
          )}
      </div>
    </div>
  );
}


const mapStateToProps = ({ stepper }) => {
  return {
    activeStep: stepper.module_id
  }
}


export default connect(mapStateToProps)(Stepper);