import React, { useState, useEffect } from "react";
import axios from 'axios';
import { connect } from 'react-redux';
import SimpleList from '../simpleList/simpleList';
import BackNextButton from '../backNextButton/backNextButton';

const ListeChapitres = (props) => {

  const [chapitre_id, setChapitre_id] = useState(0);
  const [chapitres, setChapitres] = useState([]);

  //chapitre_id est màj que si props.chapitre_id a changé
  //pour pas créer de boucle infinie
  //cela permet de changer de module quand BackNextButton est cliqué
  chapitre_id !== props.chapitre_id && setChapitre_id(props.chapitre_id);

  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi/${chapitre_id}}`)
      .then(res => {
        setChapitres(Object.entries(res.data));
      });
  }, [props.chapitre_id]); //useEffect est déclenché si [props.chapitre_id] change

  return (
    <ul className="listeChapitres" >
      <BackNextButton />
      <SimpleList chapitres={chapitres} init_index={0} />
    </ul>
  )
}

const mapStateToProps = ({ stepper }) => {
  return {
    chapitre_id: stepper.chapitre_id

  };
};

export default connect(mapStateToProps)(ListeChapitres);
