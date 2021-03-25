import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import axios from 'axios';
import SimpleList from '../simpleList/simpleList';
import BackNextButton from '../backNextButton/backNextButton';
import Button from '@material-ui/core/Button';
import CoursCompleted from '../coursCompleted/coursCompleted';


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
  },
  quiz: {
    width: 300,
    height: 50,
    marginTop: 20,
    "&:focus": {
      outline: 'none',
    },
    backgroundColor: '#ebebeb',
    // border: 'solid 1px #e22e59'
  },
}));

const ListeChapitres = (props) => {

  const classes = useStyles();
  const [chapitres, setChapitres] = useState([]);

  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi/${idFormation}`)
      .then(res => {
        setChapitres(Object.entries(res.data));     
      }).catch(function (error) {
        console.log('error:   ' + error);
      });
  }, []);

  return (
    <ul className="listeChapitres" >
      <BackNextButton chapitres={chapitres} />
      <SimpleList chapitres={chapitres} init_index={0} />
      <Button className={classes.quiz} onClick={() => props.handleQuizClick()}>
       Faire le quiz</Button>
       <CoursCompleted />
    </ul>
  )
}

export default ListeChapitres;
