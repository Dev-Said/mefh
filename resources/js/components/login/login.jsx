import React, { useState } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import axios from 'axios';
require('../../bootstrap');

const useStyles = makeStyles((theme) => ({
    root: {
        '& > *': {
            width: '80%',
            marginBottom: "15px",
        },
        display: "flex",
        flexDirection: "column",
        flexWrap: "nowrap",
        justifyContent: "space-arround",
        alignItems: "center",
        paddingBottom: "70px",
        "& .MuiFilledInput-root": {
            background: "rgb(232, 241, 250)"
        }
    },
    button: {
        width: "150px",
        height: "45px",
        marginTop: "20px",
    },
    input: {
        marginTop: "15px",
    }
}));

export default function Login(props) {
    const classes = useStyles();
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [check, setCheck] = useState('');


    const handleChangeEmail = (event) => {
        setEmail(event.target.value);
    };
    const handleChangePassword = (event) => {
        setPassword(event.target.value);
    };


    const handleSubmit = (event) => {
        event.preventDefault();
        var data = '';

        axios.post(`http://localhost:8000/checkUser`,
            { email: email, password: password }
        )
            .then(res => {
                data = res.data;
                console.log('data   ' + data);
                if(data != 'user not exist'){
                    axios.post(`http://localhost:8000/reponses_user`,
                    { resultat: props.resultat, id: data, quiz_id: props.quiz_id })
                    .then(function (response) {
                        console.log('success   ' + response.data);
                        document.getElementById("myModal2").style.display = "none";
                    })
                    .catch(function (error) {
                        console.log('probleme   ' + error);
                    });
                } else {
                    alert('Vos données sont incorrectes')
                }
                
            })
            .catch(function (error) {
                console.log('probleme   ' + error);
            });






    }

    // enlève la couleur de fond des inputs quand ils sont remplis
    const inputStyle = { WebkitBoxShadow: "0 0 0 1000px white inset" };

    return (
        <form className={classes.root} >
            <h2>Connexion</h2>
            <TextField id="email" label="Email" variant="outlined" onChange={handleChangeEmail}
                required className={classes.input} inputProps={{ style: inputStyle }} />
            <TextField id="password" label="Mot de passe" variant="outlined" type="password"
                onChange={handleChangePassword} required className={classes.input} inputProps={{ style: inputStyle }} />
            <Button type="submit" variant="outlined" className={classes.button} onClick={handleSubmit}>
                Envoyer
      </Button>
        </form>
    );
}


