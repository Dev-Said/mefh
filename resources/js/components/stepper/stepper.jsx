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

  //récupère tous les chapitres
  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi/${idFormation}`)
      .then(res => {
        setChapitres(Object.entries(res.data));
        setId(1);
      });
  }, []);

  // set id avec l'id du chapitre dans le store pour positionner le 
  // curseur du stepper quand je clique dans la liste
  useEffect(() => {
    setId(props.info_chapitre.id); // <-- 
  }, [props.info_chapitre.id]);

  console.log(' stepper id de la formation   ===>   ' + idFormation);
  // positionne le curseur sur le stepper cliqué et envoi son chapitre
  // dans le store pour mettre à jour BackNextButton et SimpleList
  const locateStepper = (chapitre) => {
    setId(chapitre.id);
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
  };

  return (
    <div className={classes.root}>
      <div>
        {chapitres.map((chapitre) => (
          <Button className={classes.stepButton} key={chapitre[1].id}
            onClick={() => locateStepper(chapitre[1])}
            variant="outlined" color="primary" >
            {id == chapitre[1].id ? <GpsFixedIcon variant="outlined" /> : ''}
            {/* {chapitre[1].id} */}
          </Button>
        ))}
      </div>
      <div>
        <Typography className={classes.titre}>{props.info_chapitre.titre}</Typography>
      </div>
    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(Stepper);
