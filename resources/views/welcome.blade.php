<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Property Search</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div class="container" id="property_search_page">
    <div class="row">
        <div class="col-12" style="margin-bottom: 1em">
            <h1>Property Search</h1>
            <form method="GET" action="{{ route('properties') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="price_min">Price min</label>
                        <select class="form-control" name="price_min">
                            <option value="">Any</option>
                            <option value="50000">50,000</option>
                            <option value="100000">100,000</option>
                            <option value="150000">150,000</option>
                            <option value="200000">200,000</option>
                            <option value="250000">250,000</option>
                            <option value="300000">300,000</option>
                            <option value="350000">350,000</option>
                            <option value="400000">400,000</option>
                            <option value="450000">450,000</option>
                            <option value="500000">500,000</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="price_max">Price max</label>
                        <select class="form-control" name="price_max">
                            <option value="">Any</option>
                            <option value="50000">50,000</option>
                            <option value="100000">100,000</option>
                            <option value="150000">150,000</option>
                            <option value="200000">200,000</option>
                            <option value="250000">250,000</option>
                            <option value="300000">300,000</option>
                            <option value="350000">350,000</option>
                            <option value="400000">400,000</option>
                            <option value="450000">450,000</option>
                            <option value="500000">500,000</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="bedrooms">Bedrooms</label>
                        <select class="form-control" name="bedrooms">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="bathrooms">Bathrooms</label>
                        <select class="form-control" name="bathrooms">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="storeys">Storeys</label>
                        <select class="form-control" name="storeys">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="garages">Garages</label>
                        <select class="form-control" name="garages">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
        <div class="col-12">
            <div class="listings" style="display: none">
                <h2>Listings</h2>
                <div class="row items" style="margin-bottom: 1em">
                    <!-- To be replaced via AJAX -->
                </div>
            </div>
            <div class="loading" style="display: none">
                Loading...
            </div>
            <div
                    class="empty"
                    style="display: none;text-align:center; padding: 2em"
            >
                No properties match your search
            </div>
            <div class="errors alert alert-warning" style="display: none">
                <!-- To be replaced via AJAX -->
            </div>
        </div>
    </div>
</div>
<script async src="{{ mix('/js/app.js') }}"></script>
</body>
</html>