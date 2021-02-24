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
  }
}));

const Stepper = (props) => {
  const classes = useStyles();
  const [modules, setModules] = useState([]);
  // const [titreChapitre, setTitreChapitre] = useState('');
  const [chapitre_id, setChapitre_id] = useState(0);
  const [chapitres, setChapitres] = useState([]);
  // titreChapitre !== props.titreChapitre && setTitreChapitre(props.titreChapitre);
  chapitre_id !== props.chapitre_id && setChapitre_id(props.chapitre_id);
  chapitres !== props.chapitres && setChapitres(props.chapitres);

 

  useEffect(() => {
    let one = 'http://localhost:8000/modulesApi'
    let two = 'http://localhost:8000/modulesApi/' + chapitre_id 
    // console.log(two);
    const requestOne = axios.get(one);
    const requestTwo = axios.get(two);

    axios.all([requestOne, requestTwo]).then(axios.spread((...responses) => {
      const modulesData = Object.entries(responses[0].data);
      setModules(modulesData);
      const chapitresData = Object.entries(responses[1].data);
      setChapitres(chapitresData.titre);
      // console.log(chapitresData[0]);
    })).catch(errors => {
      // errors
    })

  }, [props.chapitre_id]);




  const salut = (x) => {
    alert(x);
  };

  return (
    <div className={classes.root}>

      <div>
        {modules.map((module) => (
          <Button key={module.moduleId} onClick={() => salut(module[1].moduleTitre)} variant="outlined" color="primary" size="small" >
            {/* {module[1].moduleTitre} */}
            1
          </Button>

        ))}
      </div>

      <div>
        {/* <Typography className={classes.instructions}>{getStepContent(activeStep)}</Typography> */}
        <Typography className={classes.instructions}></Typography>
      </div>
    </div>
  );
}


// const mapStateToProps = ({ chapitreTitre }) => {
//   return {
//     titreChapitre: chapitreTitre.titreChapitre
//   }
// }

const mapStateToProps = ({ stepper }) => {
  return {
    chapitre_id: stepper.chapitre_id

  };
};

export default connect(mapStateToProps)(Stepper);
// export default Stepper;