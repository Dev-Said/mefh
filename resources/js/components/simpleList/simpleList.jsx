import React, { useEffect } from "react";
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


function SimpleList(props) {
  const classes = useStyles();
  const getVideo = props.getVideo;

  //envoi l'url de la vidéo dans le store quand on clique dans la liste
  const handleClick = (url_video) => {
    getVideo(url_video);   
  };

  const handleClick2 = (chapitre_titre) => {
    store.dispatch({ type: 'GET_CHAPITRE', titre: chapitre_titre });
    // console.log(chapitre_titre);
  };

  const [selectedIndex, setSelectedIndex] = React.useState(0);
  //met en surbrillance l'item sélectionné dans la ListItem
  const handleListItemClick = (event, index) => {
    setSelectedIndex(index);
  };

  //sélectionne et met en surbrillance le premier de la liste quand on change de module  
  useEffect(() => {
    initListItemClick(null, props.init_index);
  }, [props.module_id]);

  const initListItemClick = (event, index) => {
    setSelectedIndex(index);
  };

  //sélectionne uniquement les chapitres dont le module_id est = props.module_id
  //cela permet de n'afficher dans la liste que les chapitres d'un module donné
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
            handleClick(chapitre[1].fichier_video);
            handleClick2(chapitre[1].titre);
            handleListItemClick(event, index);
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

const mapStateToProps = ({ videos }) => {
  return {
    url_video: videos.url_video
  }
}

const mapDispatchToProps = (dispatch) => ({
  getVideo: (url_video) => dispatch(getVideo(url_video)),
});


export default connect(mapStateToProps, mapDispatchToProps)(SimpleList);