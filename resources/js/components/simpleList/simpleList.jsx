import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListSubheader from '@material-ui/core/ListSubheader';
import Divider from '@material-ui/core/Divider';
import ArrowRight from '@material-ui/icons/ArrowRight';
import { connect } from 'react-redux';
import store from '../redux/store'



const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
    minHeight: 400,
    paddingTop: 1,
    paddingBottom: 1,
    paddingLeft: 1,
    paddingRight: 1,
    backgroundColor: "#fafafa;",
    boxShadow: "rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px",
    borderRadius: "0 0 5px 5px",
     },
  headerList: {
    backgroundColor: "#fafafa;",
    padding: "20px",
    textAlign: "center",
    fontSize: "20px",
    lineHeight: "30px",
    color: "#0f5f91",
    fontWeight: "bold",
  },
  itemText: {
    paddingLeft: 15,
    color: "#0f5f91",
    fontSize: "17px",
  },
  quiz: {
    width: 300,
    height: 50,
    "&:focus": {
      outline: 'none',
    },
  },
}));


const SimpleList = (props) => {
  const classes = useStyles();

  // envoi le chapitre en cours pour stepper quand on clique dans la liste
  const handleClick = (chapitre) => {
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

  // sélectionne l'item qui correspond à info_chapitre.ordre dans la liste
  useEffect(() => {
    initListItemClick(null, props.info_chapitre.ordre);
  }, [props.info_chapitre.ordre]);

  const initListItemClick = (event, index) => {
    setSelectedIndex(index - 1);
  };


  // si il y a un module_id dans le store on sélectionne uniquement les chapitres 
  // dont le module_id est = module_id si il n'y en a pas alores on sélectionne les 
  // chapitres dont le module_id est = 1
  // cela permet de n'afficher dans la liste que les chapitres d'un module donné
  var idList = props.info_chapitre.module_id ? props.info_chapitre.module_id : 1;
  const chapitres = props.chapitres.filter(chapitre => chapitre[1].module_id === idList);

  return (
    <div className={classes.root}>
      <List component="nav"
        aria-label="main mailbox folders"
        subheader={
          <ListSubheader className={classes.headerList} component="div" id="nested-list-subheader">
            {chapitres[0] && chapitres[0][1].module_titre}
          </ListSubheader>
        }
      >
        <Divider />
          {chapitres.map((chapitre, index) => <div key={chapitre[1].id}>
            <ListItem button selected={selectedIndex === index} onClick={(event) => {
              handleClick(chapitre[1]);
              SelectedClick(event, index);
            }}>
              {selectedIndex === index && <ArrowRight className={classes.itemIcon} />}
              <ListItemText className={classes.itemText} primary={chapitre[1].titre} />
            </ListItem>
            <Divider />
          </div>
          )}
      </List>
    </div>
  );
}

const mapStateToProps = ({ chapitreData }) => {
  return {
    info_chapitre: chapitreData.chapitreData,
  }
}


export default connect(mapStateToProps)(SimpleList);