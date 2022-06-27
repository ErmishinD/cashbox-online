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


    <script src="{{ asset("/vendor/scribe/js/theme-default-3.32.0.js") }}"></script>

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
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                        <a href="#endpoints-GETapi-user">GET api/user</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="file-upload-endpoints">
                    <a href="#file-upload-endpoints">File Upload endpoints</a>
                </li>
                                    <ul id="tocify-subheader-file-upload-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="file-upload-endpoints-POSTapi-file_upload">
                        <a href="#file-upload-endpoints-POSTapi-file_upload">POST api/file_upload</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="get-for-select">
                    <a href="#get-for-select">Get for select</a>
                </li>
                                    <ul id="tocify-subheader-get-for-select" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="get-for-select-POSTapi-get_for_select">
                        <a href="#get-for-select-POSTapi-get_for_select">POST api/get_for_select</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
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
                    <ul id="tocify-header-10" class="tocify-header">
                <li class="tocify-item level-1" data-unique="permission-management">
                    <a href="#permission-management">Permission management</a>
                </li>
                                    <ul id="tocify-subheader-permission-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="permission-management-GETapi-permissions">
                        <a href="#permission-management-GETapi-permissions">GET api/permissions</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-11" class="tocify-header">
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
                                    <li class="tocify-item level-2" data-unique="product-purchase-management-GETapi-product_purchases--product_purchase--get_for_edit">
                        <a href="#product-purchase-management-GETapi-product_purchases--product_purchase--get_for_edit">GET api/product_purchases/{product_purchase}/get_for_edit</a>
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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-12" class="tocify-header">
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
                                    <li class="tocify-item level-2" data-unique="product-type-management-GETapi-product_types-get_short_info--product_type-">
                        <a href="#product-type-management-GETapi-product_types-get_short_info--product_type-">GET api/product_types/get_short_info/{product_type}</a>
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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-13" class="tocify-header">
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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-14" class="tocify-header">
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
                    <ul id="tocify-header-15" class="tocify-header">
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
                    <ul id="tocify-header-16" class="tocify-header">
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
                    <ul id="tocify-header-17" class="tocify-header">
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
                    <ul id="tocify-header-18" class="tocify-header">
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
                    <ul id="tocify-header-19" class="tocify-header">
                <li class="tocify-item level-1" data-unique="system-logs">
                    <a href="#system-logs">System Logs</a>
                </li>
                                    <ul id="tocify-subheader-system-logs" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="system-logs-POSTapi-system_logs-get_paginated">
                        <a href="#system-logs-POSTapi-system_logs-get_paginated">POST api/system_logs/get_paginated</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-20" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transfer-management">
                    <a href="#transfer-management">Transfer management</a>
                </li>
                                    <ul id="tocify-subheader-transfer-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transfer-management-POSTapi-transfers-get_paginated">
                        <a href="#transfer-management-POSTapi-transfers-get_paginated">POST api/transfers/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="transfer-management-GETapi-transfers--transfer-">
                        <a href="#transfer-management-GETapi-transfers--transfer-">GET api/transfers/{transfer}</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-21" class="tocify-header">
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
                    <ul id="tocify-header-22" class="tocify-header">
                <li class="tocify-item level-1" data-unique="write-off-management">
                    <a href="#write-off-management">Write Off management</a>
                </li>
                                    <ul id="tocify-subheader-write-off-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="write-off-management-POSTapi-write_offs-get_paginated">
                        <a href="#write-off-management-POSTapi-write_offs-get_paginated">POST api/write_offs/get_paginated</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="write-off-management-GETapi-write_offs--write_off-">
                        <a href="#write-off-management-GETapi-write_offs--write_off-">GET api/write_offs/{write_off}</a>
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
        <li>Last updated: June 27 2022</li>
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
<pre><code class="language-yaml">https://cashbox-online.test</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
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
    --get "https://cashbox-online.test/api/base_measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/base_measure_types"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;_volume&quot;,
            &quot;name&quot;: &quot;мл&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;_weight&quot;,
            &quot;name&quot;: &quot;г&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;type&quot;: &quot;_quantity&quot;,
            &quot;name&quot;: &quot;шт&quot;
        }
    ]
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
    "https://cashbox-online.test/api/base_measure_types" \
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
    "https://cashbox-online.test/api/base_measure_types"
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
    --get "https://cashbox-online.test/api/base_measure_types/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/base_measure_types/consequatur"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;type&quot;: &quot;_volume&quot;,
        &quot;name&quot;: &quot;мл&quot;
    }
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
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-base_measure_types--id-"
               value="consequatur"
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
    "https://cashbox-online.test/api/base_measure_types/consequatur" \
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
    "https://cashbox-online.test/api/base_measure_types/consequatur"
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
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="PUTapi-base_measure_types--id-"
               value="consequatur"
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
    "https://cashbox-online.test/api/base_measure_types/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/base_measure_types/consequatur"
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
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="DELETEapi-base_measure_types--id-"
               value="consequatur"
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
    "https://cashbox-online.test/api/cashbox/mass_create" \
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
    "https://cashbox-online.test/api/cashbox/mass_create"
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
    --get "https://cashbox-online.test/api/cashbox/get_current_balance" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/get_current_balance"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 30
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;in&quot;: {
            &quot;sum&quot;: 730,
            &quot;card&quot;: 70,
            &quot;cash&quot;: 660
        },
        &quot;out&quot;: {
            &quot;sum&quot;: 0,
            &quot;card&quot;: 0,
            &quot;cash&quot;: 0
        },
        &quot;all&quot;: {
            &quot;sum&quot;: 730,
            &quot;card&quot;: 70,
            &quot;cash&quot;: 660
        }
    }
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
    "https://cashbox-online.test/api/cashbox/collect" \
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
    "https://cashbox-online.test/api/cashbox/collect"
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
    --get "https://cashbox-online.test/api/cashbox/collection_history" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/collection_history"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 29
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;collected_at&quot;: &quot;2022-05-11 11:22:00&quot;,
            &quot;amount&quot;: 130,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-24 10:53:00&quot;,
            &quot;amount&quot;: 1025,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-23 13:16:22&quot;,
            &quot;amount&quot;: 205,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-17 14:44:43&quot;,
            &quot;amount&quot;: 3005,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-23 10:50:44&quot;,
            &quot;amount&quot;: 330,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-23 10:51:24&quot;,
            &quot;amount&quot;: 65,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-23 13:16:41&quot;,
            &quot;amount&quot;: 0,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-24 10:51:18&quot;,
            &quot;amount&quot;: 150,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        },
        {
            &quot;collected_at&quot;: &quot;2022-06-23 12:46:43&quot;,
            &quot;amount&quot;: 310,
            &quot;collector&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            }
        }
    ]
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
    "https://cashbox-online.test/api/cashbox/payments_from_history" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"collected_at\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/payments_from_history"
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
    --get "https://cashbox-online.test/api/cashbox" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 28
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 269,
            &quot;shop&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Магазин Маяковского&quot;,
                &quot;address&quot;: &quot;пр. Маяковского, 5/35&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 16,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;,
                &quot;user&quot;: &quot;yurii_bilov&quot;,
                &quot;email&quot;: &quot;yurii_bilov@admin.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-27 12:58&quot;
        },
        {
            &quot;id&quot;: 268,
            &quot;shop&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Магазин Маяковского&quot;,
                &quot;address&quot;: &quot;пр. Маяковского, 5/35&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 1,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Эспрессо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;,
                &quot;user&quot;: &quot;yurii_bilov&quot;,
                &quot;email&quot;: &quot;yurii_bilov@admin.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-27 12:56&quot;
        },
        {
            &quot;id&quot;: 266,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Зубенко Елена&quot;,
                &quot;user&quot;: &quot;lena.admin&quot;,
                &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-24 10:40&quot;
        },
        {
            &quot;id&quot;: 265,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Зубенко Елена&quot;,
                &quot;user&quot;: &quot;lena.admin&quot;,
                &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-24 10:37&quot;
        },
        {
            &quot;id&quot;: 264,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Зубенко Елена&quot;,
                &quot;user&quot;: &quot;lena.admin&quot;,
                &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-24 08:52&quot;
        },
        {
            &quot;id&quot;: 263,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_card&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 3,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Лате&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Шаповал Лидия&quot;,
                &quot;user&quot;: &quot;Lidia_admin&quot;,
                &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 17:10&quot;
        },
        {
            &quot;id&quot;: 261,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;25.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Шаповал Лидия&quot;,
                &quot;user&quot;: &quot;Lidia_admin&quot;,
                &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 16:23&quot;
        },
        {
            &quot;id&quot;: 260,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_card&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 15:08&quot;
        },
        {
            &quot;id&quot;: 259,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;user&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 13:24&quot;
        },
        {
            &quot;id&quot;: 258,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Шаповал Лидия&quot;,
                &quot;user&quot;: &quot;Lidia_admin&quot;,
                &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 13:23&quot;
        },
        {
            &quot;id&quot;: 257,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Шаповал Лидия&quot;,
                &quot;user&quot;: &quot;Lidia_admin&quot;,
                &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23 13:23&quot;
        },
        {
            &quot;id&quot;: 248,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_card&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-22 16:54&quot;
        },
        {
            &quot;id&quot;: 246,
            &quot;shop&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 30,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Чай ISLA Herbal tea для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Зубенко Елена&quot;,
                &quot;user&quot;: &quot;lena.admin&quot;,
                &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-22 15:00&quot;
        },
        {
            &quot;id&quot;: 208,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;25.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 24,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Протеиновый коктейль на воде&quot;,
                &quot;price&quot;: &quot;25.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-20 13:20&quot;
        },
        {
            &quot;id&quot;: 199,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-17 15:19&quot;
        },
        {
            &quot;id&quot;: 192,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 3,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Лате&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-17 11:28&quot;
        },
        {
            &quot;id&quot;: 191,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 3,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Лате&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-17 11:28&quot;
        },
        {
            &quot;id&quot;: 181,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;user&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-16 17:56&quot;
        },
        {
            &quot;id&quot;: 178,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;user&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-16 16:48&quot;
        },
        {
            &quot;id&quot;: 172,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;user&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-16 08:40&quot;
        },
        {
            &quot;id&quot;: 163,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-15 12:48&quot;
        },
        {
            &quot;id&quot;: 147,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;15.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 13,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;,
                &quot;price&quot;: &quot;15.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 19:42&quot;
        },
        {
            &quot;id&quot;: 148,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;15.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 13,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;,
                &quot;price&quot;: &quot;15.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 19:42&quot;
        },
        {
            &quot;id&quot;: 146,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 19:40&quot;
        },
        {
            &quot;id&quot;: 139,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 16:43&quot;
        },
        {
            &quot;id&quot;: 136,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 15:33&quot;
        },
        {
            &quot;id&quot;: 135,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 15:33&quot;
        },
        {
            &quot;id&quot;: 130,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 09:40&quot;
        },
        {
            &quot;id&quot;: 129,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-14 09:40&quot;
        },
        {
            &quot;id&quot;: 110,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13 13:26&quot;
        },
        {
            &quot;id&quot;: 105,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 32,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Чай ISLA English Breakfast для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13 09:56&quot;
        },
        {
            &quot;id&quot;: 104,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13 09:56&quot;
        },
        {
            &quot;id&quot;: 96,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10 16:41&quot;
        },
        {
            &quot;id&quot;: 91,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10 11:41&quot;
        },
        {
            &quot;id&quot;: 90,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;5.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10 11:41&quot;
        },
        {
            &quot;id&quot;: 89,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;15.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 25,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Батончик злаковый&quot;,
                &quot;price&quot;: &quot;15.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10 11:39&quot;
        },
        {
            &quot;id&quot;: 88,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 31,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Чай ISLA Green Tea для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10 11:39&quot;
        },
        {
            &quot;id&quot;: 82,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 4,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;user&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09 19:21&quot;
        },
        {
            &quot;id&quot;: 81,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;user&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09 19:21&quot;
        },
        {
            &quot;id&quot;: 58,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-08 16:43&quot;
        },
        {
            &quot;id&quot;: 41,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 16,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07 19:16&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 16,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07 19:16&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;30.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 16,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07 19:16&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;20.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07 16:56&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06 13:39&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;shop&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            &quot;amount&quot;: &quot;10.00&quot;,
            &quot;self_cost&quot;: null,
            &quot;profit&quot;: null,
            &quot;payment_type&quot;: &quot;_cash&quot;,
            &quot;transaction_type&quot;: &quot;_in&quot;,
            &quot;sell_product&quot;: {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0
            },
            &quot;operator&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;user&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;
            },
            &quot;description&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06 13:39&quot;
        }
    ],
    &quot;balance&quot;: {
        &quot;in&quot;: {
            &quot;sum&quot;: 730,
            &quot;card&quot;: 70,
            &quot;cash&quot;: 660
        },
        &quot;out&quot;: {
            &quot;sum&quot;: 0,
            &quot;card&quot;: 0,
            &quot;cash&quot;: 0
        },
        &quot;all&quot;: {
            &quot;sum&quot;: 730,
            &quot;card&quot;: 70,
            &quot;cash&quot;: 660
        }
    }
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
    "https://cashbox-online.test/api/cashbox" \
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
    "https://cashbox-online.test/api/cashbox"
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
    --get "https://cashbox-online.test/api/cashbox/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 27
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;shop&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Магазин Гоголя&quot;
        },
        &quot;all_amount&quot;: 20,
        &quot;all_self_cost&quot;: 0,
        &quot;all_profit&quot;: 20,
        &quot;transaction_type&quot;: &quot;_in&quot;,
        &quot;payment_type&quot;: &quot;_cash&quot;,
        &quot;operator&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Юрий Билов&quot;
        },
        &quot;created_at&quot;: &quot;2022-05-09 22:06&quot;,
        &quot;collected_at&quot;: &quot;2022-05-11 11:22:00&quot;,
        &quot;collector&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Максимцова Анастасия&quot;
        },
        &quot;sell_products&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;amount&quot;: &quot;20.00&quot;,
                &quot;self_cost&quot;: &quot;0.00&quot;,
                &quot;profit&quot;: &quot;20.00&quot;,
                &quot;description&quot;: null
            }
        ]
    }
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
               value="1"
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
    "https://cashbox-online.test/api/cashbox/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"payment_type\": \"_card\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/17"
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
               value="17"
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
    "https://cashbox-online.test/api/cashbox/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/cashbox/1"
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
               value="1"
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
    --get "https://cashbox-online.test/api/categories/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/categories/get_for_select"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Батончики&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Кофе/Чай&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Инвентарь&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Костюмы&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Коктейли&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Напитки&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Аксессуары&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Для персонала&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Напитки&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Батончики&quot;
        }
    ]
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
    --get "https://cashbox-online.test/api/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/categories"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 45
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Батончики&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 0,
            &quot;sell_products_count&quot;: 2
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Кофе/Чай&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 11,
            &quot;sell_products_count&quot;: 8
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Инвентарь&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 5,
            &quot;sell_products_count&quot;: 5
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Костюмы&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 0,
            &quot;sell_products_count&quot;: 0
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Коктейли&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 5,
            &quot;sell_products_count&quot;: 3
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Напитки&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 1,
            &quot;sell_products_count&quot;: 2
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Аксессуары&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 5,
            &quot;sell_products_count&quot;: 7
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Для персонала&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 0,
            &quot;sell_products_count&quot;: 6
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Напитки&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 0,
            &quot;sell_products_count&quot;: 1
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Батончики&quot;,
            &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
            &quot;product_types_count&quot;: 0,
            &quot;sell_products_count&quot;: 1
        }
    ]
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
    "https://cashbox-online.test/api/categories" \
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
    "https://cashbox-online.test/api/categories"
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
    --get "https://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/categories/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 44
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Батончики&quot;,
        &quot;photo&quot;: &quot;https://cashbox-online.test/images/default_card_img.png&quot;,
        &quot;product_types_count&quot;: 0,
        &quot;sell_products_count&quot;: 2
    }
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
    "https://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/categories/1"
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
    "https://cashbox-online.test/api/categories/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/categories/1"
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
    --get "https://cashbox-online.test/api/companies/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/companies/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;#main_stretch&quot;,
        &quot;shops&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Магазин Гоголя&quot;,
                &quot;address&quot;: &quot;ул. Гоголя, 155 а&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Магазин Чаривная&quot;,
                &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Магазин Бородинский&quot;,
                &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Магазин Маяковского&quot;,
                &quot;address&quot;: &quot;пр. Маяковского, 5/35&quot;
            }
        ],
        &quot;employees&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Administrator&quot;,
                &quot;username&quot;: &quot;admin&quot;,
                &quot;email&quot;: &quot;admin@admin.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Super Admin&quot;,
                        &quot;human_name&quot;: &quot;Super Administrator&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;,
                &quot;username&quot;: &quot;yurii_bilov&quot;,
                &quot;email&quot;: &quot;yurii_bilov@admin.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;director.1&quot;,
                        &quot;human_name&quot;: &quot;Директор&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
                &quot;username&quot;: &quot;Nadmin&quot;,
                &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;director.1&quot;,
                        &quot;human_name&quot;: &quot;Директор&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Биднык Виктория&quot;,
                &quot;username&quot;: &quot;Vi_admin&quot;,
                &quot;email&quot;: &quot;vika.bidnyk12@gmail.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
                &quot;username&quot;: &quot;Borzenkova1&quot;,
                &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Шаповал Лидия&quot;,
                &quot;username&quot;: &quot;Lidia_admin&quot;,
                &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Зубенко Елена&quot;,
                &quot;username&quot;: &quot;lena.admin&quot;,
                &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;Бараниченко Светлана&quot;,
                &quot;username&quot;: &quot;sadmin&quot;,
                &quot;email&quot;: &quot;admin@example.com&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            },
            {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
                &quot;username&quot;: &quot;K_admin&quot;,
                &quot;email&quot;: &quot;solodkat@ua.fm&quot;,
                &quot;roles&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;salesman.1&quot;,
                        &quot;human_name&quot;: &quot;Продавец&quot;
                    }
                ]
            }
        ]
    }
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
    "https://cashbox-online.test/api/companies/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/companies/1"
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

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/user"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Administrator&quot;,
    &quot;username&quot;: &quot;admin&quot;,
    &quot;email&quot;: &quot;admin@admin.com&quot;,
    &quot;email_verified_at&quot;: null,
    &quot;created_at&quot;: &quot;2022-04-29T19:00:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-06-27T11:47:30.000000Z&quot;,
    &quot;deleted_at&quot;: null,
    &quot;company_id&quot;: 1
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

        <h1 id="file-upload-endpoints">File Upload endpoints</h1>

    

            <h2 id="file-upload-endpoints-POSTapi-file_upload">POST api/file_upload</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-file_upload">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cashbox-online.test/api/file_upload" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/file_upload"
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
    "https://cashbox-online.test/api/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"entities\": [
        \"Shop\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/get_for_select"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "entities": [
        "Shop"
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
<p>Must be one of <code>Shop</code>, <code>Storage</code>, or <code>Category</code>.</p>
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
    "https://cashbox-online.test/api/measure_types/get_by_base_measure_type" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"base_measure_type_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/measure_types/get_by_base_measure_type"
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
    --get "https://cashbox-online.test/api/measure_types/get_grouped_by_base" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/measure_types/get_grouped_by_base"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;_weight&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 9,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        ],
        &quot;_volume&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 4,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;ПЕТ 0,5&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 500,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 5,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;ПЕТ 1л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 8,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        ],
        &quot;_quantity&quot;: [
            {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 6,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Вода&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 7,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Пакетик&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            },
            {
                &quot;id&quot;: 10,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        ]
    }
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
    --get "https://cashbox-online.test/api/measure_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/measure_types"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;base_measure_type_id&quot;: 2,
            &quot;base_measure_type_name&quot;: &quot;г&quot;,
            &quot;name&quot;: &quot;кг&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 2,
            &quot;base_measure_type_id&quot;: 1,
            &quot;base_measure_type_name&quot;: &quot;мл&quot;,
            &quot;name&quot;: &quot;л&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 3,
            &quot;base_measure_type_id&quot;: 3,
            &quot;base_measure_type_name&quot;: &quot;шт&quot;,
            &quot;name&quot;: &quot;шт&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 4,
            &quot;base_measure_type_id&quot;: 1,
            &quot;base_measure_type_name&quot;: &quot;мл&quot;,
            &quot;name&quot;: &quot;ПЕТ 0,5&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 500,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 5,
            &quot;base_measure_type_id&quot;: 1,
            &quot;base_measure_type_name&quot;: &quot;мл&quot;,
            &quot;name&quot;: &quot;ПЕТ 1л&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 6,
            &quot;base_measure_type_id&quot;: 3,
            &quot;base_measure_type_name&quot;: &quot;шт&quot;,
            &quot;name&quot;: &quot;Вода&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 7,
            &quot;base_measure_type_id&quot;: 3,
            &quot;base_measure_type_name&quot;: &quot;шт&quot;,
            &quot;name&quot;: &quot;Пакетик&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 8,
            &quot;base_measure_type_id&quot;: 1,
            &quot;base_measure_type_name&quot;: &quot;мл&quot;,
            &quot;name&quot;: &quot;л&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 9,
            &quot;base_measure_type_id&quot;: 2,
            &quot;base_measure_type_name&quot;: &quot;г&quot;,
            &quot;name&quot;: &quot;кг&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        {
            &quot;id&quot;: 10,
            &quot;base_measure_type_id&quot;: 3,
            &quot;base_measure_type_name&quot;: &quot;шт&quot;,
            &quot;name&quot;: &quot;шт&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1,
            &quot;is_common&quot;: 0
        }
    ]
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
    "https://cashbox-online.test/api/measure_types" \
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
    "https://cashbox-online.test/api/measure_types"
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
    --get "https://cashbox-online.test/api/measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/measure_types/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;base_measure_type_id&quot;: 2,
        &quot;name&quot;: &quot;кг&quot;,
        &quot;description&quot;: null,
        &quot;quantity&quot;: 1000,
        &quot;is_common&quot;: 0,
        &quot;can_edit_base_measure_type&quot;: false
    }
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
    "https://cashbox-online.test/api/measure_types/1" \
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
    "https://cashbox-online.test/api/measure_types/1"
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
    "https://cashbox-online.test/api/measure_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/measure_types/1"
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
    --get "https://cashbox-online.test/api/permissions" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/permissions"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 25
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;Category&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;Audit&quot;: [
            {
                &quot;id&quot;: 6,
                &quot;ability&quot;: &quot;access&quot;
            }
        ],
        &quot;WriteOff&quot;: [
            {
                &quot;id&quot;: 7,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;ability&quot;: &quot;show&quot;
            }
        ],
        &quot;Transfer&quot;: [
            {
                &quot;id&quot;: 10,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 11,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 12,
                &quot;ability&quot;: &quot;show&quot;
            }
        ],
        &quot;Role&quot;: [
            {
                &quot;id&quot;: 13,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 14,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 15,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 16,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 17,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;Company&quot;: [
            {
                &quot;id&quot;: 18,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 19,
                &quot;ability&quot;: &quot;edit&quot;
            }
        ],
        &quot;Shop&quot;: [
            {
                &quot;id&quot;: 20,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 21,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 22,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 23,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 24,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;Storage&quot;: [
            {
                &quot;id&quot;: 25,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 26,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 27,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 28,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 29,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;ProductType&quot;: [
            {
                &quot;id&quot;: 30,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 31,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 32,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 33,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 34,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;MeasureType&quot;: [
            {
                &quot;id&quot;: 35,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 36,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 37,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 38,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 39,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;SellProduct&quot;: [
            {
                &quot;id&quot;: 40,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 41,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 42,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 43,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 44,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;SellProductGroup&quot;: [
            {
                &quot;id&quot;: 45,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 46,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 47,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 48,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 49,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;ProductPurchase&quot;: [
            {
                &quot;id&quot;: 50,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 51,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 52,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 53,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 54,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;Cashbox&quot;: [
            {
                &quot;id&quot;: 55,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 56,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 57,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 58,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 59,
                &quot;ability&quot;: &quot;delete&quot;
            },
            {
                &quot;id&quot;: 60,
                &quot;ability&quot;: &quot;collect&quot;
            },
            {
                &quot;id&quot;: 61,
                &quot;ability&quot;: &quot;history&quot;
            },
            {
                &quot;id&quot;: 68,
                &quot;ability&quot;: &quot;viewOnlyMySales&quot;
            }
        ],
        &quot;User&quot;: [
            {
                &quot;id&quot;: 62,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 63,
                &quot;ability&quot;: &quot;create&quot;
            },
            {
                &quot;id&quot;: 64,
                &quot;ability&quot;: &quot;show&quot;
            },
            {
                &quot;id&quot;: 65,
                &quot;ability&quot;: &quot;edit&quot;
            },
            {
                &quot;id&quot;: 66,
                &quot;ability&quot;: &quot;delete&quot;
            }
        ],
        &quot;Report&quot;: [
            {
                &quot;id&quot;: 67,
                &quot;ability&quot;: &quot;access&quot;
            },
            {
                &quot;id&quot;: 69,
                &quot;ability&quot;: &quot;warningThreshold&quot;
            },
            {
                &quot;id&quot;: 70,
                &quot;ability&quot;: &quot;profit&quot;
            }
        ]
    }
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

        <h1 id="product-purchase-management">Product Purchase management</h1>

    

            <h2 id="product-purchase-management-POSTapi-product_purchases-mass_create">POST api/product_purchases/mass_create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_purchases-mass_create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cashbox-online.test/api/product_purchases/mass_create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"storage_id\": \"consequatur\",
    \"product_types\": [
        \"consequatur\"
    ],
    \"user_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases/mass_create"
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
    "user_id": "consequatur"
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
        </form>

            <h2 id="product-purchase-management-POSTapi-product_purchases-get_paginated">POST api/product_purchases/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_purchases-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cashbox-online.test/api/product_purchases/get_paginated" \
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
    "https://cashbox-online.test/api/product_purchases/get_paginated"
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

            <h2 id="product-purchase-management-GETapi-product_purchases--product_purchase--get_for_edit">GET api/product_purchases/{product_purchase}/get_for_edit</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_purchases--product_purchase--get_for_edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/product_purchases/14/get_for_edit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases/14/get_for_edit"
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

<span id="example-responses-GETapi-product_purchases--product_purchase--get_for_edit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 37
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 14,
        &quot;product_type&quot;: {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Сахар&quot;,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;quantity&quot;: 1000
            },
            &quot;measure_types&quot;: [
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;кг&quot;,
                    &quot;quantity&quot;: 1000
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;г&quot;,
                    &quot;quantity&quot;: 1
                }
            ]
        },
        &quot;expiration_date&quot;: null,
        &quot;quantity&quot;: 3000,
        &quot;cost&quot;: &quot;100.00&quot;,
        &quot;storage_id&quot;: 5
    },
    &quot;storages&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;shop_id&quot;: null,
            &quot;name&quot;: &quot;Склад Гоголя&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;shop_id&quot;: null,
            &quot;name&quot;: &quot;Склад Чаривная&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;shop_id&quot;: null,
            &quot;name&quot;: &quot;Склад Бородинский&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;shop_id&quot;: null,
            &quot;name&quot;: &quot;Склад Маяковского&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;shop_id&quot;: null,
            &quot;name&quot;: &quot;Склад&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_purchases--product_purchase--get_for_edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_purchases--product_purchase--get_for_edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_purchases--product_purchase--get_for_edit"></code></pre>
</span>
<span id="execution-error-GETapi-product_purchases--product_purchase--get_for_edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_purchases--product_purchase--get_for_edit"></code></pre>
</span>
<form id="form-GETapi-product_purchases--product_purchase--get_for_edit" data-method="GET"
      data-path="api/product_purchases/{product_purchase}/get_for_edit"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_purchases--product_purchase--get_for_edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_purchases/{product_purchase}/get_for_edit</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_purchases--product_purchase--get_for_edit" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_purchases--product_purchase--get_for_edit"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>product_purchase</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="product_purchase"
               data-endpoint="GETapi-product_purchases--product_purchase--get_for_edit"
               value="14"
               data-component="url" hidden>
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
    --get "https://cashbox-online.test/api/product_purchases" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 36
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 14,
            &quot;product_type_id&quot;: 33,
            &quot;storage_id&quot;: 5,
            &quot;quantity&quot;: 3000,
            &quot;current_quantity&quot;: 3000,
            &quot;cost&quot;: &quot;100.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-25T12:24:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Директор&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;product_type_id&quot;: 34,
            &quot;storage_id&quot;: 5,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;120.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-25T12:24:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Директор&quot;
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;product_type_id&quot;: 35,
            &quot;storage_id&quot;: 5,
            &quot;quantity&quot;: 5000,
            &quot;current_quantity&quot;: 5000,
            &quot;cost&quot;: &quot;35.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-25T12:24:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Директор&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;product_type_id&quot;: 36,
            &quot;storage_id&quot;: 5,
            &quot;quantity&quot;: 100,
            &quot;current_quantity&quot;: 100,
            &quot;cost&quot;: &quot;50.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-25T12:24:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Директор&quot;
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;product_type_id&quot;: 37,
            &quot;storage_id&quot;: 5,
            &quot;quantity&quot;: 10,
            &quot;current_quantity&quot;: 10,
            &quot;cost&quot;: &quot;200.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-25T12:28:59.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Директор&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;0.49&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 21,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1500,
            &quot;current_quantity&quot;: 439,
            &quot;cost&quot;: &quot;564.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 500,
            &quot;current_quantity&quot;: 150,
            &quot;cost&quot;: &quot;15.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-06-02&quot;,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 23,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;21.40&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 100,
            &quot;current_quantity&quot;: 34,
            &quot;cost&quot;: &quot;134.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 25,
            &quot;product_type_id&quot;: 9,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;24.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 26,
            &quot;product_type_id&quot;: 10,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 8,
            &quot;current_quantity&quot;: 8,
            &quot;cost&quot;: &quot;37.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 27,
            &quot;product_type_id&quot;: 11,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 9,
            &quot;current_quantity&quot;: 9,
            &quot;cost&quot;: &quot;54.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;product_type_id&quot;: 12,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;36.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;product_type_id&quot;: 13,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 2000,
            &quot;current_quantity&quot;: 2000,
            &quot;cost&quot;: &quot;102.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-11-30&quot;,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 30,
            &quot;product_type_id&quot;: 14,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 800,
            &quot;current_quantity&quot;: 800,
            &quot;cost&quot;: &quot;350.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-05-31&quot;,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 31,
            &quot;product_type_id&quot;: 15,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;800.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 32,
            &quot;product_type_id&quot;: 16,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;243.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 33,
            &quot;product_type_id&quot;: 18,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;225.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 34,
            &quot;product_type_id&quot;: 19,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;2000.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 35,
            &quot;product_type_id&quot;: 20,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 5,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;50.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 36,
            &quot;product_type_id&quot;: 21,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 5,
            &quot;cost&quot;: &quot;60.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 37,
            &quot;product_type_id&quot;: 22,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;16.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 38,
            &quot;product_type_id&quot;: 23,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 5,
            &quot;current_quantity&quot;: 5,
            &quot;cost&quot;: &quot;20.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 39,
            &quot;product_type_id&quot;: 24,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;40.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 40,
            &quot;product_type_id&quot;: 25,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 150,
            &quot;current_quantity&quot;: 89,
            &quot;cost&quot;: &quot;6.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 41,
            &quot;product_type_id&quot;: 26,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;125.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 42,
            &quot;product_type_id&quot;: 27,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;11.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 43,
            &quot;product_type_id&quot;: 28,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;11.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 44,
            &quot;product_type_id&quot;: 31,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 7,
            &quot;current_quantity&quot;: 7,
            &quot;cost&quot;: &quot;63.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-01-31&quot;,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 45,
            &quot;product_type_id&quot;: 32,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;48.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-05-31&quot;,
            &quot;created_at&quot;: &quot;2022-05-31T06:57:05.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        },
        {
            &quot;id&quot;: 46,
            &quot;product_type_id&quot;: 1,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 500,
            &quot;current_quantity&quot;: 285,
            &quot;cost&quot;: &quot;150.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T07:06:41.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 47,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 190,
            &quot;current_quantity&quot;: 175,
            &quot;cost&quot;: &quot;94.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T07:20:14.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 48,
            &quot;product_type_id&quot;: 30,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;4.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-05-31T07:29:39.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 49,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;72.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-01&quot;,
            &quot;created_at&quot;: &quot;2022-06-01T11:12:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 50,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 6000,
            &quot;current_quantity&quot;: 4000,
            &quot;cost&quot;: &quot;132.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-01T11:12:44.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 51,
            &quot;product_type_id&quot;: 21,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;10.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 52,
            &quot;product_type_id&quot;: 24,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;8.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 53,
            &quot;product_type_id&quot;: 23,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 6,
            &quot;cost&quot;: &quot;24.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 54,
            &quot;product_type_id&quot;: 22,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;0.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 55,
            &quot;product_type_id&quot;: 25,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 500,
            &quot;current_quantity&quot;: 494,
            &quot;cost&quot;: &quot;15.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 56,
            &quot;product_type_id&quot;: 28,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 49,
            &quot;cost&quot;: &quot;11.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 57,
            &quot;product_type_id&quot;: 27,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 49,
            &quot;cost&quot;: &quot;11.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 58,
            &quot;product_type_id&quot;: 26,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 49,
            &quot;cost&quot;: &quot;127.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 59,
            &quot;product_type_id&quot;: 31,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;40.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-12-06&quot;,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 60,
            &quot;product_type_id&quot;: 14,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;350.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-07-06&quot;,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 61,
            &quot;product_type_id&quot;: 13,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 2000,
            &quot;current_quantity&quot;: 2000,
            &quot;cost&quot;: &quot;120.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-05-06&quot;,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 62,
            &quot;product_type_id&quot;: 12,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;21.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 63,
            &quot;product_type_id&quot;: 11,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 5,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;35.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 64,
            &quot;product_type_id&quot;: 10,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;21.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 65,
            &quot;product_type_id&quot;: 9,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;28.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 66,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 125,
            &quot;current_quantity&quot;: 116,
            &quot;cost&quot;: &quot;168.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 67,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 4000,
            &quot;current_quantity&quot;: 500,
            &quot;cost&quot;: &quot;88.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 68,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;30.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-06-27&quot;,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 69,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 500,
            &quot;current_quantity&quot;: 150,
            &quot;cost&quot;: &quot;188.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 70,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 125,
            &quot;current_quantity&quot;: 107,
            &quot;cost&quot;: &quot;63.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 71,
            &quot;product_type_id&quot;: 1,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 3000,
            &quot;current_quantity&quot;: 2914,
            &quot;cost&quot;: &quot;63.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-06T10:38:46.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 72,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;30.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-06-21&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T06:14:23.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 73,
            &quot;product_type_id&quot;: 1,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 4000,
            &quot;current_quantity&quot;: 3831,
            &quot;cost&quot;: &quot;50.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 74,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 252,
            &quot;current_quantity&quot;: 235,
            &quot;cost&quot;: &quot;126.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 75,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2000,
            &quot;current_quantity&quot;: 1370,
            &quot;cost&quot;: &quot;700.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 76,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2300,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;92.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-05&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 77,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 6000,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;132.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 78,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 129,
            &quot;current_quantity&quot;: 97,
            &quot;cost&quot;: &quot;129.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 79,
            &quot;product_type_id&quot;: 9,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 7,
            &quot;current_quantity&quot;: 6,
            &quot;cost&quot;: &quot;42.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 80,
            &quot;product_type_id&quot;: 10,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;18.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 81,
            &quot;product_type_id&quot;: 11,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 12,
            &quot;current_quantity&quot;: 11,
            &quot;cost&quot;: &quot;72.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 82,
            &quot;product_type_id&quot;: 12,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;12.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 83,
            &quot;product_type_id&quot;: 13,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1600,
            &quot;current_quantity&quot;: 1600,
            &quot;cost&quot;: &quot;80.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-05-02&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 84,
            &quot;product_type_id&quot;: 14,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 925,
            &quot;cost&quot;: &quot;350.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-07-28&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 85,
            &quot;product_type_id&quot;: 15,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;800.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 86,
            &quot;product_type_id&quot;: 16,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;240.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 87,
            &quot;product_type_id&quot;: 18,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;75.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 88,
            &quot;product_type_id&quot;: 19,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;2000.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 89,
            &quot;product_type_id&quot;: 20,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;60.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 90,
            &quot;product_type_id&quot;: 21,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;40.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 91,
            &quot;product_type_id&quot;: 22,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;8.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 92,
            &quot;product_type_id&quot;: 23,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;16.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 93,
            &quot;product_type_id&quot;: 24,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;8.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 94,
            &quot;product_type_id&quot;: 25,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 250,
            &quot;current_quantity&quot;: 225,
            &quot;cost&quot;: &quot;10.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 95,
            &quot;product_type_id&quot;: 26,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 21,
            &quot;current_quantity&quot;: 17,
            &quot;cost&quot;: &quot;54.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 96,
            &quot;product_type_id&quot;: 27,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 60,
            &quot;current_quantity&quot;: 56,
            &quot;cost&quot;: &quot;14.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 97,
            &quot;product_type_id&quot;: 28,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 200,
            &quot;current_quantity&quot;: 196,
            &quot;cost&quot;: &quot;44.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 98,
            &quot;product_type_id&quot;: 30,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;12.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 99,
            &quot;product_type_id&quot;: 31,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;54.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-08-30&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 100,
            &quot;product_type_id&quot;: 32,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;25.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-07-26&quot;,
            &quot;created_at&quot;: &quot;2022-06-07T10:07:48.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 101,
            &quot;product_type_id&quot;: 21,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 8,
            &quot;current_quantity&quot;: 8,
            &quot;cost&quot;: &quot;80.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:34:02.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 102,
            &quot;product_type_id&quot;: 22,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;12.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:36:08.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 103,
            &quot;product_type_id&quot;: 23,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;8.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:36:08.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 104,
            &quot;product_type_id&quot;: 24,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;8.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-07T10:36:08.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 105,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 2700,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;97.50&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-07&quot;,
            &quot;created_at&quot;: &quot;2022-06-09T08:06:20.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 106,
            &quot;product_type_id&quot;: 1,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;75.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 107,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 67,
            &quot;current_quantity&quot;: 45,
            &quot;cost&quot;: &quot;33.50&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 108,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;576.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 109,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 2500,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;55.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 110,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 100,
            &quot;current_quantity&quot;: 98,
            &quot;cost&quot;: &quot;134.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 111,
            &quot;product_type_id&quot;: 9,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 7,
            &quot;current_quantity&quot;: 7,
            &quot;cost&quot;: &quot;63.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 112,
            &quot;product_type_id&quot;: 10,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;24.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 113,
            &quot;product_type_id&quot;: 11,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;16.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 114,
            &quot;product_type_id&quot;: 12,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 5,
            &quot;current_quantity&quot;: 5,
            &quot;cost&quot;: &quot;40.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 115,
            &quot;product_type_id&quot;: 14,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;350.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-08-31&quot;,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 116,
            &quot;product_type_id&quot;: 15,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;800.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 117,
            &quot;product_type_id&quot;: 18,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;75.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 118,
            &quot;product_type_id&quot;: 19,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;1000.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 119,
            &quot;product_type_id&quot;: 20,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;30.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 120,
            &quot;product_type_id&quot;: 21,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;30.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:44:42.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 121,
            &quot;product_type_id&quot;: 31,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 6,
            &quot;current_quantity&quot;: 3,
            &quot;cost&quot;: &quot;54.00&quot;,
            &quot;expiration_date&quot;: &quot;2023-03-09&quot;,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 122,
            &quot;product_type_id&quot;: 25,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 998,
            &quot;cost&quot;: &quot;30.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 123,
            &quot;product_type_id&quot;: 26,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 90,
            &quot;current_quantity&quot;: 90,
            &quot;cost&quot;: &quot;229.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 124,
            &quot;product_type_id&quot;: 27,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 100,
            &quot;current_quantity&quot;: 100,
            &quot;cost&quot;: &quot;22.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 125,
            &quot;product_type_id&quot;: 28,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;11.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 126,
            &quot;product_type_id&quot;: 22,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 3,
            &quot;current_quantity&quot;: 1,
            &quot;cost&quot;: &quot;12.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 127,
            &quot;product_type_id&quot;: 23,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 7,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;28.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 128,
            &quot;product_type_id&quot;: 24,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 4,
            &quot;current_quantity&quot;: 4,
            &quot;cost&quot;: &quot;16.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-09T10:50:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 129,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 12,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;132.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10T11:58:19.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 130,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1500,
            &quot;current_quantity&quot;: 1220,
            &quot;cost&quot;: &quot;560.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10T13:07:57.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 131,
            &quot;product_type_id&quot;: 1,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 1500,
            &quot;current_quantity&quot;: 1460,
            &quot;cost&quot;: &quot;50.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-10T13:09:47.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 132,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 4500,
            &quot;current_quantity&quot;: 1900,
            &quot;cost&quot;: &quot;122.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-04&quot;,
            &quot;created_at&quot;: &quot;2022-06-13T09:01:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 133,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 12000,
            &quot;current_quantity&quot;: 4012,
            &quot;cost&quot;: &quot;266.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13T09:01:54.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 134,
            &quot;product_type_id&quot;: 18,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;150.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13T10:59:21.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 135,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;38.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13T11:22:06.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 136,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;67.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-13T11:22:06.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 137,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 1900,
            &quot;current_quantity&quot;: 0,
            &quot;cost&quot;: &quot;60.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-05&quot;,
            &quot;created_at&quot;: &quot;2022-06-14T10:13:14.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 138,
            &quot;product_type_id&quot;: 7,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 5000,
            &quot;current_quantity&quot;: 5000,
            &quot;cost&quot;: &quot;110.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-15T08:44:28.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 139,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;343.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-15T12:03:56.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 140,
            &quot;product_type_id&quot;: 3,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 50,
            &quot;current_quantity&quot;: 50,
            &quot;cost&quot;: &quot;25.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-15T12:03:56.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 141,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 2,
            &quot;quantity&quot;: 1800,
            &quot;current_quantity&quot;: 1550,
            &quot;cost&quot;: &quot;64.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-07-06&quot;,
            &quot;created_at&quot;: &quot;2022-06-15T13:07:35.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 142,
            &quot;product_type_id&quot;: 4,
            &quot;storage_id&quot;: 3,
            &quot;quantity&quot;: 1000,
            &quot;current_quantity&quot;: 1000,
            &quot;cost&quot;: &quot;343.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-17T10:48:50.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 143,
            &quot;product_type_id&quot;: 6,
            &quot;storage_id&quot;: 4,
            &quot;quantity&quot;: 3600,
            &quot;current_quantity&quot;: 1500,
            &quot;cost&quot;: &quot;116.00&quot;,
            &quot;expiration_date&quot;: &quot;2022-08-22&quot;,
            &quot;created_at&quot;: &quot;2022-06-20T11:11:30.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 144,
            &quot;product_type_id&quot;: 8,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 100,
            &quot;current_quantity&quot;: 100,
            &quot;cost&quot;: &quot;134.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23T07:58:29.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 145,
            &quot;product_type_id&quot;: 16,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 2,
            &quot;current_quantity&quot;: 2,
            &quot;cost&quot;: &quot;162.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-23T07:58:29.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Максимцова Анастасия&quot;
            }
        },
        {
            &quot;id&quot;: 146,
            &quot;product_type_id&quot;: 2,
            &quot;storage_id&quot;: 1,
            &quot;quantity&quot;: 500,
            &quot;current_quantity&quot;: 500,
            &quot;cost&quot;: &quot;100.00&quot;,
            &quot;expiration_date&quot;: null,
            &quot;created_at&quot;: &quot;2022-06-25T11:24:16.000000Z&quot;,
            &quot;user&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Юрий Билов&quot;
            }
        }
    ]
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
    "https://cashbox-online.test/api/product_purchases" \
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
    \"expiration_date\": \"2103-07-27\",
    \"user_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases"
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
    "expiration_date": "2103-07-27",
    "user_id": "consequatur"
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
               value="2103-07-27"
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
        </form>

            <h2 id="product-purchase-management-GETapi-product_purchases--id-">GET api/product_purchases/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_purchases--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases/14"
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
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 35
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\ProductPurchase] 1&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 355,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 331,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 727,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 702,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 666,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 655,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 28,
            &quot;function&quot;: &quot;runCommand&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Console/Commands/GenerateDocsCommand.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Console\\Commands\\GenerateDocsCommand&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
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
    "https://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"storage_id\": \"consequatur\",
    \"quantity\": \"\",
    \"current_quantity\": \"consequatur\",
    \"cost\": 0,
    \"current_cost\": 0,
    \"expiration_date\": \"2103-07-27\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases/14"
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
    "expiration_date": "2103-07-27"
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
               value="2103-07-27"
               data-component="body" hidden>
    <br>
<p>Must be a valid date. Must be a date after <code>today</code>.</p>
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
    "https://cashbox-online.test/api/product_purchases/14" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_purchases/14"
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

        <h1 id="product-type-management">Product Type management</h1>

    

            <h2 id="product-type-management-POSTapi-product_types-get_paginated">POST api/product_types/get_paginated</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-product_types-get_paginated">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://cashbox-online.test/api/product_types/get_paginated" \
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
    "https://cashbox-online.test/api/product_types/get_paginated"
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
    "https://cashbox-online.test/api/product_types/get_for_purchase" \
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
    "https://cashbox-online.test/api/product_types/get_for_purchase"
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
    --get "https://cashbox-online.test/api/product_types/get_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/get_types"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 43
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        &quot;_perishable&quot;,
        &quot;_imperishable&quot;
    ]
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
    --get "https://cashbox-online.test/api/product_types/get_for_select" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/get_for_select"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 42
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Сахар&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Вода&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Стаканчик 250&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Кофе 1 кг&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Молоко&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Стаканчик 400&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Чай ISLA green tea&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Мороженное&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Протеин&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Петли TRX&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Лента для йоги&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Резинка для стретчинга&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Блоки для стретчинга&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Гамак&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Носки (детские)&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Носки (взрослые)&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Резинка для волос безшовная маленькая&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;Резинка для волос (набор 10 шт. маленьких пружинок)&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Мешалки&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;name&quot;: &quot;Стакан ПЛАСТИК 350 мл&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;Крышка ПЛАСТИК&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;Трубочка&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;Резинка для волос безшовная большая&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Резинка МОРДОЧКА&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;Батончик злаковый&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;name&quot;: &quot;Батончик протеиновый&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Сахар&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;name&quot;: &quot;Кофе&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;name&quot;: &quot;Вода&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;name&quot;: &quot;Стаканчик&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Twix&quot;
        }
    ]
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

            <h2 id="product-type-management-GETapi-product_types-get_short_info--product_type-">GET api/product_types/get_short_info/{product_type}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-product_types-get_short_info--product_type-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/product_types/get_short_info/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/get_short_info/1"
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

<span id="example-responses-GETapi-product_types-get_short_info--product_type-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 41
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Сахар&quot;,
        &quot;photo&quot;: &quot;https://cashbox-online.test/storage/1/image.png&quot;,
        &quot;type&quot;: &quot;_imperishable&quot;,
        &quot;measure_types&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;quantity&quot;: 1000
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;г&quot;,
                &quot;quantity&quot;: 1
            }
        ],
        &quot;main_measure_type&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;кг&quot;,
            &quot;quantity&quot;: 1000
        },
        &quot;price_per_unit&quot;: 0.3
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-product_types-get_short_info--product_type-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-product_types-get_short_info--product_type-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-product_types-get_short_info--product_type-"></code></pre>
</span>
<span id="execution-error-GETapi-product_types-get_short_info--product_type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-product_types-get_short_info--product_type-"></code></pre>
</span>
<form id="form-GETapi-product_types-get_short_info--product_type-" data-method="GET"
      data-path="api/product_types/get_short_info/{product_type}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-product_types-get_short_info--product_type-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/product_types/get_short_info/{product_type}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-product_types-get_short_info--product_type-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-product_types-get_short_info--product_type-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>product_type</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="product_type"
               data-endpoint="GETapi-product_types-get_short_info--product_type-"
               value="1"
               data-component="url" hidden>
    <br>

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
    "https://cashbox-online.test/api/product_types/get_current_quantity" \
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
    "https://cashbox-online.test/api/product_types/get_current_quantity"
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
    --get "https://cashbox-online.test/api/product_types/consequatur/get_storages_quantity" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/consequatur/get_storages_quantity"
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
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 40
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;App\\Http\\Controllers\\Api\\ProductTypeController::getQuantityGroupedByStorage(): Argument #1 ($id) must be of type int, string given, called in /Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Controller.php on line 54&quot;,
    &quot;exception&quot;: &quot;TypeError&quot;,
    &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Http/Controllers/Api/ProductTypeController.php&quot;,
    &quot;line&quot;: 215,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;getQuantityGroupedByStorage&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\Api\\ProductTypeController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 204,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 725,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 727,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 702,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 666,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 655,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 28,
            &quot;function&quot;: &quot;runCommand&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Console/Commands/GenerateDocsCommand.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Console\\Commands\\GenerateDocsCommand&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
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
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-product_types--id--get_storages_quantity"
               value="consequatur"
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
    --get "https://cashbox-online.test/api/product_types" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 39
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;method is deprecated&quot;
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
    "https://cashbox-online.test/api/product_types" \
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
    "https://cashbox-online.test/api/product_types"
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
    --get "https://cashbox-online.test/api/product_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 38
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;company_id&quot;: 1,
        &quot;name&quot;: &quot;Сахар&quot;,
        &quot;type&quot;: &quot;_imperishable&quot;,
        &quot;photo&quot;: &quot;https://cashbox-online.test/storage/1/image.png&quot;,
        &quot;base_measure_type_id&quot;: 2,
        &quot;barcode&quot;: null,
        &quot;base_measure_type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;_weight&quot;,
            &quot;name&quot;: &quot;г&quot;
        },
        &quot;main_measure_type&quot;: {
            &quot;id&quot;: 1,
            &quot;base_measure_type_id&quot;: 2,
            &quot;name&quot;: &quot;кг&quot;,
            &quot;description&quot;: null,
            &quot;quantity&quot;: 1000,
            &quot;is_common&quot;: 0
        },
        &quot;measure_types&quot;: [],
        &quot;sell_products&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/25/782497750-dvojnoj-espresso-600x600.jpeg&quot;,
                &quot;name&quot;: &quot;Эспрессо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 5
            },
            {
                &quot;id&quot;: 2,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/22/Американо.jpeg&quot;,
                &quot;name&quot;: &quot;Американо&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 2
            },
            {
                &quot;id&quot;: 3,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/23/latte_macchiato_2000x1400px.jpeg&quot;,
                &quot;name&quot;: &quot;Лате&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 15
            },
            {
                &quot;id&quot;: 5,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/18/isla-tea-jasmine-05.jpeg&quot;,
                &quot;name&quot;: &quot;Чай ISLA green tea&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 5
            },
            {
                &quot;id&quot;: 16,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/8/cappuccino_2000x1400px.jpeg&quot;,
                &quot;name&quot;: &quot;Капучино&quot;,
                &quot;price&quot;: &quot;30.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 1
            },
            {
                &quot;id&quot;: 17,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/14/isla-tea-breakfast-01-458x523.jpeg&quot;,
                &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 1
            },
            {
                &quot;id&quot;: 20,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/32/isla-tea-fruit-2-g-01_390x415.370x370.jpg&quot;,
                &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 1
            },
            {
                &quot;id&quot;: 21,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/33/31438689.png&quot;,
                &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;,
                &quot;price&quot;: &quot;20.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 1
            },
            {
                &quot;id&quot;: 27,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/39/2-655_1.jpeg&quot;,
                &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
                &quot;price&quot;: &quot;5.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 2
            },
            {
                &quot;id&quot;: 28,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/40/2.png&quot;,
                &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 2
            },
            {
                &quot;id&quot;: 29,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/41/isla-tea-fruit-2-g-01_390x415.370x370.jpg&quot;,
                &quot;name&quot;: &quot;Чай ISLA Fruit Tea для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 0
            },
            {
                &quot;id&quot;: 30,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/42/31438689.png&quot;,
                &quot;name&quot;: &quot;Чай ISLA Herbal tea для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 0
            },
            {
                &quot;id&quot;: 31,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/43/isla-tea-jasmine-05.jpeg&quot;,
                &quot;name&quot;: &quot;Чай ISLA Green Tea для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 0
            },
            {
                &quot;id&quot;: 32,
                &quot;company_id&quot;: 1,
                &quot;photo&quot;: &quot;https://cashbox-online.test/storage/44/31438967.png&quot;,
                &quot;name&quot;: &quot;Чай ISLA English Breakfast для персонала&quot;,
                &quot;price&quot;: &quot;10.00&quot;,
                &quot;has_discount&quot;: 0,
                &quot;quantity&quot;: 0
            }
        ],
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Кофе/Чай&quot;
        },
        &quot;warning_threshold&quot;: 500
    }
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
    "https://cashbox-online.test/api/product_types/1" \
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
    "https://cashbox-online.test/api/product_types/1"
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
    "https://cashbox-online.test/api/product_types/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/product_types/1"
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

        <h1 id="report-endpoints">Report endpoints</h1>

    

            <h2 id="report-endpoints-GETapi-reports-warning_threshold">GET api/reports/warning_threshold</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-reports-warning_threshold">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/reports/warning_threshold" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/reports/warning_threshold"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 21
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Склад Гоголя&quot;,
            &quot;below_threshold_count&quot;: 0
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Склад Чаривная&quot;,
            &quot;below_threshold_count&quot;: 0
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Склад Бородинский&quot;,
            &quot;below_threshold_count&quot;: 0
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Склад Маяковского&quot;,
            &quot;below_threshold_count&quot;: 2
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Склад&quot;,
            &quot;below_threshold_count&quot;: 0
        }
    ]
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
    --get "https://cashbox-online.test/api/reports/warning_threshold/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/reports/warning_threshold/consequatur"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 20
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Сахар&quot;,
            &quot;warning_threshold&quot;: 500,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 1,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Вода&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 2,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Стаканчик 250&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Кофе 1 кг&quot;,
            &quot;warning_threshold&quot;: 1000,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 1,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Молоко&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 2,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 4,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;ПЕТ 0,5&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 500,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Стаканчик 400&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Чай ISLA green tea&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 7,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Пакетик&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 7,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Пакетик&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 7,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Пакетик&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 7,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;Пакетик&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Мороженное&quot;,
            &quot;warning_threshold&quot;: 500,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 1,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Протеин&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 1,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Петли TRX&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Лента для йоги&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Резинка для стретчинга&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Блоки для стретчинга&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Гамак&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Носки (детские)&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Носки (взрослые)&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Резинка для волос безшовная маленькая&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;Резинка для волос (набор 10 шт. маленьких пружинок)&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Мешалки&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 26,
            &quot;name&quot;: &quot;Стакан ПЛАСТИК 350 мл&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 27,
            &quot;name&quot;: &quot;Крышка ПЛАСТИК&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;name&quot;: &quot;Трубочка&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;Резинка для волос безшовная большая&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Резинка МОРДОЧКА&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;Батончик злаковый&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 32,
            &quot;name&quot;: &quot;Батончик протеиновый&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 3,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Сахар&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 9,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 34,
            &quot;name&quot;: &quot;Кофе&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 9,
                &quot;base_measure_type_id&quot;: 2,
                &quot;name&quot;: &quot;кг&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 35,
            &quot;name&quot;: &quot;Вода&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 8,
                &quot;base_measure_type_id&quot;: 1,
                &quot;name&quot;: &quot;л&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1000,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 36,
            &quot;name&quot;: &quot;Стаканчик&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 10,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Twix&quot;,
            &quot;warning_threshold&quot;: 0,
            &quot;current_quantity&quot;: 0,
            &quot;main_measure_type&quot;: {
                &quot;id&quot;: 10,
                &quot;base_measure_type_id&quot;: 3,
                &quot;name&quot;: &quot;шт&quot;,
                &quot;description&quot;: null,
                &quot;quantity&quot;: 1,
                &quot;is_common&quot;: 0
            }
        }
    ]
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
    --get "https://cashbox-online.test/api/reports/profit" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"consequatur\",
    \"end_date\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/reports/profit"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "consequatur",
    "end_date": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 19
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Магазин Гоголя&quot;,
            &quot;sum_amount&quot;: &quot;395.00&quot;,
            &quot;sum_self_cost&quot;: &quot;876.54&quot;,
            &quot;sum_profit&quot;: &quot;-481.54&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Магазин Чаривная&quot;,
            &quot;sum_amount&quot;: &quot;605.00&quot;,
            &quot;sum_self_cost&quot;: &quot;297.62&quot;,
            &quot;sum_profit&quot;: &quot;307.38&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Магазин Бородинский&quot;,
            &quot;sum_amount&quot;: &quot;3595.00&quot;,
            &quot;sum_self_cost&quot;: &quot;2055.06&quot;,
            &quot;sum_profit&quot;: &quot;1539.97&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Магазин Маяковского&quot;,
            &quot;sum_amount&quot;: &quot;1225.00&quot;,
            &quot;sum_self_cost&quot;: &quot;996.75&quot;,
            &quot;sum_profit&quot;: &quot;228.25&quot;
        }
    ],
    &quot;sum_data&quot;: {
        &quot;sum_amount&quot;: 5820,
        &quot;sum_self_cost&quot;: 4225.97,
        &quot;sum_profit&quot;: 1594.06
    }
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
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="GETapi-reports-profit"
               value=""
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
    --get "https://cashbox-online.test/api/reports/profit_by_day" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"consequatur\",
    \"end_date\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/reports/profit_by_day"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "consequatur",
    "end_date": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit_by_day">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 18
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;date_list&quot;: [
            &quot;05-28&quot;,
            &quot;05-29&quot;,
            &quot;05-30&quot;,
            &quot;05-31&quot;,
            &quot;06-01&quot;,
            &quot;06-02&quot;,
            &quot;06-03&quot;,
            &quot;06-04&quot;,
            &quot;06-05&quot;,
            &quot;06-06&quot;,
            &quot;06-07&quot;,
            &quot;06-08&quot;,
            &quot;06-09&quot;,
            &quot;06-10&quot;,
            &quot;06-11&quot;,
            &quot;06-12&quot;,
            &quot;06-13&quot;,
            &quot;06-14&quot;,
            &quot;06-15&quot;,
            &quot;06-16&quot;,
            &quot;06-17&quot;,
            &quot;06-18&quot;,
            &quot;06-19&quot;,
            &quot;06-20&quot;,
            &quot;06-21&quot;,
            &quot;06-22&quot;,
            &quot;06-23&quot;,
            &quot;06-24&quot;,
            &quot;06-25&quot;,
            &quot;06-26&quot;,
            &quot;06-27&quot;
        ],
        &quot;amount_list&quot;: [
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;60.00&quot;,
            &quot;60.00&quot;,
            &quot;0.00&quot;,
            &quot;100.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;20.00&quot;,
            &quot;255.00&quot;,
            &quot;355.00&quot;,
            &quot;195.00&quot;,
            &quot;370.00&quot;,
            &quot;75.00&quot;,
            &quot;0.00&quot;,
            &quot;2360.00&quot;,
            &quot;265.00&quot;,
            &quot;335.00&quot;,
            &quot;200.00&quot;,
            &quot;295.00&quot;,
            &quot;80.00&quot;,
            &quot;0.00&quot;,
            &quot;185.00&quot;,
            &quot;135.00&quot;,
            &quot;195.00&quot;,
            &quot;185.00&quot;,
            &quot;45.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;50.00&quot;
        ],
        &quot;self_cost_list&quot;: [
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;12.07&quot;,
            &quot;52.60&quot;,
            &quot;0.00&quot;,
            &quot;128.90&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;19.36&quot;,
            &quot;119.30&quot;,
            &quot;224.68&quot;,
            &quot;816.95&quot;,
            &quot;180.87&quot;,
            &quot;56.19&quot;,
            &quot;0.00&quot;,
            &quot;1237.48&quot;,
            &quot;149.97&quot;,
            &quot;368.35&quot;,
            &quot;93.63&quot;,
            &quot;182.16&quot;,
            &quot;53.73&quot;,
            &quot;0.00&quot;,
            &quot;83.79&quot;,
            &quot;130.44&quot;,
            &quot;143.40&quot;,
            &quot;116.19&quot;,
            &quot;38.62&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;17.29&quot;
        ],
        &quot;profit_list&quot;: [
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;47.93&quot;,
            &quot;7.40&quot;,
            &quot;0.00&quot;,
            &quot;-28.90&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;0.64&quot;,
            &quot;135.72&quot;,
            &quot;130.32&quot;,
            &quot;-621.95&quot;,
            &quot;189.13&quot;,
            &quot;18.81&quot;,
            &quot;0.00&quot;,
            &quot;1122.52&quot;,
            &quot;115.03&quot;,
            &quot;-33.35&quot;,
            &quot;106.37&quot;,
            &quot;112.84&quot;,
            &quot;26.27&quot;,
            &quot;0.00&quot;,
            &quot;101.21&quot;,
            &quot;4.56&quot;,
            &quot;51.60&quot;,
            &quot;68.82&quot;,
            &quot;6.38&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;,
            &quot;32.71&quot;
        ]
    }
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
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit_by_day"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="GETapi-reports-profit_by_day"
               value=""
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
    --get "https://cashbox-online.test/api/reports/profit_by_category" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"start_date\": \"consequatur\",
    \"end_date\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/reports/profit_by_category"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "start_date": "consequatur",
    "end_date": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-reports-profit_by_category">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 17
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;categories_list&quot;: [
            &quot;Батончики&quot;,
            &quot;Кофе/Чай&quot;,
            &quot;Инвентарь&quot;,
            &quot;Костюмы&quot;,
            &quot;Коктейли&quot;,
            &quot;Напитки&quot;,
            &quot;Аксессуары&quot;,
            &quot;Для персонала&quot;,
            &quot;Напитки&quot;,
            &quot;Батончики&quot;
        ],
        &quot;amount_list&quot;: [
            &quot;90.00&quot;,
            &quot;1070.00&quot;,
            &quot;2240.00&quot;,
            &quot;0.00&quot;,
            &quot;130.00&quot;,
            &quot;880.00&quot;,
            &quot;240.00&quot;,
            &quot;1170.00&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;
        ],
        &quot;self_cost_list&quot;: [
            &quot;55.00&quot;,
            &quot;375.03&quot;,
            &quot;1075.00&quot;,
            &quot;0.00&quot;,
            &quot;68.09&quot;,
            &quot;616.42&quot;,
            &quot;82.00&quot;,
            &quot;1954.43&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;
        ],
        &quot;profit_list&quot;: [
            &quot;35.00&quot;,
            &quot;694.99&quot;,
            &quot;1165.00&quot;,
            &quot;0.00&quot;,
            &quot;61.91&quot;,
            &quot;263.58&quot;,
            &quot;158.00&quot;,
            &quot;-784.42&quot;,
            &quot;0.00&quot;,
            &quot;0.00&quot;
        ]
    }
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
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="end_date"
               data-endpoint="GETapi-reports-profit_by_category"
               value="consequatur"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>shop_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="shop_id"
               data-endpoint="GETapi-reports-profit_by_category"
               value=""
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
    --get "https://cashbox-online.test/api/roles" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/roles"
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
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 24
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Class name must be a valid object or a string&quot;,
    &quot;exception&quot;: &quot;Error&quot;,
    &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/HasRelationships.php&quot;,
    &quot;line&quot;: 755,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/HasRelationships.php&quot;,
            &quot;line&quot;: 551,
            &quot;function&quot;: &quot;newRelatedInstance&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/HasRelationships.php&quot;,
            &quot;line&quot;: 622,
            &quot;function&quot;: &quot;morphToMany&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/spatie/laravel-permission/src/Models/Role.php&quot;,
            &quot;line&quot;: 79,
            &quot;function&quot;: &quot;morphedByMany&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/QueriesRelationships.php&quot;,
            &quot;line&quot;: 743,
            &quot;function&quot;: &quot;users&quot;,
            &quot;class&quot;: &quot;Spatie\\Permission\\Models\\Role&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Relations/Relation.php&quot;,
            &quot;line&quot;: 104,
            &quot;function&quot;: &quot;Illuminate\\Database\\Eloquent\\Concerns\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/QueriesRelationships.php&quot;,
            &quot;line&quot;: 744,
            &quot;function&quot;: &quot;noConstraints&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Relations\\Relation&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/QueriesRelationships.php&quot;,
            &quot;line&quot;: 543,
            &quot;function&quot;: &quot;getRelationWithoutConstraints&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Concerns/QueriesRelationships.php&quot;,
            &quot;line&quot;: 612,
            &quot;function&quot;: &quot;withAggregate&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php&quot;,
            &quot;line&quot;: 23,
            &quot;function&quot;: &quot;withCount&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Builder&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php&quot;,
            &quot;line&quot;: 2133,
            &quot;function&quot;: &quot;forwardCallTo&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Repositories/RoleRepository.php&quot;,
            &quot;line&quot;: 92,
            &quot;function&quot;: &quot;__call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Database\\Eloquent\\Model&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Http/Controllers/Api/RoleController.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;getWithUsersCount&quot;,
            &quot;class&quot;: &quot;App\\Repositories\\RoleRepository&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;index&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\Api\\RoleController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 261,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 204,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 725,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 727,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 702,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 666,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 655,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 28,
            &quot;function&quot;: &quot;runCommand&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Console/Commands/GenerateDocsCommand.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Console\\Commands\\GenerateDocsCommand&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
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
    "https://cashbox-online.test/api/roles" \
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
    "https://cashbox-online.test/api/roles"
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
    --get "https://cashbox-online.test/api/roles/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/roles/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 23
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Super Admin&quot;,
        &quot;human_name&quot;: &quot;Super Administrator&quot;,
        &quot;permissions&quot;: []
    }
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
    "https://cashbox-online.test/api/roles/1" \
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
    "https://cashbox-online.test/api/roles/1"
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
    "https://cashbox-online.test/api/roles/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/roles/1"
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
    --get "https://cashbox-online.test/api/sell_product_groups" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_product_groups"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 32
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: []
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
    "https://cashbox-online.test/api/sell_product_groups" \
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
    "https://cashbox-online.test/api/sell_product_groups"
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
    --get "https://cashbox-online.test/api/sell_product_groups/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_product_groups/17"
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
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 31
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\SellProductGroup] 1&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 355,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 331,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 727,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 702,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 666,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 655,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 28,
            &quot;function&quot;: &quot;runCommand&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Console/Commands/GenerateDocsCommand.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Console\\Commands\\GenerateDocsCommand&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
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
    "https://cashbox-online.test/api/sell_product_groups/17" \
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
    "https://cashbox-online.test/api/sell_product_groups/17"
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
    "https://cashbox-online.test/api/sell_product_groups/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_product_groups/17"
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
    "https://cashbox-online.test/api/sell_products/get_paginated" \
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
    "https://cashbox-online.test/api/sell_products/get_paginated"
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
    --get "https://cashbox-online.test/api/sell_products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_products"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 34
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/25/782497750-dvojnoj-espresso-600x600.jpeg&quot;,
            &quot;name&quot;: &quot;Эспрессо&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 2,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 5,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.005,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Стаканчик 250&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.49
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 16,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.016,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/22/Американо.jpeg&quot;,
            &quot;name&quot;: &quot;Американо&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 1,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 2,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.002,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Стаканчик 250&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.49
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 14,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.014,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/23/latte_macchiato_2000x1400px.jpeg&quot;,
            &quot;name&quot;: &quot;Лате&quot;,
            &quot;price&quot;: &quot;30.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 3,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 15,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.015,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 14,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.014,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                },
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Молоко&quot;,
                    &quot;quantity&quot;: 150,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.15,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/21/Снимок-экрана-2022-05-24-в-17.32.47.png&quot;,
            &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 5,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;name&quot;: &quot;Вода Моршинская 0,5&quot;,
                    &quot;quantity&quot;: 500,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;ПЕТ 0,5&quot;,
                        &quot;quantity&quot;: 500
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.0214
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Напитки&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/18/isla-tea-jasmine-05.jpeg&quot;,
            &quot;name&quot;: &quot;Чай ISLA green tea&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 11,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 5,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.005,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Чай ISLA green tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/13/trx_s_burn-081.jpeg&quot;,
            &quot;name&quot;: &quot;Петли TRX&quot;,
            &quot;price&quot;: &quot;1600.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 16,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 15,
                    &quot;name&quot;: &quot;Петли TRX&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 800
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Инвентарь&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/12/pic_ed9813ade29c489_1024x3000.webp&quot;,
            &quot;name&quot;: &quot;Лента для йоги&quot;,
            &quot;price&quot;: &quot;160.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 15,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 16,
                    &quot;name&quot;: &quot;Лента для йоги&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 81
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Инвентарь&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/11/3112003758_w640_h640_nabor-tkanevyh-fitnes.webp&quot;,
            &quot;name&quot;: &quot;Резинка для стретчинга&quot;,
            &quot;price&quot;: &quot;300.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 17,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 17,
                    &quot;name&quot;: &quot;Резинка для стретчинга&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: null
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Инвентарь&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/10/Blok-dlya-jogi-EasyFit-EVA-CHernyj.webp&quot;,
            &quot;name&quot;: &quot;Блоки для стретчинга&quot;,
            &quot;price&quot;: &quot;120.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 33,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 18,
                    &quot;name&quot;: &quot;Блоки для стретчинга&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 75
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Инвентарь&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/9/e1a2a0c7-8d77-4065-be93-b6e01c1dcb36.jpeg&quot;,
            &quot;name&quot;: &quot;Гамак&quot;,
            &quot;price&quot;: &quot;2000.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 18,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 19,
                    &quot;name&quot;: &quot;Гамак&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1000
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Инвентарь&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/17/10055-228x228.jpeg&quot;,
            &quot;name&quot;: &quot;Носки (детские)&quot;,
            &quot;price&quot;: &quot;25.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 32,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 20,
                    &quot;name&quot;: &quot;Носки (детские)&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 10
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/16/images.jpeg&quot;,
            &quot;name&quot;: &quot;Носки (взрослые)&quot;,
            &quot;price&quot;: &quot;30.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 31,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 21,
                    &quot;name&quot;: &quot;Носки (взрослые)&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 10
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/28/Снимок-экрана-2022-05-24-в-17.48.24.png&quot;,
            &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;,
            &quot;price&quot;: &quot;15.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 30,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 22,
                    &quot;name&quot;: &quot;Резинка для волос (пружинка)&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 4
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/27/Снимок-экрана-2022-05-24-в-17.48.16.png&quot;,
            &quot;name&quot;: &quot;Резинка для волос безшовная маленькая&quot;,
            &quot;price&quot;: &quot;5.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 29,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 23,
                    &quot;name&quot;: &quot;Резинка для волос безшовная маленькая&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 4
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/26/Снимок-экрана-2022-05-24-в-17.47.50.png&quot;,
            &quot;name&quot;: &quot;Резинка для волос (набор 10 шт. маленьких пружинок)&quot;,
            &quot;price&quot;: &quot;15.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 28,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 24,
                    &quot;name&quot;: &quot;Резинка для волос (набор 10 шт. маленьких пружинок)&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 10
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/8/cappuccino_2000x1400px.jpeg&quot;,
            &quot;name&quot;: &quot;Капучино&quot;,
            &quot;price&quot;: &quot;30.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 4,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.001,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Стаканчик 250&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.49
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 14,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.014,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                },
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Молоко&quot;,
                    &quot;quantity&quot;: 100,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/14/isla-tea-breakfast-01-458x523.jpeg&quot;,
            &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 10,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.001,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 11,
                    &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/30/Снимок-экрана-2022-05-24-в-17.48.01.png&quot;,
            &quot;name&quot;: &quot;Резинка для волос безшовная большая&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 27,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 29,
                    &quot;name&quot;: &quot;Резинка для волос безшовная большая&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: null
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 19,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/31/Снимок-экрана-2022-05-24-в-17.58.08.png&quot;,
            &quot;name&quot;: &quot;Резинка МОРДОЧКА&quot;,
            &quot;price&quot;: &quot;15.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 26,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 30,
                    &quot;name&quot;: &quot;Резинка МОРДОЧКА&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 4
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Аксессуары&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/32/isla-tea-fruit-2-g-01_390x415.370x370.jpg&quot;,
            &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 9,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.001,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 12,
                    &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 21,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/33/31438689.png&quot;,
            &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;,
            &quot;price&quot;: &quot;20.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 8,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.001,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 10,
                    &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 4.625
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Кофе/Чай&quot;
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/34/50520802_958877007645473_470777998541895421_n.webp&quot;,
            &quot;name&quot;: &quot;Молочный коктейль&quot;,
            &quot;price&quot;: &quot;35.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 12,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Молоко&quot;,
                    &quot;quantity&quot;: 200,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.2,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03
                },
                {
                    &quot;id&quot;: 13,
                    &quot;name&quot;: &quot;Мороженное&quot;,
                    &quot;quantity&quot;: 150,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.15,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.051
                },
                {
                    &quot;id&quot;: 26,
                    &quot;name&quot;: &quot;Стакан ПЛАСТИК 350 мл&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 2.5
                },
                {
                    &quot;id&quot;: 27,
                    &quot;name&quot;: &quot;Крышка ПЛАСТИК&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                },
                {
                    &quot;id&quot;: 28,
                    &quot;name&quot;: &quot;Трубочка&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Коктейли&quot;
            }
        },
        {
            &quot;id&quot;: 23,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/35/images.jpeg&quot;,
            &quot;name&quot;: &quot;Протеиновый коктейль на молоке&quot;,
            &quot;price&quot;: &quot;35.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 7,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Молоко&quot;,
                    &quot;quantity&quot;: 250,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.25,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03
                },
                {
                    &quot;id&quot;: 14,
                    &quot;name&quot;: &quot;Протеин&quot;,
                    &quot;quantity&quot;: 25,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.025,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.4375
                },
                {
                    &quot;id&quot;: 26,
                    &quot;name&quot;: &quot;Стакан ПЛАСТИК 350 мл&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 2.5
                },
                {
                    &quot;id&quot;: 27,
                    &quot;name&quot;: &quot;Крышка ПЛАСТИК&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                },
                {
                    &quot;id&quot;: 28,
                    &quot;name&quot;: &quot;Трубочка&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Коктейли&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/36/protein_cocktail_5_1273.jpeg&quot;,
            &quot;name&quot;: &quot;Протеиновый коктейль на воде&quot;,
            &quot;price&quot;: &quot;25.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 6,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Вода&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 4,
                            &quot;name&quot;: &quot;ПЕТ 0,5&quot;,
                            &quot;quantity&quot;: 500
                        },
                        {
                            &quot;id&quot;: 5,
                            &quot;name&quot;: &quot;ПЕТ 1л&quot;,
                            &quot;quantity&quot;: 1000
                        }
                    ],
                    &quot;price_per_unit&quot;: 0.2
                },
                {
                    &quot;id&quot;: 14,
                    &quot;name&quot;: &quot;Протеин&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.4375
                },
                {
                    &quot;id&quot;: 26,
                    &quot;name&quot;: &quot;Стакан ПЛАСТИК 350 мл&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 2.5
                },
                {
                    &quot;id&quot;: 27,
                    &quot;name&quot;: &quot;Крышка ПЛАСТИК&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                },
                {
                    &quot;id&quot;: 28,
                    &quot;name&quot;: &quot;Трубочка&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.22
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Коктейли&quot;
            }
        },
        {
            &quot;id&quot;: 25,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/37/76721_1.jpeg&quot;,
            &quot;name&quot;: &quot;Батончик злаковый&quot;,
            &quot;price&quot;: &quot;15.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 13,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 31,
                    &quot;name&quot;: &quot;Батончик злаковый&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 9
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Батончики&quot;
            }
        },
        {
            &quot;id&quot;: 26,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/38/20190702.1562168528.SNCPSG10.obj.0.1.jpg.oe.jpg.pf.jpg.350nowm.jpg.350x.webp&quot;,
            &quot;name&quot;: &quot;Батончик протеиновый&quot;,
            &quot;price&quot;: &quot;35.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 14,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 32,
                    &quot;name&quot;: &quot;Батончик протеиновый&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 24
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Батончики&quot;
            }
        },
        {
            &quot;id&quot;: 27,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/39/2-655_1.jpeg&quot;,
            &quot;name&quot;: &quot;Американо/Эспрессо для персонала&quot;,
            &quot;price&quot;: &quot;5.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 25,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 2,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.002,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Стаканчик 250&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.49
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 14,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.014,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/40/2.png&quot;,
            &quot;name&quot;: &quot;Капучино/Латте для персонала&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 24,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 2,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.002,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                    &quot;quantity&quot;: 14,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.014,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.376
                },
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;Молоко&quot;,
                    &quot;quantity&quot;: 150,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.15,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Мешалки&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.04
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/41/isla-tea-fruit-2-g-01_390x415.370x370.jpg&quot;,
            &quot;name&quot;: &quot;Чай ISLA Fruit Tea для персонала&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 23,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 12,
                    &quot;name&quot;: &quot;Чай ISLA Fruit Tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Мешалки&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.04
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 30,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/42/31438689.png&quot;,
            &quot;name&quot;: &quot;Чай ISLA Herbal tea для персонала&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 22,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 10,
                    &quot;name&quot;: &quot;Чай ISLA Herbal tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 4.625
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Мешалки&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.04
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 31,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/43/isla-tea-jasmine-05.jpeg&quot;,
            &quot;name&quot;: &quot;Чай ISLA Green Tea для персонала&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 21,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 9,
                    &quot;name&quot;: &quot;Чай ISLA green tea&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Мешалки&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.04
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 32,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/44/31438967.png&quot;,
            &quot;name&quot;: &quot;Чай ISLA English Breakfast для персонала&quot;,
            &quot;price&quot;: &quot;10.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 19,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 0,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.3
                },
                {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Стаканчик 400&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 1.34
                },
                {
                    &quot;id&quot;: 11,
                    &quot;name&quot;: &quot;Чай ISLA English Breakfast&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Пакетик&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [
                        {
                            &quot;id&quot;: 3,
                            &quot;name&quot;: &quot;шт&quot;,
                            &quot;quantity&quot;: 1
                        }
                    ],
                    &quot;price_per_unit&quot;: 6
                },
                {
                    &quot;id&quot;: 25,
                    &quot;name&quot;: &quot;Мешалки&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.04
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Для персонала&quot;
            }
        },
        {
            &quot;id&quot;: 33,
            &quot;company_id&quot;: 2,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/48/image.png&quot;,
            &quot;name&quot;: &quot;Американо&quot;,
            &quot;price&quot;: &quot;40.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 2,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 33,
                    &quot;name&quot;: &quot;Сахар&quot;,
                    &quot;quantity&quot;: 15,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.015,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.03333333333333333
                },
                {
                    &quot;id&quot;: 34,
                    &quot;name&quot;: &quot;Кофе&quot;,
                    &quot;quantity&quot;: 20,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.02,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.12
                },
                {
                    &quot;id&quot;: 35,
                    &quot;name&quot;: &quot;Вода&quot;,
                    &quot;quantity&quot;: 150,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;л&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    &quot;quantity_in_main_measure_type&quot;: 0.15,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.007
                },
                {
                    &quot;id&quot;: 36,
                    &quot;name&quot;: &quot;Стаканчик&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.5
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;Напитки&quot;
            }
        },
        {
            &quot;id&quot;: 34,
            &quot;company_id&quot;: 2,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/50/image.png&quot;,
            &quot;name&quot;: &quot;Twix&quot;,
            &quot;price&quot;: &quot;30.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 1,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 37,
                    &quot;name&quot;: &quot;Twix&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 10,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 20
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Батончики&quot;
            }
        },
        {
            &quot;id&quot;: 35,
            &quot;company_id&quot;: 1,
            &quot;photo&quot;: &quot;https://cashbox-online.test/storage/52/2793190762_w640_h640_stakan-340ml-bumazhnyj.webp&quot;,
            &quot;name&quot;: &quot;Стакан для воды&quot;,
            &quot;price&quot;: &quot;1.00&quot;,
            &quot;has_discount&quot;: 0,
            &quot;position&quot;: 20,
            &quot;product_types&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Стаканчик 250&quot;,
                    &quot;quantity&quot;: 1,
                    &quot;main_measure_type&quot;: {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    },
                    &quot;quantity_in_main_measure_type&quot;: 1,
                    &quot;measure_types&quot;: [],
                    &quot;price_per_unit&quot;: 0.49
                }
            ],
            &quot;category&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Напитки&quot;
            }
        }
    ]
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
    "https://cashbox-online.test/api/sell_products" \
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
    \"position\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_products"
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
    "position": 17
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
        </form>

            <h2 id="sell-product-management-GETapi-sell_products--id-">GET api/sell_products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-sell_products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/sell_products/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_products/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 33
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;company_id&quot;: 1,
        &quot;photo&quot;: &quot;https://cashbox-online.test/storage/25/782497750-dvojnoj-espresso-600x600.jpeg&quot;,
        &quot;name&quot;: &quot;Эспрессо&quot;,
        &quot;price&quot;: &quot;20.00&quot;,
        &quot;has_discount&quot;: 0,
        &quot;position&quot;: 2,
        &quot;product_types&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Сахар&quot;,
                &quot;quantity&quot;: 5,
                &quot;main_measure_type&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;кг&quot;,
                    &quot;quantity&quot;: 1000
                },
                &quot;quantity_in_main_measure_type&quot;: 0.005,
                &quot;measure_types&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;г&quot;,
                        &quot;quantity&quot;: 1
                    }
                ],
                &quot;price_per_unit&quot;: 0.3
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Стаканчик 250&quot;,
                &quot;quantity&quot;: 1,
                &quot;main_measure_type&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;шт&quot;,
                    &quot;quantity&quot;: 1
                },
                &quot;quantity_in_main_measure_type&quot;: 1,
                &quot;measure_types&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;шт&quot;,
                        &quot;quantity&quot;: 1
                    }
                ],
                &quot;price_per_unit&quot;: 0.49473684210526314
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Кофе 1 кг&quot;,
                &quot;quantity&quot;: 16,
                &quot;main_measure_type&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;кг&quot;,
                    &quot;quantity&quot;: 1000
                },
                &quot;quantity_in_main_measure_type&quot;: 0.016,
                &quot;measure_types&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;кг&quot;,
                        &quot;quantity&quot;: 1000
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;г&quot;,
                        &quot;quantity&quot;: 1
                    }
                ],
                &quot;price_per_unit&quot;: 0.376
            }
        ],
        &quot;category&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Кофе/Чай&quot;
        }
    }
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
    "https://cashbox-online.test/api/sell_products/1" \
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
    "https://cashbox-online.test/api/sell_products/1"
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
    "https://cashbox-online.test/api/sell_products/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/sell_products/1"
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
    "https://cashbox-online.test/api/shops/get_by_company" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/shops/get_by_company"
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
    --get "https://cashbox-online.test/api/shops" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/shops"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Магазин Гоголя&quot;,
            &quot;address&quot;: &quot;ул. Гоголя, 155 а&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Магазин Чаривная&quot;,
            &quot;address&quot;: &quot;ул. Чаривная, 46 а&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Магазин Бородинский&quot;,
            &quot;address&quot;: &quot;ул. Бородинская, 14&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Магазин Маяковского&quot;,
            &quot;address&quot;: &quot;пр. Маяковского, 5/35&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Магазин 1&quot;,
            &quot;address&quot;: &quot;ул. Какая-то, д. 123&quot;
        }
    ]
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
    "https://cashbox-online.test/api/shops" \
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
    "https://cashbox-online.test/api/shops"
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
    --get "https://cashbox-online.test/api/shops/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/shops/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Магазин Гоголя&quot;,
        &quot;address&quot;: &quot;ул. Гоголя, 155 а&quot;,
        &quot;storages&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;shop_id&quot;: 1,
                &quot;name&quot;: &quot;Склад Гоголя&quot;
            }
        ]
    }
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
    "https://cashbox-online.test/api/shops/1" \
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
    "https://cashbox-online.test/api/shops/1"
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
    "https://cashbox-online.test/api/shops/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/shops/1"
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
    "https://cashbox-online.test/api/storages/get_for_purchase" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"company_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/storages/get_for_purchase"
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
    "https://cashbox-online.test/api/storages/get_balance" \
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
    "https://cashbox-online.test/api/storages/get_balance"
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
    "https://cashbox-online.test/api/storages/write_off" \
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
    "https://cashbox-online.test/api/storages/write_off"
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
    "https://cashbox-online.test/api/storages/transfer" \
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
    "https://cashbox-online.test/api/storages/transfer"
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
    --get "https://cashbox-online.test/api/storages" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/storages"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;shop_id&quot;: 1,
            &quot;name&quot;: &quot;Склад Гоголя&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;shop_id&quot;: 2,
            &quot;name&quot;: &quot;Склад Чаривная&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;shop_id&quot;: 3,
            &quot;name&quot;: &quot;Склад Бородинский&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;shop_id&quot;: 4,
            &quot;name&quot;: &quot;Склад Маяковского&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;shop_id&quot;: 5,
            &quot;name&quot;: &quot;Склад&quot;
        }
    ]
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
    "https://cashbox-online.test/api/storages" \
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
    "https://cashbox-online.test/api/storages"
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
    --get "https://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/storages/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;shop_id&quot;: 1,
        &quot;name&quot;: &quot;Склад Гоголя&quot;
    }
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
    "https://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/storages/1"
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
    "https://cashbox-online.test/api/storages/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/storages/1"
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
    "https://cashbox-online.test/api/system_logs/get_paginated" \
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
    "https://cashbox-online.test/api/system_logs/get_paginated"
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
    "https://cashbox-online.test/api/transfers/get_paginated" \
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
    "https://cashbox-online.test/api/transfers/get_paginated"
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

            <h2 id="transfer-management-GETapi-transfers--transfer-">GET api/transfers/{transfer}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-transfers--transfer-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/transfers/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/transfers/17"
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

