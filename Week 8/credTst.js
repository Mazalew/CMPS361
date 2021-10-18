var credentials = require('./credentials.js');
console.log(credentials.mongo.production.connectionString);
var mongoskin = require('mongoskin');
var db = mongoskin.db(credentials.mongo.production.connectionString);
 var cookieParser = require('cookie-parser');
 var session = require('express-session');
 var VALID_EMAIL_REGEX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
 db.collection('user').insert({name: 'curly', email: 'stoges@either.com', psw: 'inch by inch'}, function(err,result){
  if(err)
  {  console.log(' input error!');
  }
  if(result)
  {console.log(' added success ');
  }
}
);
/*
 db.collection('bands').insert({name: "Guns N' Roses", members: ['Axl Rose', 'Slash', 'Izzy Stradlin', 'Matt Sorum', 'Duff McKagan'], year: 1986}, function(err, result) {
     if (err) throw err;
     if (result) console.log('Added!');
 });
*/
db.close();
var email = credentials.gmail.user+"@gmail.com";

if (!email.match(VALID_EMAIL_REGEX) )
 {
   console.log(" %s tis not a valid email - sorry!!!! ", email);
 }
else {
  console.log(" %s Tis valid - have a nice day ",email);
}
/*
 db.createCollection( "user",
   {
      validator: { $or:
         [
            { name: { $type: "string" } } ,
            { email: { $regex: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ } },
            { psw:  { $type: "string" } }
        ]
      }
   }
)
*/
