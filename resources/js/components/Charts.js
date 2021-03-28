import React, {  useEffect } from 'react';
import ReactDOM from 'react-dom';
import chart from 'chart.js'

function Charts(props) {

useEffect(()=>{
    drawChart(props.ctx1,props.elems[0])
    drawChart(props.ctx2,props.elems[1])

}) 
   
 
   
    return (
       ""
    );
}

export default Charts;

if (document.getElementById('Charts')) {
    var elems = document.querySelectorAll('#Charts');
   let ctx1= elems[0].getContext('2d')
   let ctx2= elems[1].getContext('2d')
   ;
    ReactDOM.render(<Charts ctx1={ctx1} ctx2={ctx2}  elems={elems}  />, document.getElementById('Charts'));
}
/*
  <div id="saywelcome" data-user_name={{"heelo"}}></div>
const el = document.getElementById('product').addEventListener("input",function name(e) {
        inputs = e.target.value
        ReactDOM.render(<Saywelcome input={inputs}  />, document.getElementById('saywelcome'));
    })
  
*/
function drawChart(context,elem) {
    var myChart = new chart(context, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Number of '+$(elem).attr("name"),
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}