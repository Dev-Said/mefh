import React, { useState, useEffect } from "react";
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import axios from "axios";

const useStyles = makeStyles((theme) => ({
  root: {
    width: '100%',
  },
  stepButton: {
    height: 20,
    width: 30,
  }
}));

const Stepper = (props) => {
  const classes = useStyles();
  const [modules, setModules] = useState([]);
  const [module_id, setModule_id] = useState(1);

  module_id !== props.module_id && setModule_id(props.module_id);
  
  useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`)
      .then(res => {
        setModules(Object.entries(res.data));  
      });
  }, [props.module_id]);  
  
   const salut = (x) => {
    alert(x);
  };
 
  return (
    <div className={classes.root}>

      <div>
        {modules.map((module) => (
          <Button className={classes.stepButton} key={module.module_id}
            onClick={() => salut(module[1].titre)}
            variant="outlined" color="primary" >
            {/* {module[1].module_titre} */}
            {/* 1 */}
          </Button>

        ))}
      </div>

      <div>
        <Typography className={classes.instructions}>{props.titre_chapitre[0]}</Typography>
        <Typography className={classes.instructions}></Typography>
      </div>
    </div>
  );
}

const mapStateToProps = ({ modules, chapitreData }) => {
  return {
    module_id: modules.module_id,
    titre_chapitre: chapitreData.chapitreData,
  };
};

export default connect(mapStateToProps)(Stepper);
