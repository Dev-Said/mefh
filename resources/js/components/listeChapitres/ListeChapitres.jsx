import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import axios from 'axios';
import SimpleList from '../simpleList/simpleList';
import BackNextButton from '../backNextButton/backNextButton';
import Button from '@material-ui/core/Button';
import { connect } from 'react-redux';
import './ListeChapitres.scss';


const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
  },
  headerList: {
    backgroundColor: "white",
    padding: "20px",
    textAlign: "center",
    fontSize: "20px",
    lineHeight: "30px",
  },
  itemText: {
    paddingLeft: 15,
  },
  quiz: {
    width: '100%',
    height: 50,
    marginTop: 20,
    color: "#0F5F91",
    fontWeight: "bold",
    backgroundColor: "#fafafa",
    boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
  },
}));

const ListeChapitres = (props) => {

  const classes = useStyles();
  const [chapitres, setChapitres] = useState([]);
  const [quiz, setQuiz] = useState([]);


  // idFormation est injecté dans la page indexFormations
  // dans laquelle s'affichent les composants
  useEffect(() => {
    axios.get(`${globalUrl}modulesApi/${idFormation}`)
      .then(res => {
        setChapitres(Object.entries(res.data));
      }).catch(function (error) {
        console.log('error:   ' + error);
      });
  }, []);

  // récupère le quiz du module s'il y en a pour afficher le 
  // bouton faire le quiz. Sinon on affiche pas le bouton
  useEffect(() => {
    axios.get(`${globalUrl}quizzes/quizApi/${props.info_chapitre.module_id}`)
      .then(res => {
        setQuiz(Object.values(res.data));
      });
  }, [props.info_chapitre.module_id]);



  return (
    <div className="liste_chapitres">
      <div className={classes.root} >
        <BackNextButton chapitres={chapitres} currentChap={1} localiz={props.localiz} />
        <SimpleList chapitres={chapitres} init_index={0} />
        {quiz != 'hide' ?
          <Button className={classes.quiz}  onClick={() => props.handleView('quiz')}>
            {props.localiz['btnquiz']}</Button> : ''
        }
        {/* {auth[2] && <CoursCompleted localiz={props.localiz} />}
        <Social /> */}
      </div>
    </div>
  )
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  }
}


export default connect(mapStateToProps)(ListeChapitres);