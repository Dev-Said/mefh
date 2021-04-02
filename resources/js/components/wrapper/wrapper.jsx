import React, { useState } from 'react';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import Stepper from '../stepper/stepper';
import ChapitreDescription from '../chapitreDescription/chapitreDescription';
import Quiz from '../quiz/quiz';
import './modules.scss';
import '../quiz/quiz.scss';
import Links from '../liens/liens';
import Faq from '../faq/faq';
import Ressource from '../ressource/ressource';

const Wrapper = () => {

  // const [isQuiz, setIsQuiz] = useState(false);
  const [view, setView] = useState('formation');

  // const handleQuizClick = () => {
  //   isQuiz == true ? setIsQuiz(false) : setIsQuiz(true);
  // }

  // var compo;
  // if (isQuiz) {
  //   compo = <Quiz handleQuizClick={handleQuizClick} />
  // } else {
  //   compo = [<Links />, <Stepper />, <Video />, <ListeChapitres handleQuizClick={handleQuizClick} />,
  //   <ChapitreDescription />]
  // }


  const handleView = (vue) => {
    setView(vue);
  }

  var compo;

  switch (view) {
    case 'quiz':
      compo = <Quiz handleView={handleView} />
      break;
    case 'formation':
      compo = [<Links handleView={handleView} />, <Stepper />,
      <Video />, <ListeChapitres handleView={handleView} />,
      <ChapitreDescription />]
      break;
    case 'ressource':
      compo = <Ressource handleView={handleView} />
      break;
    case 'faq':
      compo = <Faq handleView={handleView} />
      break;
    // case 'certificat':
    //   compo = <Quiz handleView={handleView} />
    //   break;
    default:
      compo = [<Links handleView={handleView} />, <Stepper />,
      <Video />, <ListeChapitres handleView={handleView} />,
      <ChapitreDescription />]
  }

  return (
    <div className="contenaireModules">
      {compo}
    </div>
  )
}

export default Wrapper;
