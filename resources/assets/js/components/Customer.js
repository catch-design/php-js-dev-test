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
  }

  	render () {
        const { customers } = this.state
        return (
	        <div className='container'>
	            <div className='row justify-content-center'>
	              <div className='col-md-12'>
	              		<button className="loadcustomer" onClick={() => this.handleClick()} >
		                    Load
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