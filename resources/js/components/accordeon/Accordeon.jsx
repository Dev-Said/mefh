import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import store from '../redux/store'
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import Divider from '@material-ui/core/Divider';


const useStyles = makeStyles((theme) => ({
  // root: {
  //   width: '90%',
  //   maxWidth: '90%',
  //   height: 'calc(100vh - 130px)',
  //   maxHeight: 'calc(100vh - 130px)',
  //   overflow: 'scroll',
  //   '&::-webkit-scrollbar': {
  //     width: '0',
  //     height: '0',
  //   },
  //   backgroundColor: '#fdfdfd',
  //   boxShadow: '0 0 0 0 ',
  // },
  root: {
    width: '100%',
    maxWidth: 500,
    paddingTop: 1,
    paddingBottom: 1,
    paddingLeft: 1,
    paddingRight: 1,
    backgroundColor: theme.palette.background.paper,
  },
}));

const ControlledAccordions = (props) => {
  const classes = useStyles();
  const [expanded, setExpanded] = React.useState(false);

  const handleClick = (url_video) => {
    store.dispatch({ type: 'GET_VIDEO', url_video: url_video })
  };

  return (
    <div className={classes.root}>
      <List aria-label="main mailbox folders">
        {props.modules.map((module, index) => <li key={module[1].moduleId}>
          <ListItem>
            <ListItemText primary={module[1].moduleTitre} />
          </ListItem>
          <ListItem button>
            {module.map((chapitre) =>
              <ListItemText key={++index} onClick={() => handleClick(chapitre.fichier_video)} primary={chapitre.chapitreDescription} />
            )}
          </ListItem>
          <Divider />
        </li>
        )}
      </List>
    </div>
  );
}

export default ControlledAccordions;

