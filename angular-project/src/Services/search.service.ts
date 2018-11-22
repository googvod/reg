import { Injectable } from "@angular/core";
import { SearchResult } from "../Models/SearchResult";
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { environment } from "../environments/environment";
import { Event } from "../Models/Event";

@Injectable({ providedIn: 'root' })

export class SearchService {
    constructor(
        private http: HttpClient
    ){}
    search(term: string): Observable<SearchResult[]> {
        return this.http.get<SearchResult[]>(environment.apiUrl + '/api/search', {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' }),
            params: { term : term }
        });
    };
    getProfile(term: string): Observable<Event[]> {
        return this.http.get<Event[]>(environment.apiUrl + '/api/details/' + encodeURI(term) , {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' }),
        });
    }
    getYearDashboard(filter: any): Observable<any[]> {
        return this.http.get<any[]>(environment.apiUrl + '/api/dashboard', {
            headers: new HttpHeaders({ 'Content-Type': 'application/json' }),
            params: filter
        });
    }
}
