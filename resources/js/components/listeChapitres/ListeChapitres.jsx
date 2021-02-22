import React, { useState, useEffect } from "react";
import axios from 'axios';
import ControlledAccordions from '../accordeon/Accordeon';
import { connect } from 'react-redux';

const ListeChapitres = (props) => {

  const [module_id, setModule_id] = useState(1);
  const [chapitres, setChapitres] = useState([]);

  module_id !== props.module_id && setModule_id(props.module_id);

  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi/${module_id}}`)
      .then(res => {
        setChapitres(Object.entries(res.data));
        { console.log('didmount') }
      });
  }, [props.module_id]);

  return (
    <ul className="listeChapitres" >
      {/* { console.log(chapitres)} */}
      { console.log(props.module_id)}
      <ControlledAccordions chapitres={chapitres} />
    </ul>
  )
}

const mapStateToProps = ({ stepper }) => {
  return {
    module_id: stepper.module_id

  };
};

export default connect(mapStateToProps)(ListeChapitres);