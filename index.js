var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database:'newdb'
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "SELECT * FROM web";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log(result);
  });
});

res.sendFile(__dirname + '/index.html');
 const l=req.body.link;
 var sql = "INSERT INTO web(m_url) VALUES(?)";

app.post('/', function(req,res){
  res.send(req.body.link);
});
