import React, { useState, useEffect, useReducer } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import axios from "axios";
import Tooltip from '@material-ui/core/Tooltip';
import store from '../redux/store';
import './stepper.scss';

const useStyles = makeStyles((theme) => ({
  root: {
    width: "100%",
    height: "100px",
    // backgroundColor: 'rgb(255, 244, 244)',
    // border: 'brown solid 1px',
  },
  stepper: {
    display: "flex",
    flexDirection: "row",
    flexWrap: "nowrap",
    justifyContent: "center",
    alignContent: "stretch",
    alignItems: "stretch",
    width: "100%",
    marginBottom: "20px",
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
  blockTitre: {
    display: "flex",
    width: "100%",
    justifyContent: "flex-start",
    alignItems: "center",
  },
  titre: {
    fontSize: 30,
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
  const [chapitreSuivi, setChapitreSuivi] = useState([]);
  const [dejaSuivi, setDejaSuivi] = useState(props.store_dejaSuivi);
  const [id, setId] = useState(1);

  // récupère tous les chapitres de la formation dont l'id est = idFormation
  // idFormation est injecté dans la page blade qui affiche le stepper
  // dans ce cas ci la page indexFormation
  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi/${idFormation}`)
      .then(res => {
        setChapitres(Object.entries(res.data));
        setId(props.store_chapitre.id);
        console.log('useefect 1  ' + props.store_dejaSuivi)
      });
  }, []);

  // set id avec l'id du chapitre dans le store pour positionner le 
  // curseur du stepper quand je clique dans la liste
  useEffect(() => {
    setId(props.store_chapitre.id);
    console.log('setId setId setId setId   ' )
  }, [props.store_chapitre.id]);


  useEffect(() => {
    axios.get(`http://localhost:8000/chapitreSuiviList`, {
      params: {
        id: auth[2],
      }
    })
      .then(res => {
        setChapitreSuivi(Object.entries(res.data));
        var chapTab = [];
        chapitreSuivi.map((chap) => chapTab.push(chap[1].chapitre_id));
        setDejaSuivi(chapTab);
        store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: chapTab });
        console.log('useeffect 2 setDejaSuivi   ' + props.store_dejaSuivi)
      });
  }, [props.store_chapitre.id]);

  store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: dejaSuivi });
  // props.store_dejaSuivi && setDejaSuivi(props.store_dejaSuivi);
  console.log('props.store_dejaSuivi 3  ' + props.store_dejaSuivi )

  // positionne le curseur sur le stepper cliqué et envoi son chapitre
  // dans le store pour mettre à jour BackNextButton et SimpleList
  const locateStepper = (chapitre) => {
    setId(chapitre.id);
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
  };

  // 
  const colorSelected = (idChapitre) => {
 console.log('colorSelected  store_dejaSuivi  ' + props.store_dejaSuivi )
    if (idChapitre === id) { style = { backgroundColor: '#4297b6' } }
    else if (props.store_dejaSuivi.includes(idChapitre)) { style = { backgroundColor: '#f1f1f1' } }
    else { style = { backgroundColor: '#ffffff' } }
    return style;

  }

  // bulle info
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
  // bulle info
  function BootstrapTooltip(props) {
    const classes = useStylesBootstrap();
    return <Tooltip arrow classes={classes} {...props} />;
  }

  return (
    <div className={classes.root}>
      <div className={classes.stepper}>
        {chapitres.map((chapitre, ndx) => (
          <BootstrapTooltip key={ndx} title={chapitre[1].titre} placement="top">
            <Button className={classes.stepButton} key={chapitre[1].id}
              onClick={() => locateStepper(chapitre[1])}
              variant="outlined" color="#4297b6"
              style={colorSelected(chapitre[1].id)}
            >
            </Button>
          </BootstrapTooltip>
        ))}
      </div>
      <div className={classes.blockTitre}>
        <Typography className={classes.titre}>{props.store_chapitre.titre}</Typography>
      </div>
    </div>
  );
}

const mapStateToProps = ({ chapitreData, dejaSuivi }) => {
  return {
    store_chapitre: chapitreData.chapitreData,
    store_dejaSuivi: dejaSuivi.dejaSuivi,
  };
};

export default connect(mapStateToProps)(Stepper);