<span id="example-responses-GETapi-transfers--transfer-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 26
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Transfer] 17&quot;,
    &quot;exception&quot;: &quot;Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException&quot;,
    &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
    &quot;line&quot;: 355,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/Handler.php&quot;,
            &quot;line&quot;: 331,
            &quot;function&quot;: &quot;prepareException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/nunomaduro/collision/src/Adapters/Laravel/ExceptionHandler.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Exceptions\\Handler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;render&quot;,
            &quot;class&quot;: &quot;NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 185,
            &quot;function&quot;: &quot;handleException&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 126,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Auth/Middleware/Authenticate.php&quot;,
            &quot;line&quot;: 44,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Auth\\Middleware\\Authenticate&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 33,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\{closure}&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/sanctum/src/Http/Middleware/EnsureFrontendRequestsAreStateful.php&quot;,
            &quot;line&quot;: 34,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Laravel\\Sanctum\\Http\\Middleware\\EnsureFrontendRequestsAreStateful&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 727,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 702,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 666,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 655,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 141,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php&quot;,
            &quot;line&quot;: 60,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Barryvdh\\Debugbar\\Middleware\\InjectDebugbar&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 180,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 123,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 80,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 56,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 68,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Concerns/CallsCommands.php&quot;,
            &quot;line&quot;: 28,
            &quot;function&quot;: &quot;runCommand&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/app/Console/Commands/GenerateDocsCommand.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Console\\Commands\\GenerateDocsCommand&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 41,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 291,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 156,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 989,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 102,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/Users/ermishind/Documents/Проекты/cashbox-online/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-transfers--transfer-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-transfers--transfer-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-transfers--transfer-"></code></pre>
