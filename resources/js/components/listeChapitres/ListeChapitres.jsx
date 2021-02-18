import React from 'react';
import axios from 'axios';
import ControlledAccordions from '../accordeon/Accordeon';


export default class ListeChapitres extends React.Component {
  constructor() {
    super();
    this.state = {
      modules: [],
    }
  }


  componentDidMount() {
    axios.get(`http://localhost:8000/modulesApi/1`)
      .then(res => {
        //Object.entries converti un objet en tableau
        const modules = Object.entries(res.data);

        this.setState({ modules: modules });

      })
  }

  render() {
    return (
      <ul>

        <ControlledAccordions modules={this.state.modules} />
      </ul>
    )
  }
}

