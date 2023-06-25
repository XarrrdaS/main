import React, { useEffect, useState } from 'react';
import Task from './Task';

function App() {
  const [books, setBooks] = useState([]);


  useEffect(() => {
    fetch(`https://www.googleapis.com/books/v1/volumes?q=cooking`)
      .then((response) => response.json())
      .then((data) => setBooks(data.items));
  }, []);

  return (
    <div>
      <Task books={books} />
    </div>
  );
}

export default App;
