import { Component, OnInit } from '@angular/core';
import { Customer } from '../../models/customer';
import { CustomerService } from '../../services/customer.service';

@Component({
  selector: 'app-customer',
  templateUrl: './customer.component.html',
  styleUrls: ['./customer.component.css']
})
export class CustomerComponent implements OnInit {
  customers: Customer[];
  displayedColumns: string[] = ['id', 'first_name', 'last_name', 'email', 'gender', 'ip_address', 'city', 'title', 'website'];

  constructor(private customerService: CustomerService) { }

  ngOnInit() {
  }

  showCustomers(): boolean {
    return this.customers !== undefined && this.customers.length > 0;
  }

  getCustomers(): void { 
    this.customerService.getCustomers()
    .subscribe(customers => this.customers = customers);
  }

}
