import React from 'react';
import axios from 'axios';
import ControlledAccordions from '../accordeon/Accordeon';
import { connect } from 'react-redux';


class ListeChapitres extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      chapitres: [],
      module: 1,
    }
  }

  // componentDidMount() {
    
  //   // this.setState({ module: this.props.module_id });
  //   axios.get(`http://localhost:8000/modulesApi/${this.props.module_id}}`)
  //     .then(res => {
  //       //Object.entries converti un objet en tableau
  //       const chapitres = Object.entries(res.data);

  //       this.setState({ chapitres: chapitres });

  //     })
  // }
  
  render() {
    axios.get(`http://localhost:8000/modulesApi/${this.props.module_id}}`)
      .then(res => {
        //Object.entries converti un objet en tableau
        const chapitres = Object.entries(res.data);

        this.setState({ chapitres: chapitres });

      })

    // console.log(this.props);
    return (
      <ul className="listeChapitres">
        <ControlledAccordions chapitres={this.state.chapitres} />
      </ul>
    )
  }
}

const mapStateToProps = ({ stepper }) => {
  return {
    module_id: stepper.module_id
    
  };
};

export default connect(mapStateToProps)(ListeChapitres);