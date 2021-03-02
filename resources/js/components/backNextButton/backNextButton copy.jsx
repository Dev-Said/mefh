import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import store from '../redux/store'
import { connect } from 'react-redux';

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
  const [firstInfo_chapitre, setFirstInfo_chapitre] = useState(null);

  //récupère le premier chapitre qui a un module_id = activeStep
  function getChapitre() {
    var currentChapitre = chapitres.map(chapitre => chapitre[1])
      .filter(function (monModule) {
        return monModule.module_id === activeStep;
      }).filter(function (monChapitre) {
        return Math.min(monChapitre.ordre);//<--ICI ICI ?? pour selected Item dans la liste
      })
    return currentChapitre[0] && currentChapitre[0];
    
  }

  // envoie les datas au store pour déclencher le chargement 
  // de la 1er vidéo, titre et description d'un module donné 
  useEffect(() => {

    setChapitres(props.chapitres)
    ////////////////PAS DANS USEEFFECT POUR METTRE LE 1ER CHAPITRE SELECTIONNE
    var chapitre = props.info_chapitre ? props.info_chapitre : getChapitre();

    if (chapitre) {
      store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
                       console.log('backnext useeffect   ' + props.info_chapitre.titre);
    }
  });

  // modifie activeStep pour positionner le bon onglet "précédent / suivant"
  useEffect(() => {
    setActiveStep(props.activeStep);
  }, [props.activeStep]);

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

const mapStateToProps = ({ activeStep, chapitreData }) => {
  return {
    activeStep: activeStep.activeStep,
    info_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(BackNextButton);
// export default BackNextButton;