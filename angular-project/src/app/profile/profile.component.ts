import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { SearchService } from "../../Services/search.service";
import { Event } from "../../Models/Event";

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  collection: Event[];
  reg: string;

  constructor(
      private route: ActivatedRoute,
      private searchService: SearchService
  ) { }

  ngOnInit() {
      this.reg = this.route.snapshot.paramMap.get('reg');
      this.searchService.getProfile(this.reg).subscribe(data  => {
        this.collection = data;
        console.log(this.collection);
      });
  }
}
