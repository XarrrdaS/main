const express = require('express');
const fs = require('fs');

const app = express();
const PORT = process.env.PORT || 5000;

app.use(express.json());

const DB_PATH = './src/data/data.json';

function readData() {
  const data = fs.readFileSync(DB_PATH, 'utf8');
  return JSON.parse(data);
}

function writeData(data) {
  fs.writeFileSync(DB_PATH, JSON.stringify(data, null, 2), 'utf8');
}

app.use((req, res, next) => {
  res.setHeader('Access-Control-Allow-Origin', 'http://localhost:3000');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
  res.setHeader('Access-Control-Allow-Credentials', 'true');
  next();
});

app.get('/todos', (req, res) => {
  const data = readData();
  res.json(data.todos);
});

app.post('/todos', (req, res) => {
  const data = readData();
  const newTodo = { id: data.todos.length > 0 ? data.todos[data.todos.length - 1].id + 1 : 1, text: req.body.text };
  data.todos.push(newTodo);
  writeData(data);
  res.status(201).json(newTodo);
});

app.delete('/todos/:id', (req, res) => {
  const data = readData();
  const todoId = Number(req.params.id);

  const updatedTodos = data.todos.filter(todo => todo.id !== todoId);

  updatedTodos.forEach((todo, index) => {
    todo.id = index + 1;
  });

  data.todos = updatedTodos;

  fs.writeFile(DB_PATH, JSON.stringify(data, null, 2), 'utf8', (err) => {
    if (err) {
      res.sendStatus(500);
    } else {
      res.sendStatus(204);
    }
  });
});

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
