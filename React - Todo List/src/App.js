import React, { useState, useEffect } from 'react';
import TodoItem from './components/TodoItem';
import './App.css';
import axios from 'axios';

function App() {
  const [todos, setTodos] = useState([]);
  const [newTodoText, setNewTodoText] = useState('');

  useEffect(() => {
    fetchTodos();
  }, []);

  const fetchTodos = async () => {
    try {
      const response = await axios.get('http://localhost:5000/todos');
      setTodos(response.data);
    } catch (error) {
      console.error('Error fetching todos:', error);
    }
  };

  const handleAddTodo = async () => {
    if (newTodoText.trim() !== '') {
      try {
        const response = await axios.post('http://localhost:5000/todos', {
          text: newTodoText,
        });
        setTodos([...todos, response.data]);
        setNewTodoText('');
      } catch (error) {
        console.error('Error adding todo:', error);
      }
    }
  };

  const handleDeleteTodo = async (id) => {
    try {
      await axios.delete(`http://localhost:5000/todos/${id}`);
      const updatedTodos = todos.filter(todo => todo.id !== id);
      setTodos(updatedTodos.map((todo, index) => ({ ...todo, id: index + 1 })));
    } catch (error) {
      console.error('Error deleting todo:', error);
    }
  };

  return (
    <div className="app">
      <h1>Todo List</h1>
      <div className="add-todo">
        <input
          className='input-field'
          type="text"
          placeholder="Add a new activity"
          value={newTodoText}
          onChange={e => setNewTodoText(e.target.value)}
        />
        <button onClick={handleAddTodo} className='add-btn'>Add</button>
      </div>
      <div className="todo-list">
        {todos.map(todo => (
          <TodoItem key={todo.id} id={todo.id} text={todo.text} onDelete={handleDeleteTodo} />
        ))}
      </div>
    </div>
  );
}

export default App;
