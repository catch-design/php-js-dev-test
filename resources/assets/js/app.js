
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Customer extends Component {
	constructor() {
		super()
		this.state = {
			customers: [],
			isShow: false	
		}

    	this.handleClick = this.handleClick.bind(this);
	}

	componentDidMount() {
		axios.get('/api/customer').then(response => {
		  this.setState({
			customers: response.data
		  })
		})
	}
	
	handleClick() {
		this.setState(prevState => ({
			isShow: !prevState.isShow
		}));
	}

	renderCustomers() {
		if (this.state.isShow){
			return this.state.customers.map(customer => {
				return (
					/* When using list you need to specify a key
					 * attribute that is unique for each list item
					*/
					<tr key={customer.id} >
						<td>{ customer.first_name } { customer.last_name }</td>
						<td>{ customer.email }</td>
						<td>{ customer.gender }</td>
						<td>{ customer.ip_address }</td>
						<td>{ customer.company }</td>
						<td>{ customer.city }</td>
						<td>{ customer.title }</td>
						<td>{ customer.website }</td>
					</tr>
				);
			})
		} else {
			return (
				<tr><td  colSpan='8'>No data</td></tr>
			)
		}
		
	}

	render() {
		const { customers } = this.state
		return (
			<div className='container'>
				<div className='row justify-content-center'>
				  <div className='col-md-12'>
						<button className="btn btn-primary" onClick={this.handleClick}>
						  Show Table
						</button>

						<table className="table">
							<thead>
								<tr>
									<td>Name</td>
									<td>email</td>
									<td>gender</td>
									<td>ip_address</td>
									<td>company</td>
									<td>city</td>
									<td>itle</td>
									<td>website</td>
								</tr>
							</thead>
							<tbody className='list-group list-group-flush'>
								{ this.renderCustomers() }
							</tbody>
						</table>
					</div>
				</div>
			</div>
		)
	  }
	}

export default Customer

if (document.getElementById('app')) {
ReactDOM.render(
	<Customer />
	, document.getElementById('app'));
}
