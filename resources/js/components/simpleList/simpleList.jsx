import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import ListSubheader from '@material-ui/core/ListSubheader';
import Divider from '@material-ui/core/Divider';
import ArrowRight from '@material-ui/icons/ArrowRight';
import { connect } from 'react-redux';
import { getVideo } from "../redux/module/module.actions";

const useStyles = makeStyles((theme) => ({
  root: {
    width: 300,
    maxWidth: 300,
    minHeight: 350,
    paddingTop: 1,
    paddingBottom: 1,
    paddingLeft: 1,
    paddingRight: 1,
    backgroundColor: theme.palette.background.paper,
    boxShadow: "-4px 9px 25px -6px rgba(0, 0, 0, 0.1)",
    borderRadius: "0 0 10px 10px",
  },
  headerList: {
    backgroundColor: "white",
    padding: "20px",
    textAlign: "center",
    fontSize: "20px",
    lineHeight: "30px",
  },
  itemText: {
    paddingLeft: 15,
  }
}));


function SimpleList(props) {
  const classes = useStyles();
  const getVideo = props.getVideo;

  //envoi l'url de la vidéo dans le store
  const handleClick = (url_video) => {
    getVideo(url_video);
  };

  const [selectedIndex, setSelectedIndex] = React.useState(0);
//met en surbrillance l'item sélectionné dans la ListItem
  const handleListItemClick = (event, index) => {
    setSelectedIndex(index);
  };

  const initListItemClick = (event, index) => {
    setSelectedIndex(index);
  };

  //replace le selected sur le premier de la liste
  useEffect(() => {
    initListItemClick(null, props.init_index);
  },[props.chapitres]);

  return (
    <div className={classes.root}>
      <List component="nav"
        aria-label="main mailbox folders"
        // aria-labelledby="nested-list-subheader"
        subheader={
          <ListSubheader className={classes.headerList} component="div" id="nested-list-subheader">
            {props.chapitres[0] && props.chapitres[0][1].module_titre}
          </ListSubheader>
        }
      >
        <Divider />
        {/* ICI ON RECUPERE TOUS LES CHAPITRES ET ON LES DELIMITE AVEC LE MODULE_ID POUR PAGINER LA LISTE */}
        {props.chapitres.map((chapitre, index) => <li key={chapitre[1].id}>
          <ListItem button selected={selectedIndex === index} onClick={(event) => 
          {handleClick(chapitre[1].fichier_video);
           handleListItemClick(event, index);}}>
           {selectedIndex === index && <ArrowRight  className={classes.itemIcon} />}
            <ListItemText  className={classes.itemText} primary={chapitre[1].titre} />
          </ListItem>
          <Divider />
        </li>
        )}

      </List>

    </div>
  );
}

const mapStateToProps = ({ modules }) => {
  return {
    url_video: modules.url_video
  }
}

const mapDispatchToProps = (dispatch) => ({
  getVideo: (url_video) => dispatch(getVideo(url_video)),
});


export default connect(mapStateToProps, mapDispatchToProps)(SimpleList);