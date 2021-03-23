import React, { useState, useEffect } from "react";
import './quiz.scss';
import { makeStyles } from '@material-ui/core/styles';
import FormLabel from '@material-ui/core/FormLabel';
import axios from 'axios';
import Paper from '@material-ui/core/Paper';
import InputQuiz from '../formulaire/InputQuiz'
import { connect } from 'react-redux';
import Divider from '@material-ui/core/Divider';
import Button from '@material-ui/core/Button';
import ModalFooterButton from '../modalFooterButton/modalFooterButton';
import Register from '../register/register';

const useStyles = makeStyles((theme) => ({
  root: {
    display: 'flex',
    flexDirection: "column",
    flexWrap: "nowrap",
    justifyContent: "flex-start",
    alignItems: "center",
    width: '100%',
    paddingLeft: '10%',
    paddingRight: '10%',
    paddingBottom: '70px',
  },
  formLabel: {
    fontSize: '22px',
    fontWeight: 'bold',
    lineHeight: '30px',
    marginBottom: '20px',
    marginTop: '20px',
  },
  formLabelError: {
    color: 'red',
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
  },
  quizBackButton: {

  }
}));


const Quiz = (props) => {
  const classes = useStyles();
  const [quizzes, setQuizzes] = useState([]);
  const [score, setScore] = useState(0);
  const [messageScore, setMessageScore] = useState('');
  const [messageFooter, setMessageFooter] = useState('');
  const [titreButton1, setTitreButton1] = useState('');
  const [titreButton2, setTitreButton2] = useState('');
  const [functionModalButton, setFunctionModalButton] = useState('');
  const [idQuiz, setIdQuiz] = useState([]);

  useEffect(() => {
    axios.get(`http://localhost:8000/quizzes/quizApi/${props.info_chapitre.module_id}`)
      .then(res => {
        setQuizzes(Object.entries(res.data));
        setIdQuiz(res.data[0].questions[0].quiz_id);

      });
  }, []);
  console.log('quizzes   ' + idQuiz);
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
  // calcule la pondération de la valeur d'un point d'une réponse donnée
  // en divisant 1 par le nombre de bonnes réponses pour une question donnée
  const getCoefficient = (idReponse) => {
    var questionId = getQuestion(idReponse)
    var coef = (1 / Questions_isCorrect[questionId])
    console.log('coef   ' + coef);

    return coef;
  }

  // vérifie si on a répondu à toutes les questions 
  // sinon renvoi l'id des questions sans réponse 
  var questionMissing = [];
  const formValidation = (userRep) => {

    var userQuestion = [];
    for (let i = 0; i <= userRep.length - 1; i++) {
      userQuestion.push(getQuestion(userRep[i]))
    }
    for (let i = 0; i <= allQuestionsId.length - 1; i++) {
      !userQuestion.includes(allQuestionsId[i]) &&
        questionMissing.push(allQuestionsId[i])
    }
    //met en rouge les questions sans réponses
    if (questionMissing.length) {
      for (let i = 0; i <= questionMissing.length - 1; i++) {
        document.getElementById('questionId_' + questionMissing[i]).classList.add(classes.formLabelError);
      }

      //ouvre une modal pour signaler qu'il faut répondre à toutes les questions
      var modal = document.getElementById("myModal");
      modal.style.display = "block";

      var span = document.getElementsByClassName("close")[0];
      span.onclick = function () {
        modal.style.display = "none";
      }

      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    }
  }


  var userReponseVar = [];

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
        userReponseVar.push(event.target[i].value);
      }
    }
    formValidation(userReponseVar);

    // s'il n'y a pas de questions manquantes 
    // affiche une modal avec le score du quiz
    if (!questionMissing.length) {
      setScore(Math.ceil((total / allQuestionsId.length) * 100));
      console.log('score submit --->  ' + score);
      var scoreTest = Math.ceil((total / allQuestionsId.length) * 100);

      if (scoreTest >= 80) {
        setMessageScore('Félicitation, votre score est de ' + scoreTest + '%');
      }
      if (scoreTest < 80) {
        setMessageScore('Pour valider ce module vous devez obtenir un score de 80 % minimum. Votre score est de ' + scoreTest + '%');
      }

      setMessageFooter('Voulez-vous sauvegarder votre score ?');
      setTitreButton1('Enregistrer');
      setTitreButton2('Quitter');
      setFunctionModalButton('saveQuiz');
      handelModal();
    }
    questionMissing.length = 0;
  }

  // force le bon fonctionnement de la modal mYmodal2
  const closeModal = () => {
    document.getElementById("myModal2").style.display = "none";
    props.handleQuizClick();

  }

  // gère la sauvegarde des résultats du quiz
  const handleSaveQuiz = () => {
    if (auth == 0) {
      setMessageScore('vous devez être enregisté pour pouvoir sauvegarder vos résultats');
      setMessageFooter('Voulez-vous vous inscrire ?');
      setTitreButton1('S\'inscrire');
      setTitreButton2('Quitter');
      setFunctionModalButton('inscription');
      handelModal();
    } else {
      console.log('score --->  ' + score);
      axios.post(`http://localhost:8000/reponses_user`,
        { resultat: score, id: auth[2], quiz_id: idQuiz })
        .then(function (response) {
          console.log('success   ' + response.data);
          document.getElementById("myModal2").style.display = "none";
        })
        .catch(function (error) {
          console.log('probleme   ' + error);
        });
    }
  }

  const register = () => {
    setMessageScore('');
    handelModal();
  }

  // affiche et gère la modal
  const handelModal = () => {
    var modalScore = document.getElementById("myModal2");
    modalScore.style.display = "block";

    var span = document.getElementsByClassName("close2")[0];
    span.onclick = function () {
      modalScore.style.display = "none";
    }

    var button2 = document.getElementsByClassName("button2")[1];
    button2.onclick = function () {
      modalScore.style.display = "none";
      props.handleQuizClick();
    }

    window.onclick = function (event) {
      if (event.target == modalScore) {
        modalScore.style.display = "none";
      }
    }
  }


  return (
    <div className={classes.root}>

      {/* aafiche erreur quiz non complet */}
      <div id="myModal" class="modal">
        <div class="modal-content">
          <div class="headerModal"><span class="close">x</span></div>
          <p>Vous devez répondre à toutes les questions du quiz !</p>
          <div class="footerModal"></div>
        </div>
      </div>


      {/* affiche résultat du quiz */}
      <div id="myModal2" class="modal2">
        <div class="modal-content2">

          <div class="headerModal2"><span class="close2">x</span></div>
          <p> {messageScore} </p>
          {messageScore == '' ? <Register resultat={score} quiz_id={idQuiz} /> :
            <ModalFooterButton message={messageFooter}
              titre1={titreButton1} titre2={titreButton2}
              func={functionModalButton == 'saveQuiz' ? handleSaveQuiz : register}
              closeModal={closeModal}
            />}

        </div>
      </div>


      <div className="quizHeader">
        <Button onClick={() => props.handleQuizClick()} variant="contained" className="quizBackButton">
          Revenir sur la page de formation</Button>
      </div>


      <Paper className={classes.paper}>
        <h1>{props.info_chapitre.module_titre}</h1>
        <form className={classes.container} onSubmit={handleSubmit} >
          {quizzes.map((quiz) =>
            <div key={quiz[1].id}>
              {quiz[1].questions.map(question =>
                <div><FormLabel className={classes.formLabel} id={'questionId_' + question['id']}>
                  {question['question']}</FormLabel>
                  {question.reponses.map((reponse, ndx) => <InputQuiz typeInput={question.type}
                    iscorrect={reponse.is_correct} value={reponse.reponse}
                    name={reponse.question_id} ndx={ndx}
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
    </div>
  );
}


const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  }
}


export default connect(mapStateToProps)(Quiz);
