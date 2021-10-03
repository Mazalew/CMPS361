

var express = require('express');
var app = express();
var path = require('path');
var myresults = {};
var q = 'SELECT * FROM ap.invoices';

app.set('port', process.env.PORT || 3000);
var options = {
      dotfiles: 'ignore',
      extensions: ['htm', 'html'],
      index: false
     };

app.use(express.static(path.join(__dirname, 'public') ,
        options ));
app.listen(app.get('port'), function () {
    console.log('Hello express started on http://localhost:' +
    app.get('port') + '; press Ctrl-C to terminate.' );
  });

var exphbs = require('express-handlebars');
app.engine('handlebars',exphbs({defaultLayout: 'main',
    helpers: {
    section: function(name, options){
        if(!this._sections) this._sections = {};
        this._sections[name] = options.fn(this);
        return null;
    }
   }}));
app.set('view engine', 'handlebars');

var callback = function theCallBack(data)
{
  myresults = data;

}
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'mazalew.it.pointpark.edu',
  user     : 'root',
  password : 'IT@Cl@rk',
  database : 'ap'
  });
  connection.connect();

function getDatabaseQuery(cb)
{

  connection.query(q ,
   function (error, results, fields) {
         if (error) throw error;
         else {
           cb(results);
         }
  });

}
    app.use(function(req, res, next) {
    getDatabaseQuery(function(tmp)
   {
    callback(tmp);
    if(!res.locals.partials) res.locals.partials = {};
    res.locals.partials.dbContext = myresults;
    next();
   });
  });

app.get('/', function(req, res) {
	res.render('home');
});
