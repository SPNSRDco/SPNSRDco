//Declare dependancies
const express = require('express');
const app = express();
const path = require('path')
const bodyParser = require('body-parser');
const sqlite = require('sqlite3').verbose();
const crypto = require('crypto');
const userDB = new sqlite.Database('user.db');
const {uuidv4} = require('uuid');

const config = require('./config.json');


function generateSalt() {
    //Generate a random salt to hash passwords with
    return crypto.randomBytes(Math.ceil(100 / 2)).toString('hex').slice(0, 10);
}

const hashMyPassword = (password, salt) => {
    //Hash the password with the salt
    let hash = crypto.createHmac('sha512', salt);
    hash.update(password);
    return {
        salt: salt,
        passwordHash: hash.digest('hex')
    }
}


app.use(bodyParser.urlencoded({ extended: true }));

app.post('/hasher', (req, res) => {
    //Hash the password and send it back to the client
    if (req.headers.host.startsWith('localhost')) {
        let salt = generateSalt();
        let hashed = hashMyPassword(req.body.password, salt);
        res.send(hashed);
    } 
    else {
        res.sendStatus(403);
    }
});

app.get('/', (req, res) => {
    res.send('Hello World!');
});

app.get('/web/logo', (req, res) => {
    res.sendFile(path.join(__dirname + '/web/logo.png'));
})

//Listen to requests on port 3000
app.listen(config.port, () => {
    console.log(`Listening on port ${config.port}`);
});