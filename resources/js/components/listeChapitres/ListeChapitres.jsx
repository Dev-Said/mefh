import React, { useState, useEffect } from "react";
import axios from 'axios';
import SimpleList from '../simpleList/simpleList';
import BackNextButton from '../backNextButton/backNextButton';
import store from '../redux/store'

const ListeChapitres = (props) => {

  const [chapitres, setChapitres] = useState([]);
  const [chapitre, setChapitre] = useState(1);

  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`)
      .then(res => {
        setChapitres(Object.entries(res.data));     
      });
  }, []);

  return (
    <ul className="listeChapitres" >
      <BackNextButton chapitres={chapitres} />
      <SimpleList chapitres={chapitres} init_index={0} />
    </ul>
  )
}

export default ListeChapitres;
