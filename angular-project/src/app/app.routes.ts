import { Routes } from '@angular/router';
import { SearchComponent } from "./search/search.component";
import {ProfileComponent} from "./profile/profile.component";

export const routes: Routes = [
    { path: '', redirectTo: '/search', pathMatch: 'full' },
    { path: 'search', component: SearchComponent },
    { path: 'reg/:reg', component: ProfileComponent }
];