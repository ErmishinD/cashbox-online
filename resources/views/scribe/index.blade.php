<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Docs</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>


    <script src="{{ asset("/vendor/scribe/js/theme-default-3.37.2.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="base-measure-type-management">
                    <a href="#base-measure-type-management">Base Measure Type management</a>
                </li>
                                    <ul id="tocify-subheader-base-measure-type-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="base-measure-type-management-GETapi-base_measure_types">
                        <a href="#base-measure-type-management-GETapi-base_measure_types">Display a listing of the resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="base-measure-type-management-POSTapi-base_measure_types">
                        <a href="#base-measure-type-management-POSTapi-base_measure_types">Store a newly created resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="base-measure-type-management-GETapi-base_measure_types--id-">
                        <a href="#base-measure-type-management-GETapi-base_measure_types--id-">Display the specified resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="base-measure-type-management-PUTapi-base_measure_types--id-">
                        <a href="#base-measure-type-management-PUTapi-base_measure_types--id-">Update the specified resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="base-measure-type-management-DELETEapi-base_measure_types--id-">
                        <a href="#base-measure-type-management-DELETEapi-base_measure_types--id-">Remove the specified resource from storage.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cashbox-management">
                    <a href="#cashbox-management">Cashbox management</a>
                </li>
                                    <ul id="tocify-subheader-cashbox-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cashbox-management-POSTapi-cashbox-mass_create">
                        <a href="#cashbox-management-POSTapi-cashbox-mass_create">POST api/cashbox/mass_create</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-GETapi-cashbox-get_current_balance">
                        <a href="#cashbox-management-GETapi-cashbox-get_current_balance">GET api/cashbox/get_current_balance</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-POSTapi-cashbox-collect">
                        <a href="#cashbox-management-POSTapi-cashbox-collect">POST api/cashbox/collect</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-GETapi-cashbox-collection_history">
                        <a href="#cashbox-management-GETapi-cashbox-collection_history">GET api/cashbox/collection_history</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-POSTapi-cashbox-payments_from_history">
                        <a href="#cashbox-management-POSTapi-cashbox-payments_from_history">POST api/cashbox/payments_from_history</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-GETapi-cashbox">
                        <a href="#cashbox-management-GETapi-cashbox">GET api/cashbox</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-POSTapi-cashbox">
                        <a href="#cashbox-management-POSTapi-cashbox">POST api/cashbox</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-GETapi-cashbox--id-">
                        <a href="#cashbox-management-GETapi-cashbox--id-">GET api/cashbox/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-PUTapi-cashbox--id-">
                        <a href="#cashbox-management-PUTapi-cashbox--id-">PUT api/cashbox/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="cashbox-management-DELETEapi-cashbox--id-">
                        <a href="#cashbox-management-DELETEapi-cashbox--id-">DELETE api/cashbox/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="category-management">
                    <a href="#category-management">Category management</a>
                </li>
                                    <ul id="tocify-subheader-category-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-categories-get_for_select">
                        <a href="#category-management-GETapi-categories-get_for_select">GET api/categories/get_for_select</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-categories">
                        <a href="#category-management-GETapi-categories">GET api/categories</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-POSTapi-categories">
                        <a href="#category-management-POSTapi-categories">POST api/categories</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-GETapi-categories--id-">
                        <a href="#category-management-GETapi-categories--id-">GET api/categories/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-PUTapi-categories--id-">
                        <a href="#category-management-PUTapi-categories--id-">PUT api/categories/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="category-management-DELETEapi-categories--id-">
                        <a href="#category-management-DELETEapi-categories--id-">DELETE api/categories/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="company-management">
                    <a href="#company-management">Company management</a>
                </li>
                                    <ul id="tocify-subheader-company-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="company-management-GETapi-companies--id-">
                        <a href="#company-management-GETapi-companies--id-">GET api/companies/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="company-management-PUTapi-companies--id-">
                        <a href="#company-management-PUTapi-companies--id-">PUT api/companies/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="counterparty-management">
                    <a href="#counterparty-management">Counterparty management</a>
                </li>
                                    <ul id="tocify-subheader-counterparty-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="counterparty-management-GETapi-counterparties">
                        <a href="#counterparty-management-GETapi-counterparties">GET api/counterparties</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="counterparty-management-POSTapi-counterparties">
                        <a href="#counterparty-management-POSTapi-counterparties">POST api/counterparties</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="counterparty-management-GETapi-counterparties--id-">
                        <a href="#counterparty-management-GETapi-counterparties--id-">GET api/counterparties/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="counterparty-management-PUTapi-counterparties--id-">
                        <a href="#counterparty-management-PUTapi-counterparties--id-">PUT api/counterparties/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="counterparty-management-DELETEapi-counterparties--id-">
                        <a href="#counterparty-management-DELETEapi-counterparties--id-">DELETE api/counterparties/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                        <a href="#endpoints-GETapi-user">GET api/user</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="external-sale-management">
                    <a href="#external-sale-management">External Sale management</a>
                </li>
                                    <ul id="tocify-subheader-external-sale-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="external-sale-management-POSTapi-external_sales-get_paginated">
                        <a href="#external-sale-management-POSTapi-external_sales-get_paginated">POST api/external_sales/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="external-sale-management-POSTapi-external-sale">
                        <a href="#external-sale-management-POSTapi-external-sale">POST api/external/sale</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="external-sale-management-DELETEapi-external_sales--externalSale_id-">
                        <a href="#external-sale-management-DELETEapi-external_sales--externalSale_id-">DELETE api/external_sales/{externalSale_id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="external-sale-management-POSTapi-external_sales--externalSale--restore">
                        <a href="#external-sale-management-POSTapi-external_sales--externalSale--restore">POST api/external_sales/{externalSale}/restore</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="external-sale-management-POSTapi-external_sales-get_paginated-history">
                        <a href="#external-sale-management-POSTapi-external_sales-get_paginated-history">POST api/external_sales/get_paginated/history</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
                <li class="tocify-item level-1" data-unique="file-upload-endpoints">
                    <a href="#file-upload-endpoints">File Upload endpoints</a>
                </li>
                                    <ul id="tocify-subheader-file-upload-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="file-upload-endpoints-POSTapi-file_upload">
                        <a href="#file-upload-endpoints-POSTapi-file_upload">POST api/file_upload</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-10" class="tocify-header">
                <li class="tocify-item level-1" data-unique="get-for-select">
                    <a href="#get-for-select">Get for select</a>
                </li>
                                    <ul id="tocify-subheader-get-for-select" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="get-for-select-POSTapi-get_for_select">
                        <a href="#get-for-select-POSTapi-get_for_select">POST api/get_for_select</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-11" class="tocify-header">
                <li class="tocify-item level-1" data-unique="measure-type-management">
                    <a href="#measure-type-management">Measure Type management</a>
                </li>
                                    <ul id="tocify-subheader-measure-type-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="measure-type-management-POSTapi-measure_types-get_by_base_measure_type">
                        <a href="#measure-type-management-POSTapi-measure_types-get_by_base_measure_type">POST api/measure_types/get_by_base_measure_type</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-GETapi-measure_types-get_grouped_by_base">
                        <a href="#measure-type-management-GETapi-measure_types-get_grouped_by_base">GET api/measure_types/get_grouped_by_base</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-GETapi-measure_types">
                        <a href="#measure-type-management-GETapi-measure_types">GET api/measure_types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-POSTapi-measure_types">
                        <a href="#measure-type-management-POSTapi-measure_types">POST api/measure_types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-GETapi-measure_types--id-">
                        <a href="#measure-type-management-GETapi-measure_types--id-">GET api/measure_types/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-PUTapi-measure_types--id-">
                        <a href="#measure-type-management-PUTapi-measure_types--id-">PUT api/measure_types/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="measure-type-management-DELETEapi-measure_types--id-">
                        <a href="#measure-type-management-DELETEapi-measure_types--id-">DELETE api/measure_types/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-12" class="tocify-header">
                <li class="tocify-item level-1" data-unique="permission-management">
                    <a href="#permission-management">Permission management</a>
                </li>
                                    <ul id="tocify-subheader-permission-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="permission-management-GETapi-permissions">
                        <a href="#permission-management-GETapi-permissions">GET api/permissions</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-13" class="tocify-header">
                <li class="tocify-item level-1" data-unique="productconsumption-management">
                    <a href="#productconsumption-management">ProductConsumption management</a>
                </li>
                                    <ul id="tocify-subheader-productconsumption-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="productconsumption-management-POSTapi-product_consumptions-get_paginated">
                        <a href="#productconsumption-management-POSTapi-product_consumptions-get_paginated">POST api/product_consumptions/get_paginated</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-14" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product-purchase-management">
                    <a href="#product-purchase-management">Product Purchase management</a>
                </li>
                                    <ul id="tocify-subheader-product-purchase-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-purchase-management-POSTapi-product_purchases-mass_create">
                        <a href="#product-purchase-management-POSTapi-product_purchases-mass_create">POST api/product_purchases/mass_create</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-POSTapi-product_purchases-get_paginated">
                        <a href="#product-purchase-management-POSTapi-product_purchases-get_paginated">POST api/product_purchases/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-GETapi-product_purchases">
                        <a href="#product-purchase-management-GETapi-product_purchases">GET api/product_purchases</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-POSTapi-product_purchases">
                        <a href="#product-purchase-management-POSTapi-product_purchases">POST api/product_purchases</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-GETapi-product_purchases--id-">
                        <a href="#product-purchase-management-GETapi-product_purchases--id-">GET api/product_purchases/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-PUTapi-product_purchases--id-">
                        <a href="#product-purchase-management-PUTapi-product_purchases--id-">PUT api/product_purchases/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-DELETEapi-product_purchases--id-">
                        <a href="#product-purchase-management-DELETEapi-product_purchases--id-">DELETE api/product_purchases/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-GETapi-product_purchases--product_purchase_id--get_for_edit">
                        <a href="#product-purchase-management-GETapi-product_purchases--product_purchase_id--get_for_edit">GET api/product_purchases/{product_purchase_id}/get_for_edit</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-15" class="tocify-header">
                <li class="tocify-item level-1" data-unique="product-type-management">
                    <a href="#product-type-management">Product Type management</a>
                </li>
                                    <ul id="tocify-subheader-product-type-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="product-type-management-POSTapi-product_types-get_paginated">
                        <a href="#product-type-management-POSTapi-product_types-get_paginated">POST api/product_types/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-POSTapi-product_types-get_for_purchase">
                        <a href="#product-type-management-POSTapi-product_types-get_for_purchase">POST api/product_types/get_for_purchase</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types-get_types">
                        <a href="#product-type-management-GETapi-product_types-get_types">GET api/product_types/get_types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types-get_for_select">
                        <a href="#product-type-management-GETapi-product_types-get_for_select">GET api/product_types/get_for_select</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-POSTapi-product_types-get_current_quantity">
                        <a href="#product-type-management-POSTapi-product_types-get_current_quantity">POST api/product_types/get_current_quantity</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types--id--get_storages_quantity">
                        <a href="#product-type-management-GETapi-product_types--id--get_storages_quantity">GET api/product_types/{id}/get_storages_quantity</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types">
                        <a href="#product-type-management-GETapi-product_types">GET api/product_types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-POSTapi-product_types">
                        <a href="#product-type-management-POSTapi-product_types">POST api/product_types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types--id-">
                        <a href="#product-type-management-GETapi-product_types--id-">GET api/product_types/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-PUTapi-product_types--id-">
                        <a href="#product-type-management-PUTapi-product_types--id-">PUT api/product_types/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-DELETEapi-product_types--id-">
                        <a href="#product-type-management-DELETEapi-product_types--id-">DELETE api/product_types/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types-get_short_info--product_type_id-">
                        <a href="#product-type-management-GETapi-product_types-get_short_info--product_type_id-">GET api/product_types/get_short_info/{product_type_id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-16" class="tocify-header">
                <li class="tocify-item level-1" data-unique="report-endpoints">
                    <a href="#report-endpoints">Report endpoints</a>
                </li>
                                    <ul id="tocify-subheader-report-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-warning_threshold">
                        <a href="#report-endpoints-GETapi-reports-warning_threshold">GET api/reports/warning_threshold</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-warning_threshold--storage_id-">
                        <a href="#report-endpoints-GETapi-reports-warning_threshold--storage_id-">GET api/reports/warning_threshold/{storage_id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-profit">
                        <a href="#report-endpoints-GETapi-reports-profit">GET api/reports/profit</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-profit_by_day">
                        <a href="#report-endpoints-GETapi-reports-profit_by_day">GET api/reports/profit_by_day</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-profit_by_category">
                        <a href="#report-endpoints-GETapi-reports-profit_by_category">GET api/reports/profit_by_category</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-popular_sell_products">
                        <a href="#report-endpoints-GETapi-reports-popular_sell_products">GET api/reports/popular_sell_products</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-POSTapi-reports-get_paginated_transactions">
                        <a href="#report-endpoints-POSTapi-reports-get_paginated_transactions">POST api/reports/get_paginated_transactions</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-purchase_recommendations">
                        <a href="#report-endpoints-GETapi-reports-purchase_recommendations">GET api/reports/purchase_recommendations</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-product_consumptions_by_category--product_type_id-">
                        <a href="#report-endpoints-GETapi-reports-product_consumptions_by_category--product_type_id-">GET api/reports/product_consumptions_by_category/{product_type_id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="report-endpoints-GETapi-reports-product_types_statistic">
                        <a href="#report-endpoints-GETapi-reports-product_types_statistic">GET api/reports/product_types_statistic</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-17" class="tocify-header">
                <li class="tocify-item level-1" data-unique="role-management">
                    <a href="#role-management">Role management</a>
                </li>
                                    <ul id="tocify-subheader-role-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="role-management-GETapi-roles">
                        <a href="#role-management-GETapi-roles">GET api/roles</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="role-management-POSTapi-roles">
                        <a href="#role-management-POSTapi-roles">POST api/roles</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="role-management-GETapi-roles--id-">
                        <a href="#role-management-GETapi-roles--id-">GET api/roles/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="role-management-PUTapi-roles--id-">
                        <a href="#role-management-PUTapi-roles--id-">PUT api/roles/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="role-management-DELETEapi-roles--id-">
                        <a href="#role-management-DELETEapi-roles--id-">DELETE api/roles/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-18" class="tocify-header">
                <li class="tocify-item level-1" data-unique="sell-product-group-management">
                    <a href="#sell-product-group-management">Sell Product Group management</a>
                </li>
                                    <ul id="tocify-subheader-sell-product-group-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="sell-product-group-management-GETapi-sell_product_groups">
                        <a href="#sell-product-group-management-GETapi-sell_product_groups">GET api/sell_product_groups</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-group-management-POSTapi-sell_product_groups">
                        <a href="#sell-product-group-management-POSTapi-sell_product_groups">POST api/sell_product_groups</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-group-management-GETapi-sell_product_groups--id-">
                        <a href="#sell-product-group-management-GETapi-sell_product_groups--id-">GET api/sell_product_groups/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-group-management-PUTapi-sell_product_groups--id-">
                        <a href="#sell-product-group-management-PUTapi-sell_product_groups--id-">PUT api/sell_product_groups/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-group-management-DELETEapi-sell_product_groups--id-">
                        <a href="#sell-product-group-management-DELETEapi-sell_product_groups--id-">DELETE api/sell_product_groups/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-19" class="tocify-header">
                <li class="tocify-item level-1" data-unique="sell-product-management">
                    <a href="#sell-product-management">Sell Product management</a>
                </li>
                                    <ul id="tocify-subheader-sell-product-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="sell-product-management-POSTapi-sell_products-get_paginated">
                        <a href="#sell-product-management-POSTapi-sell_products-get_paginated">POST api/sell_products/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-management-GETapi-sell_products">
                        <a href="#sell-product-management-GETapi-sell_products">GET api/sell_products</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-management-POSTapi-sell_products">
                        <a href="#sell-product-management-POSTapi-sell_products">POST api/sell_products</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-management-GETapi-sell_products--id-">
                        <a href="#sell-product-management-GETapi-sell_products--id-">GET api/sell_products/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-management-PUTapi-sell_products--id-">
                        <a href="#sell-product-management-PUTapi-sell_products--id-">PUT api/sell_products/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="sell-product-management-DELETEapi-sell_products--id-">
                        <a href="#sell-product-management-DELETEapi-sell_products--id-">DELETE api/sell_products/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-20" class="tocify-header">
                <li class="tocify-item level-1" data-unique="shop-management">
                    <a href="#shop-management">Shop management</a>
                </li>
                                    <ul id="tocify-subheader-shop-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="shop-management-POSTapi-shops-get_by_company">
                        <a href="#shop-management-POSTapi-shops-get_by_company">POST api/shops/get_by_company</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shop-management-GETapi-shops">
                        <a href="#shop-management-GETapi-shops">GET api/shops</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shop-management-POSTapi-shops">
                        <a href="#shop-management-POSTapi-shops">POST api/shops</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shop-management-GETapi-shops--id-">
                        <a href="#shop-management-GETapi-shops--id-">GET api/shops/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shop-management-PUTapi-shops--id-">
                        <a href="#shop-management-PUTapi-shops--id-">PUT api/shops/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shop-management-DELETEapi-shops--id-">
                        <a href="#shop-management-DELETEapi-shops--id-">DELETE api/shops/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-21" class="tocify-header">
                <li class="tocify-item level-1" data-unique="storage-management">
                    <a href="#storage-management">Storage management</a>
                </li>
                                    <ul id="tocify-subheader-storage-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="storage-management-POSTapi-storages-get_for_purchase">
                        <a href="#storage-management-POSTapi-storages-get_for_purchase">POST api/storages/get_for_purchase</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-POSTapi-storages-get_balance">
                        <a href="#storage-management-POSTapi-storages-get_balance">POST api/storages/get_balance</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-POSTapi-storages-write_off">
                        <a href="#storage-management-POSTapi-storages-write_off">POST api/storages/write_off</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-POSTapi-storages-transfer">
                        <a href="#storage-management-POSTapi-storages-transfer">POST api/storages/transfer</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-GETapi-storages">
                        <a href="#storage-management-GETapi-storages">GET api/storages</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-POSTapi-storages">
                        <a href="#storage-management-POSTapi-storages">POST api/storages</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-GETapi-storages--id-">
                        <a href="#storage-management-GETapi-storages--id-">GET api/storages/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-PUTapi-storages--id-">
                        <a href="#storage-management-PUTapi-storages--id-">PUT api/storages/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="storage-management-DELETEapi-storages--id-">
                        <a href="#storage-management-DELETEapi-storages--id-">DELETE api/storages/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-22" class="tocify-header">
                <li class="tocify-item level-1" data-unique="system-logs">
                    <a href="#system-logs">System Logs</a>
                </li>
                                    <ul id="tocify-subheader-system-logs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="system-logs-POSTapi-system_logs-get_paginated">
                        <a href="#system-logs-POSTapi-system_logs-get_paginated">POST api/system_logs/get_paginated</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-23" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transfer-management">
                    <a href="#transfer-management">Transfer management</a>
                </li>
                                    <ul id="tocify-subheader-transfer-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transfer-management-POSTapi-transfers-get_paginated">
                        <a href="#transfer-management-POSTapi-transfers-get_paginated">POST api/transfers/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="transfer-management-GETapi-transfers--transfer_id-">
                        <a href="#transfer-management-GETapi-transfers--transfer_id-">GET api/transfers/{transfer_id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-24" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-management">
                    <a href="#user-management">User management</a>
                </li>
                                    <ul id="tocify-subheader-user-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-management-POSTapi-change_shop">
                        <a href="#user-management-POSTapi-change_shop">POST api/change_shop</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-management-GETapi-users">
                        <a href="#user-management-GETapi-users">GET api/users</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-management-POSTapi-users">
                        <a href="#user-management-POSTapi-users">POST api/users</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-management-GETapi-users--id-">
                        <a href="#user-management-GETapi-users--id-">GET api/users/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-management-PUTapi-users--id-">
                        <a href="#user-management-PUTapi-users--id-">PUT api/users/{id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-management-DELETEapi-users--id-">
                        <a href="#user-management-DELETEapi-users--id-">DELETE api/users/{id}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-25" class="tocify-header">
                <li class="tocify-item level-1" data-unique="write-off-management">
                    <a href="#write-off-management">Write Off management</a>
                </li>
                                    <ul id="tocify-subheader-write-off-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="write-off-management-POSTapi-write_offs-get_paginated">
                        <a href="#write-off-management-POSTapi-write_offs-get_paginated">POST api/write_offs/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="write-off-management-GETapi-write_offs--write_off_id-">
                        <a href="#write-off-management-GETapi-write_offs--write_off_id-">GET api/write_offs/{write_off_id}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="write-off-management-DELETEapi-write_offs--write_off_id-">
                        <a href="#write-off-management-DELETEapi-write_offs--write_off_id-">DELETE api/write_offs/{write_off_id}</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 2 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This is page where you can find API documentation</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://cashbox-online.test</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>Authenticate requests to this API's endpoints by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="base-measure-type-management">Base Measure Type management</h1>

    

            <h2 id="base-measure-type-management-GETapi-base_measure_types">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-base_measure_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/base_measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/base_measure_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-base_measure_types">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-base_measure_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-base_measure_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-base_measure_types"></code></pre>
</span>
<span id="execution-error-GETapi-base_measure_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-base_measure_types"></code></pre>
</span>
<form id="form-GETapi-base_measure_types" data-method="GET"
      data-path="api/base_measure_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-base_measure_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/base_measure_types</code></b>
        </p>
                <p>
            <label id="auth-GETapi-base_measure_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-base_measure_types"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="base-measure-type-management-POSTapi-base_measure_types">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-base_measure_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/base_measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"consequatur\",
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/base_measure_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "consequatur",
    "name": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-base_measure_types">
</span>
<span id="execution-results-POSTapi-base_measure_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-base_measure_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-base_measure_types"></code></pre>
</span>
<span id="execution-error-POSTapi-base_measure_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-base_measure_types"></code></pre>
</span>
<form id="form-POSTapi-base_measure_types" data-method="POST"
      data-path="api/base_measure_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-base_measure_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/base_measure_types</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-base_measure_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-base_measure_types"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="POSTapi-base_measure_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-base_measure_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="base-measure-type-management-GETapi-base_measure_types--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-base_measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/base_measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/base_measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-base_measure_types--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-base_measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-base_measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-base_measure_types--id-"></code></pre>
</span>
<span id="execution-error-GETapi-base_measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-base_measure_types--id-"></code></pre>
</span>
<form id="form-GETapi-base_measure_types--id-" data-method="GET"
      data-path="api/base_measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-base_measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/base_measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-base_measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-base_measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-base_measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the base measure type.</p>
            </p>
                    </form>

            <h2 id="base-measure-type-management-PUTapi-base_measure_types--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-base_measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/base_measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"consequatur\",
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/base_measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "consequatur",
    "name": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-base_measure_types--id-">
</span>
<span id="execution-results-PUTapi-base_measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-base_measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-base_measure_types--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-base_measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-base_measure_types--id-"></code></pre>
</span>
<form id="form-PUTapi-base_measure_types--id-" data-method="PUT"
      data-path="api/base_measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-base_measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/base_measure_types/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/base_measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-base_measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-base_measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-base_measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the base measure type.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="PUTapi-base_measure_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-base_measure_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="base-measure-type-management-DELETEapi-base_measure_types--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-base_measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/base_measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/base_measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-base_measure_types--id-">
</span>
<span id="execution-results-DELETEapi-base_measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-base_measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-base_measure_types--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-base_measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-base_measure_types--id-"></code></pre>
</span>
<form id="form-DELETEapi-base_measure_types--id-" data-method="DELETE"
      data-path="api/base_measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-base_measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/base_measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-base_measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-base_measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-base_measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the base measure type.</p>
            </p>
                    </form>

        <h1 id="cashbox-management">Cashbox management</h1>

    

            <h2 id="cashbox-management-POSTapi-cashbox-mass_create">POST api/cashbox/mass_create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-cashbox-mass_create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/cashbox/mass_create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"shop_id\": \"consequatur\",
    \"transaction_type\": \"_out\",
    \"payment_type\": \"_card\",
    \"operator_id\": \"consequatur\",
    \"sell_products\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/mass_create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "shop_id": "consequatur",
    "transaction_type": "_out",
    "payment_type": "_card",
    "operator_id": "consequatur",
    "sell_products": [
        "consequatur"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cashbox-mass_create">
</span>
<span id="execution-results-POSTapi-cashbox-mass_create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cashbox-mass_create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cashbox-mass_create"></code></pre>
</span>
<span id="execution-error-POSTapi-cashbox-mass_create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cashbox-mass_create"></code></pre>
</span>
<form id="form-POSTapi-cashbox-mass_create" data-method="POST"
      data-path="api/cashbox/mass_create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cashbox-mass_create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cashbox/mass_create</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-cashbox-mass_create" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-cashbox-mass_create"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-cashbox-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-cashbox-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>transaction_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="transaction_type"
               data-endpoint="POSTapi-cashbox-mass_create"
               value="_out"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_in</code> or <code>_out</code>.</p>
        </p>
                <p>
            <b><code>payment_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="payment_type"
               data-endpoint="POSTapi-cashbox-mass_create"
               value="_card"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_card</code> or <code>_cash</code>.</p>
        </p>
                <p>
            <b><code>operator_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="operator_id"
               data-endpoint="POSTapi-cashbox-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>external_sale_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="external_sale_id"
               data-endpoint="POSTapi-cashbox-mass_create"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>sell_products</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
                <input type="text"
               name="sell_products[0]"
               data-endpoint="POSTapi-cashbox-mass_create"
               data-component="body" hidden>
        <input type="text"
               name="sell_products[1]"
               data-endpoint="POSTapi-cashbox-mass_create"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="cashbox-management-GETapi-cashbox-get_current_balance">GET api/cashbox/get_current_balance</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-cashbox-get_current_balance">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/cashbox/get_current_balance" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/get_current_balance"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cashbox-get_current_balance">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cashbox-get_current_balance" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cashbox-get_current_balance"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cashbox-get_current_balance"></code></pre>
</span>
<span id="execution-error-GETapi-cashbox-get_current_balance" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cashbox-get_current_balance"></code></pre>
</span>
<form id="form-GETapi-cashbox-get_current_balance" data-method="GET"
      data-path="api/cashbox/get_current_balance"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cashbox-get_current_balance', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cashbox/get_current_balance</code></b>
        </p>
                <p>
            <label id="auth-GETapi-cashbox-get_current_balance" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-cashbox-get_current_balance"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="cashbox-management-POSTapi-cashbox-collect">POST api/cashbox/collect</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-cashbox-collect">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/cashbox/collect" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ids\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/collect"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ids": [
        "consequatur"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cashbox-collect">
</span>
<span id="execution-results-POSTapi-cashbox-collect" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cashbox-collect"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cashbox-collect"></code></pre>
</span>
<span id="execution-error-POSTapi-cashbox-collect" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cashbox-collect"></code></pre>
</span>
<form id="form-POSTapi-cashbox-collect" data-method="POST"
      data-path="api/cashbox/collect"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cashbox-collect', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cashbox/collect</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-cashbox-collect" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-cashbox-collect"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>ids</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
                <input type="text"
               name="ids[0]"
               data-endpoint="POSTapi-cashbox-collect"
               data-component="body" hidden>
        <input type="text"
               name="ids[1]"
               data-endpoint="POSTapi-cashbox-collect"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="cashbox-management-GETapi-cashbox-collection_history">GET api/cashbox/collection_history</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-cashbox-collection_history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/cashbox/collection_history" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/collection_history"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cashbox-collection_history">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cashbox-collection_history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cashbox-collection_history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cashbox-collection_history"></code></pre>
</span>
<span id="execution-error-GETapi-cashbox-collection_history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cashbox-collection_history"></code></pre>
</span>
<form id="form-GETapi-cashbox-collection_history" data-method="GET"
      data-path="api/cashbox/collection_history"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cashbox-collection_history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cashbox/collection_history</code></b>
        </p>
                <p>
            <label id="auth-GETapi-cashbox-collection_history" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-cashbox-collection_history"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="cashbox-management-POSTapi-cashbox-payments_from_history">POST api/cashbox/payments_from_history</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-cashbox-payments_from_history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/cashbox/payments_from_history" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"collected_at\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/payments_from_history"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "collected_at": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cashbox-payments_from_history">
</span>
<span id="execution-results-POSTapi-cashbox-payments_from_history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cashbox-payments_from_history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cashbox-payments_from_history"></code></pre>
</span>
<span id="execution-error-POSTapi-cashbox-payments_from_history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cashbox-payments_from_history"></code></pre>
</span>
<form id="form-POSTapi-cashbox-payments_from_history" data-method="POST"
      data-path="api/cashbox/payments_from_history"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cashbox-payments_from_history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cashbox/payments_from_history</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-cashbox-payments_from_history" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-cashbox-payments_from_history"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>collected_at</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="collected_at"
               data-endpoint="POSTapi-cashbox-payments_from_history"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="cashbox-management-GETapi-cashbox">GET api/cashbox</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-cashbox">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/cashbox" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cashbox">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cashbox" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cashbox"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cashbox"></code></pre>
</span>
<span id="execution-error-GETapi-cashbox" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cashbox"></code></pre>
</span>
<form id="form-GETapi-cashbox" data-method="GET"
      data-path="api/cashbox"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cashbox', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cashbox</code></b>
        </p>
                <p>
            <label id="auth-GETapi-cashbox" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-cashbox"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="cashbox-management-POSTapi-cashbox">POST api/cashbox</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-cashbox">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/cashbox" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"shop_id\": \"consequatur\",
    \"transaction_type\": \"_out\",
    \"payment_type\": \"_card\",
    \"amount\": 0,
    \"operator_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "shop_id": "consequatur",
    "transaction_type": "_out",
    "payment_type": "_card",
    "amount": 0,
    "operator_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cashbox">
</span>
<span id="execution-results-POSTapi-cashbox" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cashbox"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cashbox"></code></pre>
</span>
<span id="execution-error-POSTapi-cashbox" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cashbox"></code></pre>
</span>
<form id="form-POSTapi-cashbox" data-method="POST"
      data-path="api/cashbox"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cashbox', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cashbox</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-cashbox" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-cashbox"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-cashbox"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-cashbox"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>sell_product_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sell_product_id"
               data-endpoint="POSTapi-cashbox"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>product_purchase_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="product_purchase_id"
               data-endpoint="POSTapi-cashbox"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>data</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="data"
               data-endpoint="POSTapi-cashbox"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>transaction_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="transaction_type"
               data-endpoint="POSTapi-cashbox"
               value="_out"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_in</code> or <code>_out</code>.</p>
        </p>
                <p>
            <b><code>payment_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="payment_type"
               data-endpoint="POSTapi-cashbox"
               value="_card"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_card</code> or <code>_cash</code>.</p>
        </p>
                <p>
            <b><code>amount</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="amount"
               data-endpoint="POSTapi-cashbox"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-cashbox"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>operator_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="operator_id"
               data-endpoint="POSTapi-cashbox"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="cashbox-management-GETapi-cashbox--id-">GET api/cashbox/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-cashbox--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/cashbox/10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/10"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cashbox--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cashbox--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cashbox--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cashbox--id-"></code></pre>
</span>
<span id="execution-error-GETapi-cashbox--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cashbox--id-"></code></pre>
</span>
<form id="form-GETapi-cashbox--id-" data-method="GET"
      data-path="api/cashbox/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cashbox--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cashbox/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-cashbox--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-cashbox--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-cashbox--id-"
               value="10"
               data-component="url" hidden>
    <br>
<p>The ID of the cashbox.</p>
            </p>
                    </form>

            <h2 id="cashbox-management-PUTapi-cashbox--id-">PUT api/cashbox/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-cashbox--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/cashbox/10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"payment_type\": \"_card\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/10"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payment_type": "_card"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-cashbox--id-">
</span>
<span id="execution-results-PUTapi-cashbox--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-cashbox--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-cashbox--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-cashbox--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-cashbox--id-"></code></pre>
</span>
<form id="form-PUTapi-cashbox--id-" data-method="PUT"
      data-path="api/cashbox/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-cashbox--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/cashbox/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/cashbox/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-cashbox--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-cashbox--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-cashbox--id-"
               value="10"
               data-component="url" hidden>
    <br>
<p>The ID of the cashbox.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>payment_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="payment_type"
               data-endpoint="PUTapi-cashbox--id-"
               value="_card"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_card</code> or <code>_cash</code>.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="PUTapi-cashbox--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="cashbox-management-DELETEapi-cashbox--id-">DELETE api/cashbox/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-cashbox--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/cashbox/10" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/cashbox/10"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-cashbox--id-">
</span>
<span id="execution-results-DELETEapi-cashbox--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cashbox--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cashbox--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-cashbox--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cashbox--id-"></code></pre>
</span>
<form id="form-DELETEapi-cashbox--id-" data-method="DELETE"
      data-path="api/cashbox/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cashbox--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cashbox/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-cashbox--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-cashbox--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-cashbox--id-"
               value="10"
               data-component="url" hidden>
    <br>
<p>The ID of the cashbox.</p>
            </p>
                    </form>

        <h1 id="category-management">Category management</h1>

    

            <h2 id="category-management-GETapi-categories-get_for_select">GET api/categories/get_for_select</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-categories-get_for_select">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/categories/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories/get_for_select"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories-get_for_select">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories-get_for_select" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories-get_for_select"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories-get_for_select"></code></pre>
</span>
<span id="execution-error-GETapi-categories-get_for_select" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories-get_for_select"></code></pre>
</span>
<form id="form-GETapi-categories-get_for_select" data-method="GET"
      data-path="api/categories/get_for_select"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories-get_for_select', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/get_for_select</code></b>
        </p>
                <p>
            <label id="auth-GETapi-categories-get_for_select" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-categories-get_for_select"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="category-management-GETapi-categories">GET api/categories</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <p>
            <label id="auth-GETapi-categories" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-categories"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="category-management-POSTapi-categories">POST api/categories</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "company_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-categories">
</span>
<span id="execution-results-POSTapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories"></code></pre>
</span>
<span id="execution-error-POSTapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories"></code></pre>
</span>
<form id="form-POSTapi-categories" data-method="POST"
      data-path="api/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categories</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-categories" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-categories"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-categories"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-categories"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="POSTapi-categories"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="category-management-GETapi-categories--id-">GET api/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--id-"></code></pre>
</span>
<span id="execution-error-GETapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--id-"></code></pre>
</span>
<form id="form-GETapi-categories--id-" data-method="GET"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-categories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-categories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-categories--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                    </form>

            <h2 id="category-management-PUTapi-categories--id-">PUT api/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-categories--id-">
</span>
<span id="execution-results-PUTapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categories--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categories--id-"></code></pre>
</span>
<form id="form-PUTapi-categories--id-" data-method="PUT"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-categories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-categories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-categories--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-categories--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="PUTapi-categories--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="category-management-DELETEapi-categories--id-">DELETE api/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/categories/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-categories--id-">
</span>
<span id="execution-results-DELETEapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categories--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categories--id-"></code></pre>
</span>
<form id="form-DELETEapi-categories--id-" data-method="DELETE"
      data-path="api/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-categories--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-categories--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-categories--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the category.</p>
            </p>
                    </form>

        <h1 id="company-management">Company management</h1>

    

            <h2 id="company-management-GETapi-companies--id-">GET api/companies/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-companies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/companies/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/companies/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-companies--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-companies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-companies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies--id-"></code></pre>
</span>
<span id="execution-error-GETapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies--id-"></code></pre>
</span>
<form id="form-GETapi-companies--id-" data-method="GET"
      data-path="api/companies/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-companies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/companies/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-companies--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-companies--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-companies--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the company.</p>
            </p>
                    </form>

            <h2 id="company-management-PUTapi-companies--id-">PUT api/companies/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-companies--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/companies/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/companies/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-companies--id-">
</span>
<span id="execution-results-PUTapi-companies--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-companies--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-companies--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-companies--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-companies--id-"></code></pre>
</span>
<form id="form-PUTapi-companies--id-" data-method="PUT"
      data-path="api/companies/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-companies--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/companies/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/companies/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-companies--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-companies--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-companies--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the company.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-companies--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="counterparty-management">Counterparty management</h1>

    

            <h2 id="counterparty-management-GETapi-counterparties">GET api/counterparties</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-counterparties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/counterparties" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/counterparties"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-counterparties">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-counterparties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-counterparties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-counterparties"></code></pre>
</span>
<span id="execution-error-GETapi-counterparties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-counterparties"></code></pre>
</span>
<form id="form-GETapi-counterparties" data-method="GET"
      data-path="api/counterparties"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-counterparties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/counterparties</code></b>
        </p>
                <p>
            <label id="auth-GETapi-counterparties" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-counterparties"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="counterparty-management-POSTapi-counterparties">POST api/counterparties</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-counterparties">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/counterparties" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/counterparties"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "name": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-counterparties">
</span>
<span id="execution-results-POSTapi-counterparties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-counterparties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-counterparties"></code></pre>
</span>
<span id="execution-error-POSTapi-counterparties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-counterparties"></code></pre>
</span>
<form id="form-POSTapi-counterparties" data-method="POST"
      data-path="api/counterparties"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-counterparties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/counterparties</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-counterparties" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-counterparties"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-counterparties"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-counterparties"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="counterparty-management-GETapi-counterparties--id-">GET api/counterparties/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-counterparties--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/counterparties/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/counterparties/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-counterparties--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-counterparties--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-counterparties--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-counterparties--id-"></code></pre>
</span>
<span id="execution-error-GETapi-counterparties--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-counterparties--id-"></code></pre>
</span>
<form id="form-GETapi-counterparties--id-" data-method="GET"
      data-path="api/counterparties/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-counterparties--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/counterparties/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-counterparties--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-counterparties--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-counterparties--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the counterparty.</p>
            </p>
                    </form>

            <h2 id="counterparty-management-PUTapi-counterparties--id-">PUT api/counterparties/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-counterparties--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/counterparties/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/counterparties/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "name": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-counterparties--id-">
</span>
<span id="execution-results-PUTapi-counterparties--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-counterparties--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-counterparties--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-counterparties--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-counterparties--id-"></code></pre>
</span>
<form id="form-PUTapi-counterparties--id-" data-method="PUT"
      data-path="api/counterparties/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-counterparties--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/counterparties/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/counterparties/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-counterparties--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-counterparties--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-counterparties--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the counterparty.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="PUTapi-counterparties--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-counterparties--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="counterparty-management-DELETEapi-counterparties--id-">DELETE api/counterparties/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-counterparties--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/counterparties/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/counterparties/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-counterparties--id-">
</span>
<span id="execution-results-DELETEapi-counterparties--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-counterparties--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-counterparties--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-counterparties--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-counterparties--id-"></code></pre>
</span>
<form id="form-DELETEapi-counterparties--id-" data-method="DELETE"
      data-path="api/counterparties/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-counterparties--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/counterparties/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-counterparties--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-counterparties--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-counterparties--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the counterparty.</p>
            </p>
                    </form>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-user"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="external-sale-management">External Sale management</h1>

    

            <h2 id="external-sale-management-POSTapi-external_sales-get_paginated">POST api/external_sales/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-external_sales-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/external_sales/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/external_sales/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-external_sales-get_paginated">
</span>
<span id="execution-results-POSTapi-external_sales-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-external_sales-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-external_sales-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-external_sales-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-external_sales-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-external_sales-get_paginated" data-method="POST"
      data-path="api/external_sales/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-external_sales-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/external_sales/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-external_sales-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-external_sales-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-external_sales-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-external_sales-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="external-sale-management-POSTapi-external-sale">POST api/external/sale</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-external-sale">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/external/sale" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"shop_id\": \"consequatur\",
    \"amount\": \"consequatur\",
    \"payment_type\": \"_cash\",
    \"description\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/external/sale"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "shop_id": "consequatur",
    "amount": "consequatur",
    "payment_type": "_cash",
    "description": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-external-sale">
</span>
<span id="execution-results-POSTapi-external-sale" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-external-sale"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-external-sale"></code></pre>
</span>
<span id="execution-error-POSTapi-external-sale" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-external-sale"></code></pre>
</span>
<form id="form-POSTapi-external-sale" data-method="POST"
      data-path="api/external/sale"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-external-sale', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/external/sale</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-external-sale" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-external-sale"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-external-sale"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-external-sale"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>amount</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="amount"
               data-endpoint="POSTapi-external-sale"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>payment_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="payment_type"
               data-endpoint="POSTapi-external-sale"
               value="_cash"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_card</code> or <code>_cash</code>.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-external-sale"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="external-sale-management-DELETEapi-external_sales--externalSale_id-">DELETE api/external_sales/{externalSale_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-external_sales--externalSale_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/external_sales/2" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/external_sales/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-external_sales--externalSale_id-">
</span>
<span id="execution-results-DELETEapi-external_sales--externalSale_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-external_sales--externalSale_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-external_sales--externalSale_id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-external_sales--externalSale_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-external_sales--externalSale_id-"></code></pre>
</span>
<form id="form-DELETEapi-external_sales--externalSale_id-" data-method="DELETE"
      data-path="api/external_sales/{externalSale_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-external_sales--externalSale_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/external_sales/{externalSale_id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-external_sales--externalSale_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-external_sales--externalSale_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>externalSale_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="externalSale_id"
               data-endpoint="DELETEapi-external_sales--externalSale_id-"
               value="2"
               data-component="url" hidden>
    <br>
<p>The ID of the externalSale.</p>
            </p>
                    </form>

            <h2 id="external-sale-management-POSTapi-external_sales--externalSale--restore">POST api/external_sales/{externalSale}/restore</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-external_sales--externalSale--restore">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/external_sales/2/restore" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/external_sales/2/restore"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-external_sales--externalSale--restore">
</span>
<span id="execution-results-POSTapi-external_sales--externalSale--restore" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-external_sales--externalSale--restore"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-external_sales--externalSale--restore"></code></pre>
</span>
<span id="execution-error-POSTapi-external_sales--externalSale--restore" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-external_sales--externalSale--restore"></code></pre>
</span>
<form id="form-POSTapi-external_sales--externalSale--restore" data-method="POST"
      data-path="api/external_sales/{externalSale}/restore"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-external_sales--externalSale--restore', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/external_sales/{externalSale}/restore</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-external_sales--externalSale--restore" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-external_sales--externalSale--restore"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>externalSale</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="externalSale"
               data-endpoint="POSTapi-external_sales--externalSale--restore"
               value="2"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="external-sale-management-POSTapi-external_sales-get_paginated-history">POST api/external_sales/get_paginated/history</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-external_sales-get_paginated-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/external_sales/get_paginated/history" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/external_sales/get_paginated/history"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-external_sales-get_paginated-history">
</span>
<span id="execution-results-POSTapi-external_sales-get_paginated-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-external_sales-get_paginated-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-external_sales-get_paginated-history"></code></pre>
</span>
<span id="execution-error-POSTapi-external_sales-get_paginated-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-external_sales-get_paginated-history"></code></pre>
</span>
<form id="form-POSTapi-external_sales-get_paginated-history" data-method="POST"
      data-path="api/external_sales/get_paginated/history"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-external_sales-get_paginated-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/external_sales/get_paginated/history</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-external_sales-get_paginated-history" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-external_sales-get_paginated-history"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-external_sales-get_paginated-history"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-external_sales-get_paginated-history"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="file-upload-endpoints">File Upload endpoints</h1>

    

            <h2 id="file-upload-endpoints-POSTapi-file_upload">POST api/file_upload</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-file_upload">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/file_upload" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/file_upload"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-file_upload">
</span>
<span id="execution-results-POSTapi-file_upload" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-file_upload"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-file_upload"></code></pre>
</span>
<span id="execution-error-POSTapi-file_upload" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-file_upload"></code></pre>
</span>
<form id="form-POSTapi-file_upload" data-method="POST"
      data-path="api/file_upload"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-file_upload', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/file_upload</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-file_upload" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-file_upload"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="get-for-select">Get for select</h1>

    

            <h2 id="get-for-select-POSTapi-get_for_select">POST api/get_for_select</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-get_for_select">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"entities\": [
        \"Storage\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/get_for_select"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "entities": [
        "Storage"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-get_for_select">
</span>
<span id="execution-results-POSTapi-get_for_select" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-get_for_select"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-get_for_select"></code></pre>
</span>
<span id="execution-error-POSTapi-get_for_select" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-get_for_select"></code></pre>
</span>
<form id="form-POSTapi-get_for_select" data-method="POST"
      data-path="api/get_for_select"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-get_for_select', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/get_for_select</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-get_for_select" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-get_for_select"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>entities</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
                <input type="text"
               name="entities[0]"
               data-endpoint="POSTapi-get_for_select"
               data-component="body" hidden>
        <input type="text"
               name="entities[1]"
               data-endpoint="POSTapi-get_for_select"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>Shop</code>, <code>Storage</code>, <code>Category</code>, <code>ProductType</code>, or <code>Counterparty</code>.</p>
        </p>
        </form>

        <h1 id="measure-type-management">Measure Type management</h1>

    

            <h2 id="measure-type-management-POSTapi-measure_types-get_by_base_measure_type">POST api/measure_types/get_by_base_measure_type</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-measure_types-get_by_base_measure_type">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/measure_types/get_by_base_measure_type" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"base_measure_type_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types/get_by_base_measure_type"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "base_measure_type_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-measure_types-get_by_base_measure_type">
</span>
<span id="execution-results-POSTapi-measure_types-get_by_base_measure_type" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-measure_types-get_by_base_measure_type"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-measure_types-get_by_base_measure_type"></code></pre>
</span>
<span id="execution-error-POSTapi-measure_types-get_by_base_measure_type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-measure_types-get_by_base_measure_type"></code></pre>
</span>
<form id="form-POSTapi-measure_types-get_by_base_measure_type" data-method="POST"
      data-path="api/measure_types/get_by_base_measure_type"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-measure_types-get_by_base_measure_type', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/measure_types/get_by_base_measure_type</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-measure_types-get_by_base_measure_type" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-measure_types-get_by_base_measure_type"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>base_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="base_measure_type_id"
               data-endpoint="POSTapi-measure_types-get_by_base_measure_type"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="measure-type-management-GETapi-measure_types-get_grouped_by_base">GET api/measure_types/get_grouped_by_base</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-measure_types-get_grouped_by_base">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/measure_types/get_grouped_by_base" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types/get_grouped_by_base"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-measure_types-get_grouped_by_base">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-measure_types-get_grouped_by_base" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-measure_types-get_grouped_by_base"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-measure_types-get_grouped_by_base"></code></pre>
</span>
<span id="execution-error-GETapi-measure_types-get_grouped_by_base" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-measure_types-get_grouped_by_base"></code></pre>
</span>
<form id="form-GETapi-measure_types-get_grouped_by_base" data-method="GET"
      data-path="api/measure_types/get_grouped_by_base"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-measure_types-get_grouped_by_base', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/measure_types/get_grouped_by_base</code></b>
        </p>
                <p>
            <label id="auth-GETapi-measure_types-get_grouped_by_base" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-measure_types-get_grouped_by_base"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="measure-type-management-GETapi-measure_types">GET api/measure_types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-measure_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-measure_types">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-measure_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-measure_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-measure_types"></code></pre>
</span>
<span id="execution-error-GETapi-measure_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-measure_types"></code></pre>
</span>
<form id="form-GETapi-measure_types" data-method="GET"
      data-path="api/measure_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-measure_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/measure_types</code></b>
        </p>
                <p>
            <label id="auth-GETapi-measure_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-measure_types"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="measure-type-management-POSTapi-measure_types">POST api/measure_types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-measure_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"base_measure_type_id\": \"consequatur\",
    \"name\": \"consequatur\",
    \"quantity\": 0,
    \"company_id\": \"consequatur\",
    \"is_common\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "base_measure_type_id": "consequatur",
    "name": "consequatur",
    "quantity": 0,
    "company_id": "consequatur",
    "is_common": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-measure_types">
</span>
<span id="execution-results-POSTapi-measure_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-measure_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-measure_types"></code></pre>
</span>
<span id="execution-error-POSTapi-measure_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-measure_types"></code></pre>
</span>
<form id="form-POSTapi-measure_types" data-method="POST"
      data-path="api/measure_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-measure_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/measure_types</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-measure_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-measure_types"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>base_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="base_measure_type_id"
               data-endpoint="POSTapi-measure_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-measure_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-measure_types"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quantity</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="quantity"
               data-endpoint="POSTapi-measure_types"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-measure_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>is_common</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-measure_types" hidden>
            <input type="radio" name="is_common"
                   value="true"
                   data-endpoint="POSTapi-measure_types"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-measure_types" hidden>
            <input type="radio" name="is_common"
                   value="false"
                   data-endpoint="POSTapi-measure_types"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
        </form>

            <h2 id="measure-type-management-GETapi-measure_types--id-">GET api/measure_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-measure_types--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-measure_types--id-"></code></pre>
</span>
<span id="execution-error-GETapi-measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-measure_types--id-"></code></pre>
</span>
<form id="form-GETapi-measure_types--id-" data-method="GET"
      data-path="api/measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the measure type.</p>
            </p>
                    </form>

            <h2 id="measure-type-management-PUTapi-measure_types--id-">PUT api/measure_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"quantity\": 0,
    \"is_common\": true,
    \"base_measure_type_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "quantity": 0,
    "is_common": true,
    "base_measure_type_id": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-measure_types--id-">
</span>
<span id="execution-results-PUTapi-measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-measure_types--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-measure_types--id-"></code></pre>
</span>
<form id="form-PUTapi-measure_types--id-" data-method="PUT"
      data-path="api/measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/measure_types/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the measure type.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-measure_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="description"
               data-endpoint="PUTapi-measure_types--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quantity</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="quantity"
               data-endpoint="PUTapi-measure_types--id-"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>is_common</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-measure_types--id-" hidden>
            <input type="radio" name="is_common"
                   value="true"
                   data-endpoint="PUTapi-measure_types--id-"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-measure_types--id-" hidden>
            <input type="radio" name="is_common"
                   value="false"
                   data-endpoint="PUTapi-measure_types--id-"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>base_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="base_measure_type_id"
               data-endpoint="PUTapi-measure_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="measure-type-management-DELETEapi-measure_types--id-">DELETE api/measure_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-measure_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/measure_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-measure_types--id-">
</span>
<span id="execution-results-DELETEapi-measure_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-measure_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-measure_types--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-measure_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-measure_types--id-"></code></pre>
</span>
<form id="form-DELETEapi-measure_types--id-" data-method="DELETE"
      data-path="api/measure_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-measure_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/measure_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-measure_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-measure_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-measure_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the measure type.</p>
            </p>
                    </form>

        <h1 id="permission-management">Permission management</h1>

    

            <h2 id="permission-management-GETapi-permissions">GET api/permissions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/permissions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/permissions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-permissions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-permissions"></code></pre>
</span>
<span id="execution-error-GETapi-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-permissions"></code></pre>
</span>
<form id="form-GETapi-permissions" data-method="GET"
      data-path="api/permissions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/permissions</code></b>
        </p>
                <p>
            <label id="auth-GETapi-permissions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-permissions"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="productconsumption-management">ProductConsumption management</h1>

    

            <h2 id="productconsumption-management-POSTapi-product_consumptions-get_paginated">POST api/product_consumptions/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_consumptions-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_consumptions/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_consumptions/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_consumptions-get_paginated">
</span>
<span id="execution-results-POSTapi-product_consumptions-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_consumptions-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_consumptions-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-product_consumptions-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_consumptions-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-product_consumptions-get_paginated" data-method="POST"
      data-path="api/product_consumptions/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_consumptions-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_consumptions/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_consumptions-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_consumptions-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-product_consumptions-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-product_consumptions-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="product-purchase-management">Product Purchase management</h1>

    

            <h2 id="product-purchase-management-POSTapi-product_purchases-mass_create">POST api/product_purchases/mass_create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_purchases-mass_create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_purchases/mass_create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"storage_id\": \"consequatur\",
    \"product_types\": [
        \"consequatur\"
    ],
    \"user_id\": \"consequatur\",
    \"counterparty_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/mass_create"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "storage_id": "consequatur",
    "product_types": [
        "consequatur"
    ],
    "user_id": "consequatur",
    "counterparty_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_purchases-mass_create">
</span>
<span id="execution-results-POSTapi-product_purchases-mass_create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_purchases-mass_create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_purchases-mass_create"></code></pre>
</span>
<span id="execution-error-POSTapi-product_purchases-mass_create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_purchases-mass_create"></code></pre>
</span>
<form id="form-POSTapi-product_purchases-mass_create" data-method="POST"
      data-path="api/product_purchases/mass_create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_purchases-mass_create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_purchases/mass_create</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_purchases-mass_create" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_purchases-mass_create"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="storage_id"
               data-endpoint="POSTapi-product_purchases-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>product_types</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
                <input type="text"
               name="product_types[0]"
               data-endpoint="POSTapi-product_purchases-mass_create"
               data-component="body" hidden>
        <input type="text"
               name="product_types[1]"
               data-endpoint="POSTapi-product_purchases-mass_create"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="POSTapi-product_purchases-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>counterparty_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="counterparty_id"
               data-endpoint="POSTapi-product_purchases-mass_create"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-purchase-management-POSTapi-product_purchases-get_paginated">POST api/product_purchases/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_purchases-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_purchases/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_purchases-get_paginated">
</span>
<span id="execution-results-POSTapi-product_purchases-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_purchases-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_purchases-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-product_purchases-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_purchases-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-product_purchases-get_paginated" data-method="POST"
      data-path="api/product_purchases/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_purchases-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_purchases/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_purchases-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_purchases-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-product_purchases-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-product_purchases-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-purchase-management-GETapi-product_purchases">GET api/product_purchases</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_purchases">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_purchases" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_purchases">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_purchases" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_purchases"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_purchases"></code></pre>
</span>
<span id="execution-error-GETapi-product_purchases" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_purchases"></code></pre>
</span>
<form id="form-GETapi-product_purchases" data-method="GET"
      data-path="api/product_purchases"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_purchases', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_purchases</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_purchases" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_purchases"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="product-purchase-management-POSTapi-product_purchases">POST api/product_purchases</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_purchases">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_purchases" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"storage_id\": \"consequatur\",
    \"product_type_id\": \"consequatur\",
    \"quantity\": \"\",
    \"current_quantity\": \"consequatur\",
    \"cost\": 0,
    \"current_cost\": 0,
    \"expiration_date\": \"2104-03-31\",
    \"user_id\": \"consequatur\",
    \"counterparty_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "storage_id": "consequatur",
    "product_type_id": "consequatur",
    "quantity": "",
    "current_quantity": "consequatur",
    "cost": 0,
    "current_cost": 0,
    "expiration_date": "2104-03-31",
    "user_id": "consequatur",
    "counterparty_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_purchases">
</span>
<span id="execution-results-POSTapi-product_purchases" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_purchases"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_purchases"></code></pre>
</span>
<span id="execution-error-POSTapi-product_purchases" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_purchases"></code></pre>
</span>
<form id="form-POSTapi-product_purchases" data-method="POST"
      data-path="api/product_purchases"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_purchases', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_purchases</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_purchases" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_purchases"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="storage_id"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>product_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="product_type_id"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quantity</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="quantity"
               data-endpoint="POSTapi-product_purchases"
               value=""
               data-component="body" hidden>
    <br>
<p>Must be at least 0 characters.</p>
        </p>
                <p>
            <b><code>current_quantity</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="current_quantity"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>cost</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="cost"
               data-endpoint="POSTapi-product_purchases"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>current_cost</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="current_cost"
               data-endpoint="POSTapi-product_purchases"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>expiration_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="expiration_date"
               data-endpoint="POSTapi-product_purchases"
               value="2104-03-31"
               data-component="body" hidden>
    <br>
<p>Must be a valid date. Must be a date after <code>today</code>.</p>
        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>counterparty_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="counterparty_id"
               data-endpoint="POSTapi-product_purchases"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-purchase-management-GETapi-product_purchases--id-">GET api/product_purchases/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_purchases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/14"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_purchases--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_purchases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_purchases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_purchases--id-"></code></pre>
</span>
<span id="execution-error-GETapi-product_purchases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_purchases--id-"></code></pre>
</span>
<form id="form-GETapi-product_purchases--id-" data-method="GET"
      data-path="api/product_purchases/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_purchases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_purchases/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_purchases--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_purchases--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-product_purchases--id-"
               value="14"
               data-component="url" hidden>
    <br>
<p>The ID of the product purchase.</p>
            </p>
                    </form>

            <h2 id="product-purchase-management-PUTapi-product_purchases--id-">PUT api/product_purchases/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-product_purchases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"storage_id\": \"consequatur\",
    \"quantity\": \"\",
    \"current_quantity\": \"consequatur\",
    \"cost\": 0,
    \"current_cost\": 0,
    \"expiration_date\": \"2104-03-31\",
    \"counterparty_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/14"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "storage_id": "consequatur",
    "quantity": "",
    "current_quantity": "consequatur",
    "cost": 0,
    "current_cost": 0,
    "expiration_date": "2104-03-31",
    "counterparty_id": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-product_purchases--id-">
</span>
<span id="execution-results-PUTapi-product_purchases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-product_purchases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-product_purchases--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-product_purchases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-product_purchases--id-"></code></pre>
</span>
<form id="form-PUTapi-product_purchases--id-" data-method="PUT"
      data-path="api/product_purchases/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-product_purchases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/product_purchases/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/product_purchases/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-product_purchases--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-product_purchases--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-product_purchases--id-"
               value="14"
               data-component="url" hidden>
    <br>
<p>The ID of the product purchase.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="storage_id"
               data-endpoint="PUTapi-product_purchases--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>quantity</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="quantity"
               data-endpoint="PUTapi-product_purchases--id-"
               value=""
               data-component="body" hidden>
    <br>
<p>Must be at least 0 characters.</p>
        </p>
                <p>
            <b><code>current_quantity</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="current_quantity"
               data-endpoint="PUTapi-product_purchases--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>cost</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="cost"
               data-endpoint="PUTapi-product_purchases--id-"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>current_cost</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="current_cost"
               data-endpoint="PUTapi-product_purchases--id-"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>expiration_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="expiration_date"
               data-endpoint="PUTapi-product_purchases--id-"
               value="2104-03-31"
               data-component="body" hidden>
    <br>
<p>Must be a valid date. Must be a date after <code>today</code>.</p>
        </p>
                <p>
            <b><code>counterparty_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="counterparty_id"
               data-endpoint="PUTapi-product_purchases--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-purchase-management-DELETEapi-product_purchases--id-">DELETE api/product_purchases/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-product_purchases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/14"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-product_purchases--id-">
</span>
<span id="execution-results-DELETEapi-product_purchases--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-product_purchases--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-product_purchases--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-product_purchases--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-product_purchases--id-"></code></pre>
</span>
<form id="form-DELETEapi-product_purchases--id-" data-method="DELETE"
      data-path="api/product_purchases/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-product_purchases--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/product_purchases/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-product_purchases--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-product_purchases--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-product_purchases--id-"
               value="14"
               data-component="url" hidden>
    <br>
<p>The ID of the product purchase.</p>
            </p>
                    </form>

            <h2 id="product-purchase-management-GETapi-product_purchases--product_purchase_id--get_for_edit">GET api/product_purchases/{product_purchase_id}/get_for_edit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_purchases--product_purchase_id--get_for_edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_purchases/14/get_for_edit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_purchases/14/get_for_edit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_purchases--product_purchase_id--get_for_edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_purchases--product_purchase_id--get_for_edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_purchases--product_purchase_id--get_for_edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_purchases--product_purchase_id--get_for_edit"></code></pre>
</span>
<span id="execution-error-GETapi-product_purchases--product_purchase_id--get_for_edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_purchases--product_purchase_id--get_for_edit"></code></pre>
</span>
<form id="form-GETapi-product_purchases--product_purchase_id--get_for_edit" data-method="GET"
      data-path="api/product_purchases/{product_purchase_id}/get_for_edit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_purchases--product_purchase_id--get_for_edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_purchases/{product_purchase_id}/get_for_edit</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_purchases--product_purchase_id--get_for_edit" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_purchases--product_purchase_id--get_for_edit"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>product_purchase_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="product_purchase_id"
               data-endpoint="GETapi-product_purchases--product_purchase_id--get_for_edit"
               value="14"
               data-component="url" hidden>
    <br>
<p>The ID of the product purchase.</p>
            </p>
                    </form>

        <h1 id="product-type-management">Product Type management</h1>

    

            <h2 id="product-type-management-POSTapi-product_types-get_paginated">POST api/product_types/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_types-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_types/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_types-get_paginated">
</span>
<span id="execution-results-POSTapi-product_types-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_types-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_types-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-product_types-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_types-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-product_types-get_paginated" data-method="POST"
      data-path="api/product_types/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_types-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_types/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_types-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_types-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-product_types-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-product_types-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-type-management-POSTapi-product_types-get_for_purchase">POST api/product_types/get_for_purchase</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_types-get_for_purchase">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_types/get_for_purchase" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_for_purchase"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_types-get_for_purchase">
</span>
<span id="execution-results-POSTapi-product_types-get_for_purchase" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_types-get_for_purchase"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_types-get_for_purchase"></code></pre>
</span>
<span id="execution-error-POSTapi-product_types-get_for_purchase" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_types-get_for_purchase"></code></pre>
</span>
<form id="form-POSTapi-product_types-get_for_purchase" data-method="POST"
      data-path="api/product_types/get_for_purchase"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_types-get_for_purchase', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_types/get_for_purchase</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_types-get_for_purchase" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_types-get_for_purchase"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-product_types-get_for_purchase"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-product_types-get_for_purchase"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-type-management-GETapi-product_types-get_types">GET api/product_types/get_types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types-get_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types/get_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types-get_types">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types-get_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types-get_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types-get_types"></code></pre>
</span>
<span id="execution-error-GETapi-product_types-get_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types-get_types"></code></pre>
</span>
<form id="form-GETapi-product_types-get_types" data-method="GET"
      data-path="api/product_types/get_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types-get_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/get_types</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types-get_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types-get_types"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="product-type-management-GETapi-product_types-get_for_select">GET api/product_types/get_for_select</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types-get_for_select">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_for_select"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types-get_for_select">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types-get_for_select" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types-get_for_select"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types-get_for_select"></code></pre>
</span>
<span id="execution-error-GETapi-product_types-get_for_select" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types-get_for_select"></code></pre>
</span>
<form id="form-GETapi-product_types-get_for_select" data-method="GET"
      data-path="api/product_types/get_for_select"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types-get_for_select', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/get_for_select</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types-get_for_select" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types-get_for_select"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="product-type-management-POSTapi-product_types-get_current_quantity">POST api/product_types/get_current_quantity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_types-get_current_quantity">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_types/get_current_quantity" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shop_id\": \"consequatur\",
    \"storage_ids\": [
        11613.31890586
    ],
    \"with_expired\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_current_quantity"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shop_id": "consequatur",
    "storage_ids": [
        11613.31890586
    ],
    "with_expired": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_types-get_current_quantity">
</span>
<span id="execution-results-POSTapi-product_types-get_current_quantity" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_types-get_current_quantity"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_types-get_current_quantity"></code></pre>
</span>
<span id="execution-error-POSTapi-product_types-get_current_quantity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_types-get_current_quantity"></code></pre>
</span>
<form id="form-POSTapi-product_types-get_current_quantity" data-method="POST"
      data-path="api/product_types/get_current_quantity"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_types-get_current_quantity', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_types/get_current_quantity</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_types-get_current_quantity" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_types-get_current_quantity"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>storage_ids</code></b>&nbsp;&nbsp;<small>number[]</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="storage_ids[0]"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               data-component="body" hidden>
        <input type="number"
               name="storage_ids[1]"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>with_expired</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="with_expired"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="per_page"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="page"
               data-endpoint="POSTapi-product_types-get_current_quantity"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-type-management-GETapi-product_types--id--get_storages_quantity">GET api/product_types/{id}/get_storages_quantity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types--id--get_storages_quantity">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types/1/get_storages_quantity" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/1/get_storages_quantity"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types--id--get_storages_quantity">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types--id--get_storages_quantity" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types--id--get_storages_quantity"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types--id--get_storages_quantity"></code></pre>
</span>
<span id="execution-error-GETapi-product_types--id--get_storages_quantity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types--id--get_storages_quantity"></code></pre>
</span>
<form id="form-GETapi-product_types--id--get_storages_quantity" data-method="GET"
      data-path="api/product_types/{id}/get_storages_quantity"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types--id--get_storages_quantity', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/{id}/get_storages_quantity</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types--id--get_storages_quantity" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types--id--get_storages_quantity"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-product_types--id--get_storages_quantity"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                    </form>

            <h2 id="product-type-management-GETapi-product_types">GET api/product_types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types"></code></pre>
</span>
<span id="execution-error-GETapi-product_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types"></code></pre>
</span>
<form id="form-GETapi-product_types" data-method="GET"
      data-path="api/product_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="product-type-management-POSTapi-product_types">POST api/product_types</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_types">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/product_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\",
    \"type\": \"_imperishable\",
    \"base_measure_type_id\": \"consequatur\",
    \"main_measure_type_id\": \"consequatur\",
    \"measure_types\": [
        \"consequatur\"
    ],
    \"warning_threshold\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "name": "consequatur",
    "type": "_imperishable",
    "base_measure_type_id": "consequatur",
    "main_measure_type_id": "consequatur",
    "measure_types": [
        "consequatur"
    ],
    "warning_threshold": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-product_types">
</span>
<span id="execution-results-POSTapi-product_types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-product_types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product_types"></code></pre>
</span>
<span id="execution-error-POSTapi-product_types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product_types"></code></pre>
</span>
<form id="form-POSTapi-product_types" data-method="POST"
      data-path="api/product_types"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-product_types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/product_types</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-product_types" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-product_types"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-product_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-product_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="POSTapi-product_types"
               value="_imperishable"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_perishable</code> or <code>_imperishable</code>.</p>
        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="POSTapi-product_types"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>base_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="base_measure_type_id"
               data-endpoint="POSTapi-product_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>main_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="main_measure_type_id"
               data-endpoint="POSTapi-product_types"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>barcode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="barcode"
               data-endpoint="POSTapi-product_types"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>measure_types</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="measure_types[0]"
               data-endpoint="POSTapi-product_types"
               data-component="body" hidden>
        <input type="text"
               name="measure_types[1]"
               data-endpoint="POSTapi-product_types"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="category_id"
               data-endpoint="POSTapi-product_types"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>warning_threshold</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="warning_threshold"
               data-endpoint="POSTapi-product_types"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-type-management-GETapi-product_types--id-">GET api/product_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types--id-"></code></pre>
</span>
<span id="execution-error-GETapi-product_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types--id-"></code></pre>
</span>
<form id="form-GETapi-product_types--id-" data-method="GET"
      data-path="api/product_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-product_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                    </form>

            <h2 id="product-type-management-PUTapi-product_types--id-">PUT api/product_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-product_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/product_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"type\": \"_imperishable\",
    \"main_measure_type_id\": \"consequatur\",
    \"measure_types\": [
        \"consequatur\"
    ],
    \"warning_threshold\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "type": "_imperishable",
    "main_measure_type_id": "consequatur",
    "measure_types": [
        "consequatur"
    ],
    "warning_threshold": 17
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-product_types--id-">
</span>
<span id="execution-results-PUTapi-product_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-product_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-product_types--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-product_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-product_types--id-"></code></pre>
</span>
<form id="form-PUTapi-product_types--id-" data-method="PUT"
      data-path="api/product_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-product_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/product_types/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/product_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-product_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-product_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-product_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-product_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="type"
               data-endpoint="PUTapi-product_types--id-"
               value="_imperishable"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>_perishable</code> or <code>_imperishable</code>.</p>
        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="PUTapi-product_types--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>main_measure_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="main_measure_type_id"
               data-endpoint="PUTapi-product_types--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>barcode</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="barcode"
               data-endpoint="PUTapi-product_types--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>measure_types</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="measure_types[0]"
               data-endpoint="PUTapi-product_types--id-"
               data-component="body" hidden>
        <input type="text"
               name="measure_types[1]"
               data-endpoint="PUTapi-product_types--id-"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="category_id"
               data-endpoint="PUTapi-product_types--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>warning_threshold</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="warning_threshold"
               data-endpoint="PUTapi-product_types--id-"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="product-type-management-DELETEapi-product_types--id-">DELETE api/product_types/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-product_types--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/product_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-product_types--id-">
</span>
<span id="execution-results-DELETEapi-product_types--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-product_types--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-product_types--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-product_types--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-product_types--id-"></code></pre>
</span>
<form id="form-DELETEapi-product_types--id-" data-method="DELETE"
      data-path="api/product_types/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-product_types--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/product_types/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-product_types--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-product_types--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-product_types--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                    </form>

            <h2 id="product-type-management-GETapi-product_types-get_short_info--product_type_id-">GET api/product_types/get_short_info/{product_type_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types-get_short_info--product_type_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/product_types/get_short_info/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/product_types/get_short_info/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-product_types-get_short_info--product_type_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types-get_short_info--product_type_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types-get_short_info--product_type_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types-get_short_info--product_type_id-"></code></pre>
</span>
<span id="execution-error-GETapi-product_types-get_short_info--product_type_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types-get_short_info--product_type_id-"></code></pre>
</span>
<form id="form-GETapi-product_types-get_short_info--product_type_id-" data-method="GET"
      data-path="api/product_types/get_short_info/{product_type_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types-get_short_info--product_type_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/get_short_info/{product_type_id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types-get_short_info--product_type_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types-get_short_info--product_type_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>product_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="product_type_id"
               data-endpoint="GETapi-product_types-get_short_info--product_type_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                    </form>

        <h1 id="report-endpoints">Report endpoints</h1>

    

            <h2 id="report-endpoints-GETapi-reports-warning_threshold">GET api/reports/warning_threshold</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-warning_threshold">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/warning_threshold" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/warning_threshold"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-warning_threshold">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-warning_threshold" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-warning_threshold"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-warning_threshold"></code></pre>
</span>
<span id="execution-error-GETapi-reports-warning_threshold" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-warning_threshold"></code></pre>
</span>
<form id="form-GETapi-reports-warning_threshold" data-method="GET"
      data-path="api/reports/warning_threshold"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-warning_threshold', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/warning_threshold</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-warning_threshold" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-warning_threshold"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="report-endpoints-GETapi-reports-warning_threshold--storage_id-">GET api/reports/warning_threshold/{storage_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-warning_threshold--storage_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/warning_threshold/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/warning_threshold/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-warning_threshold--storage_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-warning_threshold--storage_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-warning_threshold--storage_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-warning_threshold--storage_id-"></code></pre>
</span>
<span id="execution-error-GETapi-reports-warning_threshold--storage_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-warning_threshold--storage_id-"></code></pre>
</span>
<form id="form-GETapi-reports-warning_threshold--storage_id-" data-method="GET"
      data-path="api/reports/warning_threshold/{storage_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-warning_threshold--storage_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/warning_threshold/{storage_id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-warning_threshold--storage_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-warning_threshold--storage_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="storage_id"
               data-endpoint="GETapi-reports-warning_threshold--storage_id-"
               value="consequatur"
               data-component="url" hidden>
    <br>
<p>The ID of the storage.</p>
            </p>
                    </form>

            <h2 id="report-endpoints-GETapi-reports-profit">GET api/reports/profit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-profit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/profit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/profit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-profit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-profit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-profit"></code></pre>
</span>
<span id="execution-error-GETapi-reports-profit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-profit"></code></pre>
</span>
<form id="form-GETapi-reports-profit" data-method="GET"
      data-path="api/reports/profit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-profit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/profit</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-profit" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-profit"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-profit"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-profit"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-profit_by_day">GET api/reports/profit_by_day</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-profit_by_day">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/profit_by_day" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/profit_by_day"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit_by_day">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-profit_by_day" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-profit_by_day"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-profit_by_day"></code></pre>
</span>
<span id="execution-error-GETapi-reports-profit_by_day" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-profit_by_day"></code></pre>
</span>
<form id="form-GETapi-reports-profit_by_day" data-method="GET"
      data-path="api/reports/profit_by_day"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-profit_by_day', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/profit_by_day</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-profit_by_day" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-profit_by_day"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-profit_by_day"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit_by_day"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-profit_by_day"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-profit_by_category">GET api/reports/profit_by_category</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-profit_by_category">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/profit_by_category" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/profit_by_category"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit_by_category">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-profit_by_category" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-profit_by_category"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-profit_by_category"></code></pre>
</span>
<span id="execution-error-GETapi-reports-profit_by_category" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-profit_by_category"></code></pre>
</span>
<form id="form-GETapi-reports-profit_by_category" data-method="GET"
      data-path="api/reports/profit_by_category"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-profit_by_category', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/profit_by_category</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-profit_by_category" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-profit_by_category"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-profit_by_category"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit_by_category"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-profit_by_category"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-popular_sell_products">GET api/reports/popular_sell_products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-popular_sell_products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/popular_sell_products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/popular_sell_products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-popular_sell_products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-popular_sell_products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-popular_sell_products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-popular_sell_products"></code></pre>
</span>
<span id="execution-error-GETapi-reports-popular_sell_products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-popular_sell_products"></code></pre>
</span>
<form id="form-GETapi-reports-popular_sell_products" data-method="GET"
      data-path="api/reports/popular_sell_products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-popular_sell_products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/popular_sell_products</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-popular_sell_products" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-popular_sell_products"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-popular_sell_products"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-popular_sell_products"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-popular_sell_products"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-POSTapi-reports-get_paginated_transactions">POST api/reports/get_paginated_transactions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-reports-get_paginated_transactions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/reports/get_paginated_transactions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/get_paginated_transactions"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-reports-get_paginated_transactions">
</span>
<span id="execution-results-POSTapi-reports-get_paginated_transactions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-reports-get_paginated_transactions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reports-get_paginated_transactions"></code></pre>
</span>
<span id="execution-error-POSTapi-reports-get_paginated_transactions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reports-get_paginated_transactions"></code></pre>
</span>
<form id="form-POSTapi-reports-get_paginated_transactions" data-method="POST"
      data-path="api/reports/get_paginated_transactions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-reports-get_paginated_transactions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/reports/get_paginated_transactions</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-reports-get_paginated_transactions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-reports-get_paginated_transactions"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="POSTapi-reports-get_paginated_transactions"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="POSTapi-reports-get_paginated_transactions"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="POSTapi-reports-get_paginated_transactions"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-purchase_recommendations">GET api/reports/purchase_recommendations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-purchase_recommendations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/purchase_recommendations" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/purchase_recommendations"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-purchase_recommendations">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-purchase_recommendations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-purchase_recommendations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-purchase_recommendations"></code></pre>
</span>
<span id="execution-error-GETapi-reports-purchase_recommendations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-purchase_recommendations"></code></pre>
</span>
<form id="form-GETapi-reports-purchase_recommendations" data-method="GET"
      data-path="api/reports/purchase_recommendations"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-purchase_recommendations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/purchase_recommendations</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-purchase_recommendations" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-purchase_recommendations"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-purchase_recommendations"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-purchase_recommendations"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-purchase_recommendations"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-product_consumptions_by_category--product_type_id-">GET api/reports/product_consumptions_by_category/{product_type_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-product_consumptions_by_category--product_type_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/product_consumptions_by_category/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/product_consumptions_by_category/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-product_consumptions_by_category--product_type_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-product_consumptions_by_category--product_type_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-product_consumptions_by_category--product_type_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-product_consumptions_by_category--product_type_id-"></code></pre>
</span>
<span id="execution-error-GETapi-reports-product_consumptions_by_category--product_type_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-product_consumptions_by_category--product_type_id-"></code></pre>
</span>
<form id="form-GETapi-reports-product_consumptions_by_category--product_type_id-" data-method="GET"
      data-path="api/reports/product_consumptions_by_category/{product_type_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-product_consumptions_by_category--product_type_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/product_consumptions_by_category/{product_type_id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-product_consumptions_by_category--product_type_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-product_consumptions_by_category--product_type_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>product_type_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="product_type_id"
               data-endpoint="GETapi-reports-product_consumptions_by_category--product_type_id-"
               value="consequatur"
               data-component="url" hidden>
    <br>
<p>The ID of the product type.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-product_consumptions_by_category--product_type_id-"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-product_consumptions_by_category--product_type_id-"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-product_consumptions_by_category--product_type_id-"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="report-endpoints-GETapi-reports-product_types_statistic">GET api/reports/product_types_statistic</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-product_types_statistic">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/reports/product_types_statistic" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"2023-03-02T15:38:06\",
    \"end_date\": \"2023-03-02T15:38:06\",
    \"shop_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/reports/product_types_statistic"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "2023-03-02T15:38:06",
    "end_date": "2023-03-02T15:38:06",
    "shop_id": 17
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-product_types_statistic">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports-product_types_statistic" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports-product_types_statistic"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports-product_types_statistic"></code></pre>
</span>
<span id="execution-error-GETapi-reports-product_types_statistic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports-product_types_statistic"></code></pre>
</span>
<form id="form-GETapi-reports-product_types_statistic" data-method="GET"
      data-path="api/reports/product_types_statistic"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports-product_types_statistic', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports/product_types_statistic</code></b>
        </p>
                <p>
            <label id="auth-GETapi-reports-product_types_statistic" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-reports-product_types_statistic"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="start_date"
               data-endpoint="GETapi-reports-product_types_statistic"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-product_types_statistic"
               value="2023-03-02T15:38:06"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="shop_id"
               data-endpoint="GETapi-reports-product_types_statistic"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="role-management">Role management</h1>

    

            <h2 id="role-management-GETapi-roles">GET api/roles</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/roles" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/roles"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-roles">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles"></code></pre>
</span>
<span id="execution-error-GETapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles"></code></pre>
</span>
<form id="form-GETapi-roles" data-method="GET"
      data-path="api/roles"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles</code></b>
        </p>
                <p>
            <label id="auth-GETapi-roles" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-roles"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="role-management-POSTapi-roles">POST api/roles</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/roles" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"human_name\": \"consequatur\",
    \"company_id\": \"consequatur\",
    \"permissions\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/roles"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "human_name": "consequatur",
    "company_id": "consequatur",
    "permissions": [
        "consequatur"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-roles">
</span>
<span id="execution-results-POSTapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-roles"></code></pre>
</span>
<span id="execution-error-POSTapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-roles"></code></pre>
</span>
<form id="form-POSTapi-roles" data-method="POST"
      data-path="api/roles"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/roles</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-roles" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-roles"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-roles"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>human_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="human_name"
               data-endpoint="POSTapi-roles"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-roles"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>permissions</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="permissions[0]"
               data-endpoint="POSTapi-roles"
               data-component="body" hidden>
        <input type="text"
               name="permissions[1]"
               data-endpoint="POSTapi-roles"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="role-management-GETapi-roles--id-">GET api/roles/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/roles/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/roles/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-roles--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles--id-"></code></pre>
</span>
<span id="execution-error-GETapi-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles--id-"></code></pre>
</span>
<form id="form-GETapi-roles--id-" data-method="GET"
      data-path="api/roles/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-roles--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-roles--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-roles--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the role.</p>
            </p>
                    </form>

            <h2 id="role-management-PUTapi-roles--id-">PUT api/roles/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/roles/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"human_name\": \"consequatur\",
    \"permissions\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/roles/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "human_name": "consequatur",
    "permissions": [
        "consequatur"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-roles--id-">
</span>
<span id="execution-results-PUTapi-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-roles--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-roles--id-"></code></pre>
</span>
<form id="form-PUTapi-roles--id-" data-method="PUT"
      data-path="api/roles/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/roles/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/roles/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-roles--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-roles--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-roles--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the role.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-roles--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>human_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="human_name"
               data-endpoint="PUTapi-roles--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>permissions</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="permissions[0]"
               data-endpoint="PUTapi-roles--id-"
               data-component="body" hidden>
        <input type="text"
               name="permissions[1]"
               data-endpoint="PUTapi-roles--id-"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="role-management-DELETEapi-roles--id-">DELETE api/roles/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/roles/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/roles/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-roles--id-">
</span>
<span id="execution-results-DELETEapi-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-roles--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-roles--id-"></code></pre>
</span>
<form id="form-DELETEapi-roles--id-" data-method="DELETE"
      data-path="api/roles/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/roles/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-roles--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-roles--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-roles--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the role.</p>
            </p>
                    </form>

        <h1 id="sell-product-group-management">Sell Product Group management</h1>

    

            <h2 id="sell-product-group-management-GETapi-sell_product_groups">GET api/sell_product_groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-sell_product_groups">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/sell_product_groups" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_product_groups"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sell_product_groups">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sell_product_groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sell_product_groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sell_product_groups"></code></pre>
</span>
<span id="execution-error-GETapi-sell_product_groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sell_product_groups"></code></pre>
</span>
<form id="form-GETapi-sell_product_groups" data-method="GET"
      data-path="api/sell_product_groups"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sell_product_groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sell_product_groups</code></b>
        </p>
                <p>
            <label id="auth-GETapi-sell_product_groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-sell_product_groups"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="sell-product-group-management-POSTapi-sell_product_groups">POST api/sell_product_groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-sell_product_groups">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/sell_product_groups" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\",
    \"has_discount\": false,
    \"sell_products\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_product_groups"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "name": "consequatur",
    "has_discount": false,
    "sell_products": [
        "consequatur"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sell_product_groups">
</span>
<span id="execution-results-POSTapi-sell_product_groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sell_product_groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sell_product_groups"></code></pre>
</span>
<span id="execution-error-POSTapi-sell_product_groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sell_product_groups"></code></pre>
</span>
<form id="form-POSTapi-sell_product_groups" data-method="POST"
      data-path="api/sell_product_groups"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sell_product_groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sell_product_groups</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-sell_product_groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-sell_product_groups"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-sell_product_groups"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-sell_product_groups"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>has_discount</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-sell_product_groups" hidden>
            <input type="radio" name="has_discount"
                   value="true"
                   data-endpoint="POSTapi-sell_product_groups"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-sell_product_groups" hidden>
            <input type="radio" name="has_discount"
                   value="false"
                   data-endpoint="POSTapi-sell_product_groups"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>sell_products</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
                <input type="text"
               name="sell_products[0]"
               data-endpoint="POSTapi-sell_product_groups"
               data-component="body" hidden>
        <input type="text"
               name="sell_products[1]"
               data-endpoint="POSTapi-sell_product_groups"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="POSTapi-sell_product_groups"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="sell-product-group-management-GETapi-sell_product_groups--id-">GET api/sell_product_groups/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-sell_product_groups--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/sell_product_groups/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_product_groups/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sell_product_groups--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sell_product_groups--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sell_product_groups--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sell_product_groups--id-"></code></pre>
</span>
<span id="execution-error-GETapi-sell_product_groups--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sell_product_groups--id-"></code></pre>
</span>
<form id="form-GETapi-sell_product_groups--id-" data-method="GET"
      data-path="api/sell_product_groups/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sell_product_groups--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sell_product_groups/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-sell_product_groups--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-sell_product_groups--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-sell_product_groups--id-"
               value="17"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product group.</p>
            </p>
                    </form>

            <h2 id="sell-product-group-management-PUTapi-sell_product_groups--id-">PUT api/sell_product_groups/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-sell_product_groups--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/sell_product_groups/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"has_discount\": true,
    \"sell_products\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_product_groups/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "has_discount": true,
    "sell_products": [
        "consequatur"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-sell_product_groups--id-">
</span>
<span id="execution-results-PUTapi-sell_product_groups--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-sell_product_groups--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sell_product_groups--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-sell_product_groups--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sell_product_groups--id-"></code></pre>
</span>
<form id="form-PUTapi-sell_product_groups--id-" data-method="PUT"
      data-path="api/sell_product_groups/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-sell_product_groups--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/sell_product_groups/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/sell_product_groups/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-sell_product_groups--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-sell_product_groups--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-sell_product_groups--id-"
               value="17"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product group.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="PUTapi-sell_product_groups--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-sell_product_groups--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>has_discount</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-sell_product_groups--id-" hidden>
            <input type="radio" name="has_discount"
                   value="true"
                   data-endpoint="PUTapi-sell_product_groups--id-"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-sell_product_groups--id-" hidden>
            <input type="radio" name="has_discount"
                   value="false"
                   data-endpoint="PUTapi-sell_product_groups--id-"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>sell_products</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="sell_products[0]"
               data-endpoint="PUTapi-sell_product_groups--id-"
               data-component="body" hidden>
        <input type="text"
               name="sell_products[1]"
               data-endpoint="PUTapi-sell_product_groups--id-"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="PUTapi-sell_product_groups--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="sell-product-group-management-DELETEapi-sell_product_groups--id-">DELETE api/sell_product_groups/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-sell_product_groups--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/sell_product_groups/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_product_groups/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sell_product_groups--id-">
</span>
<span id="execution-results-DELETEapi-sell_product_groups--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sell_product_groups--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sell_product_groups--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-sell_product_groups--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sell_product_groups--id-"></code></pre>
</span>
<form id="form-DELETEapi-sell_product_groups--id-" data-method="DELETE"
      data-path="api/sell_product_groups/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sell_product_groups--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sell_product_groups/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-sell_product_groups--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-sell_product_groups--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-sell_product_groups--id-"
               value="17"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product group.</p>
            </p>
                    </form>

        <h1 id="sell-product-management">Sell Product management</h1>

    

            <h2 id="sell-product-management-POSTapi-sell_products-get_paginated">POST api/sell_products/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-sell_products-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/sell_products/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sell_products-get_paginated">
</span>
<span id="execution-results-POSTapi-sell_products-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sell_products-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sell_products-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-sell_products-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sell_products-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-sell_products-get_paginated" data-method="POST"
      data-path="api/sell_products/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sell_products-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sell_products/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-sell_products-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-sell_products-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-sell_products-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-sell_products-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="sell-product-management-GETapi-sell_products">GET api/sell_products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-sell_products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/sell_products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sell_products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sell_products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sell_products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sell_products"></code></pre>
</span>
<span id="execution-error-GETapi-sell_products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sell_products"></code></pre>
</span>
<form id="form-GETapi-sell_products" data-method="GET"
      data-path="api/sell_products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sell_products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sell_products</code></b>
        </p>
                <p>
            <label id="auth-GETapi-sell_products" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-sell_products"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="sell-product-management-POSTapi-sell_products">POST api/sell_products</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-sell_products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/sell_products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\",
    \"price\": 0,
    \"has_discount\": true,
    \"product_types\": [
        {
            \"quantity\": 0
        }
    ],
    \"position\": 17,
    \"created_from_product_type\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "name": "consequatur",
    "price": 0,
    "has_discount": true,
    "product_types": [
        {
            "quantity": 0
        }
    ],
    "position": 17,
    "created_from_product_type": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sell_products">
</span>
<span id="execution-results-POSTapi-sell_products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sell_products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sell_products"></code></pre>
</span>
<span id="execution-error-POSTapi-sell_products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sell_products"></code></pre>
</span>
<form id="form-POSTapi-sell_products" data-method="POST"
      data-path="api/sell_products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sell_products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sell_products</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-sell_products" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-sell_products"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-sell_products"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-sell_products"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="price"
               data-endpoint="POSTapi-sell_products"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>has_discount</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-sell_products" hidden>
            <input type="radio" name="has_discount"
                   value="true"
                   data-endpoint="POSTapi-sell_products"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-sell_products" hidden>
            <input type="radio" name="has_discount"
                   value="false"
                   data-endpoint="POSTapi-sell_products"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>product_types</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>product_types[].quantity</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.quantity"
               data-endpoint="POSTapi-sell_products"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
                    </p>
                                    </details>
        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="POSTapi-sell_products"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="category_id"
               data-endpoint="POSTapi-sell_products"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>position</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="position"
               data-endpoint="POSTapi-sell_products"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>created_from_product_type</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-sell_products" hidden>
            <input type="radio" name="created_from_product_type"
                   value="true"
                   data-endpoint="POSTapi-sell_products"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-sell_products" hidden>
            <input type="radio" name="created_from_product_type"
                   value="false"
                   data-endpoint="POSTapi-sell_products"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
        </form>

            <h2 id="sell-product-management-GETapi-sell_products--id-">GET api/sell_products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-sell_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/sell_products/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sell_products--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sell_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sell_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sell_products--id-"></code></pre>
</span>
<span id="execution-error-GETapi-sell_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sell_products--id-"></code></pre>
</span>
<form id="form-GETapi-sell_products--id-" data-method="GET"
      data-path="api/sell_products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sell_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sell_products/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-sell_products--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-sell_products--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-sell_products--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product.</p>
            </p>
                    </form>

            <h2 id="sell-product-management-PUTapi-sell_products--id-">PUT api/sell_products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-sell_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/sell_products/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"price\": 0,
    \"has_discount\": true,
    \"product_types\": [
        {
            \"quantity\": 0
        }
    ],
    \"position\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "price": 0,
    "has_discount": true,
    "product_types": [
        {
            "quantity": 0
        }
    ],
    "position": 17
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-sell_products--id-">
</span>
<span id="execution-results-PUTapi-sell_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-sell_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sell_products--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-sell_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sell_products--id-"></code></pre>
</span>
<form id="form-PUTapi-sell_products--id-" data-method="PUT"
      data-path="api/sell_products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-sell_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/sell_products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/sell_products/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-sell_products--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-sell_products--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-sell_products--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-sell_products--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
                <input type="number"
               name="price"
               data-endpoint="PUTapi-sell_products--id-"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
        </p>
                <p>
            <b><code>has_discount</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-sell_products--id-" hidden>
            <input type="radio" name="has_discount"
                   value="true"
                   data-endpoint="PUTapi-sell_products--id-"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-sell_products--id-" hidden>
            <input type="radio" name="has_discount"
                   value="false"
                   data-endpoint="PUTapi-sell_products--id-"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>product_types</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>product_types[].quantity</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.quantity"
               data-endpoint="PUTapi-sell_products--id-"
               value="0"
               data-component="body" hidden>
    <br>
<p>Must be at least 0.</p>
                    </p>
                                    </details>
        </p>
                <p>
            <b><code>photo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="photo"
               data-endpoint="PUTapi-sell_products--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="category_id"
               data-endpoint="PUTapi-sell_products--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>position</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="position"
               data-endpoint="PUTapi-sell_products--id-"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="sell-product-management-DELETEapi-sell_products--id-">DELETE api/sell_products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-sell_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/sell_products/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/sell_products/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sell_products--id-">
</span>
<span id="execution-results-DELETEapi-sell_products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sell_products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sell_products--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-sell_products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sell_products--id-"></code></pre>
</span>
<form id="form-DELETEapi-sell_products--id-" data-method="DELETE"
      data-path="api/sell_products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sell_products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sell_products/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-sell_products--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-sell_products--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-sell_products--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the sell product.</p>
            </p>
                    </form>

        <h1 id="shop-management">Shop management</h1>

    

            <h2 id="shop-management-POSTapi-shops-get_by_company">POST api/shops/get_by_company</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-shops-get_by_company">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/shops/get_by_company" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops/get_by_company"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-shops-get_by_company">
</span>
<span id="execution-results-POSTapi-shops-get_by_company" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-shops-get_by_company"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shops-get_by_company"></code></pre>
</span>
<span id="execution-error-POSTapi-shops-get_by_company" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shops-get_by_company"></code></pre>
</span>
<form id="form-POSTapi-shops-get_by_company" data-method="POST"
      data-path="api/shops/get_by_company"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-shops-get_by_company', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/shops/get_by_company</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-shops-get_by_company" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-shops-get_by_company"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-shops-get_by_company"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="shop-management-GETapi-shops">GET api/shops</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-shops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/shops" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shops">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shops"></code></pre>
</span>
<span id="execution-error-GETapi-shops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shops"></code></pre>
</span>
<form id="form-GETapi-shops" data-method="GET"
      data-path="api/shops"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shops</code></b>
        </p>
                <p>
            <label id="auth-GETapi-shops" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-shops"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="shop-management-POSTapi-shops">POST api/shops</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-shops">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/shops" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"storage_names\": [
        \"consequatur\"
    ],
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "storage_names": [
        "consequatur"
    ],
    "company_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-shops">
</span>
<span id="execution-results-POSTapi-shops" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-shops"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shops"></code></pre>
</span>
<span id="execution-error-POSTapi-shops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shops"></code></pre>
</span>
<form id="form-POSTapi-shops" data-method="POST"
      data-path="api/shops"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-shops', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/shops</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-shops" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-shops"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-shops"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="address"
               data-endpoint="POSTapi-shops"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>storage_names</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="storage_names[0]"
               data-endpoint="POSTapi-shops"
               data-component="body" hidden>
        <input type="text"
               name="storage_names[1]"
               data-endpoint="POSTapi-shops"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-shops"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="shop-management-GETapi-shops--id-">GET api/shops/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-shops--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/shops/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-shops--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-shops--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-shops--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shops--id-"></code></pre>
</span>
<span id="execution-error-GETapi-shops--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shops--id-"></code></pre>
</span>
<form id="form-GETapi-shops--id-" data-method="GET"
      data-path="api/shops/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-shops--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/shops/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-shops--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-shops--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-shops--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the shop.</p>
            </p>
                    </form>

            <h2 id="shop-management-PUTapi-shops--id-">PUT api/shops/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-shops--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/shops/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"storage_names\": [
        \"consequatur\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "storage_names": [
        "consequatur"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-shops--id-">
</span>
<span id="execution-results-PUTapi-shops--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-shops--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shops--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-shops--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shops--id-"></code></pre>
</span>
<form id="form-PUTapi-shops--id-" data-method="PUT"
      data-path="api/shops/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-shops--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/shops/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/shops/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-shops--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-shops--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-shops--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the shop.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-shops--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="address"
               data-endpoint="PUTapi-shops--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>storage_names</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="storage_names[0]"
               data-endpoint="PUTapi-shops--id-"
               data-component="body" hidden>
        <input type="text"
               name="storage_names[1]"
               data-endpoint="PUTapi-shops--id-"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="shop-management-DELETEapi-shops--id-">DELETE api/shops/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-shops--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/shops/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/shops/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-shops--id-">
</span>
<span id="execution-results-DELETEapi-shops--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-shops--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shops--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-shops--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shops--id-"></code></pre>
</span>
<form id="form-DELETEapi-shops--id-" data-method="DELETE"
      data-path="api/shops/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shops--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/shops/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-shops--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-shops--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-shops--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the shop.</p>
            </p>
                    </form>

        <h1 id="storage-management">Storage management</h1>

    

            <h2 id="storage-management-POSTapi-storages-get_for_purchase">POST api/storages/get_for_purchase</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-storages-get_for_purchase">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/storages/get_for_purchase" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/get_for_purchase"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-storages-get_for_purchase">
</span>
<span id="execution-results-POSTapi-storages-get_for_purchase" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-storages-get_for_purchase"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-storages-get_for_purchase"></code></pre>
</span>
<span id="execution-error-POSTapi-storages-get_for_purchase" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-storages-get_for_purchase"></code></pre>
</span>
<form id="form-POSTapi-storages-get_for_purchase" data-method="POST"
      data-path="api/storages/get_for_purchase"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-storages-get_for_purchase', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/storages/get_for_purchase</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-storages-get_for_purchase" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-storages-get_for_purchase"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-storages-get_for_purchase"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="storage-management-POSTapi-storages-get_balance">POST api/storages/get_balance</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-storages-get_balance">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/storages/get_balance" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"storage_ids\": [
        11613.31890586
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/get_balance"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "storage_ids": [
        11613.31890586
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-storages-get_balance">
</span>
<span id="execution-results-POSTapi-storages-get_balance" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-storages-get_balance"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-storages-get_balance"></code></pre>
</span>
<span id="execution-error-POSTapi-storages-get_balance" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-storages-get_balance"></code></pre>
</span>
<form id="form-POSTapi-storages-get_balance" data-method="POST"
      data-path="api/storages/get_balance"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-storages-get_balance', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/storages/get_balance</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-storages-get_balance" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-storages-get_balance"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>storage_ids</code></b>&nbsp;&nbsp;<small>number[]</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="storage_ids[0]"
               data-endpoint="POSTapi-storages-get_balance"
               data-component="body" hidden>
        <input type="number"
               name="storage_ids[1]"
               data-endpoint="POSTapi-storages-get_balance"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="storage-management-POSTapi-storages-write_off">POST api/storages/write_off</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-storages-write_off">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/storages/write_off" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"storage_id\": \"consequatur\",
    \"user_id\": \"consequatur\",
    \"product_types\": [
        {
            \"id\": 11613.31890586,
            \"quantity\": 11613.31890586
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/write_off"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "storage_id": "consequatur",
    "user_id": "consequatur",
    "product_types": [
        {
            "id": 11613.31890586,
            "quantity": 11613.31890586
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-storages-write_off">
</span>
<span id="execution-results-POSTapi-storages-write_off" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-storages-write_off"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-storages-write_off"></code></pre>
</span>
<span id="execution-error-POSTapi-storages-write_off" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-storages-write_off"></code></pre>
</span>
<form id="form-POSTapi-storages-write_off" data-method="POST"
      data-path="api/storages/write_off"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-storages-write_off', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/storages/write_off</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-storages-write_off" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-storages-write_off"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-storages-write_off"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="storage_id"
               data-endpoint="POSTapi-storages-write_off"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="user_id"
               data-endpoint="POSTapi-storages-write_off"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>product_types</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>product_types[].id</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.id"
               data-endpoint="POSTapi-storages-write_off"
               value="11613.31890586"
               data-component="body" hidden>
    <br>

                    </p>
                                                                <p>
                        <b><code>product_types[].quantity</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.quantity"
               data-endpoint="POSTapi-storages-write_off"
               value="11613.31890586"
               data-component="body" hidden>
    <br>

                    </p>
                                    </details>
        </p>
        </form>

            <h2 id="storage-management-POSTapi-storages-transfer">POST api/storages/transfer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-storages-transfer">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/storages/transfer" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\",
    \"from_storage_id\": \"consequatur\",
    \"to_storage_id\": \"consequatur\",
    \"transferred_by\": \"consequatur\",
    \"product_types\": [
        {
            \"id\": 11613.31890586,
            \"quantity\": 11613.31890586
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/transfer"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": "consequatur",
    "from_storage_id": "consequatur",
    "to_storage_id": "consequatur",
    "transferred_by": "consequatur",
    "product_types": [
        {
            "id": 11613.31890586,
            "quantity": 11613.31890586
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-storages-transfer">
</span>
<span id="execution-results-POSTapi-storages-transfer" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-storages-transfer"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-storages-transfer"></code></pre>
</span>
<span id="execution-error-POSTapi-storages-transfer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-storages-transfer"></code></pre>
</span>
<form id="form-POSTapi-storages-transfer" data-method="POST"
      data-path="api/storages/transfer"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-storages-transfer', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/storages/transfer</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-storages-transfer" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-storages-transfer"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-storages-transfer"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>from_storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="from_storage_id"
               data-endpoint="POSTapi-storages-transfer"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>to_storage_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="to_storage_id"
               data-endpoint="POSTapi-storages-transfer"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>transferred_by</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="transferred_by"
               data-endpoint="POSTapi-storages-transfer"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>product_types</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

            </summary>
                                                <p>
                        <b><code>product_types[].id</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.id"
               data-endpoint="POSTapi-storages-transfer"
               value="11613.31890586"
               data-component="body" hidden>
    <br>

                    </p>
                                                                <p>
                        <b><code>product_types[].quantity</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="product_types.0.quantity"
               data-endpoint="POSTapi-storages-transfer"
               value="11613.31890586"
               data-component="body" hidden>
    <br>

                    </p>
                                    </details>
        </p>
        </form>

            <h2 id="storage-management-GETapi-storages">GET api/storages</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-storages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/storages" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-storages">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-storages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-storages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-storages"></code></pre>
</span>
<span id="execution-error-GETapi-storages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-storages"></code></pre>
</span>
<form id="form-GETapi-storages" data-method="GET"
      data-path="api/storages"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-storages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/storages</code></b>
        </p>
                <p>
            <label id="auth-GETapi-storages" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-storages"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="storage-management-POSTapi-storages">POST api/storages</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-storages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/storages" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shop_id\": \"consequatur\",
    \"company_id\": \"consequatur\",
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shop_id": "consequatur",
    "company_id": "consequatur",
    "name": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-storages">
</span>
<span id="execution-results-POSTapi-storages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-storages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-storages"></code></pre>
</span>
<span id="execution-error-POSTapi-storages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-storages"></code></pre>
</span>
<form id="form-POSTapi-storages" data-method="POST"
      data-path="api/storages"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-storages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/storages</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-storages" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-storages"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-storages"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-storages"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-storages"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="storage-management-GETapi-storages--id-">GET api/storages/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-storages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-storages--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-storages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-storages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-storages--id-"></code></pre>
</span>
<span id="execution-error-GETapi-storages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-storages--id-"></code></pre>
</span>
<form id="form-GETapi-storages--id-" data-method="GET"
      data-path="api/storages/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-storages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/storages/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-storages--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-storages--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-storages--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the storage.</p>
            </p>
                    </form>

            <h2 id="storage-management-PUTapi-storages--id-">PUT api/storages/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-storages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-storages--id-">
</span>
<span id="execution-results-PUTapi-storages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-storages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-storages--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-storages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-storages--id-"></code></pre>
</span>
<form id="form-PUTapi-storages--id-" data-method="PUT"
      data-path="api/storages/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-storages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/storages/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/storages/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-storages--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-storages--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-storages--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the storage.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-storages--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="storage-management-DELETEapi-storages--id-">DELETE api/storages/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-storages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/storages/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-storages--id-">
</span>
<span id="execution-results-DELETEapi-storages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-storages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-storages--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-storages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-storages--id-"></code></pre>
</span>
<form id="form-DELETEapi-storages--id-" data-method="DELETE"
      data-path="api/storages/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-storages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/storages/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-storages--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-storages--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-storages--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the storage.</p>
            </p>
                    </form>

        <h1 id="system-logs">System Logs</h1>

    

            <h2 id="system-logs-POSTapi-system_logs-get_paginated">POST api/system_logs/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-system_logs-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/system_logs/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/system_logs/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-system_logs-get_paginated">
</span>
<span id="execution-results-POSTapi-system_logs-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-system_logs-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-system_logs-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-system_logs-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-system_logs-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-system_logs-get_paginated" data-method="POST"
      data-path="api/system_logs/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-system_logs-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/system_logs/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-system_logs-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-system_logs-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-system_logs-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-system_logs-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="transfer-management">Transfer management</h1>

    

            <h2 id="transfer-management-POSTapi-transfers-get_paginated">POST api/transfers/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-transfers-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/transfers/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/transfers/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-transfers-get_paginated">
</span>
<span id="execution-results-POSTapi-transfers-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-transfers-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-transfers-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-transfers-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-transfers-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-transfers-get_paginated" data-method="POST"
      data-path="api/transfers/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-transfers-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/transfers/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-transfers-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-transfers-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-transfers-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-transfers-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="transfer-management-GETapi-transfers--transfer_id-">GET api/transfers/{transfer_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-transfers--transfer_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/transfers/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/transfers/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-transfers--transfer_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfers--transfer_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfers--transfer_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfers--transfer_id-"></code></pre>
</span>
<span id="execution-error-GETapi-transfers--transfer_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfers--transfer_id-"></code></pre>
</span>
<form id="form-GETapi-transfers--transfer_id-" data-method="GET"
      data-path="api/transfers/{transfer_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfers--transfer_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfers/{transfer_id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-transfers--transfer_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-transfers--transfer_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>transfer_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="transfer_id"
               data-endpoint="GETapi-transfers--transfer_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the transfer.</p>
            </p>
                    </form>

        <h1 id="user-management">User management</h1>

    

            <h2 id="user-management-POSTapi-change_shop">POST api/change_shop</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-change_shop">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/change_shop" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shop_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/change_shop"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shop_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-change_shop">
</span>
<span id="execution-results-POSTapi-change_shop" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-change_shop"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change_shop"></code></pre>
</span>
<span id="execution-error-POSTapi-change_shop" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change_shop"></code></pre>
</span>
<form id="form-POSTapi-change_shop" data-method="POST"
      data-path="api/change_shop"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-change_shop', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/change_shop</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-change_shop" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-change_shop"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="POSTapi-change_shop"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="user-management-GETapi-users">GET api/users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/users"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <p>
            <label id="auth-GETapi-users" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-users"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="user-management-POSTapi-users">POST api/users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"username\": \"consequatur\",
    \"email\": \"qkunze@example.com\",
    \"password\": \"consequatur\",
    \"company_id\": \"consequatur\",
    \"roles\": [
        \"1\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/users"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "username": "consequatur",
    "email": "qkunze@example.com",
    "password": "consequatur",
    "company_id": "consequatur",
    "roles": [
        "1"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users">
</span>
<span id="execution-results-POSTapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users"></code></pre>
</span>
<span id="execution-error-POSTapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users"></code></pre>
</span>
<form id="form-POSTapi-users" data-method="POST"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-users" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-users"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-users"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-users"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-users"
               value="qkunze@example.com"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-users"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>company_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="company_id"
               data-endpoint="POSTapi-users"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>roles</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="roles[0]"
               data-endpoint="POSTapi-users"
               data-component="body" hidden>
        <input type="text"
               name="roles[1]"
               data-endpoint="POSTapi-users"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, or <code>13</code>.</p>
        </p>
        </form>

            <h2 id="user-management-GETapi-users--id-">GET api/users/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-"></code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

            <h2 id="user-management-PUTapi-users--id-">PUT api/users/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"username\": \"consequatur\",
    \"email\": \"qkunze@example.com\",
    \"roles\": [
        \"1\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "username": "consequatur",
    "email": "qkunze@example.com",
    "roles": [
        "1"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-users--id-">
</span>
<span id="execution-results-PUTapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--id-"></code></pre>
</span>
<form id="form-PUTapi-users--id-" data-method="PUT"
      data-path="api/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/users/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-users--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="PUTapi-users--id-"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="PUTapi-users--id-"
               value="qkunze@example.com"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="password"
               data-endpoint="PUTapi-users--id-"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>roles</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="roles[0]"
               data-endpoint="PUTapi-users--id-"
               data-component="body" hidden>
        <input type="text"
               name="roles[1]"
               data-endpoint="PUTapi-users--id-"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, or <code>13</code>.</p>
        </p>
        </form>

            <h2 id="user-management-DELETEapi-users--id-">DELETE api/users/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/users/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-users--id-">
</span>
<span id="execution-results-DELETEapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--id-"></code></pre>
</span>
<form id="form-DELETEapi-users--id-" data-method="DELETE"
      data-path="api/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

        <h1 id="write-off-management">Write Off management</h1>

    

            <h2 id="write-off-management-POSTapi-write_offs-get_paginated">POST api/write_offs/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-write_offs-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://cashbox-online.test/api/write_offs/get_paginated" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"per_page\": 17,
    \"page\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/write_offs/get_paginated"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "per_page": 17,
    "page": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-write_offs-get_paginated">
</span>
<span id="execution-results-POSTapi-write_offs-get_paginated" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-write_offs-get_paginated"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-write_offs-get_paginated"></code></pre>
</span>
<span id="execution-error-POSTapi-write_offs-get_paginated" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-write_offs-get_paginated"></code></pre>
</span>
<form id="form-POSTapi-write_offs-get_paginated" data-method="POST"
      data-path="api/write_offs/get_paginated"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-write_offs-get_paginated', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/write_offs/get_paginated</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-write_offs-get_paginated" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-write_offs-get_paginated"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="POSTapi-write_offs-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="page"
               data-endpoint="POSTapi-write_offs-get_paginated"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="write-off-management-GETapi-write_offs--write_off_id-">GET api/write_offs/{write_off_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-write_offs--write_off_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://cashbox-online.test/api/write_offs/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/write_offs/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-write_offs--write_off_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-write_offs--write_off_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-write_offs--write_off_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-write_offs--write_off_id-"></code></pre>
</span>
<span id="execution-error-GETapi-write_offs--write_off_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-write_offs--write_off_id-"></code></pre>
</span>
<form id="form-GETapi-write_offs--write_off_id-" data-method="GET"
      data-path="api/write_offs/{write_off_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-write_offs--write_off_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/write_offs/{write_off_id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-write_offs--write_off_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-write_offs--write_off_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>write_off_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="write_off_id"
               data-endpoint="GETapi-write_offs--write_off_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the write off.</p>
            </p>
                    </form>

            <h2 id="write-off-management-DELETEapi-write_offs--write_off_id-">DELETE api/write_offs/{write_off_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-write_offs--write_off_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://cashbox-online.test/api/write_offs/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://cashbox-online.test/api/write_offs/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-write_offs--write_off_id-">
</span>
<span id="execution-results-DELETEapi-write_offs--write_off_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-write_offs--write_off_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-write_offs--write_off_id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-write_offs--write_off_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-write_offs--write_off_id-"></code></pre>
</span>
<form id="form-DELETEapi-write_offs--write_off_id-" data-method="DELETE"
      data-path="api/write_offs/{write_off_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-write_offs--write_off_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/write_offs/{write_off_id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-write_offs--write_off_id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-write_offs--write_off_id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>write_off_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="write_off_id"
               data-endpoint="DELETEapi-write_offs--write_off_id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the write off.</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
