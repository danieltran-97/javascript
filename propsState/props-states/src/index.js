import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';

const bookList = [{title:"The Sun Also Rises", author:"Ernest Hemingway", Pages:260},
              {title: "White Teeth", author: "Zadie Smith", Pages: 480},
              {title:"Cat's Cradle", author:"Kurt Vonnegut", Pages:304}]
const Book = ({title, author, pages}) => {
  return (
    <section>
      <h2>{title}</h2>
      <p>by: {author}</p>
      <p>Pages: {pages} pages</p>
    </section>
  )
}
// const Library = () => {
//   return (
//     <div>
//       <Book title="The Sun Also Rises" author="Ernest Hemingway" Pages={260} />
//       <Book title="White Teeth" author="Zadie Smith" Pages={480}/>
//       <Book title="Cat's Cradle" author="Kurt Vonnegut" Pages={304}/>
//     </div>
//   )
// }
const Library = ({books}) => {
  return (
    <div>
      {
        books.map(
          (book,i) => <Book 
                        key={i}
                        title={book.title} 
                        author={book.author} 
                        pages={book.pages} />
        )
      }
    </div>
  )
}
ReactDOM.render(
  <div>
    <Library books={bookList}/>
  </div>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
