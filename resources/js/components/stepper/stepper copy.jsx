import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import axios from "axios";
import GpsFixedIcon from '@material-ui/icons/GpsFixed';
import store from '../redux/store'

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
  },
  stepButton: {
    height: 20,
    width: 30,
    "&:focus": {
      outline: 'none',
    },
  },
  titre: {
    fontSize: 26,
    marginBottom: 0,
    fontWeight: "bold",
    marginTop: "15px",

  }
}));

const Stepper = (props) => {
  const classes = useStyles();
  const [chapitres, setChapitres] = useState([]);
  const [id, setId] = useState(1);
  const [fromHere, setFromHere] = useState(false);

  //récupère tous les chapitres
  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`)
      .then(res => {
        setChapitres(Object.entries(res.data));
      });
  }, []);

  // sélectionne l'id du chapitre actif pour activer le stepper 
  // conrrespondant quand il fait le render
  useEffect(() => {
    setId(props.info_chapitre.id); // <-- positionne stepper quand je clique dans la liste
    // console.log('stepper   ' + props.info_chapitre.titre);
    setFromHere(false);
  }, [props.info_chapitre.id]);

const getChapitre = () => {
  var currentChapitre = chapitres.map(chapitre => chapitre[1])
      .filter(function (module) {
        return module.module_id === props.module_id;
      }).filter(function (monChapitre) {
        return Math.min(monChapitre.ordre);
      })
    return currentChapitre[0] && currentChapitre[0];
}

  useEffect(() => {
    if (!fromHere) {
      var chapitre = getChapitre();
      chapitre && console.log('stepper Chapitre ordre   ' + chapitre.ordre);
      console.log('fromHere   ' + fromHere);
      
      chapitre && store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
      chapitre && setId(chapitre.id); 
      // chapitre && locateStepper(chapitre)
    } else {
      setFromHere(false);
    }
   
  }, [props.module_id]);



  // positionne le curseur sur le stepper cliqué et envoi son module_id
  // dans le store pour mettre à jour BackNextButton et SimpleList
  const locateStepper = (chapitre) => {
    setFromHere(true);
    setId(chapitre.id);

    store.dispatch({ type: 'SELECT_MODULE_ID', module_id: chapitre.module_id });
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
    store.dispatch({ type: 'ACTIVE_STEP_UPDATE', activeStep: chapitre.module_id });
    console.log('locateStepper fromHere   ' + fromHere);
  };

  return (
    <div className={classes.root}>
      <div>
        {chapitres.map((chapitre) => (
          <Button className={classes.stepButton} key={chapitre[1].id}
            onClick={() => locateStepper(chapitre[1])}
            variant="outlined" color="primary" >
            {id == chapitre[1].id ? <GpsFixedIcon variant="outlined" /> : ''}
          </Button>
        ))}
      </div>
      <div>
        <Typography className={classes.titre}>{props.info_chapitre.titre}</Typography>
      </div>
    </div>
  );
}

const mapStateToProps = ({ modules, chapitreData }) => {
  return {
    module_id: modules.module_id,
    info_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(Stepper);
