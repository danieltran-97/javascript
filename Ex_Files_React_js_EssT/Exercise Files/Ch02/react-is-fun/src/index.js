import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';

// var style = {
//   backgroundColor : 'green',
//   color : 'white',
//   fontFamily : 'Arial'
// };
// const title = (
//   <ul id="title" className="header" style={style}>
//     <li>item on our list 2</li>
//   </ul>
// )
// const title = React.createElement(
//   'ul',
//   {id: 'title', className: 'header' , style: style},
//   React.createElement(
//     'li',
//     {},
//     'item on our list'
//   )
// );
// class Message extends React.Component {
//   render() {
//     return (
//     <div style={{color: this.props.color}}>
//       <h1>{this.props.msg} </h1>
//     <p> I'll be back in {this.props.minutes} minutes</p>
//     </div>
//     )
//   }
// }

let skiData = {
  total: 50,
  powder: 20,
  backcountry: 10,
  goal: 100

}

class SkiDayCounter extends React.Component {

  getPercent(decimal) {
    return decimal * 100 + '%'
  }

  calcGoalProgress(total,goal) {
    return this.getPercent(total/goal)
  }

  render() {
    return (
      <section>
        <div>
          Total days: {this.props.total}
        </div>
        <div>
          Powder: {this.props.powder}
        </div>
        <div>
          Back Country: {this.props.backcountry}
        </div>
        <div>
          Goal Progress: {this.calcGoalProgress(this.props.total,this.props.goal)}
        </div>
       </section>
    )
  }
}

ReactDOM.render(
  <SkiDayCounter 
    total={skiData.total} 
    powder={skiData.powder} 
    backcountry={skiData.backcountry}
    goal={skiData.goal}  />,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
