import React, { useState, useEffect } from 'react';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import Stepper from '../stepper/stepper';
import ChapitreDescription from '../chapitreDescription/chapitreDescription';
import Quiz from '../quiz/quiz';
import axios from "axios";
import './modules.scss';
import '../quiz/quiz.scss';
import Links from '../liens/liens';
import Faq from '../faq/faq';
import Ressource from '../ressource/ressource';
import Certificat from '../certificat/certificat';



const Wrapper = () => {

  const [view, setView] = useState('formation');
  const [faqs, setFaqs] = useState([]);
  const [ressources, setRessources] = useState([]);
  const [certificats, setCertificats] = useState([]);

  useEffect(() => {
    axios.get(`http://localhost:8000/certificatsRes/${idFormation}`).then((res) => {
      setCertificats(Object.values(res.data));
    });
    axios.get(`http://localhost:8000/faqIndex/${idFormation}`).then((res) => {
      setFaqs(Object.values(res.data));
    });
    axios.get(`http://localhost:8000/ressourcesRes/${idFormation}`).then((res) => {
      setRessources(Object.values(res.data));
    });
  }, []);

  
  const handleView = (vue) => {
    setView(vue);
  }

  var compo;

  switch (view) {
    case 'quiz':
      compo = <Quiz handleView={handleView} />
      break;
    case 'formation':
      compo = [<Links faqs={faqs} ressources={ressources} certificats={certificats}
        handleView={handleView} />, <Stepper />,
      <Video />, <ListeChapitres handleView={handleView} />,
      <ChapitreDescription />]
      break;
    case 'ressource':
      compo = <Ressource ressources={ressources} handleView={handleView} />
      break;
    case 'faq':
      compo = <Faq faqs={faqs} handleView={handleView} />
      break;
    case 'certificat':
      compo = <Certificat certificats={certificats} handleView={handleView} />
      break;
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
