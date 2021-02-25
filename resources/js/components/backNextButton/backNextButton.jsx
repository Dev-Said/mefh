import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import axios from "axios";
import store from '../redux/store'

const useStyles = makeStyles((theme) => ({
  root: {
    width: 300,
    boxShadow: "-4px 9px 25px -6px rgba(0, 0, 0, 0.1)",
  },
  backButton: {
    width: 150,
    height: 50,
    borderRadius: `10px 0 0 0`,
    "&:focus": {
      outline: 'none',
    },
    backgroundColor: theme.palette.background.paper,
  },
  nextButton: {
    width: 150,
    height: 50,
    borderRadius: `0 10px 0 0`,
    "&:focus": {
      outline: 'none',
    },
    backgroundColor: theme.palette.background.paper,
  },
}));

const BackNextButton = () => {
  const classes = useStyles();
  const [activeStep, setActiveStep] = React.useState(1);
  const [chapitres, setChapitres] = useState([]);

  //récupère le fichier_video du premier chapitre qui a 
  //un module_id = activeStep
  function getStepContent(activeStep) {
    var currentChapitre = chapitres.map(chapitre => chapitre[1])
      .filter(function (monModule) {
        return monModule.module_id === activeStep;
      }).filter(function (monChapitre) {
        return Math.min(monChapitre.ordre);
      })
      return currentChapitre[0] && currentChapitre[0].fichier_video;
  }

  // envoie fichier_video au store pour déclencher le chargement 
  // de la 1er vidéo d'un module donné dans ReactPlayer
  useEffect(() => {
    store.dispatch({ type: 'GET_VIDEO', url_video: getStepContent(activeStep) });
  });

  //charge tous les chapitres de tous les modules
  useEffect(() => {  
    axios.get(`http://localhost:8000/modulesApi`).then((res) => {
      const modulesData = Object.entries(res.data);
      setChapitres(modulesData);   
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

  //handleReset pour revenir à la 1er page de la formation donc celle du 1er module
  //à faire !!
  const handleReset = () => {
    setActiveStep(1);
    getModuleId(activeStep);
    store.dispatch({ type: 'RESET_MODULE_ID', module_id: activeStep });
  };

  return (
    <div className={classes.root}>
      <div>
        <Button
          disabled={activeStep < 2}
          onClick={handleBack}
          className={classes.backButton}
        // variant="contained"
        >
          Précédent
              </Button>
        <Button
          disabled={activeStep > chapitres.length}
          // variant="contained"
          className={classes.nextButton}
          onClick={handleNext}>
          Suivant
                </Button>
      </div>
    </div>
  );
}

export default BackNextButton;