import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-brand-chart',
  templateUrl: './brand-chart.component.html',
  styleUrls: ['./brand-chart.component.css']
})
export class BrandChartComponent implements OnInit {
    @Input()
    set collection(collection: any[]){
        this.chartLabels = [];
        this.chartData = [];
        for (let item of collection) {
            this.chartLabels.push(item.brand);
            this.chartData.push(item.count);
        }
    }
    public chartLabels: string[] = [];
    public chartData: number[] = [];
    public chartType: string = 'doughnut';
    public chartOptions: any = {
        responsive: true,
        legend: {
            display: false,
            labels: {
                display: false
            }
        }
    };
    constructor() { }

    ngOnInit() {

    }

}
