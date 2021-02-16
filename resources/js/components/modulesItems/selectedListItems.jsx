import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import Divider from '@material-ui/core/Divider';
import ArrowRight from '@material-ui/icons/ArrowRight';


const useStyles = makeStyles((theme) => ({
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


export default function SimpleList(props) {
  const classes = useStyles();

  return (
    <div className={classes.root}>
      <List component="nav" aria-label="main mailbox folders">
        <ListItem button onClick={() => props.handleClick(props.fichier_video)}>
          <ListItemIcon><ArrowRight /></ListItemIcon>
          <ListItemText primary={props.description} />
        </ListItem>
        <Divider />
      </List>

    </div>
  );
}