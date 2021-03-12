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
  },
  divid: {
    marginTop: '10px',
    marginBottom: '10px',
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

  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => allQuestionsId.indexOf(reponse.question_id) === -1
        && allQuestionsId.push(reponse.question_id))
    })
  }
  )

  var reponses_Questions = {};
  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => reponses_Questions[reponse.id] = question.id)
    })
  }
  )

  var obj = {};
  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => obj[reponse.id] = reponse.is_correct)
    })
  }
  )

  // var allresponseId = [];
  // quizzes.map((quiz) => {
  //   quiz[1].questions.map(question => {
  //     question.reponses.map((reponse) => allresponseId.push(reponse.id))
  //   })
  // }
  // )



  console.log(obj);
  console.log('allQuestionsId    ' + allQuestionsId);
  console.log(reponses_Questions);

  // fournie l'id de la question dont la réponse est en paramètre
  const getQuestion = (idReponse) => {
    var questId;
    for (var prop in reponses_Questions) {
      prop == idReponse && (questId = reponses_Questions[prop]);
    }
    return questId;
  }


  // fournie l'IsCorrect de la réponse en paramètre
  const getIsCorrect = (idReponse) => {
    // on crée un objet avec les is_correct de chaque réponse
    // pour récupérer is_correct avec le reponse.id
    var allIsCorrect = {};
    quizzes.map((quiz) => {
      quiz[1].questions.map(question => {
        question.reponses.map((reponse) => allIsCorrect[reponse.id] = reponse.is_correct)
      })
    }
    )
    var isCorrect;
    for (var prop in allIsCorrect) {
      prop == idReponse && (isCorrect = allIsCorrect[prop]);
    }
    return isCorrect;

  }


  // calcule la pondération de la valeur d'une réponse donnée
  const getCoefficient = (idReponse) => {
  // récupère le nombre de bonnes réponses par question
  var Questions_isCorrect = {};
  var tot = 0;
  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => tot += reponse.is_correct)
      Questions_isCorrect[question.id] = tot; tot = 0;
    })
  }
  )
    var questionId = getQuestion(idReponse)

    var coef = (1 / Questions_isCorrect[questionId])
    console.log('coef   ' + coef);

  }

  getCoefficient(11);

  console.log('getIsCorrect   ' + getIsCorrect(8));


  var userReponse = {};

  function handleSubmit(event) {
    event.preventDefault();
    for (var i = 0; i <= event.target.length; i++) {
      if (event.target[i] && event.target[i].checked) {
        userReponse[i] = event.target[i].value
       
      }
    }
 
    console.log(userReponse[1])
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
                    iscorrect={reponse.is_correct} value={reponse.reponse} name={reponse.question_id} ndx={ndx}
                    id={reponse.id}
                  />
                  )} <Divider />
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
