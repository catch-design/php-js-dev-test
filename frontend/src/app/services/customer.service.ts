import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Customer } from '../models/customer';
import { Observable, of } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {

  private customersUrl = environment.url + 'customers'

  constructor(private http: HttpClient) { }

  getCustomers (): Observable<Customer[]> {
    return this.http.get<Customer[]>(this.customersUrl)
  }
}
