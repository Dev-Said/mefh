import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import store from '../redux/store'
import Typography from '@material-ui/core/Typography';

const useStyles = makeStyles((theme) => ({
  root: {
    '& > *': {
      margin: theme.spacing(1),
      height: '40px',
      'max-width': '300px',
      marging: '15px',
      background: '#ffffff',
    },
    '&:hover': {
      cursor: 'pointer',
    }
  },
}));

const ControlledAccordions = (props) => {
  const classes = useStyles();

  const handleClick = (url_video) => {
    store.dispatch({ type: 'GET_VIDEO', url_video: url_video })
  };

  return (
    <div className={classes.root}>

      {props.modules.map((module, index) => <li key={module[1].id}>
        <Typography variant="body1" gutterBottom onClick={() => handleClick(module[1].fichier_video)}>
          {module[1].titre}
        </Typography>
      </li>
      )}

    </div>
  );
}

export default ControlledAccordions;

