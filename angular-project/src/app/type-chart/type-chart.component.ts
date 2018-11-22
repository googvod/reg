import { Component, OnInit } from '@angular/core';
import { Input } from "@angular/core";

@Component({
  selector: 'app-type-chart',
  templateUrl: './type-chart.component.html',
  styleUrls: ['./type-chart.component.css']
})
export class TypeChartComponent implements OnInit {
  @Input()
  set collection(collection: any[]){
      this.chartLabels = [];
      this.chartData = [];
      for (let item of collection) {
          this.chartLabels.push(item.kind);
          this.chartData.push(item.count);
      }
  }
  public chartLabels: string[] = [];
  public chartData: number[] = [];
  public chartType: string = 'doughnut';
  constructor() { }

  ngOnInit() {

  }


}
