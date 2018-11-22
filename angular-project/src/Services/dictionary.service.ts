import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { environment } from "../environments/environment";
import { Observable } from "rxjs/index";
import {Url} from "url";

@Injectable({ providedIn: 'root' })

export class DictionaryService {
    constructor(
        private http: HttpClient
    ){}

    getTypes(): Observable<any[]> {
        return this.http.get<any[]>(environment.apiUrl + '/api/types', {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' }),
        });
    };

    getBrands(type): Observable<any[]> {
        return this.http.get<any[]>(environment.apiUrl + '/api/brands/' + encodeURI(type), {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' })
        });
    };

    getModels(type, brand): Observable<any[]> {
        return this.http.get<any[]>(environment.apiUrl + '/api/models/' + encodeURI(type) + '/' + brand, {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' })
        });
    }
}