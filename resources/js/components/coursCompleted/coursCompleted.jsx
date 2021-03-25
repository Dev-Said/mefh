import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import { connect } from 'react-redux';
import axios from 'axios';
import store from '../redux/store';

const useStyles = makeStyles(() => ({
  root: {
    marginTop: 50,
    width: 500,
  },
}));


const CoursCompleted = (props) => {
  const classes = useStyles();

  var message = props.store_dejaSuivi.includes(props.store_chapitre.id) ?
    "je n'ai pas terminé ce chapitre" :
    "J'ai terminé ce chapitre"

  const handleClick = () => {
    axios.post(`http://localhost:8000/chapitreSuivi`,
      { id: auth[2], chapitre_id: props.store_chapitre.id })
      .then(function (response) {
        if (message == "je n'ai pas terminé ce chapitre") {
          var tab = props.store_dejaSuivi;
          var index = tab.indexOf(props.store_chapitre.id);
          if (index > -1) {
            tab.splice(index, 1);
          }
          store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: tab });
        }
        else if (message == "J'ai terminé ce chapitre") {
          var tab = props.store_dejaSuivi;
          tab.push(props.store_chapitre.id);
          store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: tab });
        }
        console.log('success   ' + response.data);
      })
      .catch(function (error) {
        console.log('erreur   ' + error);
      });

  }

  return (
    <div className={classes.root}>
      <Button onClick={handleClick} >
        {message}
      </Button>

    </div>
  );
}

const mapStateToProps = ({ chapitreData, dejaSuivi }) => {
  return {
    store_chapitre: chapitreData.chapitreData,
    store_dejaSuivi: dejaSuivi.dejaSuivi,
  };
};

export default connect(mapStateToProps)(CoursCompleted);