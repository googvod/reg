class Brand {
    brand: string;
    count: number;
}

class Kind {
    kind: string;
    count: number;
}

class Model {
    model: string;
    count: number;
}

export class Dictionary {
    types: Kind[] = [];
    brands: Brand[] = [];
    models: Model[] = [];
}