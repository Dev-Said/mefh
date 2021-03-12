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
console.log('length    ' + allQuestionsId.length)
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

  // crée un objet avec toutes les reponse.id comme clé et les  question.id comme value
  var reponses_Questions = {};
  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => reponses_Questions[reponse.id] = question.id)
    })
  }
  )
  // fournie l'id de la question dont la réponse est en paramètre
  const getQuestion = (idReponse) => {
    var questId;
    for (var prop in reponses_Questions) {
      prop == idReponse && (questId = reponses_Questions[prop]);
    }
    return questId;
  }

  // on crée un objet avec les is_correct de chaque réponse
  // pour récupérer is_correct avec le reponse.id
  var allIsCorrect = {};
  quizzes.map((quiz) => {
    quiz[1].questions.map(question => {
      question.reponses.map((reponse) => allIsCorrect[reponse.id] = reponse.is_correct)
    })
  }
  )
  // fournie l'IsCorrect de la réponse donnée en paramètre
  const getIsCorrect = (idReponse) => {

    var isCorrect;
    for (var prop in allIsCorrect) {
      prop == idReponse && (isCorrect = allIsCorrect[prop]);
    }
    return isCorrect;

  }

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
  // calcule la pondération de la valeur des points d'une réponse donnée
  const getCoefficient = (idReponse) => {
    var questionId = getQuestion(idReponse)
    var coef = (1 / Questions_isCorrect[questionId])
    console.log('coef   ' + coef);

    return coef;
  }

  // vérifie que toutes les questions ont au moins une réponse
  const formValidation = () => {
    var questionMissing = [];
    for(let i = 0; i <= userReponse.length; i++){
      
      !allQuestionsId.includes(getQuestion(userReponse[i])) && questionMissing;
    }
    console.log('questionMissing   ' + questionMissing);
  }
  var userReponse = [];
  function handleSubmit(event) {
    event.preventDefault();

    var coef;
    var isCorret;
    var total = 0;
    for (let i = 0; i <= event.target.length; i++) {
      if (event.target[i] && event.target[i].checked) {
        coef = getCoefficient(event.target[i].value);
        isCorret = getIsCorrect(event.target[i].value);
        total += (coef * isCorret);
      }
    }
    userReponse = event.target.value;
    formValidation();
    console.log('userReponse    ' + userReponse)
    console.log('total    ' + total)
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
