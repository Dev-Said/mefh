import React from 'react';
import axios from 'axios';
import ControlledAccordions from '../accordeon/Accordeon';

export default class ListeChapitres extends React.Component {
    constructor() {
        super();
        this.state = {
            chapitres: []
          }
      }


  componentDidMount() {
    axios.get(`http://localhost:8000/api/module`)
    .then(res => {
      //Object.values converti objet en tableau
      const chapitres = Object.values(res.data);
      // const chapitres = res.data;
      console.log(chapitres);
      this.setState({ chapitres: chapitres });
    })
}

  render() {
    return (
      <ul>
        <ControlledAccordions chapitres = {this.state.chapitres} />
      </ul>
    )
  }
}

