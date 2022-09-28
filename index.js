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

const phpExpress = require('php-express')({
    binPath: config.pathtoPHP
});

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

console.log(hashMyPassword('password', generateSalt()));

app.use(bodyParser.urlencoded({ extended: true }));
app.set('views', './views');
app.engine('php', phpExpress.engine);
app.set('view engine', 'php');

app.all(/.+\.php$/, phpExpress.router);

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