import React from 'react';
import ReactDOM from 'react-dom';

function Saywelcome(props) {
   
    
    return (
        <div className="container">
         {"props"}
        </div>
    );
}

export default Saywelcome;

if (document.getElementById('saywelcome')) {
    

    ReactDOM.render(<Saywelcome  />, document.getElementById('saywelcome'));
}
/*
  <div id="saywelcome" data-user_name={{"heelo"}}></div>
const el = document.getElementById('product').addEventListener("input",function name(e) {
        inputs = e.target.value
        ReactDOM.render(<Saywelcome input={inputs}  />, document.getElementById('saywelcome'));
    })
  
*/