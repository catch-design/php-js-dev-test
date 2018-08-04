
import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

    class Customer extends Component {
      constructor () {
        super()
        this.state = {
          customers: []
        }
      }

      componentDidMount () {
        axios.get('/api/customer').then(response => {
          this.setState({
            customers: response.data
          })
        })
      }

      renderCustomers() {
	    return this.state.customers.map(customer => {
	        return (
	            /* When using list you need to specify a key
	             * attribute that is unique for each list item
	            */
				<li>{ customer.first_name }.{ customer.last_name }</li>
				<li>{ customer.email }</li>
				<li>{ customer.gender }</li>
	        );
	    })
	  }

      render () {
        const { customers } = this.state
        return (
          <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-8'>
                <div className='card'>
                  <div className='card-header'>All Customers</div>
                  <div className='card-body'>                    
                    <ul className='list-group list-group-flush'>
                      { this.renderCustomers() }
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )
      }
    }

    export default Customer