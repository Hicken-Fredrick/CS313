var http = require('http');
var port = 8888;


function webPageSetup(req, res) {
  console.log("RECIEVED A REQUEST FOR: " + req.url);
  let math = new RegExp('[/]\\d+[*/+-]\\d+', 'g');
  
  if (req.url.toLowerCase() == "/home") {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write("<h1>Welcome to the Home Page</h1>");
    res.end();
  } else if (req.url.toLowerCase() == "/getdata") {
    res.writeHead(200, {'Content-Type': 'application/json'});
    res.write('{"name":"Fred Hicken","class":"cs313"}');
    res.end();
  } else if (math.test(req.url)) { 
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write("<h1>MATH TIME</h1>");
    var inputs = req.url.split(/(\d+)/);
    var num1 = Number(inputs[1]);
    var operen = inputs[2];
    var num2 = Number(inputs[3]);
    res.write(`<p>QUESTION: ${num1+operen+num2} </p>`);
    switch(operen) {
      case "+":
        res.write(`<p>ANSWER: ${num1+num2} </p>`);
        break;
      case "-":
        res.write(`<p>ANSWER: ${num1-num2} </p>`);
        break;
      case "*":
        res.write(`<p>ANSWER: ${num1*num2} </p>`);
        break;
      case "/":
        res.write(`<p>ANSWER: ${num1/num2} </p>`);
        break;
    }
    res.end();
  } else {
    res.writeHead(404, {'Content-Type': 'text/html'});
    res.write("<h1>ERROR 404</h1>");
    res.write("<p>PAGE NOT FOUND</p>");
    res.end();
  }
}

var server = http.createServer(webPageSetup);
server.listen(port);

console.log(`The server is now listening on ${port}`);