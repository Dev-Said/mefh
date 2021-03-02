import React from "react";
import { makeStyles } from '@material-ui/core/styles';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
  },
}));

const ChapitreDescription = (props) => {
  const classes = useStyles();

  return (
    <div className={classes.root}>
      <Typography className={classes.instructions}>{props.description_chapitre.description}</Typography>
    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    description_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(ChapitreDescription);
