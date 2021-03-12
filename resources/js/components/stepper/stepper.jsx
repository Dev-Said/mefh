import React, { useState, useEffect } from "react";
import { withStyles, makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import axios from "axios";
import Tooltip from '@material-ui/core/Tooltip';
import store from '../redux/store';
import './stepper.scss';

const useStyles = makeStyles((theme) => ({
  root: {
    display: "flex",
    flexDirection: "row",
    flexWrap: "nowrap",
    justifyContent: "center",
    alignContent: "stretch",
    alignItems: "stretch",
    width: "100%",
    height: "100px",
    // margin-left: auto;
    // margin-right: auto;
    // backgroundColor: 'rgb(255, 244, 244)',
    // border: 'brown solid 1px',
  },
  stepButton: {
    height: 20,
    "&:focus": {
      outline: 'none',
      backgroundColor: '#4297b6',
    },
    flex: '1',
    // backgroundColor: "red",
  },
  titre: {
    fontSize: 26,
    marginBottom: 0,
    fontWeight: "bold",
    marginTop: "15px",

  },
  selected: {
    backgroundColor: '#4297b6',
  }
}));

var style = '';

const Stepper = (props) => {
  const classes = useStyles();
  const [chapitres, setChapitres] = useState([]);
  const [id, setId] = useState(1);

  // récupère tous les chapitres de la formation dont l'id est = idFormation
  // idFormation est injecté dans la page blade qui affiche le stepper
  // dans ce cas ci la page indexFormation
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
    setId(props.info_chapitre.id);
  }, [props.info_chapitre.id]);

  // console.log(' stepper id de la formation   ===>   ' + idFormation);
  // positionne le curseur sur le stepper cliqué et envoi son chapitre
  // dans le store pour mettre à jour BackNextButton et SimpleList
  const locateStepper = (chapitre) => {
    setId(chapitre.id);
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
  };

  const colorSelected = (idChapitre) => {
    idChapitre === id ?
      style = { backgroundColor: '#4297b6' } :
      style = { backgroundColor: '' }
    return style;

  }
  console.log('stepper     ' + props.info_chapitre.module_id);
  const useStylesBootstrap = makeStyles((theme) => ({
    arrow: {
      color: theme.palette.common.black,
    },
    tooltip: {
      backgroundColor: theme.palette.common.black,
      maxWidth: 220,
      fontSize: '16px',
    },
  }));

  function BootstrapTooltip(props) {
    const classes = useStylesBootstrap();

    return <Tooltip arrow classes={classes} {...props} />;
  }

  return (
    <div className={classes.root}>
      <div>
        {chapitres.map((chapitre) => (
          <BootstrapTooltip title={chapitre[1].titre} placement="top">
            <Button className={classes.stepButton} key={chapitre[1].id}
              onClick={() => locateStepper(chapitre[1])}
              variant="outlined" color="#4297b6"
              style={colorSelected(chapitre[1].id)}>
            </Button>
          </BootstrapTooltip>
        ))}
      </div>
      {/* <div>
        <Typography className={classes.titre}>{props.info_chapitre.titre}</Typography>
      </div> */}
    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(Stepper);
