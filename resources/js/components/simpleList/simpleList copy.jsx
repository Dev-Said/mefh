import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListSubheader from '@material-ui/core/ListSubheader';
import Divider from '@material-ui/core/Divider';
import ArrowRight from '@material-ui/icons/ArrowRight';
import { connect } from 'react-redux';
import { getVideo } from "../redux/video/video.actions";
import store from '../redux/store'

const useStyles = makeStyles((theme) => ({
  root: {
    width: 300,
    maxWidth: 300,
    minHeight: 400,
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


const  SimpleList = (props) => {
  const classes = useStyles();
  const getVideo = props.getVideo;

  // envoi le chapitre en cours pour stepper quand on clique dans la liste
  const handleClick2 = (chapitre) => {
    store.dispatch({ type: 'GET_CHAPITRE', chapitreData: chapitre });
  };

  //met en surbrillance l'item sélectionné dans la ListItem
  const [selectedIndex, setSelectedIndex] = useState(0);
  const SelectedClick = (event, index) => {
    setSelectedIndex(index);
  };

  // sélectionne et met en surbrillance le premier de la liste lors du premier chargement  
  useEffect(() => {
    initListItemClick(null, props.init_index);
  }, []);

  useEffect(() => {
    initListItemClick(null, props.info_chapitre.ordre);
    // store.dispatch({ type: 'GET_VIDEO', url_video: props.info_chapitre.fichier_video });
                                      //  console.log('ordre  simpleListe ' + props.info_chapitre.ordre)
  }, [props.info_chapitre.ordre]);

  const initListItemClick = (event, index) => {
    setSelectedIndex(index - 1);
  };

  // sélectionne uniquement les chapitres dont le module_id est = props.module_id
  // cela permet de n'afficher dans la liste que les chapitres d'un module donné
  const chapitres = props.chapitres.filter(chapitre => chapitre[1].module_id === props.module_id);

  return (
    <div className={classes.root}>
      <List component="nav"
        aria-label="main mailbox folders"
        // aria-labelledby="nested-list-subheader"
        subheader={
          <ListSubheader className={classes.headerList} component="div" id="nested-list-subheader">
            {chapitres[0] && chapitres[0][1].module_titre}
          </ListSubheader>
        }
      >
        <Divider />
        {chapitres.map((chapitre, index) => <li key={chapitre[1].id}>
          <ListItem button selected={selectedIndex === index} onClick={(event) => {
            handleClick2(chapitre[1]);
            SelectedClick(event, index);
          }}>
            {selectedIndex === index && <ArrowRight className={classes.itemIcon} />}
            <ListItemText className={classes.itemText} primary={chapitre[1].titre} />
          </ListItem>
          <Divider />
        </li>
        )}
      </List>
    </div>
  );
}

const mapStateToProps = ({ modules, videos, chapitreData }) => {
  return {
    module_id: modules.module_id,
    info_chapitre: chapitreData.chapitreData,
  }
}


export default connect(mapStateToProps)(SimpleList);