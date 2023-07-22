const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const fs = require('fs');
const path = require('path');

app.use(bodyParser.json());

// Endpoint do pobierania danych z pliku JSON
app.get('/database', (req, res) => {
  fs.readFile(path.join(__dirname, '../../public/database.json'), 'utf8', (err, data) => {
    if (err) throw err;
    res.json(JSON.parse(data));
  });
});

// Endpoint do zapisywania nowych danych do pliku JSON
app.post('/database', (req, res) => {
  fs.readFile(path.join(__dirname, '../../public/database.json'), (err, data) => {
    if (err) throw err;

    let products = JSON.parse(data);
    let newProduct = req.body;

    products.push(newProduct);

    fs.writeFile(path.join(__dirname, '../../public/database.json'), JSON.stringify(products, null, 2), (err) => {
      if (err) throw err;
      res.json(products);
    });
  });
});

// Endpoint do aktualizacji danych w pliku JSON
app.put('/database', (req, res) => {
  fs.writeFile(path.join(__dirname, '../../public/database.json'), JSON.stringify(req.body, null, 2), (err) => {
    if (err) throw err;
    res.json(req.body);
  });
});

// Endpoint dla ścieżki głównej
app.get('/', (req, res) => {
  res.send('Serwer działa.');
});

app.listen(3000, () => {
  console.log('Serwer nasłuchuje na http://localhost:3000');
});
