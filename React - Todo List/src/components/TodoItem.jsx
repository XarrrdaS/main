import React from 'react';
import '../App.css'

function TodoItem({ id, text, onDelete }) {
  const handleDelete = () => {
    onDelete(id);
  };

  return (
    <div className="todo-item">
      <p><span className='id'>{id}</span> {text}</p>
      <button onClick={handleDelete} className='delete-btn'>Delete</button>
    </div>
  );
}

export default TodoItem;
