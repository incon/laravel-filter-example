$(function () {
    let formElm = $('#property_search_page form');

    formElm.submit(function (e) {
        e.preventDefault();

        let data = $(this).serialize();
        let acition = $(this).attr('action');
        let method = $(this).attr('method');
        let buttons = $(this).find('button');

        let loadingElm = $('.loading');
        let emptyElm = $('.empty');
        let listingElm = $('.listings');
        let listingItemsElm = listingElm.find('.items');
        let errorsElm = $('.errors');

        emptyElm.hide();
        errorsElm.hide();
        listingElm.hide();

        buttons.attr('disable', true);
        loadingElm.show();

        $.ajax({
            url: acition,
            type: method,
            dataType: 'json',
            data: data,

        }).done(function (response) {
            if (response.length === 0) {
                emptyElm.show();
                return;
            }

            let listings = response.reduce((listings, item) => {
                return listings + `<div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">${item.name}</h2>
                            <h3 class="card-subtitle mb-2 text-muted">Price: $${item.price}</h3>
                            <p class="card-text"><strong>Bedrooms: </strong>${item.bedrooms}</p>
                            <p class="card-text"><strong>Bathrooms: </strong>${item.bathrooms}</p>
                            <p class="card-text"><strong>Storeys: </strong>${item.storeys}</p>
                            <p class="card-text"><strong>Garages: </strong>${item.garages}</p>
                        </div>
                    </div>
                </div>`;
            }, '');

            listingItemsElm.html(listings);
            listingElm.show();

        }).fail(function (response) {
            if (typeof(response.responseText) === 'undefined') {
                errorsElm.html(`
                    <h4 class="alert-heading">Errors</h4>
                    <p>Check your internet connection and try again.</p>
                `);
            } else {
                let jsonObject = JSON.parse(response.responseText);
                let errorsHtml = Object.values(jsonObject.errors).reduce((errorsHtml, error) => {
                    return errorsHtml + `<li>${error}</li>`
                }, '');

                errorsElm.html(`
                    <h4 class="alert-heading">Errors</h4>
                    <ul style="margin: 0">
                        ${errorsHtml}
                    </ul>
                `);
            }
            errorsElm.show();

        }).always(function (response) {
            buttons.removeAttr('disable');
            loadingElm.hide();
        })
    });
});