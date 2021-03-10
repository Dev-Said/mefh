import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import FormLabel from '@material-ui/core/FormLabel';
import FormControl from '@material-ui/core/FormControl';
import FormGroup from '@material-ui/core/FormGroup';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import FormHelperText from '@material-ui/core/FormHelperText';
import Checkbox from '@material-ui/core/Checkbox';
import Radio from '@material-ui/core/Radio';
import RadioGroup from '@material-ui/core/RadioGroup';
import axios from 'axios';
import Paper from '@material-ui/core/Paper';
import InputQuiz from '../formulaire/InputQuiz'
import { connect } from 'react-redux';
import Divider from '@material-ui/core/Divider';

const useStyles = makeStyles((theme) => ({
  root: {
    display: 'flex',
    width: '100%',
    paddingLeft: '10%',
    paddingRight: '10%',
    paddingBottom: '70px',
  },
  // formControl: {
  //   margin: theme.spacing(3),
  // },
  formLabel: {
    fontSize: '22px',
    fontWeight: 'bold',
    lineHeight: '30px',
    marginBottom: '20px',
    marginTop: '20px',
  },
  reponses: {
    fontSize: '16px',
    lineHeight: '22px',
  },
  paper: {
    width: '100%',
    paddingLeft: '10%',
    paddingRight: '10%',
    paddingBottom: '40px',
    paddingTop: '30px',
  },
  submitButton: {
    width: '120px',
    marginTop: '30px',
    paddingTop: '7px',
    paddingBottom: '7px',
    backgroundColor: 'black',
    color: 'white',
  }
}));


const Quiz = (props) => {
  const classes = useStyles();

  const [quizzes, setQuizzes] = useState([]);

  useEffect(() => {
    axios.get(`http://localhost:8000/quizzes/quizApi/${props.info_chapitre.module_id}`)
      .then(res => {
        setQuizzes(Object.entries(res.data));

      });
  }, []);

  // on récupère l'id de toutes les questions dans allQuestionsId pour pouvoir 
  // faire les validations en comparant le question_id de chaque reponse
  // au contenu de allQuestionsId. module_id doit apparaitre au moins
  // une fois pour chaque questions sinon invalidation

  var allQuestionsId = [];

  quizzes.map((quiz, index) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => allQuestionsId.indexOf(reponse.question_id) === -1
        && allQuestionsId.push(reponse.question_id))
    })
  }
  )

  var allIsCorrect = [];

  quizzes.map((quiz, index) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => allIsCorrect.push(reponse.is_correct))
    })
  }
  )

  var total = 0;
  // for (var i = 0; i < allIsCorrect.length; i++) {
  //   total += Number(isCorrect[i])
  // }

  // console.log('allQuestionsId    ' + allQuestionsId);
  // console.log('allIsCorrect    ' + allIsCorrect);
  // console.log('allIsCorrect.length    ' + allIsCorrect.length);
  // console.log('quiz    ' + props.info_chapitre.module_id);

  var userResponseId = [];

  function handleSubmit(event) {
    event.preventDefault();
    for (let i = 0; i <= event.target.length; i++) {
      if (event.target[i] && event.target[i].checked) {
        userResponseId.push(event.target[i].value)

      }
    }
    console.log('userResponseId    ' + userResponseId)
  }

  return (
    <div className={classes.root}>
      <Paper className={classes.paper}>
        <h1>{props.info_chapitre.module_titre}</h1>
        <form className={classes.container} onSubmit={handleSubmit} >
          {quizzes.map((quiz) =>
            <div key={quiz[1].id}>
              {quiz[1].questions.map(question =>
                <div><FormLabel className={classes.formLabel}>{question['question']}</FormLabel>
                  {question.reponses.map((reponse, ndx) => <InputQuiz typeInput={question.type}
                    value={reponse.reponse} name={reponse.question_id} ndx={ndx}
                    id={reponse.id}
                  />, <Divider />, <Divider />
                  )}
                </div>
              )}
            </div>
          )}
          <button className={classes.submitButton} type="submit" >Envoyer</button>
        </form>
      </Paper>
    </div >
  );
}


const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  }
}


export default connect(mapStateToProps)(Quiz);
