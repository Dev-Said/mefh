import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import { connect } from 'react-redux';
import axios from 'axios';
import store from '../redux/store';

const useStyles = makeStyles(() => ({
  root: {
    marginTop: 15,
    width: 500,
  }, quiz: {
    width: 300,
    height: 50,
    border: 'solid 1px blue',
    color: "blue",
  },
}));


const CoursCompleted = (props) => {
  const classes = useStyles();
  const [message, setMessage] = useState();
  var ordreChapitres = [];
  var id = '';
  var messageVar = props.store_dejaSuivi.includes(props.store_chapitre.id) ?
    "je n'ai pas terminé ce chapitre" :
    "J'ai terminé ce chapitre";

  useEffect(() => {
    setMessage(messageVar);
  });

  // gère le bouton "J'ai terminé ce chapitre"
  const handleClick = () => {
    axios.post(`${globalUrl}chapitreSuivi`,
      { id: auth[2], chapitre_id: props.store_chapitre.id })
      .then(function (response) {
        // met le stepper du chapitre en non terminé
        if (message == "je n'ai pas terminé ce chapitre") {
          var tab = props.store_dejaSuivi;
          var index = tab.indexOf(props.store_chapitre.id);
          if (index > -1) {
            tab.splice(index, 1);
          }
          setMessage("J'ai terminé ce chapitre");
          store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: tab });
        }
        // met le stepper du chapitre en terminé
        else if (message == "J'ai terminé ce chapitre") {
          var tab = props.store_dejaSuivi;
          tab.push(props.store_chapitre.id);
          setMessage("je n'ai pas terminé ce chapitre");
          store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: tab });

          // passe au chapitre suivant lorsqu'on clique sur "J'ai terminé ce chapitre"
          axios.get(`${globalUrl}modulesApi/${idFormation}`)
            .then(res => {
              var chapitres = Object.entries(res.data);
              var chap = {};
              var ordChap = {};

              // Pour faire avancer d'une case le stepper lorsqu'on clique sur j'ai terminé
              // ce chapitre il suffisait de fair ça:

              // const currentchapitres = chapitres.find(element => element[1].id == (props.store_chapitre.id + 1));
              // store.dispatch({ type: 'GET_CHAPITRE', chapitreData: currentchapitres[1] });

              // tous fonctionne bien en local mais en production ça ne marche pas
              // c'est pourquoi j'ai du faire tout ce qui suit

              // création d'un tableau d'objets contenant l'id de chaque chapitre
              // trié selon l'ordre voulu et un index qui servira d'ordre pour le 
              // passage d'un stepper à l'autre lorsqu'on clique sur "j'ai terminé ce chapitre"

              chapitres.map((chapitre, index) => {
                ordChap = Object.create(chap, {
                  id: {
                    value: chapitre[1].id
                  },
                });
                ordreChapitres.push(ordChap);
              })

              for (var i = 0; i < chapitres.length - 1; i++) {
                if (chapitres[i][1].id == (props.store_chapitre.id)) {
                  for (var j = 0; j < ordreChapitres.length - 1; j++) {
                    if (ordreChapitres[j].id == chapitres[i][1].id) {
                      id = ordreChapitres[j + 1].id;
                      for (var k = 0; k < chapitres.length - 1; k++) {
                        if (chapitres[k][1].id == id) {
                          const currentchapitres = chapitres[k][1];
                          store.dispatch({ type: 'GET_CHAPITRE', chapitreData: currentchapitres });
                          break;
                        }
                      }
                    }
                  }
                }
              }
            });
        }
        console.log('success   ' + response.data);
      })
      .catch(function (error) {
        console.log('erreur   ' + error);
      });

  }

  return (
    <div className={classes.root}>
      <Button onClick={handleClick} className={classes.quiz} variant="outlined">
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