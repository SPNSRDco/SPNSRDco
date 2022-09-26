//Declare dependancies
const express = require('express');
const app = express();
const path = require('path')
const bodyParser = require('body-parser');

const config = require('./config.json');

const phpExpress = require('php-express')({
    binPath: config.pathtoPHP
});

app.use(bodyParser.urlencoded({ extended: true }));
app.set('views', './views');
app.engine('php', phpExpress.engine);
app.set('view engine', 'php');

app.all(/.+\.php$/, phpExpress.router);

app.get('/', (req, res) => {
    res.send('Hello World!');
});

//Listen to requests on port 3000
app.listen(config.port, () => {
    console.log(`Listening on port ${config.port}`);
    console.log(config.pathtoPHP)
});