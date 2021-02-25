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
    color: 'primary',
    width: 150,
    height: 50,
    borderRadius: `10px 0 0 0`,
    "&:focus": {
      outline: 'none',
    },
    backgroundColor: theme.palette.background.paper,
  },
  nextButton: {
    color: 'primary',
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

  //récupère le chapitreTitre dont le chapitreId est = à activeStep
  function getStepContent(activeStep) {
    var currentChapitre = chapitres.map(chapitre => chapitre[1])
      .filter(function (monChapitre) {
        return monChapitre.chapitreId === activeStep;
      })
    return currentChapitre[0] && currentChapitre[0].fichier_video;
  }

  //permet de charger la 1er vidéo du module dans ReactPlayer
  useEffect(() => {
    store.dispatch({ type: 'GET_VIDEO', url_video: getStepContent(activeStep) })
  });

  //charge tous les chapitres de tous les modules
  useEffect(() => { //modifier controller index !!!
    axios.get(`http://localhost:8000/modulesApi`).then((res) => {
      const modulesData = Object.entries(res.data);
      setChapitres(modulesData); console.log(modulesData);
    });
  }, []);
console.log(chapitres);
///////////////////////////////////devrait envoyer module_id sans recharger tous les chapitres//////////////////////////
  const handleNext = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
    store.dispatch({ type: 'INC_CHAPITRE_ID', chapitre_id: activeStep });
    // console.log(activeStep);
  };

  const handleBack = () => {
    setActiveStep((prevActiveStep) => prevActiveStep - 1);
    store.dispatch({ type: 'DEC_CHAPITRE_ID', chapitre_id: activeStep });
  };

  //handleReset pour revenir à la 1er page de la formation donc celle du 1er module
  //à faire !!
  const handleReset = () => {
    setActiveStep(1);
    getModuleId(activeStep);
    store.dispatch({ type: 'RESET_CHAPITRE_ID', chapitre_id: activeStep });
  };

  return (
    <div className={classes.root}>
      <div>
        <Button
          disabled={activeStep < 2}
          onClick={handleBack}
          className={classes.backButton}
          color="primary"
        // variant="contained"
        >
          Précédent
              </Button>
        <Button
          disabled={activeStep > 5}
          // variant="contained"
          className={classes.nextButton}
          color="primary"
          onClick={handleNext}>
          Suivant
                </Button>
      </div>
    </div>
  );
}

export default BackNextButton;