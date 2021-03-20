import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import { toArray } from 'lodash';

const useStyles = makeStyles(() => ({
  root: {
      marginTop: 50,
      width: 500,
  },
}));


const handleClick = () => {
  alert(auth);
        
    }

    console.log(auth);
const ContainedButtons = () => {
  const classes = useStyles();

  return (
    <div className={classes.root}>
              <Button onClick={handleClick} >
              Indiquer que ce chapitre a été suivi
          </Button>

    </div>
  );
}

export default ContainedButtons;