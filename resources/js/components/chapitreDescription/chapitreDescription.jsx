import React from "react";
import { connect } from 'react-redux';
import ReactHtmlParser from 'react-html-parser';
import '../style/description.scss';
import './chapitreDescription.scss';
 


const ChapitreDescription = (props) => {

  // ReactHtmlParser permet d'afficher correctement du html provenant de ckeditor sans afficher les balises
  return (
    <div className="rootDescription">
      { ReactHtmlParser(props.description_chapitre.description) }
    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    description_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(ChapitreDescription);
