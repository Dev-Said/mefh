import React from 'react';

import axios from 'axios';

export default class ListeChapitres extends React.Component {
    constructor() {
        super();
        this.  state = {
            chapitres: []
          }
      }


  componentDidMount() {
    // axios.get(`http://localhost:8000/api/chapitre/5`)
    //   .then(res => { 
    //     const chapitres = res.data;
    //     this.setState({ chapitres });
    //   })

      fetch("http://localhost:8000/api/chapitre/5")
      .then((response) => response.json())
      .then((users) => this.setState({ chapitres: users })); 
  }

  render() {
    return (
      <ul>
        { this.state.chapitres.map(chapitre => <li>{chapitre.titre}</li>)}
      </ul>
    )
  }
}