</span>
<span id="execution-error-GETapi-transfers--transfer-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-transfers--transfer-"></code></pre>
</span>
<form id="form-GETapi-transfers--transfer-" data-method="GET"
      data-path="api/transfers/{transfer}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-transfers--transfer-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/transfers/{transfer}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-transfers--transfer-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-transfers--transfer-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>transfer</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="transfer"
               data-endpoint="GETapi-transfers--transfer-"
               value="17"
               data-component="url" hidden>
    <br>

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
    "https://cashbox-online.test/api/change_shop" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shop_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/change_shop"
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
    --get "https://cashbox-online.test/api/users" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/users"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Administrator&quot;,
            &quot;username&quot;: &quot;admin&quot;,
            &quot;email&quot;: &quot;admin@admin.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Super Admin&quot;,
                    &quot;human_name&quot;: &quot;Super Administrator&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Юрий Билов&quot;,
            &quot;username&quot;: &quot;yurii_bilov&quot;,
            &quot;email&quot;: &quot;yurii_bilov@admin.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;director.1&quot;,
                    &quot;human_name&quot;: &quot;Директор&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Максимцова Анастасия&quot;,
            &quot;username&quot;: &quot;Nadmin&quot;,
            &quot;email&quot;: &quot;maksimtsova.anastasiya@gmail.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;director.1&quot;,
                    &quot;human_name&quot;: &quot;Директор&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Директор&quot;,
            &quot;username&quot;: &quot;test.user&quot;,
            &quot;email&quot;: &quot;test.user@test.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;director.2&quot;,
                    &quot;human_name&quot;: &quot;Директор&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Биднык Виктория&quot;,
            &quot;username&quot;: &quot;Vi_admin&quot;,
            &quot;email&quot;: &quot;vika.bidnyk12@gmail.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Борзенкова Евгения&quot;,
            &quot;username&quot;: &quot;Borzenkova1&quot;,
            &quot;email&quot;: &quot;jeniborzenkova123ap@gmail.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Шаповал Лидия&quot;,
            &quot;username&quot;: &quot;Lidia_admin&quot;,
            &quot;email&quot;: &quot;petrisaklidia@gmail.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Зубенко Елена&quot;,
            &quot;username&quot;: &quot;lena.admin&quot;,
            &quot;email&quot;: &quot;lena.zubenko.94@ukr.net&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Бараниченко Светлана&quot;,
            &quot;username&quot;: &quot;sadmin&quot;,
            &quot;email&quot;: &quot;admin@example.com&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Солодовник Екатерина&quot;,
            &quot;username&quot;: &quot;K_admin&quot;,
            &quot;email&quot;: &quot;solodkat@ua.fm&quot;,
            &quot;roles&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;salesman.1&quot;,
                    &quot;human_name&quot;: &quot;Продавец&quot;
                }
            ]
        }
    ]
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
    "https://cashbox-online.test/api/users" \
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
        \"4\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/users"
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
        "4"
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
<p>Must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, or <code>9</code>.</p>
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
    --get "https://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/users/1"
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
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Administrator&quot;,
        &quot;username&quot;: &quot;admin&quot;,
        &quot;email&quot;: &quot;admin@admin.com&quot;,
        &quot;roles&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Super Admin&quot;,
                &quot;human_name&quot;: &quot;Super Administrator&quot;
            }
        ]
    }
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
    "https://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"username\": \"consequatur\",
    \"email\": \"qkunze@example.com\",
    \"roles\": [
        \"4\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/users/1"
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
        "4"
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
<p>Must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, or <code>9</code>.</p>
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
    "https://cashbox-online.test/api/users/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/users/1"
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
    "https://cashbox-online.test/api/write_offs/get_paginated" \
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
    "https://cashbox-online.test/api/write_offs/get_paginated"
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

            <h2 id="write-off-management-GETapi-write_offs--write_off-">GET api/write_offs/{write_off}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-write_offs--write_off-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://cashbox-online.test/api/write_offs/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://cashbox-online.test/api/write_offs/1"
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

<span id="example-responses-GETapi-write_offs--write_off-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 22
vary: Origin
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;storage&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Склад Гоголя&quot;
        },
        &quot;user&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Юрий Билов&quot;
        },
        &quot;created_at&quot;: &quot;2022-05-09 21:57&quot;,
        &quot;product_types&quot;: [
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Стаканчик 250&quot;,
                &quot;main_measure_type&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;шт&quot;,
                    &quot;quantity&quot;: 1
                },
                &quot;quantity&quot;: 1,
                &quot;amount&quot;: 50
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-write_offs--write_off-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-write_offs--write_off-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-write_offs--write_off-"></code></pre>
</span>
<span id="execution-error-GETapi-write_offs--write_off-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-write_offs--write_off-"></code></pre>
</span>
<form id="form-GETapi-write_offs--write_off-" data-method="GET"
      data-path="api/write_offs/{write_off}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-write_offs--write_off-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/write_offs/{write_off}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-write_offs--write_off-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-write_offs--write_off-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>write_off</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="write_off"
               data-endpoint="GETapi-write_offs--write_off-"
               value="1"
               data-component="url" hidden>
    <br>

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