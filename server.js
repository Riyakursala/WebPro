const express = require('express');
const bodyParser= require('body-parser');
var mysql = require('mysql');

const app=express();
app.use(bodyParser.urlencoded({extended:true}));

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database:'webpro'
});

app.get('/', function (req,res) {
  res.sendFile(__dirname + '/index.html');
});
app.post('/', function(req,res)
{
  var l=req.body.link;
  var sql = "INSERT INTO nw(m_url) VALUES(?)";
   con.query(sql,l, function(err, rows, fields) {
   if(!!err){
   console.log(err);
 }
   else
   {var m=rows.insertId;
     var id="http://localhost:3000/webpro/"+m;
//Storage.setItem("url",id);

      res.send(id);
}
});
});

app.get('/webpro/:i', function(req,res)
{
  var id= (req.params.i);
  var sq = "SELECT m_url FROM nw WHERE n_id=?";
   con.query(sq,id, function(err, rows, fields) {
   if(!!err){
   console.log(err);
  }
  else

    for (var i in rows) {
        res.redirect(rows[i].m_url);
    }
  //console.log(rows.m_url);
  //res.send("Done");
});
});
app.listen(3000 , function () {
  console.log('Server started');
});
