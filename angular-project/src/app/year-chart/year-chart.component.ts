import { Component, OnInit } from '@angular/core';
import { SearchService } from "../../Services/search.service";
import {DictionaryService} from "../../Services/dictionary.service";
import { Dictionary } from "../../Models/Dictionary";

@Component({
  selector: 'app-year-chart',
  templateUrl: './year-chart.component.html',
  styleUrls: ['./year-chart.component.css']
})

export class YearChartComponent implements OnInit {
  isLoading: boolean = false;
  isLoadingFilter: boolean = false;

  public barChartOptions:any = {
      scaleShowVerticalLines: false,
      responsive: true
  };
  public filter: Filter = new Filter();
  public barChartType: string = 'bar';
  public barChartLegend: boolean = true;
  public barChartLabels: string[] = [''];
  public barChartData: any[] = [
      {data: [], label: 'Count'}
  ];
  public dictionary: Dictionary = new Dictionary();

  constructor(
      private searchService : SearchService,
      private dictionaryService : DictionaryService
  ) { }

  ngOnInit() {
    this.isLoadingFilter = true;
    this.dictionaryService.getTypes().subscribe(data => {
        this.dictionary.types = data;
        this.isLoadingFilter = false;
    });
    this.filter.type = 'ЛЕГКОВИЙ';
    this.changeType();
    this.applyFilter();
  }

  changeType() {
      this.isLoadingFilter = true;
      this.dictionaryService.getBrands(this.filter.type).subscribe(data => {
          this.dictionary.brands = data;
          this.isLoadingFilter = false;
          this.applyFilter();
      });
  }

  changeBrand() {
      this.isLoadingFilter = true;
      this.dictionaryService.getModels(this.filter.type, this.filter.brand).subscribe(data => {
          this.dictionary.models = data;
          this.isLoadingFilter = false;
          this.applyFilter();
      });
  }

  updateChart(data: any[]) {
      this.barChartLabels = [];
      this.barChartData[0].data = [];
      for (let i in data) {
          this.barChartLabels.push(data[i]['year']);
          this.barChartData[0].data.push(data[i]['count']);
      }

  }

  applyFilter() {
      this.isLoading = true;
      this.searchService.getYearDashboard(this.filter).subscribe(data => {
          this.updateChart(data);
          this.isLoading = false;
      });
  }

}

export class Filter {
    type: string = '';
    brand: string = '';
    model: string = '';
}
