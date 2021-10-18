
var http = require('http'),
express = require('express');
var app = express();

var handlebars = require('express-handlebars').create({
    defaultLayout:'main',
    helpers: {
        section: function(name, options){
            if(!this._sections) this._sections = {};
            this._sections[name] = options.fn(this);
            return null;
        }
    }
});
app.engine('handlebars', handlebars.engine);
app.set('view engine', 'handlebars');
app.set('port', process.env.PORT || 3000);

var fortune = require('./lib/fortune.js');
var credentials = require('./credentials.js');
//var routes = require('./routes/user.js');
var mongoskin = require('mongoskin');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var errorHandler = require('errorhandler');
var bodyParser = require('body-parser');
var methodOverride = require('method-override');
var db = require('mongoskin').db(credentials.mongo.development.connectionString);

console.log(credentials.mongo.development.connectionString);
var VALID_EMAIL_REGEX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded());
app.use(cookieParser(credentials.cookieSeceret));
app.use(require('cookie-parser')(credentials.cookieSecret));
app.use(require('express-session')({
    resave: false,
    saveUninitialized: false,
    secret: credentials.cookieSecret,
}));
var ssn;
app.use(express.static(__dirname + '/public'));


app.get('/', function(req, res) {
	res.render('login');
});

app.get('/about', function(req,res){

  if( !(req.session === undefined) || !(ssn === undefined) )
  {
    res.status(403).send('User is not authorized. Please login!');
    process.exit(0);
  }

  console.log('Session User: %s ssn User: %s', req.session.user, ssn.user);
	res.render('about', {
		fortune: fortune.getFortune()
	} );
});
app.get('/listusers', function(req,res){
  if( !(req.session === undefined) || !(ssn === undefined) )
  {
    res.status(403).send('User is not authorized. Please login!');
    process.exit(0);

  }


  console.log("session value is: "+req.session.user);
  db.collection('user').find().toArray(function(err, result) {
    if (err) throw err;
    if(!res.locals.partials)res.locals.partials={};
    res.locals.partials.dbContext = result;
    console.log("call back data: \n",result);
    res.render('users', {
  		fortune: fortune.getFortune()
  	} );
  });

});
app.get('/input', function(req,res){

  if( !(req.session === undefined) || !(ssn === undefined) )
  {
    res.status(403).send('User is not authorized. Please login!');
    process.exit(0);

  }

  console.log('Session User: %s ssn User: %s', req.session.user, ssn.user);
	res.render('about', {
		fortune: fortune.getFortune()
	} );
});
app.get('/help', function(req,res){

  if( !(req.session === undefined) || !(ssn === undefined) )
  {
    res.status(403).send('User is not authorized. Please login!');
    process.exit(0);

  }
  console.log('Session User: %s ssn User: %s', req.session.user, ssn.user);
	res.render('about', {
		fortune: fortune.getFortune()
	} );
});
app.post('/loginvalidate',function(req, res, next) {
  ssn = req.session;
  //console.log("landed with user "+req.body.email+" "+req.body.password);
  if (!req.body.email || !req.body.password)
    res.json( JSON.stringify({ message: 'You are not a validated user!' }));
  //  return res.render('login', {error: 'Please enter your email and password.'});
   db.collection('user').findOne({
    email: req.body.email,
    psw: req.body.password
  }, function(error, user){
    if (error) return next(error);
    if (!user) return res.render('login', {error: 'Incorrect email&password combination.'});
      ssn.user = user.name;
      ssn.email = user.email;
      ssn.psw = user.psw;
    res.json( JSON.stringify({ message: 'You are validated - '+ssn.user }));

  })
});

app.get('/home', function(req, res, next){
  if( !(req.session === undefined) || !(ssn === undefined) )
  {
    res.status(403).send('User is not authorized. Please login!');
    process.exit(0);

  }


console.log('Session User: %s ssn User: %s', req.session.user, ssn.user);
	res.render('home');
});
// 404 catch-all handler (middleware)
app.use(function(req, res, next){
	res.status(404);
	res.render('404');
});

// 500 error handler (middleware)
app.use(function(err, req, res, next){
	console.error(err.stack);
	res.status(500);
	res.render('500');
});
server = http.createServer(app).listen(app.get('port'), function(){
  console.log( 'Express started in ' + app.get('env') +
    ' mode on http://localhost:' + app.get('port') +
    '; press Ctrl-C to terminate.' );
});
