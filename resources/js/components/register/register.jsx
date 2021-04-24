import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import InputLabel from '@material-ui/core/InputLabel';
import MenuItem from '@material-ui/core/MenuItem';
import Select from '@material-ui/core/Select';
import FormControl from '@material-ui/core/FormControl';
import axios from 'axios';


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
        width: "auto",
        height: "45px",
        marginTop: "20px",
    },
    input: {
        marginTop: "15px",
    }
}));

export default function Register(props) {
    const classes = useStyles();
    const [nom, setNom] = React.useState('');
    const [prenom, setPrenoom] = React.useState('');
    const [email, setEmail] = React.useState('');
    const [sexe, setSexe] = React.useState('');
    const [password, setPassword] = React.useState('');

    const handleChangeNom = (event) => {
        setNom(event.target.value);
    };
    const handleChangePrenom = (event) => {
        setPrenoom(event.target.value);
    };
    const handleChangeEmail = (event) => {
        setEmail(event.target.value);
    };
    const handleChangeSexe = (event) => {
        setSexe(event.target.value);
    };
    const handleChangePassword = (event) => {
        setPassword(event.target.value);
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        var admin = 0;
        axios.post(`${globalUrl}usersFromQuizForm`,
            { nom: nom, prenom: prenom, email: email, sexe: sexe, password: password, admin: admin })
            .then(function (response) {
                axios.post(`${globalUrl}reponses_user`,
                    { resultat: props.resultat, id: response.data, quiz_id: props.quiz_id })
                    .then(function (response) {
                        console.log('success   ' + response.data);
                        document.getElementById("myModal2").style.display = "none";
                    })
                    .catch(function (error) {
                        console.log('probleme   ' + error);
                    });
            })
            .catch(function (error) {
                console.log('probleme   ' + error);
            });

    }

    // enlève la couleur de fond des inputs quand ils sont remplis
    const inputStyle = { WebkitBoxShadow: "0 0 0 1000px white inset" };

    return (
        <form className={classes.root} onSubmit={handleSubmit}>
            <h2>Inscription</h2>
            <TextField id="nom" label="Nom" variant="outlined" onChange={handleChangeNom}
                required className={classes.input} inputProps={{ style: inputStyle }} />
            <TextField id="prenoom" label="Prénom" variant="outlined" onChange={handleChangePrenom}
                required className={classes.input} inputProps={{ style: inputStyle }} />
            <FormControl variant="outlined" >
                <InputLabel id="label-sexe" >Sexe</InputLabel>
                <Select
                    labelId="label-sexe"
                    id="demo-simple-select-outlined"
                    value={sexe}
                    onChange={handleChangeSexe}
                    label="Sexe"
                    required
                    className={classes.input}
                    variant="outlined"
                >
                    <MenuItem value={'féminin'}>Féminin</MenuItem>
                    <MenuItem value={'masculin'}>Masculin</MenuItem>
                </Select>
            </FormControl>
            <TextField id="email" label="Email" variant="outlined" onChange={handleChangeEmail}
                type="email" required className={classes.input} inputProps={{ style: inputStyle }} />
            <TextField id="password" label="Mot de passe" variant="outlined" type="password"
                onChange={handleChangePassword} required className={classes.input} inputProps={{ style: inputStyle }} />
            <Button type="submit" variant="outlined" className={classes.button}>
                Envoyer
      </Button>
        </form>
    );
}


