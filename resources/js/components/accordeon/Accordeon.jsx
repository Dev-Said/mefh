import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import store from '../redux/store'
import Typography from '@material-ui/core/Typography';
import { connect } from 'react-redux';
import { getVideo } from "../redux/module/module.actions";

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
  const getVideo = props.getVideo;
  // console.log(props);
  const handleClick = (url_video) => {
    // store.dispatch({ type: 'GET_VIDEO', url_video: url_video })
    getVideo(url_video);
  };

  return (
    <div className={classes.root}>
      {/* {console.log(props.chapitres)} */}
      {props.chapitres.map((chapitre, index) => <li key={chapitre[1].id}>
        <Typography variant="body1" gutterBottom onClick={() => handleClick(chapitre[1].fichier_video)}>
          {chapitre[1].titre}
        </Typography>
      </li>
      )}

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


export default connect(mapStateToProps, mapDispatchToProps)(ControlledAccordions);

// export default ControlledAccordions;

