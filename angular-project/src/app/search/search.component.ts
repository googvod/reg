import { Component, OnInit } from '@angular/core';
import { SearchResult } from "../../Models/SearchResult";
import { SearchService } from "../../Services/search.service";
import { Observable } from "rxjs/index";
import { tap, mergeMap } from 'rxjs/operators';
import {qualifiedTypeIdentifier} from "@babel/types";

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css']
})
export class SearchComponent implements OnInit {
  result: SearchResult;
  term: string = '';
  isLoading: boolean = false;
  collection: SearchResult[] = [];

  constructor(
      private searchService: SearchService
  ) {}

  ngOnInit(){
  }

  updateResults(): void {
    if (this.isLoading == true || this.term.length < 2) {
        return void(0);
    }

    this.isLoading = true;
    const term = this.term;
    this.searchService.search(term).subscribe(data => {
        this.term = term;
        this.collection = data;
        this.isLoading = false;
    });
  }
}
