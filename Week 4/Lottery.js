
//set up handlebars view engine
var express = require('express');
var path = require('path');
var app = express();
var exphbs = require('express-handlebars');
app.engine('handlebars', exphbs({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');
app.set('port', process.env.PORT || 3000);
var options = { dotfiles: 'ignore', etag: false, extensions: ['htm', 'html'], index: "hello.html"};
app.use(express.static(path.join(__dirname, 'public'), options));

//var handlebars = require('express3-handlebars');
//  .create({defaultLayout:'main'});
//app.engine('handlebars', handlebars.engine);
//app.set('view engine', 'handlebars');

//app.set('port', process.env.PORT || 3000);

//app.use(express.static(__dirname + '/public'));

app.get('/', function(req, res) {
  res.render('home');
});

app.get('/about', function(req, res) {
  res.render('about');
});

app.get('/lottery', function(req, res) {
  res.render('lottery');
});

app.get('/home', function(req, res) {
  res.render('home');
});

//404 catch-all handler (middleware)
app.use(function(req, res, next) {
  res.status(404);
  res.render('404');
});

//500 error handler (middleware)
app.use(function (err, req, res, next){
  console.error(err.stack);
  res.status(500);
  res.render('500');
});

app.listen(app.get('port'), function() {
  console.log('Express started on http://localhost:' + app.get('port') + '; press Ctrl-c to terminate.');
});
