import React, { useState } from 'react';
import './Task.css';


// Function takes prop 'books' which is an array of book object
function Task({books}) {
  // State which stores index of marked row
  const [chosenRow, setChosenRow] = useState(null);

  // State which stores array of chosen row indexes
  const [breadcrumb, setBreadcrumb] = useState([]);

  // Function which is called when the user clicks on a table row,
  // it updates the chosenRow state with the index of currently chosen row
  // and adds the index to the breadcrumb array 
  const handleRowClick = (bookId) => {
    setChosenRow(bookId);
    setBreadcrumb(prevBreadcrumb => [...prevBreadcrumb, bookId]);
  };

  // Function which is called when user clicks on a button,
  // it updates the chosenRow state with the index of the clicked button,
  // which selects the row with the id in the table matching the id on the button
  const handleBreadcrumbClick = (id) => {
    setChosenRow(id);
  };

  // Return the book title of the currently selected row in more-info section,
  // or "No data" if there is no selected book
  const getTitle = () => {
    if (chosenRow === null) {
      return <span className='no-data'>No data</span>;
    }
    return books[chosenRow].volumeInfo.title;
  };
  const chosenRowTitle = getTitle();

  // Filter the books array to create a new array with only information about the book in the selected row,
  // or an empty array if there is no selected row
  const booksMoreInfo = chosenRow !== null ? [books[chosenRow]] : [];

  // Render front-end
  return (
    <div className="container">

      {/* Section with the generated table of books */}
      <div className='whole-table'>
        <table className="table">
          <thead>
            <tr className='head'>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Published Date</th>
              <th>Publisher</th>
            </tr>
          </thead>
          <tbody>
            {books.map((book, index) => (
              <tr
                key={index}
                onClick={() => handleRowClick(index)}
                className={chosenRow === index ? 'selected' : ''}
              >
                <td>{index + 1}</td>
                <td>{book.volumeInfo.title || <span className='no-data'>No data</span>}</td>
                <td>{book.volumeInfo.authors?.join(', ') || <span className='no-data'>No data</span>}</td>
                <td>{book.volumeInfo.publishedDate || <span className="no-data">No data</span>}</td>
                <td>{book.volumeInfo.publisher || <span className="no-data">No data</span>}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {/* Section with additional information about the book in the chosen row */}
      {chosenRow !== null && 
        <div className="more-info">
          <h2>Detailed data about<br></br><q className="info-title">{chosenRowTitle}</q></h2><br/>
          {booksMoreInfo.map((book) => (
            <div key={book.id}>
              <p className='subtitle'>{book.volumeInfo.subtitle || <span className='no-data'>No data</span>}</p>
              <p>{book.volumeInfo.description || <span className='no-data'>No data</span>}<br/><br/>
              <span className='pages'>Pages: </span>{book.volumeInfo.pageCount || <span className='no-data'>No data</span>}<br/>
              </p>
              <p className="api-path">Path:<br></br><a href={book.selfLink} target='_blank' className='api-link'>{book.selfLink}</a></p>
            </div>
          )) || <span className='no-data'>No data</span>}
        </div>
      }

      {/* Section with history of clicked rows - breadcrumb */}
      <div className="breadcrumb">
        {breadcrumb.map((item, index) => (
          <button
            key={`${item}${index}`}
            onClick={() => handleBreadcrumbClick(item)}
          >
            <span className='button-index'>{index + 1}</span><br></br>
            <span className='button-id'>ID:</span> {item + 1}
          </button>
        ))}
      </div>
    </div>
  );
}

export default Task;