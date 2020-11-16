import React from 'react';
import ReactDOM from 'react-dom';

const green = '#39D1B4';
const yellow = '#FFD712';

class Toggle extends React.Component {
  constructor(props) {
    super(props);
    this.state = {color: green};
    // When you write a component class method that uses 'this', then you need to bind that method inside of your constructor function!
    this.changeColor = this.changeColor.bind(this);
  }
  // method wraps this.setState changes color of background
  changeColor() {
    const newColor = this.state.color === green ? yellow : green;
    this.setState({color: newColor});
  }
  render() {
    return (
      <div style={{background: this.state.color}}>
        <h1>
          Change my color
        </h1>
        {/* button has onClick attribute to change color  */}
        <button onClick={this.changeColor}>
          Change color
        </button>
      </div>
    );
  }
}

ReactDOM.render(<Toggle />, document.getElementById('app'))