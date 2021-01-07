import React from 'react';
import axios from 'axios';
import ControlledAccordions from '../accordeon/Accordeon';


export default class ListeChapitres extends React.Component {
    constructor() {
        super();
        this.state = {
            modules: []
          }
      }


  componentDidMount() {
    axios.get(`http://localhost:8000/api/module`)
    .then(res => {
      //Object.values converti objet en tableau
      const modules = Object.values(res.data);
      // console.log(modules);
      this.setState({ modules: modules });
    })
}

  render() {
    return (
      <ul>
        <ControlledAccordions modules = {this.state.modules} />
      </ul>
    )
  }
}

