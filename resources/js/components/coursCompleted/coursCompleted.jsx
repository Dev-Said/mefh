import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import { connect } from 'react-redux';
import axios from 'axios';


const useStyles = makeStyles(() => ({
  root: {
    marginTop: 50,
    width: 500,
  },
}));


const CoursCompleted = (props) => {
  const classes = useStyles();

  const handleClick = () => {
    axios.post(`http://localhost:8000/chapitreSuivi`,
        { id: auth[2], chapitre_id: props.info_chapitre.id })
        .then(function (response) {
          console.log('success   ' + response.data);
        })
        .catch(function (error) {
          console.log('erreur   ' + error);
        });

  }

  return (
    <div className={classes.root}>
      <Button onClick={handleClick} >
        J'ai terminé ce chapitre
          </Button>

    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(CoursCompleted);