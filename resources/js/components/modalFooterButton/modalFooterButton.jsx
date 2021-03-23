import React from 'react';
import { makeStyles, withStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';

const useStyles = makeStyles((theme) => ({
  root: {
    '& > *': {
      margin: theme.spacing(1),
    },
    width: "100%",
    height: "80px",
    backgroundColor: "#8cb393",
    display: "flex",
    justifyContent: "flex-end",
    alignItems: "center",
    paddingRight: "20px",
    color: "white",
    fontSize: "18px",
  },
  button: {
    padding: "15px",
  }
}));


const BootstrapButton = withStyles({
  root: {
    boxShadow: 'none',
    textTransform: 'none',
    fontSize: 16,
    padding: '6px 22px',
    border: '1px solid',
    lineHeight: 1.5,
    backgroundColor: 'white',
    borderColor: 'white',
    fontFamily: [
      'Roboto',
      '"Helvetica Neue"',
      'Arial',
    ].join(','),
    '&:hover': {
      backgroundColor: 'white',
      borderColor: 'white',
      boxShadow: 'none',
    },
    '&:active': {
      boxShadow: 'none',
      backgroundColor: 'white',
      borderColor: 'white',
    },
    '&:focus': {
      boxShadow: '0 0 0 0.2rem rgba(0,123,255,.5)',
    },
  },
})(Button);

export default function ModalFooterButton(props) {
  const classes = useStyles();

  return (
    <div className={classes.root}>
    <p> { props.message } </p>
      <BootstrapButton variant="contained" onClick={() => props.func()}>
        { props.titre1 }
      </BootstrapButton>
      <BootstrapButton variant="contained" onClick={() => props.closeModal()}>
      { props.titre2 }
      </BootstrapButton>

    </div>
  );
}