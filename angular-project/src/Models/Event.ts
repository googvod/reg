import { Fuel } from "./Fuel";
import { Operation } from "./Operation";

export class Event {
    id: number;
    fuel: Fuel;
    operation: Operation;
    regAddrKoatuu: number;
    dateReg: string;
    depCode: number;
    brand: string;
    model: string;
    makeYear: number;
    color: string;
    purposed: string;
}