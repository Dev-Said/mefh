import React, { useState, useEffect } from "react";
import Button from '@material-ui/core/Button';
import store from '../redux/store'
import { connect } from 'react-redux';
import './backNextButton.scss';


const BackNextButton = (props) => {

  const [curChapitre, setCurChapitre] = useState(0);
  const [activeStep, setActiveStep] = useState(1);
  // met le premier chapitres de chaque modules dans modTab
  var modId = 0;
  var modTab = [];
  var chapi;
  // props.chapitres.map(chapitre => arrChap.push(chapitre[1]));
  props.chapitres.map((chapitre, index) => {
    if (index == 0) {
      modId = chapitre[1].module_id;
      modTab.push(chapitre[1]);
    }
    if (modId != chapitre[1].module_id) {
      modId = chapitre[1].module_id;
      modTab.push(chapitre[1]);
    }
  })
  // récupère le nombre de modules pour désactiver le bouton "suivant" quand on atteint nbModules
  var nbModules = modTab.length ? modTab.length : 1;

  // INITIALISATION :envoie le premier chapitre au store pour déclencher le chargement 
  // de la 1er vidéo, titre et description du premier module 
  // si il y a des props.chapitres mais qu'il n'y en a pas dans le store
  useEffect(() => {
    if (props.chapitres[0] && !props.info_chapitre.module_ordre) {
      store.dispatch({ type: 'GET_CHAPITRE', chapitreData: props.chapitres[0][1] });
    }
  });


  // met à jour le store avec le premier chapitre du module sélectionné
  useEffect(() => {
    store.dispatch({ type: 'GET_BACKNEXT', curChapitre: props.info_chapitre.module_ordre - 1 });
  }, [props.info_chapitre.module_ordre]);

  //passe au module suivant
  const handleNext = () => {
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: modTab[props.store_curChapitre + 1] });
  };

  //passe au module précédent
  const handleBack = () => {
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: modTab[props.store_curChapitre - 1] });
  };

  return (
    <div className="backNextButtonRoot">
        <Button
          disabled={props.store_curChapitre < 1}
          onClick={handleBack}
          className="backButton"
        // variant="contained"
        >
        {props.localiz['prev']}
        </Button>
        <Button
          disabled={props.store_curChapitre == nbModules - 1}
          // variant="contained"
          className="nextButton"
          onClick={handleNext}
          >
           {props.localiz['next']}
        </Button>
    </div>
  );
}



const mapStateToProps = ({ chapitreData, curChapitre }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
    store_curChapitre: curChapitre.curChapitre,
  };
};

export default connect(mapStateToProps)(BackNextButton);
