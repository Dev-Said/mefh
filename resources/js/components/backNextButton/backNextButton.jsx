import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
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

const BackNextButton = (props) => {
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
    return currentChapitre[0] && currentChapitre[0];

  }

  // envoie les datas au store pour déclencher le chargement 
  // de la 1er vidéo, titre et description d'un module donné 
  useEffect(() => {
    setChapitres(props.chapitres)
    let stepContent = getStepContent(activeStep);
    if (stepContent) {
      let chapitre_Info = [stepContent.titre, stepContent.description];
      store.dispatch({ type: 'GET_VIDEO', url_video: stepContent.fichier_video });
      store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre_Info });
    }
  });

  //passe au module suivant
  const handleNext = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
    store.dispatch({ type: 'INC_MODULE_ID', module_id: activeStep });
  };

  //passe au module précédent
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