import React, { useState, useEffect } from "react";
import axios from 'axios';
import { connect } from 'react-redux';
import SimpleList from '../simpleList/simpleList';
import BackNextButton from '../backNextButton/backNextButton';

const ListeChapitres = (props) => {

  const [chapitres, setChapitres] = useState([]);
 
   useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`)
      .then(res => {
        setChapitres(Object.entries(res.data));   
      });
  }, []); 
  

   return (
    <ul className="listeChapitres" >
      <BackNextButton chapitres={chapitres} />
      <SimpleList chapitres={chapitres} module_id={props.module_id}  init_index={0}/>
    </ul>
  )
}

const mapStateToProps = ({ modules }) => {
  return {
    module_id: modules.module_id

  };
};

export default connect(mapStateToProps)(ListeChapitres);
