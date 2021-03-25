import React, { useState } from 'react';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import Stepper from '../stepper/stepper';
import ChapitreDescription from '../chapitreDescription/chapitreDescription';
import Quiz from '../quiz/quiz';
import './modules.scss';
import '../quiz/quiz.scss';



const Wrapper = () => {

  const [isQuiz, setIsQuiz] = useState(false);

  const handleQuizClick = () => {
    isQuiz == true ? setIsQuiz(false) : setIsQuiz(true);
    // store.dispatch({ type: 'DEJA_SUIVI', dejaSuivi: dejaSuivi });
  }

  var compo;
  if (isQuiz) {
    compo = <Quiz handleQuizClick={handleQuizClick} />
  } else {
    compo = [<Stepper />, <Video />, <ListeChapitres handleQuizClick={handleQuizClick} />,
    <ChapitreDescription />]
  }

  return (
    <div className="contenaireModules">
      {compo}
    </div>
  )
}

export default Wrapper;
