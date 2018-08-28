var classes = [
    {
        "name": "CodingExercise\\Command\\InvoiceCommand",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "configure",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "execute",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "validateArgs",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Component\\Console\\Command\\Command",
            "Symfony\\Component\\Console\\Input\\InputInterface",
            "Symfony\\Component\\Console\\Output\\OutputInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerBuilder",
            "Symfony\\Component\\Config\\FileLocator",
            "Symfony\\Component\\DependencyInjection\\Loader\\YamlFileLoader",
            "Symfony\\Component\\Console\\Input\\InputInterface",
            "InvalidArgumentException",
            "InvalidArgumentException"
        ],
        "parents": [
            "Symfony\\Component\\Console\\Command\\Command"
        ],
        "lcom": 2,
        "length": 47,
        "vocabulary": 25,
        "volume": 218.26,
        "difficulty": 4.88,
        "effort": 1064.02,
        "level": 0.21,
        "bugs": 0.07,
        "time": 59,
        "intelligentContent": 44.77,
        "number_operators": 8,
        "number_operands": 39,
        "number_operators_unique": 5,
        "number_operands_unique": 20,
        "cloc": 0,
        "loc": 32,
        "lloc": 32,
        "mi": 50.25,
        "mIwoC": 50.25,
        "commentWeight": 0,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.17,
        "relativeSystemComplexity": 121.17,
        "totalStructuralComplexity": 363,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 363.5,
        "package": "CodingExercise\\Command\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Currency\\CurrencyFactory",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getConverter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCurrency",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDefaultCurrency",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Money\\Exchange\\FixedExchange",
            "Money\\Exchange\\ReversedCurrenciesExchange",
            "Money\\Currencies\\ISOCurrencies",
            "Money\\Converter",
            "Money\\Converter",
            "Money\\Currency",
            "Money\\Currency"
        ],
        "parents": [],
        "lcom": 1,
        "length": 30,
        "vocabulary": 8,
        "volume": 90,
        "difficulty": 6.3,
        "effort": 567,
        "level": 0.16,
        "bugs": 0.03,
        "time": 32,
        "intelligentContent": 14.29,
        "number_operators": 9,
        "number_operands": 21,
        "number_operators_unique": 3,
        "number_operands_unique": 5,
        "cloc": 0,
        "loc": 29,
        "lloc": 29,
        "mi": 54.15,
        "mIwoC": 54.15,
        "commentWeight": 0,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1.88,
        "relativeSystemComplexity": 2.88,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 7.5,
        "totalSystemComplexity": 11.5,
        "package": "CodingExercise\\Model\\Currency\\",
        "pageRank": 0.06,
        "afferentCoupling": 3,
        "efferentCoupling": 5,
        "instability": 0.63,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Discount\\Aggregator\\CustomerMaxAmount",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "apply",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "CodingExercise\\Model\\Discount\\Aggregator\\AggregatorInterface",
            "Money\\Money"
        ],
        "parents": [],
        "lcom": 1,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 4,
        "loc": 12,
        "lloc": 8,
        "mi": 115.82,
        "mIwoC": 76.82,
        "commentWeight": 38.99,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 2,
        "package": "CodingExercise\\Model\\Discount\\Aggregator\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Discount\\Rule\\LastMonthTotal",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "apply",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastMonthTotal",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 5,
        "ccnMethodMax": 3,
        "externals": [
            "CodingExercise\\Model\\Discount\\Rule\\RuleInterface",
            "CodingExercise\\Model\\Currency\\CurrencyFactory",
            "Money\\Money",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase",
            "CodingExercise\\Model\\Object\\Purchase",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase",
            "Money\\Money"
        ],
        "parents": [],
        "lcom": 1,
        "length": 64,
        "vocabulary": 18,
        "volume": 266.88,
        "difficulty": 12.5,
        "effort": 3335.94,
        "level": 0.08,
        "bugs": 0.09,
        "time": 185,
        "intelligentContent": 21.35,
        "number_operators": 14,
        "number_operands": 50,
        "number_operators_unique": 6,
        "number_operands_unique": 12,
        "cloc": 4,
        "loc": 37,
        "lloc": 33,
        "mi": 73.6,
        "mIwoC": 49.21,
        "commentWeight": 24.38,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.35,
        "relativeSystemComplexity": 144.35,
        "totalStructuralComplexity": 576,
        "totalDataComplexity": 1.38,
        "totalSystemComplexity": 577.38,
        "package": "CodingExercise\\Model\\Discount\\Rule\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Discount\\Rule\\NoDiscount",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "apply",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "CodingExercise\\Model\\Discount\\Rule\\RuleInterface",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase"
        ],
        "parents": [],
        "lcom": 1,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 0,
        "loc": 8,
        "lloc": 8,
        "mi": 76.82,
        "mIwoC": 76.82,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "CodingExercise\\Model\\Discount\\Rule\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Discount\\Rule\\XOrdersPerMonth",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "apply",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCount",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "CodingExercise\\Model\\Discount\\Rule\\RuleInterface",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase",
            "CodingExercise\\Model\\Object\\Purchase",
            "CodingExercise\\Model\\Object\\Purchase"
        ],
        "parents": [],
        "lcom": 1,
        "length": 58,
        "vocabulary": 16,
        "volume": 232,
        "difficulty": 16.33,
        "effort": 3789.33,
        "level": 0.06,
        "bugs": 0.08,
        "time": 211,
        "intelligentContent": 14.2,
        "number_operators": 16,
        "number_operands": 42,
        "number_operators_unique": 7,
        "number_operands_unique": 9,
        "cloc": 0,
        "loc": 32,
        "lloc": 32,
        "mi": 50.2,
        "mIwoC": 50.2,
        "commentWeight": 0,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.61,
        "relativeSystemComplexity": 36.61,
        "totalStructuralComplexity": 144,
        "totalDataComplexity": 2.43,
        "totalSystemComplexity": 146.43,
        "package": "CodingExercise\\Model\\Discount\\Rule\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Object\\Invoice",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAmount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCurrencyCode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Money\\Money"
        ],
        "parents": [],
        "lcom": 1,
        "length": 14,
        "vocabulary": 5,
        "volume": 32.51,
        "difficulty": 3,
        "effort": 97.52,
        "level": 0.33,
        "bugs": 0.01,
        "time": 5,
        "intelligentContent": 10.84,
        "number_operators": 5,
        "number_operands": 9,
        "number_operators_unique": 2,
        "number_operands_unique": 3,
        "cloc": 11,
        "loc": 34,
        "lloc": 23,
        "mi": 98.15,
        "mIwoC": 59.57,
        "commentWeight": 38.57,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.88,
        "relativeSystemComplexity": 9.88,
        "totalStructuralComplexity": 36,
        "totalDataComplexity": 3.5,
        "totalSystemComplexity": 39.5,
        "package": "CodingExercise\\Model\\Object\\",
        "pageRank": 0.12,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Model\\Object\\Purchase",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getYearMonth",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMoney",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMoney",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTimeImmutable",
            "Money\\Money",
            "DateTimeImmutable",
            "Money\\Money",
            "Money\\Money"
        ],
        "parents": [],
        "lcom": 1,
        "length": 31,
        "vocabulary": 8,
        "volume": 93,
        "difficulty": 3.5,
        "effort": 325.5,
        "level": 0.29,
        "bugs": 0.03,
        "time": 18,
        "intelligentContent": 26.57,
        "number_operators": 10,
        "number_operands": 21,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 19,
        "loc": 56,
        "lloc": 37,
        "mi": 91.11,
        "mIwoC": 51.87,
        "commentWeight": 39.24,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 2.83,
        "relativeSystemComplexity": 3.83,
        "totalStructuralComplexity": 6,
        "totalDataComplexity": 17,
        "totalSystemComplexity": 23,
        "package": "CodingExercise\\Model\\Object\\",
        "pageRank": 0.31,
        "afferentCoupling": 7,
        "efferentCoupling": 2,
        "instability": 0.22,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Service\\DiscountService",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "apply",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "CodingExercise\\Model\\Discount\\Aggregator\\AggregatorInterface",
            "InvalidArgumentException",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase"
        ],
        "parents": [],
        "lcom": 1,
        "length": 25,
        "vocabulary": 12,
        "volume": 89.62,
        "difficulty": 4.5,
        "effort": 403.31,
        "level": 0.22,
        "bugs": 0.03,
        "time": 22,
        "intelligentContent": 19.92,
        "number_operators": 7,
        "number_operands": 18,
        "number_operators_unique": 4,
        "number_operands_unique": 8,
        "cloc": 10,
        "loc": 34,
        "lloc": 24,
        "mi": 93.06,
        "mIwoC": 55.82,
        "commentWeight": 37.24,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1.25,
        "relativeSystemComplexity": 2.25,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 2.5,
        "totalSystemComplexity": 4.5,
        "package": "CodingExercise\\Service\\",
        "pageRank": 0.05,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Service\\InvoiceService",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "convertCurrency",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hydrate",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "CodingExercise\\Storage\\OrderedStorageInterface",
            "CodingExercise\\Model\\Currency\\CurrencyFactory",
            "CodingExercise\\Service\\DiscountService",
            "CodingExercise\\Model\\Object\\Purchase",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Invoice"
        ],
        "parents": [],
        "lcom": 1,
        "length": 45,
        "vocabulary": 12,
        "volume": 161.32,
        "difficulty": 6.17,
        "effort": 994.83,
        "level": 0.16,
        "bugs": 0.05,
        "time": 55,
        "intelligentContent": 26.16,
        "number_operators": 8,
        "number_operands": 37,
        "number_operators_unique": 3,
        "number_operands_unique": 9,
        "cloc": 21,
        "loc": 56,
        "lloc": 35,
        "mi": 91.09,
        "mIwoC": 50.46,
        "commentWeight": 40.63,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 169,
        "relativeDataComplexity": 0.18,
        "relativeSystemComplexity": 169.18,
        "totalStructuralComplexity": 676,
        "totalDataComplexity": 0.71,
        "totalSystemComplexity": 676.71,
        "package": "CodingExercise\\Service\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CodingExercise\\Storage\\CsvStorage",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setConfig",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPurchases",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeInvoice",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hydrate",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "sortByDate",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 6,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "CodingExercise\\Storage\\OrderedStorageInterface",
            "CodingExercise\\Model\\Currency\\CurrencyFactory",
            "Iterator",
            "SplFileObject",
            "SplFixedArray",
            "CodingExercise\\Model\\Object\\Invoice",
            "DateTimeImmutable",
            "Money\\Money",
            "CodingExercise\\Model\\Object\\Purchase",
            "CodingExercise\\Model\\Object\\Purchase",
            "CodingExercise\\Model\\Object\\Purchase"
        ],
        "parents": [],
        "lcom": 2,
        "length": 78,
        "vocabulary": 31,
        "volume": 386.43,
        "difficulty": 7.2,
        "effort": 2782.28,
        "level": 0.14,
        "bugs": 0.13,
        "time": 155,
        "intelligentContent": 53.67,
        "number_operators": 18,
        "number_operands": 60,
        "number_operators_unique": 6,
        "number_operands_unique": 25,
        "cloc": 24,
        "loc": 78,
        "lloc": 54,
        "mi": 81.7,
        "mIwoC": 43.83,
        "commentWeight": 37.87,
        "kanDefect": 0.38,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 100.38,
        "totalStructuralComplexity": 600,
        "totalDataComplexity": 2.27,
        "totalSystemComplexity": 602.27,
        "package": "CodingExercise\\Storage\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 9,
        "instability": 1,
        "violations": {}
    }
]