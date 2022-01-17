import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


export interface community_pantry {
  user_id: string;
  pantry_id: string;
  pantry_name: string; 
  phone_number: string;
  list_of_items: string;
  street_address: string;
  barangay: string;
  municipality: string;
  province: string;
  region: string;
  email: string;
  gcash_number: string;
  category: string;
  status: string; 
}

@Injectable({
  providedIn: 'root'
})
export class PantryService {

  private url = 'http://192.168.18.73/pantryfinder/api/viewpantry.php/'


  constructor(private http: HttpClient) { }

  getAllpantry(){
    return this.http.get<[community_pantry]>(this.url);
  }
}
