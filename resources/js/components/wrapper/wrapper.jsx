import React, { useState } from 'react';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import Stepper from '../stepper/stepper';
import ChapitreDescription from '../chapitreDescription/chapitreDescription';
import ContainedButtons from '../coursCompleted/coursCompleted';
import Quiz from '../quiz/quiz';
import './modules.scss';


const Wrapper = () => {

  const [isQuiz, setIsQuiz] = useState(false);
  // const [compo, setCompo] = useState();


  const handleQuizClick = () => {
    setIsQuiz(true);
  }

  const handleVideoClick = () => {
    setIsQuiz(false);
  }

  var compo;
  if (isQuiz) {
    compo = <Quiz />
  } else {
    compo = [<Stepper />, <Video />, <ListeChapitres handleQuizClick={handleQuizClick} />, <ChapitreDescription />, 
      <ContainedButtons />]
  }

  return (
    <div className="contenaireModules">
      {/* <Stepper /> */}
      {compo}
      {/* <ListeChapitres handleQuizClick={handleQuizClick} /> */}

      
      {/* <ChapitreDescription />
      <ContainedButtons /> */}
    </div>
  )
}

export default Wrapper;
