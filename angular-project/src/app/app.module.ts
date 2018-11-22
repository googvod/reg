import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from "@angular/forms";

import { NgxMaskModule } from 'ngx-mask'
import { MomentModule } from 'ngx-moment';
import { ToastrModule } from 'ngx-toastr';
import { TypeaheadModule } from "ngx-bootstrap/typeahead";
import { ChartsModule } from 'ng2-charts/ng2-charts';

import { routes } from "./app.routes";

import { AppComponent } from './app.component';
import { SearchComponent } from './search/search.component';
import { ProfileComponent } from './profile/profile.component';
import { YearChartComponent } from './year-chart/year-chart.component';
import { TypeChartComponent } from './type-chart/type-chart.component';
import { BrandChartComponent } from './brand-chart/brand-chart.component';

@NgModule({
  declarations: [
      AppComponent,
      SearchComponent,
      ProfileComponent,
      YearChartComponent,
      TypeChartComponent,
      BrandChartComponent
  ],
  imports: [
      BrowserModule,
      BrowserAnimationsModule,
      HttpClientModule,
      FormsModule,
      ReactiveFormsModule,
      CommonModule,
      MomentModule,
      ChartsModule,
      NgxMaskModule.forRoot(),
      RouterModule.forRoot(
        routes,
        { enableTracing: false }
      ),
      TypeaheadModule.forRoot(),
      ToastrModule.forRoot()
  ],
  exports: [ RouterModule ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
